<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductAttribute;
use App\Models\ProductAttrImages;
use App\Models\Size;
use App\Models\Tax;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    use ApiResponse, SaveFile;

    /**
     * Display a listing of Product.
     */
    public function index()
    {
        $data = Product::get();

        return view('admin.products.index', get_defined_vars());
    }

    /**
     * Show the form data for creating or editing a Product.
     */
    public function show(int $id = 0)
    {
        $category = Category::get();
        $brand    = Brand::get();
        $color    = Color::get();
        $size     = Size::get();
        $tax      = Tax::get();

        if ($id == 0) {
            $product = new Product();
            $product_attr = new ProductAttr();
            $product_attr_images = new ProductAttrImages();
        } else {
            $product['id'] = $id;

            $validation = Validator::make($product, [
                'id' => 'required|integer|exists:products,id',
            ], [
                'id.required' => 'Product ID is required',
                'id.integer' => 'Product ID must be an integer',
                'id.exists' => 'Product ID does not exist',
            ]);

            if ($validation->fails()) {
                return redirect()->route('admin.products.index')->withErrors($validation->errors());
            } else {
                $product = Product::where('id', $id)->with('attribute', 'productAttributes')->first();
            }
        }

        return view('admin.products.manage', get_defined_vars());
    }

    /**
     * Store or update a newly created Product in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validation  = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required|string|max:255',
                'slug' => 'nullable|string|max:255',
                'image' => 'image|mimes:jpeg,png,jpg,avif,webp|max:5120',
                'item_code' => 'required|string|max:255',
                'keywords' => 'required|string|max:255',
                'category' => 'required|integer|exists:categories,id',
                'brand' => 'required|integer|exists:brands,id',
                'color' => 'required|integer|exists:colors,id',
                'tax' => 'required|integer|exists:taxes,id',
                'description' => 'required|string',
            ], [
                'id.required' => 'Product ID is required',
                'name.required' => 'Product name is required',
                'name.string' => 'Product name must be a string',
                'name.max' => 'Product name must not exceed 255 characters',
                'slug.required' => 'Product slug is required',
                'slug.string' => 'Product slug must be a string',
                'slug.max' => 'Product slug must not exceed 255 characters',
                'image.image' => 'Product image must be an image',
                'image.mimes' => 'Product image must be a jpeg, jpg, png, avif or webp file',
                'image.max' => 'Product image must not exceed 5120 KB',
                'item_code.required' => 'Product item code is required',
                'item_code.string' => 'Product item code must be a string',
                'item_code.max' => 'Product item code must not exceed 255 characters',
                'keywords.required' => 'Product keywords are required',
                'keywords.string' => 'Product keywords must be a string',
                'keywords.max' => 'Product keywords must not exceed 255 characters',
                'category.required' => 'Product category ID is required',
                'category.integer' => 'Product category ID must be an integer',
                'category.exists' => 'Product category ID does not exist',
                'brand.required' => 'Product brand ID is required',
                'brand.integer' => 'Product brand ID must be an integer',
                'brand.exists' => 'Product brand ID does not exist',
                'color.required' => 'Product color ID is required',
                'color.integer' => 'Product color ID must be an integer',
                'color.exists' => 'Product color ID does not exist',
                'tax.required' => 'Product tax ID is required',
                'tax.integer' => 'Product tax ID must be an integer',
                'tax.exists' => 'Product tax ID does not exist',
                'description.required' => 'Product description is required',
                'description.string' => 'Product description must be a string',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                if ($request->hasFile('image')) {
                    if ($request->id > 0) {
                        $image = Product::find($request->id)->image;
                        $image = $this->saveImage($request->image, $image, 'images/products');
                    } else {
                        $image = $this->saveImage($request->image, null, 'images/products');
                    }
                } else {
                    $image = Product::where('id', $request->id)->pluck('image')->first();
                }

                $slug = replace_slug_str($request->name);

                $product = Product::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name,
                        'slug' => $slug,
                        'image' => $image,
                        'item_code' => $request->item_code,
                        'keywords' => $request->keywords,
                        'category_id' => $request->category,
                        'brand_id' => $request->brand,
                        'color_id' => $request->color,
                        'tax_id' => $request->tax,
                        'description' => $request->description,
                    ]
                );

                $product_id = $product->id;

                if ($request->attribute != '') {
                    ProductAttribute::where('product_id', $product_id)->delete();

                    foreach ($request->attribute as $key => $value) {
                        ProductAttribute::updateOrCreate(
                            [
                                'product_id' => $product_id,
                                'category_id' => $request->category,
                                'attribute_value_id' => $value,
                            ],
                            [
                                'product_id' => $product_id,
                                'category_id' => $request->category,
                                'attribute_value_id' => $value,
                            ]
                        );
                    }
                }

                foreach ($request->sku as $key => $value) {
                    $product_attr = ProductAttr::updateOrCreate(
                        ['id' => $request->product_attr_id[$key]],
                        [
                            'product_id' => $product_id,
                            'color_id' => $request->attr_color[$key],
                            'size_id' => $request->size[$key],
                            'sku' => $request->sku[$key],
                            'mrp' => $request->mrp[$key],
                            'price' => $request->price[$key],
                            'quantity' => $request->quantity[$key],
                            'length' => $request->length[$key],
                            'breadth' => $request->breadth[$key],
                            'height' => $request->height[$key],
                            'weight' => $request->weight[$key],
                        ]
                    );

                    $product_attr_id = $product_attr->id;
                    $sanitized_name = $this->clean($request->name);
                    $image_val = 'product_attr_image_' . $request->image_value[$key];

                    if ($request->$image_val) {
                        foreach ($request->$image_val as $key => $value) {
                            $image = 'images/product_attrs/' . $this->getRandomValue() . '_' . $sanitized_name . '_' . time() . '.' . $value->extension();
                            $value->move(public_path('images/product_attrs/'), $image);

                            ProductAttrImages::updateOrCreate(
                                [
                                    'product_id' => $product_id,
                                    'product_attr_id' => $product_attr_id,
                                    'image' => $image,
                                ]
                            );
                        }
                    }
                }
            }

            DB::commit();

            return $this->success(['reload' => true], 'Product and attribute saved successfully');
        } catch (\Exception $e) {
            DB::rollBack();

            return $this->error($e->getMessage(), 500, []);
        }
    }

    /**
     * Get the specified attributes for a Product category.
     */
    public function getAttributes(Request $request)
    {
        $category_id = $request->category_id;
        $data = CategoryAttribute::where('category_id', $category_id)->with('attribute', 'values')->get();

        return $this->success(['data' => $data], 'Successfully fetched attributes');
    }

    /**
     * Remove the specified attribute from a Product.
     */
    public function removeAttr(Request $request)
    {
        $product_attr_id = $request->id;

        if (!empty($product_attr_id) && $product_attr_id > 0) {
            ProductAttr::where('id', $product_attr_id)->delete();

            return $this->success(['reload' => false], 'Attribute removed successfully');
        } else {
            return $this->error('Invalid request', 400, []);
        }
    }

    /**
     * Remove the specified attribute image from a Product.
     */
    public function removeAttrImg(Request $request)
    {
        $product_attr_img_id = $request->id;

        if (!empty($product_attr_img_id) && $product_attr_img_id > 0) {
            ProductAttrImages::where('id', $product_attr_img_id)->delete();

            return $this->success(['reload' => false], 'Attribute image removed successfully');
        } else {
            return $this->error('Invalid request', 400, []);
        }
    }

    /**
     * Utility functions
     */

    public function getRandomValue()
    {
        return rand(111111, 999999);
    }

    public function clean($string)
    {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.

        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
    }
}