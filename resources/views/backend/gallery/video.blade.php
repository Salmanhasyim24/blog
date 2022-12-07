@extends('admin.dashboard')
@section('title')
    All Video
@endsection

@section('content')
    <div class="page-content">
        <!--breadcrumb-->
        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">All Video</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">All Video</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('add.video') }}" class="btn btn-primary">Add Video</a>
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
                                <th> Type </th>
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($videos as $key => $item)
                                <tr>
                                    <td> {{ $key + 1 }} </td>
                                    <td>
                                        {{ $item->title }}
                                    </td>
                                    <td>
                                        @if ($item->type == 1)
                                            <span class="badge bg-success">Big
                                                video</span>
                                        @else
                                            <span class="badge bg-info">Small Video</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('delete.video', $item->id) }}" class="btn btn-danger"
                                            id="delete">Delete</a>
                                    </td>
                                </tr>
                            @empty
                                <td colspan="4" class="text-center">
                                    Data Kosong
                                </td>
                            @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Sl</th>
                                <th> Post Title </th>
                                <th> Type </th>
                                <th> Action </th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
