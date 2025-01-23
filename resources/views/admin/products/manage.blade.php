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
                            <li class="breadcrumb-item active" aria-current="page">Add &#47; Manage A Product</li>
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
            <h6 class="mb-0 text-uppercase">Manage Product</h6>
            <hr />
            <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body">
                            <div class="border p-4 rounded">
                                <form id="formSubmit" action="{{ route('admin.products.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $product->id ?? '0' }}">
                                    <div class="row mb-3">
                                        <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="name" value="{{ $product->name }}"
                                                class="form-control" id="product_name" placeholder="Enter Product Name">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_slug" class="col-sm-3 col-form-label">Product Slug</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="slug" value="{{ $product->slug }}"
                                                class="form-control" id="product_slug" placeholder="Enter Product Slug">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_image" class="col-sm-3 col-form-label">Image</label>
                                        <div class="col-sm-9">
                                            <input type="file" id="product_image" class="form-control" name="image"
                                                accept="image/*" />
                                            @if ($product->image)
                                                <div id="product_image_preview">
                                                    <p class="my-2">Current Image:</p>
                                                    <img src="{{ asset($product->image) }}" alt="product_image"
                                                        id="productImgPreview" class="rounded-2" height="200px">
                                                </div>
                                            @else
                                                <div id="product_image_preview"></div>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_item_code" class="col-sm-3 col-form-label">Item Code</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="item_code" value="{{ $product->item_code }}"
                                                class="form-control" id="product_item_code"
                                                placeholder="Enter Product Item Code">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_keywords" class="col-sm-3 col-form-label">Keywords</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="keywords" value="{{ $product->keywords }}"
                                                class="form-control" id="product_keywords"
                                                placeholder="Enter Product Keywords">
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_category" class="col-sm-3 col-form-label">Category</label>
                                        <div class="col-sm-9">
                                            <select class="form-select multiple-select" name="category"
                                                id="product_category" {{ $category->isEmpty() ? 'disabled' : '' }}>
                                                <option value="">Select Category</option>
                                                @forelse ($category as $categoryList)
                                                    @if ($categoryList->id == $product->category_id)
                                                        <option selected value="{{ $categoryList->id }}">
                                                            {{ $categoryList->name }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $categoryList->id }}">
                                                            {{ $categoryList->name }}
                                                        </option>
                                                    @endif
                                                @empty
                                                    <option value="">No Category Found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="attribute" class="col-sm-3 col-form-label">Attribute</label>
                                        <div class="col-sm-9">
                                            <span id="attribute_selector">
                                                @if (isset($product['attribute'][0]->id))
                                                    <select multiple class="form-select" id="attribute"
                                                        name="attribute[]" {{ $category->isEmpty() ? 'disabled' : '' }}>
                                                        @foreach ($product['attribute'] as $attributeList)
                                                            <option selected
                                                                value="{{ $attributeList['attribute_values']->id }}">
                                                                {{ $attributeList['attribute_values']->value }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <select class="form-select " name="attribute" id="attribute"
                                                        disabled>
                                                        <option>Select Any Category First</option>
                                                    </select>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_brand" class="col-sm-3 col-form-label">Brand</label>
                                        <div class="col-sm-9">
                                            <select class="form-select " name="brand" id="product_brand"
                                                {{ $brand->isEmpty() ? 'disabled' : '' }}>
                                                <option value="">Select Brand</option>
                                                @forelse ($brand as $brandList)
                                                    @if ($brandList->id == $product->brand_id)
                                                        <option selected value="{{ $brandList->id }}">
                                                            {{ $brandList->text }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $brandList->id }}">
                                                            {{ $brandList->text }}
                                                        </option>
                                                    @endif
                                                @empty
                                                    <option value="">No Brand Found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_color" class="col-sm-3 col-form-label">Color</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="color" id="product_color"
                                                {{ $color->isEmpty() ? 'disabled' : '' }}>
                                                <option value="">Select Color</option>
                                                @forelse ($color as $colorList)
                                                    @if ($colorList->id == $product->color_id)
                                                        <option selected value="{{ $colorList->id }}">
                                                            {{ $colorList->text }} : {{ $colorList->value }}
                                                        </option>
                                                    @else
                                                        <option value="{{ $colorList->id }}">
                                                            {{ $colorList->text }} : {{ $colorList->value }}
                                                        </option>
                                                    @endif
                                                @empty
                                                    <option value="">No Color Found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <label for="product_tax" class="col-sm-3 col-form-label">Tax</label>
                                        <div class="col-sm-9">
                                            <select class="form-select" name="tax" id="product_tax"
                                                {{ $tax->isEmpty() ? 'disabled' : '' }}>
                                                <option value="">Select Tax</option>
                                                @forelse ($tax as $taxList)
                                                    @if ($taxList->id == $product->tax_id)
                                                        <option selected value="{{ $taxList->id }}">
                                                            {{ $taxList->text }} %
                                                        </option>
                                                    @else
                                                        <option value="{{ $taxList->id }}">
                                                            {{ $taxList->text }} %
                                                        </option>
                                                    @endif
                                                @empty
                                                    <option value="">No Tax Found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <label for="product_description" class="col-sm-3 col-form-label">Product
                                            Description</label>
                                        <div class="col-sm-9">
                                            <textarea required class="form-control" id="text_editor" name="description" id="product_description" rows="3"
                                                placeholder="Enter Product Description">{{ $product->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <div class="col-form-label">
                                                Product Attributes
                                            </div>
                                        </div>
                                        <div class="col-sm-9">
                                            <div class="col-12 mb-3">
                                                <button type="button" class="btn btn-primary px-5 w-100"
                                                    id="btn_add_attribute">Add
                                                    Attribute</button>
                                            </div>
                                            <span id="add_attribute">
                                            </span>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9">
                                            <span id="submitButton">
                                                <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                                            </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end row-->
        </div>
    </div>
    <!--end page wrapper -->
@endsection

@section('footer-js')
    <script>
        $(document).ready(function() {
            previewImage('#product_image', '#productImgPreview');

            $('#attribute').multiSelect({
                'containerHTML': '<div class="multi-select-container" style="width: 100%;">',
                'menuHTML': '<div class="multi-select-menu mt-2 ml-0 mb-2 mr-0 position-absolute z-1 float-start border border-1 shadow bg-white">',
                'buttonHTML': '<span class="form-select multiple-select">',
                'menuItemsHTML': '<div class="form-check rounded-4 ">',
                'menuItemHTML': '<label class="multi-select-menuitem">',
                'noneText': 'Select Attributes',
            });
        });

        /**
         * Initialize the text editor using Trumbowyg
         */

        $('#text_editor').trumbowyg({
            tagsToRemove: ['script']
        });
    </script>
    <script>
        var counter = 0;
        var main_product_attr = 0;
        var main_product_attr_image = 0;
        var image_counter = 10;

        /**
         * Add image input fields dynamically using jQuery
         * using the image_counter to keep track of the
         * number of added image inputs
         */

        function addAttrImageInput(id, counter) {
            image_counter++;

            var html = '';
            html += `<div id='product_attr_image_${image_counter}'>
                        <div class="row mb-3">
                            <div class="col-sm-1">
                                <button type="button" class="btn btn-danger" onclick="removeImgAttr('product_attr_image_${image_counter}')">
                                    <span class="bx bx-trash"></span>
                                </button>
                            </div>

                            <div class="col-sm-11">
                                <input required type="file" id="product_attr_image_${image_counter}"
                                    class="form-control" name="product_attr_image_${counter}[]"
                                    accept="image/*"/>
                                <div id="product_attr_image_preview_${image_counter}">
                                </div>
                            </div>
                        </div>
                    </div>`

            $('#' + id).append(html);
        }

        /**
         * Remove attribute input fields dynamically using jQuery
         * using the target_id to target the specific
         * attribute to remove
         */

        function removeAttr(target_id) {
            $('#' + target_id).remove();

            // Decrement the counter to keep track of the number of added attributes
            counter--;
        }

        /**
         * Remove image input fields dynamically using jQuery
         * using the target_id to target the specific
         * image to remove
         */

        function removeImgAttr(target_id) {
            $('#' + target_id).remove();

            // Decrement the counter to keep track of the number of added image inputs
            image_counter--;
        }

        /**
         * Add attribute input fields dynamically using jQuery
         * using the counter and image_counter to keep track
         * of the number of added attributes
         */

        $('#btn_add_attribute').click(function(e) {
            var html = '';
            var color_data = $('#product_attr_color').html();
            var size_data = $('#product_attr_size').html();

            counter++;
            image_counter++;

            html += `<span id="product_attr_${counter}">
                        <hr class="dropdown-divider mb-2">
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <div class="col-form-label">
                                ${counter}. Added Attributes
                                    <span class="float-end">
                                        <button type="button" class="btn btn-danger"
                                            id="btn_remove_attribute" onclick="removeAttr('product_attr_${counter}')">
                                            <span class="bx bx-trash"></span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-9 mt-2">
                                <div class="row">
                                    <div class="col-sm-3 mb-3">
                                        <select class="form-select" name="attr_color[]"
                                            id="product_attr_color_${counter}"
                                            {{ $color->isEmpty() ? 'disabled' : '' }}>
                                            <option value="">Select Color</option>
                                            @forelse ($color as $colorList)
                                                <option class="color-badge"
                                                    style="background-color:{{ $colorList->value }}"
                                                    value="{{ $colorList->id }}">
                                                    {{ $colorList->text }}
                                                </option>
                                            @empty
                                                <option value="">No Colors</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <select class="form-select" name="size[]" id="product_attr_size_${counter}"
                                            {{ $size->isEmpty() ? 'disabled' : '' }}>
                                            <option value="">Select Size</option>
                                            @forelse ($size as $sizeList)
                                                <option value="{{ $sizeList->id }}">
                                                    {{ $sizeList->text }}
                                                </option>
                                            @empty
                                                <option value="">No Colors</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="text" name="sku[]" class="form-control"
                                            id="product_sku_${counter}" placeholder="Enter SKU">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="number" name="mrp[]" class="form-control"
                                            id="product_mrp_${counter}" placeholder="Enter MRP">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="number" name="price[]" class="form-control"
                                            id="product_price_${counter}" placeholder="Enter Price">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="number" name="quantity[]" class="form-control"
                                            id="product_quantity_${counter}" placeholder="Enter Quantity" min="1">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="number" name="length[]" class="form-control"
                                            id="product_length_${counter}" placeholder="Enter Length">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="number" name="breadth[]" class="form-control"
                                            id="product_breadth_${counter}" placeholder="Enter Breadth">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="number" name="height[]" class="form-control"
                                            id="product_height_${counter}" placeholder="Enter Height">
                                    </div>
                                    <div class="col-sm-3 mb-3">
                                        <input type="number" name="weight[]" class="form-control"
                                            id="product_weight_${counter}" placeholder="Enter Weight">
                                    </div>
                                    <div class="col-12 mb-3">
                                        <input type="hidden" name="image_value[]" value="${counter}">
                                        <div class="col-sm-3">
                                            <button type="button" class="btn btn-primary w-100"
                                                id="btn_add_attribute_image_${counter}" onclick="addAttrImageInput('product_attr_images_${counter}', '${counter}')">
                                                <i class="bx bx-plus mr-1"></i>
                                                Add Image
                                            </button>
                                        </div>
                                    </div>
                                    <div id='product_attr_images_${counter}'>
                                        <div id='product_attr_image_${image_counter}'>
                                            <div class="row mb-3">
                                                <div class="col-sm-1">
                                                    <button type="button" class="btn btn-danger" onclick="removeImgAttr('product_attr_image_${image_counter}')">
                                                        <span class="bx bx-trash"></span>
                                                    </button>
                                                </div>

                                                <div class="col-sm-11">
                                                    <input required type="file" id="product_attr_image_${image_counter}"
                                                        class="form-control" name="product_attr_image_${counter}[]"
                                                        accept="image/*"/>
                                                    <div id="product_attr_image_preview_${image_counter}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </span>`

            $('#add_attribute').append(html);
        });
    </script>
    <script>
        /**
         * Get the attributes based on the selected category
         * using jQuery and AJAX to fetch the attributes
         */

        $('#product_category').change(function(e) {
            var html = '';
            var category_id = $('#product_category').val();
            var url = "{{ route('admin.products.get_attributes') }}";

            $.ajax({
                type: "POST",
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                url: url,
                data: {
                    'category_id': category_id
                },
                success: function(response) {
                    if (response.status == 'Success') {
                        html +=
                            `<select multiple class="form-select" id="attribute" name="attribute[]" {{ $category->isEmpty() ? 'disabled' : '' }} > <option value="" >Select Any Category First</option>`

                        $.each(response.data.data, function(key, value) {
                            $.each(value.values, function(attr_key, attr_value) {
                                html += '<option value="' + attr_value.id +
                                    '">' + value.attribute.name + ' : ' + attr_value
                                    .value +
                                    '</option>'
                            });
                        });

                        html += '</select>';

                        $('#attribute_selector').html(html);

                        $('#attribute').multiSelect({
                            'containerHTML': '<div class="multi-select-container" style="width: 100%;">',
                            'menuHTML': '<div class="multi-select-menu mt-2 ml-0 mb-2 mr-0 position-absolute z-1 float-start border border-1 shadow bg-white">',
                            'buttonHTML': '<span class="form-select multiple-select">',
                            'menuItemsHTML': '<div class="form-check rounded-4 ">',
                            'menuItemHTML': '<label class="multi-select-menuitem">',
                            'noneText': 'Select Attributes',
                        });

                        // alert(response.message);
                        showNotification(
                            'success',
                            'bx bx-check',
                            response.status,
                            response.message || 'Successfully submitted.'
                        );
                    } else {
                        console.log(response);
                        // alert(response.message);
                        showNotification(
                            'error',
                            'bx bx-error',
                            response.status,
                            response.message || 'Failed to submit.'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseJSON);
                    // alert(xhr.responseJSON.message);
                    let errors = JSON.parse(xhr.responseJSON.message);

                    $.each(errors, function(key, messages) {
                        $.each(messages, function(index, message) {
                            showNotification(
                                'error',
                                'bx bx-error',
                                xhr.responseJSON.status,
                                message || 'An error occurred.'
                            );
                        });
                    });
                }
            });
        });
    </script>
@endsection
