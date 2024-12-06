@extends('admin.layout')
@section('content')
    <!--start page wrapper -->
    <div class="page-wrapper">
        <div class="page-content">
            <!--breadcrumb-->
            <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                <div class="breadcrumb-title pe-3">Home</div>
                <div class="ps-3">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb mb-0 p-0">
                            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Home Banner</li>
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
            <!--end breadcrumb-->
            <h6 class="mb-0 text-uppercase">All Home Banners List</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive overflow-hidden">
                        <div class="my-2">
                            <button type="button" class="btn btn-warning mx-1 px-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                <i class="bx bx-plus"></i>
                                Add Banner
                            </button>
                        </div>
                        <table id="dataTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Text</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $homeBanner)
                                    <tr>
                                        <td>{{ $homeBanner->id }}</td>
                                        <td>{{ $homeBanner->text }}</td>
                                        <td>{{ $homeBanner->link }}</td>
                                        <td>
                                            @if ($homeBanner->image == null)
                                                <img src="{{ asset('assets/images/no-image-placeholder.svg') }}"
                                                    alt="image" style="height: 100px;">
                                            @else
                                                <img src="{{ asset('storage/' . $homeBanner->image) }}" alt="image"
                                                    style="height: 100px;">
                                            @endif
                                        </td>
                                        <td>
                                            <div class="row">
                                                <span>
                                                    <button type="button" id="btnUpdateBannerForm"
                                                        class="btn btn-outline-primary me-1" data-bs-toggle="modal"
                                                        data-bs-target="#exampleModal"
                                                        onclick="saveData('{{ $homeBanner->id }}', '{{ $homeBanner->text }}', '{{ $homeBanner->link }}', '{{ $homeBanner->image }}')">
                                                        <i class="bx bx-edit"></i>
                                                        Edit
                                                    </button>

                                                    <button type="button" class="btn btn-outline-danger">
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
                                    <th>Text</th>
                                    <th>Link</th>
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
    <!-- start Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('admin.home-banners.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="shadow-sm border p-4 rounded">
                            <input type="hidden" name="id" id="banner_id">
                            <div class="row mb-3">
                                <label for="banner_text" class="col-sm-3 col-form-label">Text</label>
                                <div class="col-sm-9">
                                    <input type="text" name="text" class="form-control" id="banner_text"
                                        placeholder="Enter Banner Text" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="banner_link" class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                    <input type="text" name="link" class="form-control" id="banner_link"
                                        placeholder="Enter Banner Link" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="image" class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" id="bannerImage" class="form-control" name="image"
                                        accept="image/*" required />
                                    <div id="bannerImagePreview">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- end Modal --}}
@endsection
