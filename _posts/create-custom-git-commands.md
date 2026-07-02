---
title: "Create custom Git commands"
description: "Wanted to add a custom Git command? It's so easy."
date: "2024-12-22"
author: emma
---

### Background

For example, I have this alias in my `.zshrc``

```bash
alias git-append="git commit --amend --no-edit -a"
````

But writing `git-append` doesn't feel as nice as `git append`, but we can fix that!

### Adding a custom Git command

Thankfully we can define a Git alias in the Git configuration to use `git append` instead of creating a shell alias. Here’s how you can do it:

1. Run the following command to create a Git alias for `append`:

   ```bash
   git config --global alias.append "commit --amend --no-edit -a"
   ```

2. Now, you can use the command `git append` directly.

This works because Git supports creating custom aliases within its configuration, and they are invoked with the `git` command followed by the alias name.

And this works for any kind of command you want to create too!
