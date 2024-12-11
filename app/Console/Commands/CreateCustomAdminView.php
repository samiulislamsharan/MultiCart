<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class CreateCustomAdminView extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:admin-view {viewName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates a admin view with specified structure';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $viewName = $this->argument('viewName');

        // Ensure the view name starts with a slash
        if (!str_starts_with($viewName, '/')) {
            $viewName = '/' . $viewName;
        }

        $viewPath = base_path('resources/views/admin' . $viewName . '.blade.php');

        // Ensure the directory exists
        $directory = dirname($viewPath);
        if (!File::exists($directory)) {
            File::makeDirectory($directory, 0755, true);
        }

        // Check if the view file already exists
        if (File::exists($viewPath)) {
            $this->error("The view '{$viewName}' already exists!");
            return;
        }

        // Create the view file with custom structure

        $viewContent = <<<EOT
            @extends('admin.layout')
            @section('content')
                <!--start page wrapper -->
                <div class="page-wrapper">
                    <div class="page-content">
                        <!-- start breadcrumb -->
                        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                            <div class="breadcrumb-title pe-3">BREADCRUMB TITLE</div>
                            <div class="ps-3">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb mb-0 p-0">
                                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">BREADCRUMB NAME</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="ms-auto">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary">Settings</button>
                                    <button type="button"
                                        class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split"
                                        data-bs-toggle="dropdown"> <span class="visually-hidden">Toggle Dropdown</span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"> <a class="dropdown-item"
                                            href="javascript:;">Action</a>
                                        <a class="dropdown-item" href="javascript:;">Another action</a>
                                        <a class="dropdown-item" href="javascript:;">Something else here</a>
                                        <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                            link</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end breadcrumb -->
                        <h6 class="mb-0 text-uppercase">All CONTENT List</h6>
                        <hr />
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive overflow-hidden">
                                    <div class="my-2">
                                        <button type="button" class="btn btn-warning mx-1 px-4" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal" onclick="saveData('0')">
                                            <i class="bx bx-plus"></i>
                                            CONTENT NAME
                                        </button>
                                    </div>
                                    <table id="dataTable" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (\$data as \$attribute_name)
                                                <tr>
                                                    <td>{{ \$attribute_name->id }}</td>
                                                    <td>
                                                        <div class="row">
                                                            <span>
                                                                <button type="button" id="btnUpdateBannerForm"
                                                                    class="btn btn-outline-primary me-1" data-bs-toggle="modal"
                                                                    data-bs-target="#exampleModal"
                                                                    onclick="saveData('{{ \$attribute_name->id }}')">
                                                                    <i class="bx bx-edit"></i>
                                                                    Edit
                                                                </button>

                                                                <button type="button" class="btn btn-outline-danger"
                                                                    onclick="deleteData('{{ \$attribute_name->id }}', 'db_table_name')">
                                                                    <span>
                                                                        <i class='bx bx-trash'></i>
                                                                    </span>
                                                                    Delete
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end page wrapper -->
                <!-- start Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Attribute Name</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <form id="formSubmit" action="{{ route(ROUTE TO THE STORE METHOD) }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="shadow-sm border p-4 rounded">
                                        <input type="hidden" name="id" id="attribute_name_id">
                                        <div class="row mb-3">
                                            <label for="attribute_name" class="col-sm-3 col-form-label">Name</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name" class="form-control" id="attribute_name"
                                                    placeholder="Enter Attribute Name" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary px-4" data-bs-dismiss="modal">Close</button>
                                    <span id="submitButton">
                                        <button type="submit" class="btn btn-primary px-4">Save changes</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- end Modal -->
            @endsection

            @section('footer-js')
                <script>
                    function saveData(id) {
                        $('#attribute_name_id').val(id);
                    }
                </script>
            @endsection
        EOT;

        File::put($viewPath, $viewContent);

        $this->info("Admin view '{$viewName}' created successfully at path: {$viewPath}");
    }
}