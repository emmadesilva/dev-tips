---
title: "How To Use Blue Links in Tailwind Typography (Prose)"
description: "Want to use the more classic look of links when using the Tailwind typography prose plugin? Here's how."
date: "2024-09-27"
author: emma
---

The Tailwind Typography plugin (that adds the `.prose` class) comes with a very opinionated link style. If you want the more classic one, it's easy to fix in the config. You can also go bold and use any other color of course. I'm going with Indigo for a sweet blue link.

```js
// filepath: tailwind.config.js
theme: {
    extend: {
        fontFamily: {
            sans: ['Inter var', ...defaultTheme.fontFamily.sans],
        },
        typography: (theme) => ({ // [tl! highlight]
            DEFAULT: { // [tl! highlight]
                css: { // [tl! highlight]
                    a: { // [tl! highlight]
                        color: theme('colors.indigo.600'), // [tl! highlight]
                        textDecoration: 'none', // [tl! highlight]
                        '&:hover': { // [tl! highlight]
                            color: theme('colors.indigo.500'), // [tl! highlight]
                        }, // [tl! highlight]
                    }, // [tl! highlight]
                }, // [tl! highlight]
            }, // [tl! highlight]
        }), // [tl! highlight]
    },
},
```

And that's it!
