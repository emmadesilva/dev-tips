---
title: "New `@bool` Blade directive in Laravel"
description: "Learn how to use the new `@bool` directive in Laravel's Blade templating engine for efficient boolean value handling in JavaScript and HTML attributes."
date: "2024-10-20"
author: emma
---

## The new `@bool` Blade directive

Laravel's Blade templating engine is getting a handy new feature: the @bool directive. This allows you to directly print boolean values into strings or use them in object construction, making your JavaScript integrations cleaner and more efficient.

Here's how you can use it:

```blade
<script>
    let config = {
        isActive: @bool($isActive),
        hasAccess: @bool($hasAccess)
    };
</script>
```

When compiled, this Blade code will output clean JavaScript:

```html
<script>
    let config = {
        isActive: true,
        hasAccess: false
    };
</script>
```

## Use cases

The @bool directive is particularly useful in several scenarios:

1. JavaScript configuration objects
2. Alpine.js data binding
3. HTML attributes requiring boolean values

For instance, with Bootstrap:

```blade
<button aria-haspopup="@bool($hasPopup)" aria-expanded="@bool($isExpanded)">
    Dropdown button
</button>
```

## Availability

While this feature isn't released yet, it's expected to be available soon. Keep an eye on Laravel's official channels for the announcement.

## Conclusion

The @bool directive is a small but powerful addition to Blade that will make working with boolean values in your templates much more convenient.

If any part of this post was helpful, please let me know and give me a follow on Twitter/X where I'm [@EmmaDSCodes](https://twitter.com/EmmaDSCodes)
