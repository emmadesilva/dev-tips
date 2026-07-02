---
title: "Pushing Only the First Git Commit to a Remote Repository"
date: "2024-03-23"
author: Emma
description: Learn to push only the first Git commit to a remote repository while keeping others untouched.
---

To push just the first commit without pushing the others, you can use the following steps:

1. First, ensure you are in the correct branch where your commits are.
2. Identify the commit hash of the first commit you want to push. You can use `git log` to see the commit history and find the hash of the commit you want to push.
3. Once you have the commit hash, you can push it using the `git push` command with the `origin` and `commit_hash:remote_branch` syntax.

Here's the command to push just the first commit:

```bash
git push origin <commit_hash>:<remote_branch>
```

Replace `<commit_hash>` with the hash of your first commit and `<remote_branch>` with the name of the remote branch you want to push to. 

For example, if your commit hash is `abcdef` and you want to push to the `master` branch, the command would look like this:

```bash
git push origin abcdef:master
```

This will push only the specified commit to the remote repository while leaving the other commits unpushed.
