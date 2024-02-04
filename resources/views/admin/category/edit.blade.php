@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit Form</h4>
                    </div>
                </div>
                <div class="card-body w-50">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
                            @error('title')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="title_tr">Title turkish</label>
                            <input type="text" class="form-control" name="title_tr" id="title_tr"
                                   value="{{ $category->title_tr }}">
                            @error('title_tr')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Choose department</label>
                            <select class="form-control" name="department_id">
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}"
                                            {{ $department->id == $category->department_id ? ' selected' : ''}}
                                    >{{ $department->title }}</option>
                                @endforeach
                            </select>
                            @error('department_id')
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
