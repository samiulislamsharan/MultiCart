@extends('admin.layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!-- start breadcrumb -->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Product</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Product Name</li>
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
            <h6 class="mb-0 text-uppercase">All Product List</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="my-2">
                            <a href="{{ route('admin.products.show', 0) }}">
                                <button type="button" class="btn btn-warning mx-1 px-4">
                                    <i class="bx bx-plus"></i>
                                    Add Product
                                </button>
                            </a>
                        </div>
                        <table id="dataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>
                                            @if ($product->image == null)
                                                <img src="{{ asset('assets/images/no-image-placeholder.svg') }}"
                                                    alt="image" style="height: 100px;">
                                            @else
                                                <img src="{{ asset($product->image) }}" alt="product_image"
                                                    style="height: 100px;">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <span>
                                                    <a href="{{ route('admin.products.show', $product->id) }}">
                                                        <button type="button" id="btnUpdateBannerForm"
                                                            class="btn btn-outline-primary me-1" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal">
                                                            <i class="bx bx-edit"></i>
                                                            Edit
                                                        </button>
                                                    </a>
                                                    <button type="button" class="btn btn-outline-danger"
                                                        onclick="deleteData('{{ $product->id }}', 'products')">
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
                                    <th>Image</th>
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
@endsection

@section('footer-js')
    <script>
        function saveData(id, text, image) {
            $('#brand_name_id').val(id);
            $('#brand_name').val(text);

            if (image == '') {
                var image = "{{ URL::asset('assets/images/no-image-placeholder.svg') }}";
                $('#brand_image').attr('required', true);
            } else {
                var image = "/" + image;
                $('#brand_image').attr('required', false);
            }

            var imageElement = '<img src="' + image +
                '" alt="brand_image" id="img_preview" class="rounded-2" height="200px">'
            var imageCaption = '<p class="mt-2">Current Image:</p>'

            $('#brand_image_preview').html(imageCaption);
            $('#brand_image_preview').append(imageElement);

            previewImage('#brand_image', '#img_preview');
        }
    </script>
@endsection
