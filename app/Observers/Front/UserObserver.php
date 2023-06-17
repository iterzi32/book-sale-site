<?php

namespace App\Observers\Front;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserObserver
{
    public function saving(User $user): void
    {
        $user->first_name = Str::title($user->getAttribute('first_name'));
        $user->last_name = Str::title($user->getAttribute('last_name'));
        $user->password = Hash::make($user->getAttribute('password'));
    }

}
