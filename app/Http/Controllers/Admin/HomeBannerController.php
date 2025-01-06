<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeBanner;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class HomeBannerController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HomeBanner::get();

        return view('admin.home_banners.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'id' => 'required',
                'text' => 'required|string|max:255',
                'link' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp|max:5120',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                if ($request->hasFile('image')) {
                    if ($request->id > 0) {
                        $image = HomeBanner::where('id', $request->id)->first();
                        $image_path = 'storage/' . $image->image;

                        if (File::exists($image_path)) {
                            File::delete($image_path);
                        }
                    }

                    $image_name = 'storage/' . time() . '.' . $request->image->extension();
                    $request->image->move(public_path('storage/'), $image_name);
                } else {
                    $image_name = HomeBanner::where('id', $request->id)->pluck('image')->first();
                }

                HomeBanner::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'text' => $request->text,
                        'link' => $request->link,
                        'image' => $image_name,
                    ]
                );

                return $this->success(['reload' => true], 'Banner updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}