@extends('admin.layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!-- start breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Category</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Category Attribute</li>
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
            <h6 class="mb-0 text-uppercase">All Category List</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="my-2">
                            <button type="button" class="btn btn-warning mx-1 px-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" onclick="saveData('0','','')">
                                <i class="bx bx-plus"></i>
                                Add Category Attribute
                            </button>
                        </div>
                        <table id="dataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Attribute</th>
                                    <th>Created at</th>
                                    <th>Updated at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $category_attribute)
                                    <tr>
                                        <td>{{ $category_attribute->id }}</td>
                                        <td>{{ $category_attribute['category']->name }}</td>
                                        <td>{{ $category_attribute['attribute']->name }}</td>
                                        <td>{{ $category_attribute->created_at }}</td>
                                        <td>{{ $category_attribute->updated_at }}</td>
                                        <td>
                                            <div class="row">
                                                <span>
                                                    <button type="button" id="btnUpdateBannerForm"
                                                        class="btn btn-outline-primary me-1" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        onclick="saveData('{{ $category_attribute->id }}','{{ $category_attribute->category_id }}','{{ $category_attribute->attribute_id }}')">
                                                        <i class="bx bx-edit"></i>
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="deleteData('{{ $category_attribute->id }}', 'category_attributes')">
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
                                    <th>Category</th>
                                    <th>Attribute</th>
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
                    <h5 class="modal-title" id="exampleModalLabel">Category and Attribute</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="formSubmit" action="{{ route('admin.category_attribute.store') }}" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="shadow-sm border p-4 rounded">
                            <input type="hidden" name="id" id="category_attribute_id">

                            <div class="row mb-3">
                                <label for="category_id" class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select class="form-select mb-3" name="category_id" id="category_id"
                                        {{ $data->isEmpty() ? 'disabled' : '' }}>
                                        <option value="">None</option>
                                        @forelse ($categories as $category)
                                            <option value="{{ $category->id }}">
                                                {{ $category->name }}
                                            </option>
                                        @empty
                                            <option value="">No Category</option>
                                        @endforelse
                                    </select>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="attribute_id" class="col-sm-3 col-form-label">Attribute</label>
                                <div class="col-sm-9">
                                    <select class="form-select mb-3" name="attribute_id" id="attribute_id"
                                        {{ $data->isEmpty() ? 'disabled' : '' }}>
                                        <option value="">None</option>
                                        @forelse ($attributes as $attribute)
                                            <option value="{{ $attribute->id }}">
                                                {{ $attribute->name }} : {{ $attribute->slug }}
                                            </option>
                                        @empty
                                            <option value="">No Attribute</option>
                                        @endforelse
                                    </select>
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
        function saveData(id, category_id, attribute_id) {
            $('#category_attribute_id').val(id);

            showOptions('#category_id', category_id);
            showOptions('#attribute_id', attribute_id);
        }
    </script>
@endsection
