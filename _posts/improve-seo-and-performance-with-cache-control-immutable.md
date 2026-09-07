---
title: 'Improve SEO and Performance with `Cache-Control: immutable`'
date: '2026-09-07'
description: 'Use the Cache-Control: immutable HTTP response directive to skip revalidation requests and speed up repeat page loads.'
author: emma
---

The `Cache-Control: immutable` HTTP response directive tells a browser that a static file will never change during its freshness lifetime, stopping extra network requests when a user refreshes the page. Faster repeat loads mean better Core Web Vitals scores, which directly benefit SEO and perceived performance.

### Why Use Immutable?
- **Stops Revalidation**: Normally, when you hit refresh, the browser sends a small check to the server to see if a cached file changed. The `immutable` flag tells the browser not to do this check.
- **Saves Bandwidth**: Your site loads faster and uses less data because the browser relies completely on its local storage.
- Learn more about header mechanics in the [MDN Web Docs](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control#immutable).

### Best Practices
- **Use Cache Busting**: Only use `immutable` on files that have unique names containing a version number or content hash (like `app.a1b2c3.js`).
- **Set Long Expiry**: Pair the flag with a long expiration time, such as `max-age=31536000` (one year).
- **Target Static Assets**: Apply this to stable files like images, fonts, style sheets, and scripts. Read a detailed overview on [KeyCDN](https://www.keycdn.com/blog/cache-control-immutable).

### Example
```
Cache-Control: max-age=31536000, immutable
```
