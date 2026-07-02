---
title: "Demystifying the TailwindCSS `bg-current` utility class"
description: "Wondering what `bg-current` does? Read this quick tip and wonder no longer!"
date: "2024-11-15"
author: emma
---

The `bg-current` utility class in TailwindCSS sets the background color of an element to the current text color. This means that the background will inherit the color defined by the `text-color` property of the element or its parent.

### How It Works:
- **Inheritance**: If you have a parent element with a specific text color (e.g., `text-gray-700`), using `bg-current` on a child element will make the background of that child element the same color as the text color of the parent.
- **Dynamic**: This is particularly useful for creating components that need to adapt to different themes or color schemes without hardcoding specific colors. For example, if you switch from light mode to dark mode, the background will automatically change to match the new text color.

### Example:
```html
<div class="text-blue-500">
    <span class="bg-current">This background is blue!</span>
</div>
```
In this example, the background of the `<span>` will be blue because it inherits the text color from the parent `<div>`.

### Benefits:
- **Consistency**: Ensures that the background color is always consistent with the text color, which can be particularly useful for icons or buttons.
- **Ease of Use**: Reduces the need to define multiple color classes for different states or themes, simplifying the styling process.

Using `bg-current` is a great way to maintain visual harmony in your design while leveraging Tailwind's utility-first approach.
