@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Add new category</h4>
                    </div>
                    <div class="header-action">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Add category</li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="card-body w-50">
                    <form action="{{ route('admin.category.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title_tr">Title turkish</label>
                            <input type="text" class="form-control" name="title_tr" id="title_tr"
                                   value="{{ old('title_tr') }}">
                            @error('title_tr')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Choose department</label>
                            <select class="form-control" name="department_id">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}"
                                            {{ $department->id == old('department_id') ? ' selected' : ''}}
                                    >{{ $department->title }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="{{ route('admin.category.index') }}" type="button" class="btn bg-danger">Cancel</a>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
