<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductAttr;
use App\Models\CategoryAttribute;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    use ApiResponse;

    public function index()
    {
        $data = [];
        $data['banner'] = HomeBanner::get();
        $data['categories'] = Category::query()
            ->with(
                'products:id,category_id,name,slug,image,item_code',
                'subcategories'
            )
            ->get();
        $data['brands'] = Brand::get();
        $data['products'] = Product::query()
            ->with('productAttributes')
            ->select(
                'id',
                'category_id',
                'name',
                'slug',
                'image',
                'item_code',
            )
            ->get();

        return $this->success(['data' => $data], 'Home Data fetched successfully');
    }

    public function categories()
    {
        $data = [];
        $data['categories'] = Category::with('subcategories')->where('parent_category_id', null)->get();

        return $this->success(['data' => $data], 'Categories fetched successfully');
    }

    public function categoryIndex($slug = '')
    {
        if (!empty($slug)) {
            $slug_category = Category::query()
                ->where('slug', $slug)
                ->first();

            if (isset($slug_category)) {
                $products = Product::query()
                    ->where('category_id', $slug_category->id)
                    ->with('productAttributes')
                    ->select(
                        'id',
                        'name',
                        'slug',
                        'image',
                        'item_code',
                    )
                    ->paginate(12);

                $data = Category::query()
                    ->where('slug', $slug)
                    ->with('products:id,category_id,name,slug,image,item_code',)
                    ->get();

                if ($slug_category->parent_category_id == null || $slug_category->parent_category_id == '') {
                    // get parent categories
                    $categories = Category::query()
                        ->where('parent_category_id', $slug_category->id)
                        ->get();
                } else {
                    // get child categories
                    $categories = Category::query()
                        ->where('parent_category_id', $slug_category->parent_category_id)
                        ->where('id', '!=', $slug_category->id)
                        ->get();
                }
            } else {
                $slug_category = Category::where('slug', $slug)->first();

                $products = Product::query()
                    ->where('category_id', $slug_category->id)
                    ->with('productAttributes')
                    ->select(
                        'id',
                        'name',
                        'slug',
                        'image',
                        'item_code',
                    )
                    ->paginate(12);

                $data = Category::query()
                    ->where('slug', $slug)
                    ->with('products:id,category_id,name,slug,image,item_code',)
                    ->get();

                if ($slug_category->parent_category_id == null || $slug_category->parent_category_id == '') {
                    // get parent categories
                    $categories = Category::query()
                        ->where('parent_category_id', $slug_category->id)
                        ->get();
                } else {
                    // get child categories
                    $categories = Category::query()
                        ->where('parent_category_id', $slug_category->parent_category_id)
                        ->where('id', '!=', $slug_category->id)
                        ->get();
                }
            }

            $lowPrice = ProductAttr::orderBy('price', 'asc')->pluck('price')->first();
            $highPrice = ProductAttr::orderBy('price', 'desc')->pluck('price')->first();

            $brands = Brand::get();
            $sizes = Size::get();
            $colors = Color::get();
            $attributes = CategoryAttribute::where('category_id', $slug_category->id)->with('attribute')->get();

            return $this->success(['data' => get_defined_vars()], 'Categories fetched successfully');
        } else {
            return $this->error('Category not found', 404);
        }
    }
}