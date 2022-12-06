@extends('admin.dashboard')
@section('title')
    All Post
@endsection

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Post</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Post</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.post') }}" class="btn btn-primary">Add Post</a>
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
                                <th> Post Title </th>
                                <th> Category </th>
                                <th> District </th>
                                <th> Image </th>
                                <th> Post Date </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($posts as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>{{ $item->title_en }}</td>
                                    <td>{{ $item->category->category_en }}</td>
                                    <td>{{ $item->district->district_en }}</td>
                                    <td> <img src="{{ asset($item->image) }}" style="width: 50px; height: 50px;"> </td>

                                    <td>{{ Carbon\Carbon::parse($item->post_date)->diffForHumans() }} </td>
                                    <td>
                                        <a href="{{ route('edit.category', $item->id) }}" class="btn btn-info">Edit</a>

                                        <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="8" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse


                        </tbody>
                        <tfoot>
                            <tr>
                                <<th>Sl</th>
                                    <th> Post Title </th>
                                    <th> Category </th>
                                    <th> District </th>
                                    <th> Image </th>
                                    <th> Post Date </th>
                                    <th> Action </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
