@extends('admin.dashboard')
@section('title')
    Create Social
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Social </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Social </li>
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

                                <form id="myForm" method="post" action="{{ route('update.social', $social->id) }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $social->id }}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="facebook">Facebook</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="facebook" value="{{ $social->facebook }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="twitter">Twitter</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="twitter" value="{{ $social->twitter }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="youtube">Youtube</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="youtube" value="{{ $social->youtube }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="linkedin">Linkedin</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="linkedin" value="{{ $social->linkedin }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="instagram">Instagram</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="instagram" value="{{ $social->instagram }}"
                                                class="form-control" />
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
@endsection
