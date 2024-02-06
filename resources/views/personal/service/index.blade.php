@extends('personal.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Service Datatables</h4>
                        </div>
                        <div class="header-action">
                            <a href="{{ route('personal.service.create') }}" class="btn btn-primary">Add</a>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="datatable-1" class="table data-table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Title tr</th>
                                    <th>Category</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->id }}</td>
                                        <td>{{ $service->title }}</td>
                                        <td>{{ $service->title_tr }}</td>
                                        <td>{{ $service->category->title }}</td>
                                        <td class="text-center d-flex justify-content-around">
                                            <a href="{{ route('personal.service.show', $service->id) }}">
{{--                                            <a href="#">--}}
                                                <i class="far fa-eye"></i></a>
                                            <a href="{{ route('personal.service.edit', $service->id) }}"
                                               class="text-success"><i class="fas fa-pencil-alt"></i></a>
                                            <form action="{{ route('personal.service.delete', $service->id) }}" method="POST">
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
                                    <th>Title tr</th>
                                    <th>Category</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
