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
}