---
title: "Simple Laravel `make:user` Artisan command"
description: "Need to make users from the Artisan console? Add this command!"
date: "2024-08-30"
author: emma
---

Need to make users from the Artisan console? Add this command!

```bash
nano app/Console/Commands/MakeUserCommand.php
```

```php
<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserCommand extends Command
{
    protected $signature = 'make:user';
    protected $description = 'Create a new user';

    public function handle(): void
    {
        $name = $this->ask('What is your name?');
        $email = $this->ask('What is your email?');
        $password = $this->secret('What is your password?');

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'email_verified_at' => now(),
        ]);

        $this->info("User #$user->id created successfully.");
    }
}
```

```bash
php artisan make:user
```
