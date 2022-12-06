@extends('admin.dashboard')
@section('title')
    Create Notice
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Notice </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Notice </li>
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
                                    @if ($notice->status == 1)
                                        <a href="{{ route('inactive.notice', $notice->id) }}"><button type="button"
                                                class="btn btn-danger btn-fw">InActive</button></a>
                                    @else
                                        <a href="{{ route('active.notice', $notice->id) }}"><button type="button"
                                                class="btn btn-primary btn-fw">Active</button></a>
                                    @endif
                                </div>
                                @if ($notice->status == 1)
                                    <small class="text-success">Now Notice Are Active </small>
                                @else
                                    <small class="text-danger">Now Notice Are InActive </small>
                                @endif

                                <form id="myForm" method="post" action="{{ route('update.notice', $notice->id) }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $notice->id }}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="notice" class="form-label">Notice</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <textarea name="notice" class="form-control" id="inputProductDescription" rows="3">{!! $notice->notice !!}</textarea>
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
