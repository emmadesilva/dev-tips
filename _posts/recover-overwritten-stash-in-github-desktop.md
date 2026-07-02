---
title: 'Recover overwritten stash in GitHub Desktop'
date: '2024-04-11 12:24:32'
description: 'Learn how to recover an overwritten stash in GitHub Desktop.'
author: emma
---

## Background

Picture this: You have a stash in GitHub Desktop, and you overwrite it by mistake. You now enter the
<a href="https://en.wiktionary.org/wiki/ohnosecond" rel="nofollow noopener"><abbr title="The fraction of time between making a mistake and realizing it.">ohnosecond</abbr></a>.
You might think that you've lost the changes forever, but fear not! There's a way to recover an overwritten stash in GitHub Desktop.

## Steps to recover an overwritten stash in GitHub Desktop

First, you need to find the logs from GitHub Desktop. Here are the paths where you can find the logs:

```bash
# Windows
'C:\Users\USERNAME\AppData\Roaming\GitHub Desktop\logs'

# macOS
'/Users/USERNAME/Library/Application Support/GitHub Desktop/logs'
# You can also use the "Help" tab in the menu bar and click on the "Show logs in Finder" option
```

Next, find the latest log file, it will look something like `2024-04-11.desktop.production.log` and open it in a text editor.

Now, use the search function <kbd>Ctrl+F</kbd> to search for "Dropped stash". You should find a line that looks like this:

```log
2024-04-11T12:20:52.053Z - info: [ui] Dropped stash 'd3f88bb8f11798d3d6505b579ef140fc61da05cc' associated with master
```

The hash `d3f88bb8f11798d3d6505b579ef140fc61da05cc` is the identifier for the dropped stash. 
Copy this hash as this is what we are looking for. Of course, your hash will be different.

Now, open a terminal and navigate to your repository. Run the following command to create a branch called `recovery` based on the dropped stash:

```bash
git checkout -b recovery d3f88bb8f11798d3d6505b579ef140fc61da05cc # Replace the hash with your own
```

And that's it! You've recovered the overwritten stash in GitHub Desktop. 

If you now open Desktop back up you should see the changes in the recovery branch. 
From here, you can cherry pick the changes you need to your original branch.

## Conclusion

I hope this guide helps you recover an overwritten stash in GitHub Desktop! If it saved you some time, consider [sharing it with others](https://twitter.com/intent/tweet?text=How%20to%20recover%20overwritten%20stash%20in%20%23GitHubDesktop%20by%20%40EmmaDSCodes&url=https%3A%2F%2Ftips.desilva.se%2Fposts%2Frecover-overwritten-stash-in-github-desktop) who might find it useful.

- You can support me by following me on Twitter <a href="https://twitter.com/EmmaDSCodes">EmmaDSCodes</a>. If I really helped, you can also <a href="https://www.buymeacoffee.com/emma">Buy me a coffee</a>!
- You can also support the original authors by visiting the post on Stackoverflow linked below and upvoting the answer.

### Attributions

The sources and instructions for this post are based on content from Stackoverflow 
<a href="https://stackoverflow.com/a/70442218/5700388" rel="nofollow noopener">Recover dropped Stashed Changes in GitHub Desktop (Windows 10)</a>, 
by various authors, with content licenced under "CC BY-SA 4.0" which this post is also licenced under.
