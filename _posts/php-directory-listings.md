---
title: 'Create static directory listings on GitHub Actions/Pages'
date: '2024-04-14 16:40'
description: 'Learn how to automatically create static directory listings on GitHub Actions/Pages with a simple PHP script.'
author: emma
---

## Background

Remember those classic directory listings from the early days of the web? They're still useful today, especially for some static sites hosted on GitHub Pages.

In this quick tutorial,I'll show you how to automatically create static directory listings on GitHub Actions/Pages with a simple PHP script I created a while back.

Best parts: It's totally free, has no dependencies, and works perfectly in GitHub Actions as they have a built-in PHP runtime.

## Screenshot

Here's a screenshot of the directory listing created by the script:

![Directory Listing](https://raw.githubusercontent.com/emmadesilva/dev-tips/master/_media/screely-1713105882661.png)

## Trying it locally

To get started, you can try the script locally. Here's how:

Download the script from the GitHub repository:

```bash
wget https://raw.githubusercontent.com/emmadesilva/php-directory-listing/master/directory-listing.php -O directory-listing.php
```

Next run the script in your terminal:

```bash
php directory-listing.php
```

This will create a self-contained `index.html` file with a directory listing of the current directory.

## Using it in GitHub Actions

To use the script in GitHub Actions, you can base it on this sample workflow:

```yaml
# GitHub Actions demo to create a directory listing for the repository files to publish to GitHub Pages

name: Demo Action

on:
  push:
    branches: [ "main" ]

permissions:
  contents: read
  pages: write
  id-token: write

jobs:
  build:
    runs-on: ubuntu-latest

    steps:
      - uses: actions/checkout@v3

      # Download the directory listing script
      - name: Download Directory Listing Script
        run: wget https://raw.githubusercontent.com/emmadesilva/php-directory-listing/master/directory-listing.php -O directory-listing.php

      # Run the directory listing script
      - name: Run Directory Listing Script
        run: php directory-listing.php

      # Optional: Deploy to GitHub Pages (you can also commit the file to your repository)
      - name: Setup Pages
        uses: actions/configure-pages@v5
      - name: Upload artifact
        uses: actions/upload-pages-artifact@v3
        with:
          path: '.'
      - name: Deploy to GitHub Pages
        id: deployment
        uses: actions/deploy-pages@v4
```

This workflow will create a directory listing of the repository files and publish it to GitHub Pages.

## Conclusion

That's it! You now have a simple way to create static directory listings on GitHub Actions/Pages. Feel free to customize the script or workflow to fit your needs.

See the source code at https://github.com/emmadesilva/php-directory-listing and try the live demo at https://git.desilva.se/php-directory-listing/.
