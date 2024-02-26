@extends('user.layouts.main')
@section('humberger_logo')
    <h3><b>{{ $department->getTitle() }}</b></h3>
@endsection

@section('content')
    <!-- Hero Section Begin -->
    <!-- Hero Section End -->



    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2> {{ __('pathLang.all_services') }} </h2>
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
