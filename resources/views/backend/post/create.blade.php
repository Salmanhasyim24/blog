@extends('admin.dashboard')
@section('title', 'Create Post')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add New Post</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Post</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Post</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('store.post') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="border border-3 p-4 rounded">

                                    <div class="form-group mb-3">
                                        <label for="title_en" class="form-label">Post Title ENG</label>
                                        <input type="text" name="title_en" class="form-control" id="title_en"
                                            placeholder="Enter product title">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="title_idn" class="form-label">Post Title IDN</label>
                                        <input type="text" name="title_idn" class="form-control" id="title_idn"
                                            placeholder="Enter product title">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tags_en" class="form-label">Tags In Eng</label>
                                        <input type="text" id="tags_en" name="tags_en"
                                            class="form-control visually-hidden" data-role="tagsinput"
                                            value="recommended..">
                                    </div>

                                    <div class="mb-3">
                                        <label for="tags_idn" class="form-label">Tags In Idn</label>
                                        <input type="text" id="tags_idn" name="tags_idn"
                                            class="form-control visually-hidden" data-role="tagsinput"
                                            value="Direkomendasikan..">
                                    </div>

                                    <div class="mb-3">
                                        <label for="inputProductDescription" class="form-label">Details For Eng</label>
                                        <textarea id="mytextarea" name="details_en">Hello, World!</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Details For Idn</label>
                                        <textarea name="details_idn" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Main Thumbanil</label>
                                        <input name="image" class="form-control" type="file" id="formFile"
                                            onChange="mainThamUrl(this)">
                                        <div class="my-2 gap-2">
                                            <img src="" id="mainThmb" />
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="border border-3 p-4 rounded">
                                    <div class="row g-3">

                                        <div class="form-group col-12">
                                            <label for="category_id" class="form-label">Product Category</label>
                                            <select name="category_id" class="form-select" id="category_id">
                                                <option></option>
                                                @foreach ($categories as $cat)
                                                    <option value="{{ $cat->id }}">{{ $cat->category_en }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="subcategory_id" class="form-label">Product SubCategory</label>
                                            <select class="form-control" name="subcategory_id" id="subcategory_id">
                                                <option disabled="" selected="">--Select SubCategory--</option>

                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="districts" class="form-label">District Category</label>
                                            <select name="district_id" class="form-select" id="district_id">
                                                <option></option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group col-12">
                                            <label for="subdistrict_id" class="form-label">Post SubDistrict</label>
                                            <select class="form-control" id="subdistrict_id" name="subdistrict_id">
                                                <option disabled="" selected="">--Select SubDistrict--</option>
                                            </select>
                                        </div>



                                        <div class="col-12">
                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="headline" type="checkbox"
                                                            value="1" id="">
                                                        <label class="form-check-label" for=""> Headline</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="first_section"
                                                            type="checkbox" value="1" id="">
                                                        <label class="form-check-label" for="">First
                                                            Section</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="first_section_thumbnail"
                                                            type="checkbox" value="1" id="">
                                                        <label class="form-check-label" for="">
                                                            First Section Thumbnail</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" name="bigthumbnail"
                                                            type="checkbox" value="1" id="">
                                                        <label class="form-check-label" for="">bigthumbnail
                                                        </label>
                                                    </div>
                                                </div>
                                            </div> <!-- // end row  -->
                                        </div>

                                        <hr>
                                        <div class="col-12">
                                            <div class="d-grid">
                                                <input type="submit" class="btn btn-primary px-4"
                                                    value="Save Changes" />

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end row-->
                    </div>
            </div>

            </form>

        </div>

    </div>



    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    title_en: {
                        required: true,
                    },
                    title_idn: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                    tags_en: {
                        required: true,
                    },
                    tags_idn: {
                        required: true,
                    },
                    details_en: {
                        required: true,
                    },
                    details_idn: {
                        required: true,
                    },
                    district_id: {
                        required: true,
                    },
                    subdistrict_id: {
                        required: true,
                    },
                    category_id: {
                        required: true,
                    },
                    subcategory_id: {
                        required: true,
                    },
                },
                messages: {
                    title_en: {
                        required: 'Please Enter Product Name',
                    },
                    title_idn: {
                        required: 'Please Enter Short Description',
                    },
                    image: {
                        required: 'Please Select Product Thambnail Image',
                    },
                    tags_en: {
                        required: 'Please Select Product Multi Image',
                    },
                    tags_idn: {
                        required: 'Please Enter Selling Price',
                    },
                    details_en: {
                        required: 'Please Enter Product Code',
                    },
                    details_idn: {
                        required: 'Please Enter Product Quantity',
                    },

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>



    <script type="text/javascript">
        function mainThamUrl(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainThmb').attr('src', e.target.result).width(80).height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

    <!--
                                                                             This is for Category  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/admin/get/subcategory/') }}/" + category_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#subcategory_id").empty();
                            $.each(data, function(key, value) {
                                $("#subcategory_id").append('<option value="' + value
                                    .id + '">' + value.subcategory_en + '</option>');
                            });

                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>


    <!-- This is for District  -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="district_id"]').on('change', function() {
                var district_id = $(this).val();
                if (district_id) {
                    $.ajax({
                        url: "{{ url('/admin/get/subdistrict/') }}/" + district_id,
                        type: "GET",
                        dataType: "json",
                        success: function(data) {
                            $("#subdistrict_id").empty();
                            $.each(data, function(key, value) {
                                $("#subdistrict_id").append('<option value="' + value
                                    .id + '">' + value.subdistrict_en + '</option>');
                            });

                        },

                    });
                } else {
                    alert('danger');
                }
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#js-example-basic-single').select2();
        });
    </script>
@endsection
