@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Department</h4>
            </div>
            <div class="header-action">
                <i data-toggle="collapse" data-target="#form-element-2" aria-expanded="false">
                    <svg width="20" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                         stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                    </svg>
                </i>
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
