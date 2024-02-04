@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $department->title }} department categories</h4>
                        </div>
                        <div class="header-action">
                            <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add category</a>
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
                                    <th colspan="3" class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($department->categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->title }}</td>
                                        <td>{{ $category->title_tr }}</td>
                                        <td class="text-center">
{{--                                            <a href="{{ route('admin.category.show', $category->id) }}">--}}
                                            <a href="#">
                                                <i class="far fa-eye"></i></a>
                                        </td>
                                        <td class="text-center">
{{--                                            <a href="{{ route('admin.category.edit', $category->id) }}" class="text-success"><i class="fas fa-pencil-alt"></i></a>--}}
                                            <a href="#" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                                        </td>
                                        <td class="text-center">
                                            <form action="{{ route('admin.category.delete', $category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="border-0 bg-transparent">
                                                    <i class="fas fa-trash text-danger" role="button"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Title turkish</th>
                                    <th colspan="3" class="text-center">Action</th>
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
