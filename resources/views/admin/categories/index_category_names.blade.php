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
                                <li class="breadcrumb-item active" aria-current="page">Category Name</li>
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
                                    data-bs-target="#exampleModal" onclick="saveData('0','','','','')">
                                    <i class="bx bx-plus"></i>
                                    Add Category
                                </button>
                            </div>
                            <table id="dataTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Updated at</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $category)
                                        <tr>
                                            <td>{{ $category->id }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->slug }}</td>
                                            <td>
                                                @if ($category->image == null)
                                                    <img src="{{ asset('assets/images/no-image-placeholder.svg') }}"
                                                        alt="image" style="height: 100px;">
                                                @else
                                                    <img src="{{ asset($category->image) }}" alt="image"
                                                        style="height: 100px;">
                                                @endif
                                            </td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>{{ $category->updated_at }}</td>
                                            <td>
                                                <div class="row">
                                                    <span>
                                                        <button type="button" id="btnUpdateBannerForm"
                                                            class="btn btn-outline-primary me-1" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"
                                                            onclick="saveData('{{ $category->id }}', '{{ $category->name }}','{{ $category->slug }}','{{ $category->parent_category_id }}','{{ $category->image }}')">
                                                            <i class="bx bx-edit"></i>
                                                            Edit
                                                        </button>

                                                        <button type="button" class="btn btn-outline-danger"
                                                            onclick="deleteData('{{ $category->id }}', 'categories')">
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
                                        <th>Slug</th>
                                        <th>Image</th>
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
                        <h5 class="modal-title" id="exampleModalLabel">Category Name</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="formSubmit" action="{{ route('admin.category.store') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="shadow-sm border p-4 rounded">
                                <input type="hidden" name="id" id="category_name_id">
                                <div class="row mb-3">
                                    <label for="category_name" class="col-sm-3 col-form-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="category_name"
                                            placeholder="Enter Category Name" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="category_slug" class="col-sm-3 col-form-label">Slug</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="slug" class="form-control" id="category_slug"
                                            placeholder="Enter Slug" required>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="parent_category_id" class="col-sm-3 col-form-label">Parent
                                        Category</label>
                                    <div class="col-sm-9">
                                        <select class="form-select mb-3" name="parent_category_id"
                                            id="parent_category_id" {{ $data->isEmpty() ? 'disabled' : '' }}>
                                            <option value="">None</option>
                                            @forelse ($data as $category_name)
                                                <option value="{{ $category_name->id }}">
                                                    {{ $category_name->name }} : {{ $category_name->slug }}
                                                </option>
                                            @empty
                                                <option value="">No Parent Category</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="image" class="col-sm-3 col-form-label">Image</label>
                                    <div class="col-sm-9">
                                        <input type="file" id="categoryImage" class="form-control" name="image"
                                            accept="image/*" required />
                                        <div id="categoryImagePreview">
                                        </div>
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
            var checkId = 0;

            function saveData(id, name, slug, parent_category_id, image) {
                if (checkId != 0) {
                    $('#parent_category_id option[value="' + checkId + '"]').show();
                }

                checkId = id;

                $('#category_name_id').val(id);
                $('#category_name').val(name);
                $('#category_slug').val(slug);

                showOptions('#parent_category_id', parent_category_id);

                $('#parent_category_id option[value="' + id + '"]').hide();

                if (image == '') {
                    var image = "{{ URL::asset('assets/images/no-image-placeholder.svg') }}";
                    $('#categoryImage').attr('required', true);
                } else {
                    var image = "/" + image;
                    $('#categoryImage').attr('required', false);
                }

                var imageElement = '<img src="' + image +
                    '" alt="category_image" id="imgPreview" class="rounded-2" height="200px">'
                var imageCaption = '<p class="mt-2">Current Image:</p>'

                $('#categoryImagePreview').html(imageCaption);
                $('#categoryImagePreview').append(imageElement);

                previewImage('#categoryImage', '#imgPreview');
            }
        </script>
    @endsection
