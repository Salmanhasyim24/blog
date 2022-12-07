@extends('admin.dashboard')
@section('title', 'Create WebSetting')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Update New WebSetting</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Update New WebSetting</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Update New WebSetting</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('update.websetting', $websitesetting->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <input type="hidden" name="id" value="{{ $websitesetting->id }}">
                    <input type="hidden" name="logo" value="{{ $websitesetting->logo }}">

                    <div class="form-body mt-4">
                        <div class="row">
                            <div class="col-lg-12 col-6">
                                <div class="border border-3 p-4 rounded">

                                    <div class="form-group mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" value="{{ $websitesetting->email }}"
                                            class="form-control" id="email" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone_en" class="form-label">Phone ENG</label>
                                        <input type="text" name="phone_en" value="{{ $websitesetting->phone_en }}"
                                            class="form-control" id="phone_en" placeholder="Enter product title">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="phone_idn" class="form-label">Phone Idn</label>
                                        <input type="text" name="phone_idn" value="{{ $websitesetting->phone_idn }}"
                                            class="form-control" id="phone_idn" placeholder="Enter product title">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Address For Idn</label>
                                        <textarea name="address_idn" class="form-control" id="inputProductDescription" rows="3">{!! $websitesetting->address_idn !!}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="inputProductDescription" class="form-label">Address For Eng</label>
                                        <textarea id="mytextarea" name="address_en"> {!! $websitesetting->address_en !!}</textarea>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Main Thumbanil</label>
                                        <input name="logo" class="form-control" type="file" id="formFile"
                                            onChange="mainThamUrl(this)">
                                        <div class="mx-2 gap-2">
                                            <img src="" id="mainThmb" />
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-secondary mb-3">
                                        <img id="showImage"
                                            src="{{ !empty($websitesetting->logo) ? asset($websitesetting->logo) : url('upload/no_image.jpg') }}"
                                            alt="Admin" style="width:100px; height: 100px;">
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

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
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


@endsection
