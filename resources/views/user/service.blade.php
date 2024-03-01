@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>{{ $service->getTitle() }}</b></h3>
@endsection

@section('content')

    <!-- Hero Section Begin -->
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('user_files/img/green.jpeg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{ $service->getTitle() }}</h2>
                        <div class="breadcrumb__option">
                            <a href="{{ route('user.index') }}">{{__('pathLang.home')}}</a>
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
                                                $date = \Illuminate\Support\Carbon::parse($service->created_at)->format('Y-m-d')
                                            @endphp
                                            <span style="font-size: 10px;">{{ $date }}</span>
                                        </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>{{ __('pathLang.categories') }}</h4>
                            <div class="blog__sidebar__item__tags">
                                @foreach($categories as $category)
                                    <a href="#">{{ $category->getTitle() }}</a>
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
                                            <li><i><svg xmlns="http://www.w3.org/2000/svg" style="height: 23px; width: 23px;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5" />
                                                    </svg>
                                                </i>{{ $date }}</li>
                                            @php
                                                $views = $video->views;
                                            @endphp
                                            <li><i><svg xmlns="http://www.w3.org/2000/svg" style="height: 23px; width: 23px;" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                    </svg></i>{{ $views }}</li>
                                        </ul>
                                        <h5><a href="{{ route('user.service.video', $video->id) }}">{{ $video->getTitle() }}</a></h5>
                                        <p>{{ $service->getDescription() }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Section End -->

@endsection
