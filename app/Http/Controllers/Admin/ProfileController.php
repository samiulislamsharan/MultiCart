<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile');
    }

    public function storeUser(Request $request)
    {
        try {
            // print_r($request->all());
            $validation = Validator::make($request->all(), [
                'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|string|email|exists:users,email',
                'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'address' => 'required|string|max:255',
                'github_link' => 'nullable|string',
                'insta_link' => 'nullable|string',
                'facebook_link' => 'nullable|string',
                'twitter_link' => 'nullable|string|url',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'status' => 400,
                    'message' => $validation->errors()->first()
                ]);
            } else {
                if ($request->hasFile('image')) {
                    $image_name = 'images/' . time() . '.' . $request->image->extension();
                    $request->image->move(public_path('images/'), $image_name);
                }

                $user = User::updateOrCreate(
                    ['id' => Auth::user()->id],
                    [
                        'name' => $request->name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'twitter_link' => $request->twitter_link,
                        'github_link' => $request->github_link,
                        'insta_link' => $request->insta_link,
                        'facebook_link' => $request->facebook_link,
                        'image' => $request->hasFile('image') ? $image_name : NULL,
                    ]
                );

                return response()->json([
                    'status' => 200,
                    'message' => 'Profile updated successfully',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 500,
                'message' => 'An error occurred: ' . $e->getMessage(),
            ]);
        }
    }
}