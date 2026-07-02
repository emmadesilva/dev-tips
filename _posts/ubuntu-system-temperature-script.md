---
title: 'Ubuntu system temperature script without any software installs'
description: 'How to check the temperature of your Ubuntu system without installing any software, with a Bash alias to make it easier.'
author: emma
date: '2024-06-26 10:00'
---

## Create a simple bash script/command to check your system temperatures!

Here's a simple bash script to check the temperature of your Ubuntu system without installing any software. You can add this script to your `.bashrc` file to create an alias for it, making it easier to run.

```bash
paste <(cat /sys/class/thermal/thermal_zone*/type) <(cat /sys/class/thermal/thermal_zone*/temp) | column -s $'\t' -t | sed 's/\(.\)..$/.\1°C/'
```

And to add an alias for it, open your `.bashrc` file with a text editor:

```bash
$ nano ~/.bashrc

# And add the following line at the end of the file:
alias temps="paste <(cat /sys/class/thermal/thermal_zone*/type) <(cat /sys/class/thermal/thermal_zone*/temp) | column -s $'\t' -t | sed 's/\(.\)..$/.\1°C/'"

# Save and close the file, then run:
$ source ~/.bashrc
```

Now you can run the `temps` command in your terminal to check the temperature of your system.

This will output the temperature of each thermal zone in your system, along with the type of sensor and the temperature in Celsius. Here's an example output:

```bash
BAT0          42.2°C
x86_pkg_temp  70.0°C
```


Source: https://askubuntu.com/a/854029 (CC BY-SA 4.0)
