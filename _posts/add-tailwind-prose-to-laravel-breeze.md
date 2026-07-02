---
title: 'How to add Tailwind prose to Laravel Breeze'
description: 'Here is how to add the Tailwind Typography plugin to Laravel Breeze to get the prose classes'
author: emma
date: '2024-04-06 08:00'
---

## Introduction

Need to use the Tailwind Prose styles in your Laravel Breeze app? No problem! Here's how to do it.

### Step 1: Install the Tailwind Typography plugin

First, install the Tailwind Typography plugin using NPM:

```bash
npm install -D @tailwindcss/typography
```

### Step 2: Import the plugin in your `tailwind.config.js` file

Next, open the `tailwind.config.js` file in the root of your Laravel Breeze project.

At the top of the file are some `import` statements. Add the following to the bottom of the list:

```javascript
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

// Add this line
import typography from '@tailwindcss/typography';
```

### Step 3: Add the plugin to the `plugins` array

Further down in the file, you'll find a `plugins` array. Add the `typography` plugin to the list:

```javascript
// Replace this
plugins: [forms],

// With this
plugins: [forms, typography],
```

### Step 4: Add the `prose` class to your Blade/HTML

Now you can use the `prose` class in your Blade/HTML to apply the Tailwind Typography styles:

```html
<div class="prose dark:prose-invert">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
</div>
```

#### Step 5: Compile your assets

Finally, compile your assets to see the changes:

```bash
npm run build
```

You can of course also use the Vite live preview:

```bash
npm run dev
```

### Conclusion

That's it! You've successfully added the Tailwind Typography plugin to your Laravel Breeze project. Enjoy using the `prose` class to style your text!
