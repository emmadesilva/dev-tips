---
title: "How to publish the Laravel maintenance mode view"
description: "Wondering how to customize the maintenance mode view in Laravel? Just publish the 503 error page."
date: "2024-09-01 17:00"
author: emma
---

## Publish the Laravel maintenance mode view

Wondering how to customize the maintenance mode view in Laravel? It's simple, just publish the 503 error page!

```bash
php artisan vendor:publish --tag=laravel-errors
```

Since all you need is the `resources/views/errors/ 503.blade.php` file, you can also just paste the following Blade (which is the default Laravel 11 view):

```blade
@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))
```

## Pro tip: Poll to refresh

While Laravel has a feature to send refresh headers to refresh the page at an interval, this can be a bit janky as it forces a browser refresh.

A more elegant solution (assuming your users have JavaScript enabled) is to poll the server to check if the service is back up. 

Here's a simple script you can add to the 503 error page to automatically reload the page when the service is back up:

```blade
@extends('errors::minimal')

@section('title', __('Service Unavailable'))
@section('code', '503')
@section('message', __('Service Unavailable'))

<script>
    // Automatically reload the page when the service is back up
    (function() {
        // Configuration
        const checkInterval = 1000; // Time between checks in milliseconds, feel free to adjust
        const checkUrl = '/up'; // URL to check (the Laravel 11 Health Check route)

        function checkService() {
            fetch(checkUrl, { method: 'HEAD' })
                .then(response => {
                    if (response.ok) {
                        // If the request was successful, refresh the page
                        window.location.reload();
                    } else {
                        // If the request failed, schedule another check
                        setTimeout(checkService, checkInterval);
                    }
                })
                .catch(error => {
                    // If there was a network error, schedule another check
                    setTimeout(checkService, checkInterval);
                });
        }

        // Start checking
        setTimeout(checkService, checkInterval);
    })();
</script>
```

It uses the Fetch API to send a `HEAD` request to the `/up` which is added in all Laravel 11 projects by default. If the request is successful, it reloads the page. If it fails, it schedules another check. 

Feel free to adjust the `checkInterval` to your liking. Lower values leads to less waiting time, but adds more server requests. So balance it out according to your needs.

## Conclusion

If any part of this post was helpful, please let me know and give me a follow on Twitter/X where I'm [@EmmaDSCodes](https://twitter.com/EmmaDSCodes)
