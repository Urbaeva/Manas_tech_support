@extends('admin.layouts.main')
@section('content')
    <div class="card">
        <div class="card-body">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <div class="header-title">
                        <h4 class="card-title">Edit service</h4>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.service.update', $service->id) }}" method="POST"
                          enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="row">
                            <div class="col">
                                <label for="title">Title: </label>
                                <input type="text" class="form-control" id="title" name="title"
                                       value="{{ $service->title }}">
                            </div>
                            <div class="col">
                                <label for="title_tr">Title tr: </label>
                                <input type="text" class="form-control" id="title_tr" name="title_tr"
                                       value="{{ $service->title_tr }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                <div class="form-group">
                                    <label>Description: </label>
                                    <textarea id="summernote" name="description">{{ $service->description }}</textarea>
                                    @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label>Description tr: </label>
                                    <textarea id="summernote2"
                                              name="description_tr">{{ $service->description_tr }}</textarea>
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
                                        <div class="w-50">
                                            <img id="logo" src="{{ asset('storage/' . $service->logo) }}" class="mb-3">
                                        </div>
                                        <div class="custom-file mb-3">
                                            <input type="file" class="custom-file-input" id="logo" name="logo" onchange="displayImage(this, 'logo')">
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
                                        <label>Choose category</label>
                                        <select class="form-control" name="category_id">
                                            @foreach($categories as $category)
                                                <option
                                                    value="{{ $category->id }}" {{ $category->id == $service->category_id ? ' selected' : '' }}>
                                                    {{ $category->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href="{{ route('admin.service.index') }}" class="btn btn-outline-primary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
