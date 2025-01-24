<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return view('auth/signin');
    }

    public function registerUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
            'email' => 'required|string|email|unique:users,email|max:255',
            'password' => 'required|string|min:6'
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400);
        } else {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password)
            ]);

            $role = Role::where('slug', 'customer')->first();
            $user->roles()->attach($role);

            return $this->success(
                ['token' => $user->createToken('API Token')->plainTextToken],
                'User created successfully',
                201
            );
        }
    }

    public function loginUser(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'email' => 'required|string|email|exists:users,email',
            'password' => 'required|string|min:6'
        ]);

        if ($validation->fails()) {
            return response()->json([
                'status' => 400,
                'message' => $validation->errors()->first()
            ]);
        } else {
            $userCredentials = $request->only('email', 'password');

            if (Auth::attempt($userCredentials)) {
                if (Auth::user()->hasRole('admin')) {
                    return response()->json([
                        'status' => 200,
                        'message' => 'Admin User Login Successful',
                        'url' => 'admin/dashboard',
                    ]);
                } else {
                    $user = User::where('id', Auth::User()->id)->first();
                    $user['token'] = $user->createToken('API Token')->plainTextToken;

                    return $this->success(
                        ['user' => $user],
                        'Login successful',
                        200
                    );
                }
            } else {
                return $this->error('Invalid email or password', 404);
            }
        }
    }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}