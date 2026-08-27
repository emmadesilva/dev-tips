---
title: "Remove All Git Worktrees"
description: "Quickly remove Git worktrees created by coding agents like Codex or Claude Code with a single terminal command."
date: "2026-08-27"
author: emma
---

Coding agents like Codex and Claude Code may create Git worktrees while working on tasks. After a while, you can end up with a lot of old worktrees that you no longer need.

To remove **all worktrees except your main working tree**, run:

```bash
git worktree list | tail -n +2 | awk '{print $1}' | xargs -I {} git worktree remove --force "{}"
```

This command:

1. Lists all Git worktrees.
2. Skips the first worktree, which is normally your main working directory.
3. Extracts each remaining worktree path.
4. Removes each one with `git worktree remove --force`.

You can check what will be removed first with:

```bash
git worktree list
```

Be careful with `--force`: any uncommitted changes in those worktrees can be discarded.

Once you're done, you can also clean up stale worktree metadata with:

```bash
git worktree prune
```
