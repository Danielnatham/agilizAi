<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManageUserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize($request->user(), RolesEnum::ADMIN);

        return Inertia::render('admin/users/index', [
            'users' => User::withTrashed()->get()->toArray(),
        ]);
    }
}
