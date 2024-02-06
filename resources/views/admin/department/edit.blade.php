@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit department</h4>
                    </div>
                    <div class="header-action">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.department.index') }}">Departments</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $department->title }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body w-50">
                    <form action="{{ route('admin.department.update', $department->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $department->title }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title_tr">Title turkish</label>
                            <input type="text" class="form-control" name="title_tr" id="title_tr"
                                   value="{{ $department->title_tr }}">
                            @error('title_tr')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="submit" class="btn bg-danger" value="Cancel">
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
