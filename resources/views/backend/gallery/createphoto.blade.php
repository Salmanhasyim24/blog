@extends('admin.dashboard')
@section('title', 'Create Gallery Photo')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="page-content">

        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Add New Gallery Photo</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add New Gallery Photo</li>
                    </ol>
                </nav>
            </div>

        </div>
        <!--end breadcrumb-->

        <div class="card">
            <div class="card-body p-4">
                <h5 class="card-title">Add New Photo</h5>
                <hr />

                <form id="myForm" method="post" action="{{ route('store.photo') }}" enctype="multipart/form-data">
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
                                            <option value="1">Big Photo </option>
                                            <option value="0">Small Photo </option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="inputProductTitle" class="form-label">Main Thumbanil</label>
                                        <input name="photo" class="form-control" type="file" id="formFile"
                                            onChange="mainThamUrl(this)">
                                        <div class="my-2 gap-2">
                                            <img src="" id="mainThmb" />
                                        </div>
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
                    title: {
                        required: true,
                    },
                    type: {
                        required: true,
                    },

                },
                messages: {
                    title: {
                        required: 'Please Enter Product Name',
                    },
                    type: {
                        required: 'Please Enter Short Description',
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

@endsection
