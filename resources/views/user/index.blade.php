@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>Manas help</b></h3>
@endsection

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories" >
                        <div class="hero__categories__all"  >
                            <i class="fa fa-bars"></i>
                            <span >{{ __('pathLang.all_departments') }}</span>
                        </div>
                        <ul>
                            @foreach($departments as $department)
                                <li>
                                    <a href="{{ route('user.department', $department->id) }}">{{ $department->getTitle() }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <input class="form-control" id="searchAreaId" type="text" placeholder="What do you need?" value="{{$search}}" oninput="getVal(this)">
                                <button style="background: #224791"  type="submit" onclick="searchFunction(event)" class="site-btn">{{ trans('pathLang.search') }}</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
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
                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <div class="featured__item">
                            <video controls style="height: 300px;">
                                <source src="{{ route('user.service.getVideo', $video->id) }}"
                                        type="video/mp4">
                                Your browser does not support the video tag.
                            </video>
                            <div class="featured__item__text">
                                <h5><a style="color: black" href="{{ route('user.service.video', $video->id) }}">{{ $video->getTitle() }}</a></h5>
                            </div>
                        </div>
                    </div>
                @endforeach
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

@endsection
