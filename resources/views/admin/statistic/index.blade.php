@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Video Statistic</h4>
                        </div>
                        <div class="header-action">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Statistic</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatable-1" class="table data-table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Title turkish</th>
                                    <th>Views</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($videos as $video)
                                    <tr>
                                        <td>{{ $video->id }}</td>
                                        <td>{{ $video->title }}</td>
                                        <td>{{ $video->title_tr }}</td>
                                        <td>{{ $video->views }}</td>
                                        <td class="text-center d-flex justify-content-between">
                                            <a href="{{ route('admin.video.show', $video->id) }}" >
                                                <i class="">
                                                    <svg xmlns="http://www.w3.org/2000/svg" style="width: 24px; height: 24px;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg>
                                                </i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Title turkish</th>
                                    <th>Views</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
                {{--                  here was  second card--}}
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Initialize DataTables
            $('#datatable-1').DataTable();
        });
    </script>
@endsection
