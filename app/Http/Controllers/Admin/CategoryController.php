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
                'slug' => 'nullable|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
                'parent_category_id' => 'nullable|integer',
            ], [
                'name.required' => 'The Name is required.',
                'slug.required' => 'The Slug is required.',
                'image.mimes' => 'The Image must be a file of type: jpeg, png, jpg, gif, svg.',
                'image.max' => 'The Image may not be greater than 5120 kilobytes.',
                'parent_category_id.integer' => 'The parent category must be an integer.',
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

                $slug = replace_slug_str($request->name);

                Category::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name,
                        'slug' => $slug,
                        'image' => $image,
                        'parent_category_id' => $request->parent_category_id,
                    ]
                );

                return $this->success(['reload' => true], 'Category name updated successfully.');
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

    /**
     * Store a newly created Category Attribute in storage.
     */
    public function storeCategoryAttribute(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'id' => 'required',
                'category_id' => 'required|integer|exists:categories,id',
                'attribute_id' => 'required|integer|exists:attributes,id',
            ], [
                'category_id.required' => 'The Category field is required.',
                'category_id.integer' => 'The Category must be an integer.',
                'category_id.exists' => 'The selected Category does not exist.',
                'attribute_id.required' => 'The Attribute field is required.',
                'attribute_id.integer' => 'The Attribute must be an integer.',
                'attribute_id.exists' => 'The selected Attribute does not exist.',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {

                CategoryAttribute::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'category_id' => $request->category_id,
                        'attribute_id' => $request->attribute_id,
                    ]
                );

                return $this->success(['reload' => true], 'Category Attribute name updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }
}
