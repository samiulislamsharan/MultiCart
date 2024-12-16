<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    use ApiResponse, SaveFile;

    /**
     * Display a listing of the Category Names.
     */
    public function index()
    {
        $data = Category::get();

        return view('admin.categories.index_category_names', get_defined_vars());
    }

    /**
     * Store a newly created Category Name in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'parent_category_id' => 'nullable|integer',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                if ($request->hasFile('image')) {
                    if ($request->id > 0) {
                        $image = Category::find($request->id)->image;
                        $image = $this->saveImage($request->image, $image, 'images/categories');
                    } else {
                        $image = $this->saveImage($request->image, null, 'images/categories');
                    }
                } else {
                    $image = Category::where('id', $request->id)->pluck('image')->first();
                }

                Category::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name,
                        'slug' => $request->slug,
                        'image' => $image,
                        'parent_category_id' => $request->parent_category_id,
                    ]
                );

                return $this->success(['reload' => true], 'Attribute name updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }

    /**
     * Display a listing of the Category Attributes.
     */
    public function indexCategoryAttribute()
    {
        $data = CategoryAttribute::with('attribute', 'category')->get();
        $categories = Category::get();
        $attributes = Attribute::get();

        return view('admin.categories.index_category_attributes', get_defined_vars());
    }
}
