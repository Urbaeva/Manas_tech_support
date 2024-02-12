@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>{{ $category->getTitle() }}</b></h3>
@endsection

@section('content')
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>{{ trans('pathLang.all_services') }}</span>
                        </div>
                        <ul>
                            @foreach($category->services as $service)
                                <li>
                                    <a href="{{ route('user.category.service', $service->id) }}">{{ $service->getTitle() }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All services
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">{{ trans('pathLang.search') }}</button>
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



    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>{{ trans('pathLang.all_services') }}</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($category->services as $service)
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <div class="blog__item">
                            <a href="{{ route('user.category.service', $service->id) }}">
                                <div class="blog__item__pic">
                                    <img style="border: 2px solid #ddd" src="{{ asset('storage/'.$service->logo) }}"
                                         alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        @php
                                            $date = \Illuminate\Support\Carbon::parse($service->created_at);
                                        @endphp
                                        <li><i class="fa fa-calendar-o"></i> {{ $date->format('F') }} {{ $date->day }}
                                            , {{ $date->year }} </li>
                                        <li class="ml-5"><i
                                                class="fa fa-th-list"></i> {{ $service->category->getTitle()  }}</li>
                                    </ul>
                                    <h5>{{ $service->getTitle() }}</h5>
                                    <p>{!! $service->getDescription() !!}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
