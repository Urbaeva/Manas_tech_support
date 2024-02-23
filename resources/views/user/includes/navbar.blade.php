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
                        <li class="active"><a href="{{ route('user.index') }}">Home</a></li>
                        <li><a href="{{ route('user.services') }}">Services</a></li>
                        <li><a href="{{ route('user.contact') }}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__cart">
                    <div class="header__top__right__language">
                        @if(app()->getLocale() == 'ky')
                            <img style="height: 17px; width: 24px;" src="{{ asset('user_files/img/kyrgyz.png') }}"
                                 alt="">
                            <div>Kyrgyz</div>
                        @else
                            <img style="height: 17px; width: 24px" src="{{ asset('user_files/img/turkey.png') }}"
                                 alt="">
                            <div>Turkish</div>
                        @endif
                        <span class="arrow_carrot-down"></span>
                        <ul>
                            <li><a href="#" onclick="toKY(event)">Kyrgyz</a></li>
                            <li><a href="#" onclick="toTR(event)">Turkish</a></li>
                        </ul>
                    </div>
                        <div class="header__top__right__auth">
                            <a href="{{ route('login') }}"><i class="fa fa-user"></i> Login</a>
                        </div>
                </div>
            </div>
        </div>
        <div class="humberger__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<!-- Header Section End -->
