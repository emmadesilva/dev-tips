---
title: Use the Laravel Arr helpers directly instead of using temporary collections
description: 'Instead of creating a temporary collection just to use array helpers, you can use the Laravel Arr helpers directly.'
author: emma
date: '2024-04-09 08:00'
---

Instead of creating a temporary collection just to use array helpers, you can use the Laravel Arr helpers directly.

This makes the code much more readable, as you don't need the cognitive load of having to consider the `collect()` logic and also having to convert it back to an array with `all()`.

```php
// Do this 👇
Arr::mapWithKeys($array, function (array $item, int $key) {
    return [$item['email'] => $item['name']];
});

// Instead of this 👇
collect($array)->mapWithKeys(function (array $item, int $key) {
    return [$item['email'] => $item['name']];
})->all();
```
