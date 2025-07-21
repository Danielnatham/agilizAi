<?php

namespace App\Http\Controllers;

use App\Enums\RolesEnum;
use App\Models\User;
use Illuminate\Http\Request;

class ManageUserController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize($request->user(), RolesEnum::ADMIN);
        $users = User::withTrashed()->get();

        return response()->json($users);
    }
}
