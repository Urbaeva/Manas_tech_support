@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>Manas help</b></h3>
@endsection

@section('content')
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ __('pathLang.videos') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($popular_videos as $video)
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="featured__item">
                            <a href="{{ route('user.service.video', $video->id) }}">
                                <video controls style="height: 300px;" onplay="clickToVideo('{{$video->id}}')">
                                    <source src="{{ route('user.service.getVideo', $video->id) }}"
                                            type="video/mp4" disabled>
                                    Your browser does not support the video tag.
                                </video>
                                <div class="featured__item__text">
                                    <h5><a style="color: black"
                                           href="{{ route('user.service.video', $video->id) }}">{{ $video->getTitle() }}</a>
                                    </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="mx-auto">
                    {{ $popular_videos->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($services as $service)
                        <a href="{{ route('user.category.service', $service->id) }}">
                            <div class="col-lg-3">
                                <img style="border: 2px solid #ddd;" class="categories__item set-bg"
                                     src="{{ asset('storage/'.$service->logo) }}" alt="{{ $service->getTitle() }}">
                                <h5 class="text-center">{{ $service->getTitle() }}</h5>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->

    <!-- Featured Section End -->
    <script>
        function clickToVideo(video)
        {
            location.href = `/user/departments/service/video/${video}`;
        }

    </script>
@endsection
