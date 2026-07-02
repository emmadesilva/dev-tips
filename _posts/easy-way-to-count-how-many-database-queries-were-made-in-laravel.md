---
title: "Easy way to count how many database queries were made in Laravel"
#description: ""
date: "2024-09-27"
author: emma
---

```php
$counter = 0; \DB::listen(function() use (&$counter) {$counter++;});

// Do stuff

dd($counter);
```
