<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Coupon::get();

        return view('admin.coupons.index', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required|string|max:255',
                'type' => 'required|string|in:1,2',
                'value'=> 'required|numeric',
                'min_value'=> 'required|numeric',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                Coupon::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name,
                        'type' => $request->type,
                        'value' => $request->value,
                        'min_value' => $request->min_value,
                    ]
                );

                return $this->success(['reload' => true], 'Coupon updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }
}