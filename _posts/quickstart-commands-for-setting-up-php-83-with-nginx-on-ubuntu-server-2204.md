---
title: 'Quickstart commands for setting up PHP 8.3 with Nginx on Ubuntu Server 22.04'
description: 'A to the point list of commands to get a Linux and PHP server up and running.'
author: Emma
date: '2024-03-27 15:50'
---

## Introduction

So I'm setting up another server and I thought I should write down the steps for the next time i do so in order to have a convenient document with everything. So in this post is a super to the point list of commands to get a server up and running with PHP 8.3 and Nginx on ubuntu server 22.04.

This guide assumes that you are familiar with linux and the command line, and that you have an actual idea of what you are doing. This won't teach you why things are done the way they are, its just a handy reference of the commands you need to run to setup the requirements for the latest php version.

There is no installation guide for MySQL here as I'm going to use SQLite for this.

## Install commands

```bash
sudo apt update
sudo apt install nginx

# Optional, setup firewall
sudo ufw app list
sudo ufw allow 'Nginx HTTP'
sudo ufw allow 'Nginx HTTPS'
sudo ufw status

# Optional, print ip address
ip addr show
hostname -I
curl -4 icanhazip.com

apt-get install ca-certificates apt-transport-https software-properties-common
sudo apt-get install ca-certificates apt-transport-https software-properties-common
sudo add-apt-repository ppa:ondrej/php
sudo apt-get update
sudo apt-get install php8.3

# Optional, verify php version
php8.3 --version
sudo apt install php8.3-fpm

# Optional, verify php process is running
systemctl status php8.3-fpm

# Optional install common php extensions (Tailored for Laravel)
sudo apt install openssl php8.3-bcmath php8.3-curl php8.3-mbstring php8.3-mysql php8.3-tokenizer php8.3-xml php8.3-zip php8.3-sqlite3
```
### Server config (optional)


```bash
sudo mkdir /var/www/welcome
sudo chown -R $USER:$USER /var/www/welcome
sudo nano /etc/nginx/sites-available/welcome # Paste the config below
```

```nginx
server {
    listen 80;
    server_name welcome www.welcome;
    root /var/www/welcome;

    index index.html index.htm index.php;

    location / {
        try_files $uri $uri/ = 404;
    }

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.3-fpm.sock;
     }

    location ~ /\.ht {
        deny all;
    }
}
```

```bash
sudo ln -s /etc/nginx/sites-available/welcome /etc/nginx/sites-enabled/
sudo unlink /etc/nginx/sites-enabled/default
sudo nginx -t
sudo systemctl reload nginx

# Optional, create info file to verify php is working
echo "<?php phpinfo(); ?>" > /var/www/welcome/index.php
curl http://localhost/
# Later you probably want to remove the info file
sudo rm /var/www/welcome/index.php
```



#### SSL (optional)

```bash
sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 -keyout /etc/ssl/private/nginx-selfsigned.key -out /etc/ssl/certs/nginx-selfsigned.crt

sudo nano /etc/nginx/snippets/self-signed.conf # Paste the following two lines but with the hash sign removed
# ssl_certificate /etc/ssl/certs/nginx-selfsigned.crt;
# ssl_certificate_key /etc/ssl/private/nginx-selfsigned.key;

sudo nano /etc/nginx/sites-available/welcome # Paste the following two lines but with the hash sign removed
# listen 443 ssl;
# include snippets/self-signed.conf;

sudo nginx -t
sudo systemctl restart nginx
```

### Conclusion

And that's it, you should now have a working server with PHP 8.3 and Nginx. If this post helped you, feel free to follow me on Twitter/X to find more useful tips! I'm [@EmmaDSCodes](https://x.com/EmmaDSCodes).

You can also [Buy me a coffee](https://buymeacoffee.com/emma) if I really saved you some time!


