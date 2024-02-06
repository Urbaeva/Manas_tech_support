@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Create service</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Title">
                            </div>
                            <div class="col">
                                <label for="title_tr">Title tr: </label>
                                <input type="text" class="form-control" id="title_tr" name="title_tr"
                                       placeholder="Title tr">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Description: </label>
                                    <textarea id="summernote" name="description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Description tr: </label>
                                    <textarea id="summernote2"
                                              name="description_tr">{{ old('description_tr') }}</textarea>
                                    @error('description_tr')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <div class="card-body">
                                        <p>Logo file:</p>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="logo" name="logo">
                                            <label class="custom-file-label" for="logo">logo</label>
                                        </div>
                                        @error('logo')
                                        <p class="text-danger">{{$message}}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <div class="card-body">
                                        <label for="category_id">Category</label>
                                        <select id="category_id" name="category_id" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}">{{$category->title}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group mb-0">
                            <button class="btn btn-primary" type="submit">Create</button>
                            <a href="{{ route('admin.service.index') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
