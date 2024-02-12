@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>{{ $department->getTitle() }}</b></h3>
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
                            <span>{{ trans('pathLang.all_categories') }}</span>
                        </div>
                        <ul>
                            @foreach($department->categories as $category)
                                <li>
                                    <a href="{{ route('user.department.category', $category->id) }}">{{ $category->getTitle() }}</a>
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
                                    All Categories
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



    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>{{ $department->getTitle() }} din services</h2>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                @foreach($services as $service)

                    <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                        <a href="{{ route('user.category.service', $service->id) }}">
                            <div class="featured__item">
                                <img style="border: 2px solid #ddd;" class="categories__item set-bg"
                                     src="{{ asset('storage/'.$service->logo) }}" alt="{{ $service->getTitle() }}">
                                <div class="featured__item__text">
                                    <h6>{{ $service->getTitle() }}</h6>
                                </div>
                            </div>
                        </a>
                    </div>

                @endforeach

            </div>
        </div>
    </section>
    <!-- Featured Section End -->

@endsection
