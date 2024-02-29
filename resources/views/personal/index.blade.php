@extends('personal.layouts.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 mb-4 mt-1">
                <div class="d-flex flex-wrap justify-content-between align-items-center">
                    <h4 class="font-weight-bold">Overview</h4>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-2 text-secondary">Total Videos</p>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-0 font-weight-bold">{{ $data['total_videos'] }}</h5>
                                            <p class="mb-0 ml-3 text-success font-weight-bold"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="">
                                        <p class="mb-2 text-secondary">Total Views</p>
                                        <div class="d-flex flex-wrap justify-content-start align-items-center">
                                            <h5 class="mb-0 font-weight-bold">{{ $data['total_views'] }}</h5>
                                            <p class="mb-0 ml-3 text-success font-weight-bold"></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card-header card-header-border d-flex justify-content-between">
                            <div class="header-title">
                                <h4 class="card-title">Top Watched Videos</h4>
                            </div>
                        </div>
                        <div class="card-body-list">
                            <ul class="list-style-3 mb-0">
                                @foreach($top_watched_videos as $video)
                                    <li class="p-3 list-item d-flex justify-content-start align-items-center">
                                        <div class="avatar">
                                            <img class="avatar avatar-img avatar-60 rounded"
                                                 src="{{ 'storage/'.$video->service->logo }}" alt="1.jpg">
                                        </div>
                                        <div class="list-style-detail ml-3 mr-2">
                                            <p class="mb-0">{{ $video->title }}</p>
                                        </div>
                                        <div class="list-style-action d-flex justify-content-end ml-auto">
                                            <h6 class="font-weight-bold">{{ $video->views }}</h6>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- Page end  -->
    </div>
@endsection
