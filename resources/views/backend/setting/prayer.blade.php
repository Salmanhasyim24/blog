@extends('admin.dashboard')
@section('title')
    Create Prayer
@endsection
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">Prayer </div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Add Prayer </li>
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

                                <form id="myForm" method="post" action="{{ route('update.prayer', $prayer->id) }}">
                                    @csrf

                                    <input type="hidden" name="id" value="{{ $prayer->id }}">

                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="fajr">Fajr</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="fajr" value="{{ $prayer->fajr }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="dzuhur">Dzuhur</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="dzuhur" value="{{ $prayer->dzuhur }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="ashar">Ashar</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="ashar" value="{{ $prayer->ashar }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="maghrib"> Maghrib</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="maghrib" value="{{ $prayer->maghrib }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="isya">Isya</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="isya" value="{{ $prayer->isya }}"
                                                class="form-control" />
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-sm-3">
                                            <label for="jummah"> Jum'ah</label>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                            <input type="text" name="jummah" value="{{ $prayer->jummah }}"
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
