@extends('admin.dashboard')
@section('title')
    All SubDistrict
@endsection

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All SubDistrict</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All SubDistrict</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.subdistrict') }}" class="btn btn-primary">Add SubDistrict</a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->

        <hr />
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sl</th>
                                <th>District English </th>
                                <th>SubDistrict English </th>
                                <th>Kecamatan Indonesia </th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($subdistricts as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->district->district_en }}</td>
                                    <td>{{ $item->subdistrict_en }}</td>
                                    <td>{{ $item->subdistrict_idn }}</td>
                                    <td>
                                        <a href="{{ route('edit.subdistrict', $item->id) }}" class="btn btn-info">Edit</a>

                                        <a href="{{ route('delete.subdistrict', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="5" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse


                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th>Category English </th>
                                <th>SubDistrict English </th>
                                <th>Kecamatan Indonesia </th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
