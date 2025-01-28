<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BrandController extends Controller
{
    use ApiResponse, SaveFile;

    /**
     * Display a listing of Brand resource.
     */
    public function index()
    {
        $data = Brand::get();

        return view('admin.brands.index', get_defined_vars());
    }

    /**
     * Store a newly created Brand in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'id' => 'required',
                'text' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg,webp,avif|max:5120',
            ], [
                'text.required' => 'The Name is required.',
                'image.mimes' => 'The Image must be a file of type: jpeg, png, jpg, gif, svg, webp, avif.',
                'image.max' => 'The Image may not be greater than 5120 kilobytes.',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                if ($request->hasFile('image')) {
                    if ($request->id > 0) {
                        $image = Brand::find($request->id)->image;
                        $image = $this->saveImage($request->image, $image, 'images/brands');
                    } else {
                        $image = $this->saveImage($request->image, null, 'images/brands');
                    }
                } else {
                    $image = Brand::where('id', $request->id)->pluck('image')->first();
                }

                Brand::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'text' => $request->text,
                        'image' => $image,
                    ]
                );

                return $this->success(['reload' => true], 'Brand updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }
}