<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Models\User;

abstract class Controller
{
    protected function authorize(User $user, RolesEnum $role): void{
        if (!$user->hasRole($role)) {
            abort(403, 'Unauthorized action.');
        }
    }
}
