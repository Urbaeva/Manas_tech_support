<!-- Header Section Begin -->
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="header__logo">
                    @yield('humberger_logo')
                </div>
            </div>
            <div class="col-lg-6">
                <nav class="header__menu">
                    <ul>
                        <li class="active"><a href="{{ route('user.index') }}">{{ __('pathLang.home') }}</a></li>
                        <li><a href="{{ route('user.services') }}">{{ __('pathLang.services') }}</a></li>
                        <li><a href="{{ route('user.contact') }}">{{ __('pathLang.contact') }}</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <div class="header__top__right__language">
                        @if(app()->getLocale() == 'ky')
                            <img style="height: 17px; width: 24px;" src="{{ asset('user_files/img/kyrgyz.png') }}"
                                 alt="">
                            <div>{{ __('pathLang.kyrgyz') }}</div>
                        @else
                            <img style="height: 17px; width: 24px" src="{{ asset('user_files/img/turkey.png') }}"
                                 alt="">
                            <div>{{ __('pathLang.turkish') }}</div>
                        @endif
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#" onclick="toKY(event)">{{ __('pathLang.kyrgyz') }}</a></li>
                            <li><a href="#" onclick="toTR(event)">Türkçe</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section End -->
<style>
    .hero__categories {
        position: relative;
        z-index: 1; /* Ensure the dropdown appears above other content */
    }

    .hero__categories ul {
        display: none; /* Hide the dropdown by default */
        list-style: none;
        padding: 0;
        margin: 0;
        position: absolute;
        top: 100%; /* Position the dropdown below the parent */
        left: 0;
        background-color: #fff; /* Optional: Add a background color for better visibility */
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for a subtle effect */
    }

    .hero__categories:hover ul {
        display: block; /* Show the dropdown when the parent is hovered */
    }

    /* Optional: Add styles for better visibility */
    .hero__categories__all {
        cursor: pointer;
    }

    .hero__categories ul li {
        padding: 10px;
        border-bottom: 1px solid #ccc;
    }
</style>


<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>{{ __('pathLang.all_departments') }}</span>
                    </div>
                    <ul >
                        @php
                            $departments = \App\Models\Department::all();
                        @endphp
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
                            <input class="form-control" id="searchAreaId" type="text" placeholder="{{ __('pathLang.what_do_you_need') }}" value="" oninput="getVal(this)">
                            <button style="background: #224791"  type="submit" onclick="searchFunction(event)" class="site-btn">{{ trans('pathLang.search') }}</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
