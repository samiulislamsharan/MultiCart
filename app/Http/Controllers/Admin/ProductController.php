<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryAttribute;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductAttr;
use App\Models\ProductAttrImages;
use App\Models\Size;
use App\Models\Tax;
use App\Traits\ApiResponse;
use App\Traits\SaveFile;
use Illuminate\Http\Request;
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
     * Create or Update the specified Product.
     */
    public function show(int $id = 0)
    {
        if ($id == 0) {
            $product = new Product();
            $product_attr = new ProductAttr();
            $product_attr_images = new ProductAttrImages();
            $category = Category::pluck('name', 'id');
            $brand = Brand::pluck('text', 'id');
            $color = Color::pluck('text', 'id');
            $size = Size::get();
            $tax = Tax::pluck('text', 'id');
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
                $product = Product::where('id', $id)->first();
            }
        }

        return view('admin.products.manage', get_defined_vars());
    }
}