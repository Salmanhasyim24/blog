@extends('admin.dashboard')
@section('title')
    Create Seo
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Seo </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Seo </li>
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

                                <form id="myForm" method="post" action="{{ route('update.seo', $seo->id) }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $seo->id }}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="meta_author">Meta Author</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="meta_author" value="{{ $seo->meta_author }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="meta_title">Meta Title</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="meta_title" value="{{ $seo->meta_title }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="meta_keyword">Meta Keyword</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="meta_keyword" value="{{ $seo->meta_keyword }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="meta_description">meta Description</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="meta_description"
                                                value="{{ $seo->meta_description }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="google_analytics">Google Analytics</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="google_analytics"
                                                value="{{ $seo->google_analytics }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="google_verification">Google Verification</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="google_verification"
                                                value="{{ $seo->google_verification }}" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="alexa_analytics">Alexa Analytics</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="alexa_analytics" value="{{ $seo->alexa_analytics }}"
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
