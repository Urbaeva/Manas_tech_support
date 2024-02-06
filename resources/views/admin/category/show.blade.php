@extends('admin.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 ">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">{{ $category->title }}  </h4>
                        </div>
                        <div class="header-action">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Category</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}'s services</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                    <div class="card-body ">
                        <div class="collapse" id="images-4">

                        </div>
                        <ul class="list-unstyled p-0 m-0 row col-md-6">
                            @foreach($category->services as $service)
                                <li class="col-lg-4 col-md-6 col-sm-6 mt-2">
                                    <a href="{{ route('admin.service.show', $service->id) }}">
                                        <p class="text-center">{{ $service->title }}</p>
                                        <img src="{{ asset('storage/'. $service->logo) }}"
                                             class="img-thumbnail w-100 img-fluid rounded"
                                             alt="Responsive image">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
