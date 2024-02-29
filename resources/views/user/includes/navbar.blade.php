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

<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span>{{ __('pathLang.all_departments') }}</span>
                    </div>
                    <ul>
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
