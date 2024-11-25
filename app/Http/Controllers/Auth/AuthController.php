<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/signin');
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
                        'message' => 'Admin User',
                        'url' => 'admin/dashboard',
                    ]);
                } else {
                    return response()->json([
                        'status' => 200,
                        'message' => 'General User',
                    ]);
                }
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => 'Invalid email or password',
                ]);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }
}