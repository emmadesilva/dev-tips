---
title: "Git Undo Commands"
description: "Wondering how to undo a commit in Git? Here are your options."
date: "2024-10-17"
author: emma
---

To undo changes in Git, you can use the following commands, depending on what you want to undo:

1. **Undo uncommitted changes in the working directory:**
   ```bash
   git checkout -- <file>
   ```
   
2. **Unstage a staged file:**
   ```bash
   git reset <file>
   ```

3. **Undo the last commit but keep changes:**
   ```bash
   git reset --soft HEAD~1
   ```

4. **Undo the last commit and discard changes:**
   ```bash
   git reset --hard HEAD~1
   ```

Choose the command based on your requirement. Always be cautious with `--hard` as it irreversibly deletes changes.
