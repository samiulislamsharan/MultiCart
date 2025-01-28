<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = [];
        $data['banner'] = HomeBanner::get();
        $data['categories'] = Category::with('products')->get();
        $data['brands'] = Brand::get();

        return $this->success(['data' => $data], 'Home Data fetched successfully');
    }

    public function categories()
    {
        $data = [];
        $data['categories'] = Category::with('subcategories')->where('parent_category_id', null)->get();

        return $this->success(['data' => $data], 'Categories fetched successfully');
    }
}