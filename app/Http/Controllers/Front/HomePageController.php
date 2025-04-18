<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\HomeBanner;
use App\Models\Product;
use App\Models\Size;
use App\Models\Color;
use App\Models\ProductAttr;
use App\Models\CategoryAttribute;
use App\Models\Coupon;
use App\Models\Postcode;
use App\Models\ProductAttribute;
use App\Models\TempUser;
use App\Models\UserCouponCart;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function categoryIndex(Request $request, $slug = '')
    {
        $slug       = $request->slug;
        $attribute  = $request->attribute;
        $brand      = $request->brand;
        $size       = $request->size;
        $color      = $request->color;
        $highPrice  = $request->highPrice;
        $lowPrice   = $request->lowPrice;

        if (!empty($slug)) {
            $slug_category = Category::query()
                ->where('slug', $slug)
                ->first();

            if (isset($slug_category)) {
                $products = $this->getFilterProducts($slug_category->id, $attribute, $brand, $size, $color, $highPrice, $lowPrice);

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
                $slug_category = Category::first();

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

    public function changeSlug()
    {
        $data = Product::get();

        foreach ($data as $list) {
            $result = Product::find($list->id);
            $result->slug = replace_slug_str($list->name);
            $result->save();
        }
    }

    public function getFilterProducts($category_id, $attribute = [], $brand = [], $size = [], $color = [], $highPrice, $lowPrice)
    {
        $products = Product::where('category_id', $category_id);

        if (sizeof($brand) > 0) {
            $products = Product::query()
                ->whereIn('brand_id', $brand)
                ->whereIn('id', $products->pluck('id'))
                ->get();
        }

        if (sizeof($attribute) > 0) {
            $products = ProductAttribute::query()
                ->whereIn('attribute_value_id', $attribute)
                ->whereIn('product_id', $products->pluck('id'))
                ->get();

            $products = Product::query()
                ->whereIn('id', $products->pluck('product_id'))
                ->get();
        }

        $data = ProductAttr::whereIn('product_id', $products->pluck('id'))->get();

        if (sizeof($size) > 0) {
            $data = ProductAttr::whereIn('size_id', $size)->whereIn('id', $data->pluck('id'))->get();
        }

        if (sizeof($color) > 0) {
            $data = ProductAttr::whereIn('color_id', $color)->whereIn('id', $data->pluck('id'))->get();
        }

        if ($lowPrice != '' && $lowPrice != null && $highPrice != '') {
            $data = ProductAttr::query()
                ->whereBetween('price', [$lowPrice, $highPrice])
                ->whereIn('id', $data->pluck('id'))
                ->get();
        }

        $data = Product::query()
            ->whereIn('id', $data->pluck('product_id'))
            ->with('productAttributes')
            ->select(
                'id',
                'name',
                'slug',
                'image',
                'item_code',
            )
            ->paginate(12);

        return $data;
    }

    public function getUserData(Request $request)
    {
        $token = $request->token;
        $checkUser = TempUser::where('token', $token)->first();

        if (isset($checkUser->id)) {
            $data['user_type'] = $checkUser->user_type;
            $data['token'] = $checkUser->token;

            if (checkTokenExpiryInMinutes($checkUser->updated_at, 60)) {
                $token = generateRandomString();

                $checkUser->token = $token;
                $checkUser->updated_at = date('Y-m-d h:i:s a', time());
                $checkUser->save();

                $data['token'] = $token;

                return $this->success(['data' => $data], 'User data with new token fetched successfully');
            } else {
                return $this->success(['data' => $data], 'User data fetched successfully');
            }
        } else {
            $user_id = rand(100000, 999999);
            $token = generateRandomString();
            $time = date('Y-m-d h:i:s a', time());

            TempUser::create([
                'user_id' => $user_id,
                'token' => $token,
                'created_at' => $time,
                'updated_at' => $time,
            ]);

            $data['user_type'] = 2;
            $data['token'] = $token;

            return $this->success(['data' => $data], 'Guest user data fetched successfully');
        }
    }

    public function getCartData(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token' => 'required|exists:temp_users,token',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $userToken = TempUser::where('token', $request->token)->first();
            $data = Cart::where('user_id', $userToken->user_id)->with('products')->get();

            return $this->success(['data' => $data], 'Cart data fetched successfully');
        }
    }

    public function addToCart(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token'             => 'required|exists:temp_users,token',
            'product_id'        => 'required|exists:products,id',
            'product_attr_id'   => 'required|exists:product_attrs,id',
            'quantity'          => 'required|numeric|min:0|not_in:0',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $user = TempUser::where('token', $request->token)->first();

            Cart::updateOrCreate(
                [
                    'user_id'           => $user->user_id,
                    'product_id'        => $request->product_id,
                    'product_attr_id'   => $request->product_attr_id,
                ],
                [
                    'user_id'           => $user->user_id,
                    'product_id'        => $request->product_id,
                    'product_attr_id'   => $request->product_attr_id,
                    'quantity'          => $request->quantity,
                    'user_type'         => $user->user_type,
                ]
            );

            return $this->success(['data' => ''], 'Product added to cart successfully');
        }
    }

    public function removeFromCart(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token'             => 'required|exists:temp_users,token',
            'product_id'        => 'required|exists:products,id',
            'product_attr_id'   => 'required|exists:product_attrs,id',
            'quantity'          => 'required|numeric|min:0|not_in:0',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $user = TempUser::where('token', $request->token)->first();
            $cart = Cart::where(
                [
                    'user_id'           => $user->user_id,
                    'product_id'        => $request->product_id,
                    'product_attr_id'   => $request->product_attr_id,
                ]
            )->first();

            if (isset($cart->id)) {
                $quantity = $request->quantity;

                if ($cart->quantity == $quantity) {
                    $cart->delete();
                } elseif ($cart->quantity > $quantity) {
                    $cart->quantity -= $quantity;
                    $cart->save();
                } else {
                    $cart->delete();
                }
            }

            return $this->success(['data' => ''], 'Product removed from cart successfully');
        }
    }

    public function productIndex($item_code = '', $slug = '')
    {
        $product = Product::where(['item_code' => $item_code, 'slug' => $slug])->first();

        if (isset($product->id)) {
            $data = Product::query()
                ->where([
                    'item_code' => $item_code,
                    'slug' => $slug
                ])
                ->with('productAttributes')
                ->first();

            $data['other_products'] = Product::query()
                ->where('category_id', $data->category_id)
                ->where('id', '!=', $data->id)
                ->with('productAttributes')
                ->get();

            // $data['other_products'] = Product::query()
            //     ->where('category_id', $data->category_id)
            //     ->with('productAttributes')
            //     ->get();

            return $this->success(['data' => $data], 'Product fetched successfully');
        } else {
            return $this->error('Product not found', 404);
        }
    }

    public function addCoupon(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token'             => 'required|exists:temp_users,token',
            'coupon'            => 'required|exists:coupons,name',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $coupon = Coupon::where('name', $request->coupon)->first();
            $user = TempUser::where('token', $request->token)->first();

            if ($coupon->min_value <= $request->cart_total) {
                $coupon_value = $coupon->value;

                if ($coupon->type == 1) {
                    $cart_total = $request->cart_total - $coupon_value;
                } else {
                    $coupon_value = ($coupon_value / 100) * $request->cart_total;
                    $cart_total = $request->cart_total - $coupon_value;
                }

                UserCouponCart::updateOrCreate(
                    ['user_id' => $user->user_id],
                    [
                        'user_id' => $user->user_id,
                        'coupon_id' => $coupon->id
                    ]
                );

                return $this->success(['data' => $cart_total], 'Coupon applied successfully');
            } else {
                return $this->error('Coupon is not applicable', 400, []);
            }
        }
    }

    public function removeCoupon(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token' => 'required|exists:temp_users,token',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $user = TempUser::where('token', $request->token)->first();
            $couponUser = UserCouponCart::where('user_id', $user->user_id)->delete();

            return $this->success([], 'Coupon removed successfully');
        }
    }

    public function getUserCoupon(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token' => 'required|exists:temp_users,token',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $user = TempUser::where('token', $request->token)->first();
            $couponUser = UserCouponCart::where('user_id', $user->user_id)->first();
            $coupon_name = '';

            if (isset($couponUser->id)) {
                $coupon = Coupon::where('id', $couponUser->coupon_id)->first();
                $coupon_name = $coupon->name;

                if ($coupon->min_value <= $request->cart_total) {
                    $coupon_value = $coupon->value;

                    if ($coupon->type == 1) {
                        $cart_total = $request->cart_total - $coupon_value;
                    } else {
                        $coupon_value = ($coupon_value / 100) * $request->cart_total;
                        $cart_total = $request->cart_total - $coupon_value;
                    }
                } else {
                    $cart_total = $request->cart_total;
                }
            } else {
                $cart_total = $request->cart_total;
            }

            return $this->success(['data' => $cart_total, 'coupon_name' => $coupon_name], 'Coupon applied successfully');
        }
    }

    public function getPostCodeDetails(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'token'         => 'required|exists:temp_users,token',
            'post_code'   => 'required|exists:postcodes,post_code',
        ]);

        if ($validation->fails()) {
            return $this->error($validation->errors()->first(), 400, []);
        } else {
            $data = Postcode::where('post_code', $request->post_code)->first();

            return $this->success(['data' => $data], 'Post code fetched successfully', 200);
        }
    }

    }
}