---
title: "MacOS Terminal Command Editing Shortcuts"
description: "A cheat sheet of useful editing shortcuts for the macOS terminal"
date: "2024-11-04"
author: emma
---

**Command Editing Shortcuts**

<code>Ctrl + A</code> – go to the start of the command line

<code>Ctrl + E</code> – go to the end of the command line

<code>Ctrl + K</code> – delete from cursor to the end of the command line

<code>Ctrl + U</code> – delete from cursor to the start of the command line

<code>Ctrl + W</code> – delete from cursor to start of word (i.e. delete backwards one word)

<code>Ctrl + Y</code> – paste word or text that was cut using one of the deletion shortcuts (such as the one above) after the cursor

<code>Ctrl + XX</code> – move between start of command line and current cursor position (and back again)

<code>Alt + B</code> – move backward one word (or go to start of word the cursor is currently on)

<code>Alt + F</code> – move forward one word (or go to end of word the cursor is currently on)

<code>Alt + D</code> – delete to end of word starting at cursor (whole word if cursor is at the beginning of word)

<code>Alt + C</code> – capitalize to end of word starting at cursor (whole word if cursor is at the beginning of word)

<code>Alt + U</code> – make uppercase from cursor to end of word

<code>Alt + L</code> – make lowercase from cursor to end of word

<code>Alt + T</code> – swap current word with previous

<code>Ctrl + F</code> – move forward one character

<code>Ctrl + B</code> – move backward one character

<code>Ctrl + D</code> – delete character under the cursor

<code>Ctrl + H</code> – delete character before the cursor

<code>Ctrl + T</code> – swap character under cursor with the previous one

**Command Recall Shortcuts**

<code>Ctrl + R</code> – search the history backwards

<code>Ctrl + G</code> – escape from history searching mode

<code>Ctrl + P</code> – previous command in history (i.e. walk back through the command history)

<code>Ctrl + N</code> – next command in history (i.e. walk forward through the command history)

<code>Alt + .</code> – use the last word of the previous command

**Command Control Shortcuts**

<code>Ctrl + L</code> – clear the screen

<code>Ctrl + S</code> – stops the output to the screen (for long running verbose command)

<code>Ctrl + Q</code> – allow output to the screen (if previously stopped using command above)

<code>Ctrl + C</code> – terminate the command

<code>Ctrl + Z</code> – suspend/stop the command

**Bash Bang (!) Commands**

Bash also has some handy features that use the ! (bang) to allow you to do some funky stuff with bash commands.

`!!` – run last command
`!blah` – run the most recent command that starts with ‘blah’ (e.g. !ls)

`!blah:p` – print out the command that !blah would run (also adds it as the latest 
command in the command history)

`!$` – the last word of the previous command (same as <code>Alt + .</code>)

`!$:p` – print out the word that !$ would substitute

`!*` – the previous command except for the last word (e.g. if you type `_find somefile.txt /`, then `!*` would give you `_find somefile.txt`)

`!*:p` – print out what `!*` would substitute

---

Credit: https://stackoverflow.com/questions/327664/mac-os-x-terminal-map-optiondelete-to-backward-delete-word/58966776#58966776 (CC BY-SA 4.0)
