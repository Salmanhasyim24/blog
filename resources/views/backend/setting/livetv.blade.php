@extends('admin.dashboard')
@section('title')
    Create LiveTv
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">LiveTv </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add LiveTv </li>
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
                                <div class="ms-auto">
                                    @if ($livetv->status == 1)
                                        <a href="{{ route('inactive.livetv', $livetv->id) }}"><button type="button"
                                                class="btn btn-danger btn-fw">InActive</button></a>
                                    @else
                                        <a href="{{ route('active.livetv', $livetv->id) }}"><button type="button"
                                                class="btn btn-primary btn-fw">Active</button></a>
                                    @endif
                                </div>
                                @if ($livetv->status == 1)
                                    <small class="text-success">Now Live Tv Are Active </small>
                                @else
                                    <small class="text-danger">Now Live Tv Are InActive </small>
                                @endif

                                <form id="myForm" method="post" action="{{ route('update.livetv', $livetv->id) }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $livetv->id }}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="embed_code" class="form-label">Live Tv</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="embed_code" class="form-control" id="inputProductDescription" rows="3">{!! $livetv->embed_code !!}</textarea>
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
