<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    use ApiResponse;

    public function index()
    {
        return view('admin.index');
    }

    public function delete($id = '', $table = '')
    {
        if (!empty($table) && !empty($id)) {
            $record = DB::table($table)->where('id', $id)->first();

            if ($record) {
                DB::table($table)->where('id', $id)->delete();

                return $this->success(['reload' => true], 'Deleted successfully.');
            } else {
                return $this->error('Record not found.', 404, []);
            }
        } else {
            return $this->error('Invalid request.', 400, []);
        }
    }
}