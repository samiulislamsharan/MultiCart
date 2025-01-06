<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    use ApiResponse, SaveFile;

    public function index()
    {
        return view('admin.profile');
    }

    public function storeUser(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name' => 'required|string|max:255|regex:/^[\pL\s\-]+$/u',
                'email' => 'required|string|email|exists:users,email',
                'phone' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
                'address' => 'required|string|max:255',
                'github_link' => 'nullable|string',
                'insta_link' => 'nullable|string',
                'facebook_link' => 'nullable|string',
                'twitter_link' => 'nullable|string|url',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:5120',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                if ($request->hasFile('image')) {
                    $image = $this->saveImage($request->image, Auth::user()->image, 'images/users');
                } else {
                    $image = Auth::user()->image;
                }

                User::updateOrCreate(
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
                        'image' => $image,
                    ]
                );

                return $this->success(['reload' => true], 'Profile updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }
}
