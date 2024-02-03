@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <div class="header-title">
                <h4 class="card-title">Form Grid</h4>
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
            <form action="{{ route('admin.department.store') }}" method="post">
                @csrf
                <div class="form-row">
                    <div class="col-md-6 mb-3">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required="">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="title_tr">Title_tr</label>
                        <input type="text" class="form-control" id="title_tr" name="title_tr" required="">
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button class="btn btn-primary" type="submit">Create</button>
                    <a href="{{ route('admin.department.index') }}" class="btn btn-primary">Back</a>
                </div>
            </form>

        </div>
    </div>
@endsection
