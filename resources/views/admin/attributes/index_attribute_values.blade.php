    @extends('admin.layout')
    @section('content')
        <!--start page wrapper -->
        <div class="page-wrapper">
            <div class="page-content">
                <!-- start breadcrumb -->
                <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                    <div class="breadcrumb-title pe-3">Attribute</div>
                    <div class="ps-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Attribute Values</li>
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
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">
                                <a class="dropdown-item" href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:;">Separated link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end breadcrumb -->
                <h6 class="mb-0 text-uppercase">All Attribute Values List</h6>
                <hr />
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive overflow-hidden">
                            <div class="my-2">
                                <button type="button" class="btn btn-warning mx-1 px-4" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" onclick="saveData('0', '', '')">
                                    <i class="bx bx-plus"></i>
                                    Add Attribute Value
                                </button>
                            </div>
                            <table id="dataTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Attribute Name</th>
                                        <th>Value</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($attribute_values as $attribute_value)
                                        <tr>
                                            <td>{{ $attribute_value->id }}</td>
                                            <td>{{ $attribute_value['singleAttribute']->name }} :
                                                {{ $attribute_value['singleAttribute']->slug }}
                                            </td>
                                            <td>{{ $attribute_value->value }}</td>
                                            <td>
                                                <div class="row">
                                                    <span>
                                                        <button type="button" id="btnUpdateBannerForm"
                                                            class="btn btn-outline-primary me-1" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            onclick="saveData('{{ $attribute_value->id }}', '{{ $attribute_value->attributes_id }}', '{{ $attribute_value->value }}')">
                                                            <i class="bx bx-edit"></i>
                                                            Edit
                                                        </button>

                                                        <button type="button" class="btn btn-outline-danger"
                                                            onclick="deleteData('{{ $attribute_value->id }}', 'attribute_values')">
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
                                        <th>Attribute Name</th>
                                        <th>Value</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Attribute Value</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formSubmit" action="{{ route('admin.attribute_value.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="shadow-sm border p-4 rounded">
                                <input type="hidden" name="id" id="attribute_value_id">
                                <div class="row mb-3">
                                    <label for="attribute_name_id" class="col-sm-3 col-form-label">Attribute Name</label>
                                    <div class="col-sm-9">
                                        <select class="form-select mb-3" name="attributes_id" id="attribute_name_id"
                                            {{ $attribute_names->isEmpty() ? 'disabled' : '' }}>
                                            @forelse ($attribute_names as $attribute_name)
                                                <option value="{{ $attribute_name->id }}">
                                                    {{ $attribute_name->name }} : {{ $attribute_name->slug }}
                                                </option>
                                            @empty
                                                <option value="">No Attribute Name Found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="attribute_value" class="col-sm-3 col-form-label">Attribute Value</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="value" class="form-control" id="attribute_value"
                                            placeholder="Enter Attribute Value" required>
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
            function saveData(id, attributeNameId, attributeValue) {
                $('#attribute_value_id').val(id);

                showOptions('#attribute_name_id', attributeNameId)

                $('#attribute_value').val(attributeValue);
            }
        </script>
    @endsection
