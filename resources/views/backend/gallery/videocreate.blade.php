@extends('admin.dashboard')
@section('title', 'Create Gallery Video')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add New Gallery Video</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Gallery Video</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Video</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('store.video') }}">
                    @csrf

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12 col-6">
                                <div class="border border-3 p-4 rounded">

                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">Photo Title</label>
                                        <input type="text" name="title" class="form-control" id="title"
                                            placeholder="Enter Photo title">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="type" class="form-label">Type Photo</label>
                                        <select name="type" class="form-select" id="type">
                                            <option value="1">Big Video </option>
                                            <option value="0">Small Video </option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="video" class="form-label">Code Video</label>
                                        <textarea name="video" class="form-control" id="inputProductDescription" rows="3"></textarea>
                                    </div>

                                    <div class="col-12">
                                        <div class="d-grid">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />

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








    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#js-example-basic-single').select2();
        });
    </script>
@endsection
