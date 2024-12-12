<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\AttributeValue;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the attribute name.
     */
    public function indexAttribute()
    {
        $data = Attribute::get();

        return view('admin.attributes.index_attribute_names', get_defined_vars());
    }

    /**
     * Store or update a newly created attribute name in storage.
     */
    public function storeAttribute(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'id' => 'required',
                'name' => 'required|string|max:255',
                'slug' => 'required|string|max:255',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                Attribute::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'name' => $request->name,
                        'slug' => $request->slug,
                    ]
                );

                return $this->success(['reload' => true], 'Attribute name updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }

}