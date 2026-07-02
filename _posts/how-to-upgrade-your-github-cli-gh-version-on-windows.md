---
title: "How to upgrade your GitHub CLI (`gh`) version on Windows"
description: "Here is how to update your GitHub CLI version on Windows."
date: "2024-09-01 19:00"
author: emma
---

Here is how to update your GitHub CLI version on Windows. This guide assumes you have already installed GitHub CLI on your system.

1. Visit https://github.com/cli/cli/releases/latest
2. Scroll down to the bottom of the page and find the assets
3. Find the entry for your system architecture (amd64 or arm64)

```bash
# Example
GitHub CLI 2.X.X windows amd64
GitHub CLI 2.X.X windows arm64
```

4. Download the file
5. Open the ZIP archive
6. Open the director where your current version is installed
   - This is probably `C:\Program Files\GitHub CLI`
   - Run `where.exe gh` to find the path if you are unsure
7. Copy the `gh.exe` file from the ZIP archive to the directory where your current version is installed
   - You will be prompted to replace the existing file
   - You may also need to provide administrator permissions
8. Run `gh --version` to verify the installation

Done! You have successfully updated GitHub CLI on Windows.
