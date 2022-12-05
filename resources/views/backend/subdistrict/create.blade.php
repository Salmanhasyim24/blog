@extends('admin.dashboard')
@section('title')
    Create SubDistrict
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">SubDistrict </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add SubDistrict Name</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">

            </div>
        </div>
        <!--end breadcrumb-->
        <div class="container">
            <div class="main-body">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="card">
                            <div class="card-body">

                                <form id="myForm" method="post" action="{{ route('store.subdistrict') }}">
                                    @csrf

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="inputCollection" class="form-label">Select District</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <select name="district_id" class="form-select" id="js-example-basic-single">
                                                <option selected="">Open this select menu</option>
                                                @foreach ($districts as $district)
                                                    <option value="{{ $district->id }}">{{ $district->district_en }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="subdistrict_en">SubDistrict English</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="subdistrict_en" required class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="subdistrict_idn">Kecamatan Indonesia</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="subdistrict_idn" required class="form-control" />
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-3"></div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="submit" class="btn btn-primary px-4" value="Save Changes" />
                                        </div>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    subdistrict_en: {
                        required: true,
                    },
                    subdistrict_idn: {
                        required: true,
                    },

                },
                messages: {
                    subdistrict_en: {
                        required: 'Please Enter Banner Title',
                    },
                    subdistrict_idn: {
                        required: 'Please Enter Banner Title',
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
