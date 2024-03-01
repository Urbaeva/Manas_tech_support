<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manas helpit</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('user_files/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user_files/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user_files/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user_files/css/nice-select.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user_files/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user_files/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user_files/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('user_files/css/style.css') }}" type="text/css">

</head>

<body>


<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
<div class="humberger__menu__wrapper">
    <div class="humberger__menu__logo">
        @yield('humberger_logo')
    </div>
    <div class="humberger__menu__widget">
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
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ route('user.index') }}">{{ __('pathLang.home') }}</a></li>
            <li><a href="{{ route('user.services') }}">{{ __('pathLang.services') }}</a></li>
            <li><a href="{{ route('user.contact') }}">{{ __('pathLang.contact') }}</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="http://www.facebook.com/manasuniv"><i class="fa fa-facebook"></i></a>
        <a href="https://www.instagram.com/manasuniv"><i class="fa fa-instagram"></i></a>
        <a href="http://twitter.com/manasuniv"><i class="fa fa-twitter"></i></a>
        <a href="https://www.youtube.com/c/mediamanas"><i class="fa fa-youtube"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Address: Chyngyz Aitmatov Campus (Djal), Bishkek, Kyrgyz </li>
            <li>Phone: +996 (312) 54 19 41-47</li>
        </ul>
    </div>
</div>
<!-- Humberger End -->

@include('user.includes.navbar')

<!-- Hero,Featured Section Begin -->
@yield('content')


<!-- Footer Section Begin -->
<footer class="footer spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <img style="border-radius: 50%;" src="{{ asset('user_files/img/logo326.jpg') }}" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <div class="row">
                        <div class="col-md-8">
                            <h6>{{ __('pathLang.links') }}</h6>
                            <ul>
                                <li>{{ __('pathLang.address') }}</li>
                                <li class="mt-2">{{__('pathLang.phone')}}: +996 (312) 54 19 41-47</li>
                                <li class="mt-2">Email: info@manas.edu.kg</li>
                            </ul>
                        </div>
                        <div class="col-md-4">
                            <h6>{{__('pathLang.social_medias')}}</h6>
                            <div class="footer__widget__social">
                                <a href="http://www.facebook.com/manasuniv"><i class="fa fa-facebook"></i></a>
                                <a href="https://www.instagram.com/manasuniv"><i class="fa fa-instagram"></i></a>
                                <a href="http://twitter.com/manasuniv"><i class="fa fa-twitter"></i></a>
                                <a href="https://www.youtube.com/c/mediamanas"><i class="fa fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer__copyright__text">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved</p>
        </div>
    </div>
</footer>

<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="{{ asset('user_files/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ asset('user_files/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('user_files/js/jquery.nice-select.min.js') }}"></script>
<script src="{{ asset('user_files/js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('user_files/js/jquery.slicknav.js') }}"></script>
<script src="{{ asset('user_files/js/mixitup.min.js') }}"></script>
<script src="{{ asset('user_files/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('user_files/js/main.js') }}"></script>
<!-- Include Bootstrap CSS and JS files -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<!-- Your existing HTML/Blade code -->

<script>
    // Initialize Bootstrap dropdown
    $('.dropdown-toggle').dropdown();

    function toKY(event)
    {
        event.preventDefault();
        let url = location.pathname;
        let items = url.split('/');
        if(items[1] === 'tr')
        {
            url = url.replace('/tr', '');
            location.pathname = url
        }
        else{
            location.reload();
        }

    }
    function toTR(event)
    {
        event.preventDefault();
        let url = location.pathname;
        let items = url.split('/');
        const index = items.indexOf('tr');
        if (index === -1) {
            url = 'tr' + url;
            location.pathname = url;
        } else {
            location.reload();
        }
    }
</script>

<script>

    function searchFunction(event)
    {
        event.preventDefault();
        let search = document.getElementById('searchAreaId').value;
        if(search)
        {
            location.href = "{{route('user.index')}}" + `?search=${search}`;
        }
        else{
            location.href = "{{route('user.index')}}";
        }
    }

    function getVal(val)
    {
        if(!val.value)
        {
            location.href = "{{route('user.index')}}";
        }
    }
</script>
</body>
</html>
