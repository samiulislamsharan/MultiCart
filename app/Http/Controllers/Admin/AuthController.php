<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function createAdmin()
    {
        $user = new User();

        $user->name = 'Admin';
        $user->email = 'admin@multicart.com';
        $user->password = bcrypt('password');

        $user->save();

        $adminRole = Role::where('slug', 'admin')->first();

        $user->roles()->attach($adminRole);

        echo 'Admin created successfully';
    }

    public function createUser()
    {
        $user = new User();

        $user->name = 'User';
        $user->email = 'user@multicart.com';
        $user->password = bcrypt('password');

        $user->save();

        $userRole = Role::where('slug', 'user')->first();

        $user->roles()->attach($userRole);

        echo 'User created successfully';
    }
}