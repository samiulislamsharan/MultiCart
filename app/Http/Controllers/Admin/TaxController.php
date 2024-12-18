<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tax;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TaxController extends Controller
{
    use ApiResponse;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Tax::get();

        return view('admin.taxes.index', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'id' => 'required',
                'text' => 'required|integer|max:255',
            ], [
                'text.required' => 'The Tax Amount is required.',
                'text.integer' => 'The Tax Amount must be an integer.',
                'text.max' => 'The Tax Amount may not be greater than 255 characters.',
            ]);

            if ($validation->fails()) {
                return $this->error($validation->errors(), 422, []);
            } else {
                Tax::updateOrCreate(
                    ['id' => $request->id],
                    [
                        'text' => $request->text,
                    ]
                );

                return $this->success(['reload' => true], 'Tax updated successfully.');
            }
        } catch (\Exception $e) {
            return $this->error($e->getMessage(), 500, []);
        }
    }
}