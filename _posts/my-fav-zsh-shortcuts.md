---
title: "My favourite zsh/bash shortcuts (functions and aliases)"
description: "A collection of the zsh functions and aliases I actually use every day, from git shortcuts to image conversion helpers."
date: "2026-07-02"
author: emma
---

## Introduction

My zsh profile is over 1000 lines at this point. A lot of that is functions I asked AI to generate for me, since it's fast, portable, and saves me a ton of typing.

Here's the thing though: the shortcuts that save me the most time aren't the clever ones. They're the dumb ones. Things like `clone` instead of `git clone && cd`, or `dir` instead of `mkdir -p && cd`. Each one only saves a second or two, but I run them so often that it adds up fast.

These are in no particular order, just the ones I reach for constantly.

## Git aliases for common commands

A few one-liners I have set up as plain aliases:

```bash
alias gcp="git cherry-pick"
alias git-append="git commit --amend --no-edit -a"
```

`gcp` is self-explanatory. `git-append` amends the last commit with your currently staged (and unstaged, thanks to `-a`) changes without touching the commit message. Great for fixing up a commit you just made before you push.

## Create a branch or switch to it if it already exists

One of my most-used functions. Normally you have to remember whether a branch exists before deciding between `git checkout <branch>` and `git checkout -b <branch>`. This just does the right thing either way:

```bash
gb() {
  if git rev-parse --verify --quiet "$1" >/dev/null; then
    git checkout "$1"
  else
    git checkout -b "$1"
  fi
}
```

## Nuke all local changes to reset the working tree

When an experiment goes sideways or I just want to throw everything away and start clean, I run `nah`:

```bash
nah() {
  git reset --hard
  git clean -df
  if [ -d ".git/rebase-apply" ] || [ -d ".git/rebase-merge" ]; then
    git rebase --abort
  fi
}
```

This resets tracked changes, removes untracked files and directories. No confirmation prompt, so use it carefully.

## Print recent commits as ready-to-paste cherry-pick commands

Useful when you need to cherry-pick a batch of commits from one branch onto another in order:

```bash
logs() {
  if [[ -z "$1" || "$1" =~ [^0-9] ]]; then
    echo "Usage: logs <number_of_commits>"
    return 1
  fi
  git log -n "$1" --reverse --pretty=format:"gcp %h"
}
```

Run `logs 5` and you get the last 5 commits printed oldest to newest, each one already formatted as `gcp <hash>` (using the alias from above). Copy, paste, done.

## Create a directory and cd into it in one step

This is the one I mentioned that barely saves any time per use, but I run it constantlyn and the time save compounds:

```bash
dir() { mkdir -p "$1" && cd "$1"; }
```

## Make mkdir always create parent directories

I got tired of hitting "No such file or directory" errors from `mkdir` when the parent folder didn't exist yet, so I just overrode the default behavior globally:

```bash
mkdir() {
  command mkdir -p "$@"
}
```

Now `mkdir` always behaves like `mkdir -p`.

## Open nano and auto-create missing parent directories

Same idea as the `mkdir` override, but for opening a file in `nano` when the folder it lives in doesn't exist yet:

```bash
nano() {
  if [ $# -eq 0 ]; then
    command nano
  else
    dir=$(dirname "$1")
    if [ ! -d "$dir" ]; then
      mkdir -p "$dir"
    fi
    command nano "$@"
  fi
}
```

## Safely replace a file's contents by moving the original to trash first

Instead of overwriting a file and losing the original, `replace` moves it to `~/.Trash` first and then opens a fresh file with the same name in `nano`:

```bash
replace() {
  if [[ $# -ne 1 ]]; then
    echo "Usage: replace <file>" >&2
    return 1
  fi
  local file="$1"
  if [[ ! -f "$file" ]]; then
    echo "Error: '$file' not found or not a file" >&2
    return 1
  fi
  mkdir -p ~/.Trash
  mv "$file" ~/.Trash/
  nano "$file"
}
```

But mainly this saves me from runing "rm <file> && nano <file>" which I often do when replacing a file from an AI chat or similar. If you need the original back, it's sitting in `~/.Trash`.

## Convert HEIC images to JPG or PNG

iPhone photos default to HEIC, which isn't great for sharing or uploading. These two functions batch-convert them using ImageMagick:

```bash
heic2jpg() {
  if [ $# -eq 0 ]; then
    echo "Usage: heic2jpg file1.heic [file2.heic ...]"
    return 1
  fi
  for f in "$@"; do
    if [ ! -f "$f" ]; then echo "Not found: $f"; continue; fi
    magick "$f" "${f%.*}.jpg"
  done
}

heic2png() {
  if [ $# -eq 0 ]; then
    echo "Usage: heic2png file1.heic [file2.heic ...]"
    return 1
  fi
  for f in "$@"; do
    if [ ! -f "$f" ]; then echo "Not found: $f"; continue; fi
    magick "$f" "${f%.*}.png"
  done
}
```

Both take any number of files, so `heic2jpg *.heic` works fine.

## Batch convert images to WebP

For getting images web-ready, this wraps `img2webp` with sensible defaults and skips anything that isn't actually a file:

```bash
img2webp() {
  if [[ $# -eq 0 ]]; then
    echo "Usage: img2webp <file.png> [file2.png ...] or img2webp *.png"
    return 1
  fi

  for input in "$@"; do
    if [[ ! -f "$input" ]]; then
      echo "Skipping: '$input' is not a file"
      continue
    fi
    local output="${input%.*}.webp"
    echo "Converting: $input → $output"
    command img2webp -lossy -q 80 "$input" -o "$output"
  done
}
```

Runs at quality 80, lossy, which is a good default for most web use cases. Saves a TON of storage space and bandwidth

## A few misc aliases

Small ones I use daily without thinking about them:

```bash
alias pest="./vendor/bin/pest"
alias python="python3" # For AI commands expecting it
alias py="python3" # For me when I'm lazy
```

The `pest` alias saves typing out the full vendor binary path every time I want to run tests. The `python`/`py` aliases exist because plenty of AI-generated commands assume `python` points to Python 3, and half the time I'm too lazy to type the `3` myself anyway.

## Conclusion

None of these are groundbreaking on their own. But that's kind of the point: the small, boring shortcuts you run 50 times a day save you more time overall than the clever ones you run once a week. If you're not already keeping a running file of these for yourself, start one. Every time you catch yourself typing the same thing twice, that's a candidate.
