@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Department</h4>
            </div>
            <div class="header-action">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.department.index') }}">Departments</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Add department</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="card-body">
            <div class="collapse" id="form-element-2">
            </div>
            <form action="{{ route('admin.department.store') }}" method="post" class="w-50">
                @csrf
                <div class="form-group">
                    <label for="title">Title:</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                    @error('title')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="title_tr">Title turkish:</label>
                    <input type="text" class="form-control" name="title_tr" id="title_tr"
                           value="{{ old('email') }}">
                    @error('title_tr')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mb-0">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="{{ route('admin.department.index') }}" class="btn btn-primary">Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
