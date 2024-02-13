@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>{{ $service->getTitle() }}</b></h3>
@endsection

@section('content')

    <!-- Hero Section Begin -->
    <section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>{{ trans('pathLang.all_services') }}</span>
                        </div>
                        <ul>
                            @foreach($service->category->services as $service_o)
                                <li><a href="#">{{ $service_o->getTitle() }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button  style="background: #224791" type="submit" class="site-btn">{{ __('pathLang.search') }}</button>
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

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user_files/img/green.jpeg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $service->getTitle() }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('user.index') }}">Home</a>
                            <span>{{ $service->getTitle() }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>{{ $service->category->getTitle() }}</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($service->category->services as $service_o )
                                    <a href="{{ route('user.category.service', $service_o->id) }}"
                                       class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img style="width: 70px; height: 70px; border: 2px solid #ddd"
                                                 src="{{ asset('storage/'.$service_o->logo) }}" alt="">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{ $service_o->getTitle() }}</h6>
                                            @php
                                                $date = \Illuminate\Support\Carbon::parse($service->created_at);
                                            @endphp
                                            <span style="font-size: 10px;">{{ $date->format('F') }} {{ $date->day }}, {{ $date->year }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>All categories</h4>
                            <div class="blog__sidebar__item__tags">
                                @foreach($categories as $category)
                                    <a href="{{ route('user.department.category', $category->id) }}">{{ $category->getTitle() }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-7">
                    <div class="row">
                        @foreach($service->videos as $video)
                            <div class="col-sm-6">
                                <div class="blog__item">
                                    <div class="blog__item__pic">
                                        <a href="{{ route('user.service.video', $video->id) }}">
                                            <video controls style="height: 250px; width: 380px">
                                                <source src="{{ route('user.service.getVideo', $video->id) }}"
                                                        type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </a>
                                    </div>
                                    <div class="blog__item__text">
                                        <ul>
                                            <li><i class="fa fa-calendar-o"></i> May 4,2019</li>
                                            <li><i class="fa fa-comment-o"></i> 5</li>
                                        </ul>
                                        <h5><a href="#">{{ $video->getTitle() }}</a></h5>
                                        <p>{{ $service->getDescription() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-lg-12">
                            <div class="product__pagination blog__pagination">
                                <a href="#">1</a>
                                <a href="#">2</a>
                                <a href="#">3</a>
                                <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
