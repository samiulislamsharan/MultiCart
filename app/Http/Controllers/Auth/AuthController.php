<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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