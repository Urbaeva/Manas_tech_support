@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>{{ $video->getTitle() }}</b></h3>
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
                            <span>All departments</span>
                        </div>
                        <ul>
                            <li><a href="#">Fresh Meat</a></li>
                            <li><a href="#">Vegetables</a></li>
                            <li><a href="#">Fruit & Nut Gifts</a></li>
                            <li><a href="#">Fresh Berries</a></li>
                            <li><a href="#">Ocean Foods</a></li>
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
                                <button type="submit" class="site-btn">SEARCH</button>
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




    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__item">
                            <h4>Other videos</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($video->service->videos as $video_o)
                                    <a href="{{ route('user.service.getVideo', $video_o->id) }}" class="blog__sidebar__recent__item">
                                        <div class="blog__sidebar__recent__item__pic">
                                            <img style="width: 70px; height: 70px; border: 2px solid #ddd"
                                                 src="{{ asset('storage/'.$video_o->service->logo) }}" alt="">
                                        </div>
                                        <div class="blog__sidebar__recent__item__text">
                                            <h6>{{ $video_o->getTitle() }}</h6>
                                            @php
                                                $date = \Illuminate\Support\Carbon::parse($video_o->created_at);
                                            @endphp
                                            <span
                                                style="font-size: 10px;">{{ $date->format('F') }} {{ $date->day }}, {{ $date->year }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <div class="blog__sidebar__item__tags">
                                @foreach($category->department->categories as $category_o)
                                    <a href="#">{{ $category_o->getTitle() }}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <h3 class="text-center">{{ $video->getTitle() }}</h3>
                        <video controls style="width: 769px; height: 647px;">
                            <source src="{{ route('user.service.getVideo', $video->id) }}"
                                    type="video/mp4">
                            Your browser does not support the video tag.
                        </video>

                        <p>The study area is located at the back with a view of the vast nature. Together with the other
                            buildings, a congruent story has been managed in which the whole has a reinforcing effect on
                            the components. The use of materials seeks connection to the main house, the adjacent
                            stables</p>
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{ asset('user_files/img/blog/details/details-author.jpg') }}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>Michael Scofield</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> {{ $category->getTitle() }}</li>
                                        <li><span>Tags:</span> All, Trending, Cooking, Healthy Food, Life Style</li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Services related this category that related this video</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($category->services as $service)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                <img style="border: 2px solid #ddd;" src="{{ asset('storage/'.$service->logo) }}" alt="">
                            </div>
                            <div class="blog__item__text">
                                <ul>
                                    @php
                                        $date = \Illuminate\Support\Carbon::parse($service->created_at);
                                    @endphp
                                    <li><i class="fa fa-calendar-o"></i> {{ $date->format('F') }} {{ $date->day }}
                                        , {{ $date->year }} </li>
                                </ul>
                                <h5><a href="#">{{ $service->getTitle() }}</a></h5>
                                <p>{!! $service->getDescription() !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->

@endsection
