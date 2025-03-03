@extends('admin.layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!-- start breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Coupon</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Coupons</li>
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
            <h6 class="mb-0 text-uppercase">All Coupons List</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="my-2">
                            <button type="button" class="btn btn-warning mx-1 px-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" onclick="saveData('0', '', '', '', '')">
                                <i class="bx bx-plus"></i>
                                Add Coupon
                            </button>
                        </div>
                        <table id="dataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Minimum Value</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $coupon)
                                    <tr>
                                        <td>{{ $coupon->id }}</td>
                                        <td>{{ $coupon->name }}</td>
                                        <td>
                                            {{ $coupon->type }}
                                            @if ($coupon->type == 1)
                                                <span> : Value</span>
                                            @else
                                                <span> : Percentage</span>
                                            @endif
                                        </td>
                                        <td>{{ $coupon->value }}</td>
                                        <td>{{ $coupon->min_value }}</td>
                                        <td>{{ $coupon->created_at }}</td>
                                        <td>{{ $coupon->updated_at }}</td>
                                        <td>
                                            <div class="row">
                                                <span>
                                                    <button type="button" id="btnUpdateBannerForm"
                                                        class="btn btn-outline-primary me-1" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        onclick="saveData('{{ $coupon->id }}', '{{ $coupon->text }}', '{{ $coupon->value }}')">
                                                        <i class="bx bx-edit"></i>
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="deleteData('{{ $coupon->id }}', 'colors')">
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
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Value</th>
                                    <th>Minimum Value</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Coupon</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formSubmit" action="{{ route('admin.coupons.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="shadow-sm border p-4 rounded">
                            <input type="hidden" name="id" id="coupon_id">
                            <div class="row mb-3">
                                <label for="coupon_name" class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input type="text" name="name" class="form-control" id="coupon_name"
                                        placeholder="Enter Coupon Name" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="coupon_type" class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <select type="text" name="type" class="form-control" id="coupon_type">
                                        <option value="" disabled>Select Coupon Type</option>
                                        <option value="1">Value</option>
                                        <option value="2">Percentage</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="coupon_value" class="col-sm-3 col-form-label">Value</label>
                                <div class="col-sm-9">
                                    <input type="text" name="value" class="form-control" id="coupon_value"
                                        placeholder="Enter Coupon Value" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="coupon_min_value" class="col-sm-3 col-form-label">Minimum Value</label>
                                <div class="col-sm-9">
                                    <input type="text" name="min_value" class="form-control" id="coupon_min_value"
                                        placeholder="Enter Coupon Minimum Value" required>
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
        function saveData(id, name, type, value, min_value) {
            $('#coupon_id').val(id);
            $('#coupon_name').val(name);
            $('#coupon_type').val(type);
            $('#coupon_value').val(value);
            $('#coupon_min_value').val(min_value);
        }
    </script>
@endsection
