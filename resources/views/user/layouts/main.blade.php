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
                <img style="height: 17px; width: 24px" src="{{ asset('user_files/img/kyrgyz.png') }}" alt="">
                <div>Kyrgyz</div>
            @else
                <img style="height: 17px; width: 24px" src="{{ asset('user_files/img/turkey.png') }}" alt="">
                <div>Turkish</div>
            @endif
            <span class="arrow_carrot-down"></span>
            <ul>
                <li><a href="#" onclick="toKY(event)">Kyrgyz</a></li>
                <li><a href="#" onclick="toTR(event)">Turkish</a></li>
            </ul>
        </div>
        <div class="header__top__right__auth">
            <a href="#"><i class="fa fa-user"></i> Login</a>
        </div>
    </div>
    <nav class="humberger__menu__nav mobile-menu">
        <ul>
            <li class="active"><a href="{{ route('user.index') }}">Home</a></li>
            <li><a href="./shop-grid.html">Shop</a></li>
            <li><a href="#">Pages</a>
                <ul class="header__menu__dropdown">
                    <li><a href="./shop-details.html">Shop Details</a></li>
                    <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                    <li><a href="./checkout.html">Check Out</a></li>
                    <li><a href="./blog-details.html">Blog Details</a></li>
                </ul>
            </li>
            <li><a href="./blog.html">Blog</a></li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="header__top__right__social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-pinterest-p"></i></a>
    </div>
    <div class="humberger__menu__contact">
        <ul>
            <li><i class="fa fa-envelope"></i> hello@colorlib.com</li>
            <li>Free Shipping for all Order of $99</li>
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
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="footer__about">
                    <div class="footer__about__logo">
                        <a href="./index.html"><img src="{{ asset('user_files/img/logo.png') }}" alt=""></a>
                    </div>
                    <ul>
                        <li>Address: 60-49 Road 11378 New York</li>
                        <li>Phone: +65 11.188.888</li>
                        <li>Email: hello@colorlib.com</li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                <div class="footer__widget">
                    <h6>Useful Links</h6>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">About Our Shop</a></li>
                        <li><a href="#">Secure Shopping</a></li>
                        <li><a href="#">Delivery infomation</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Our Sitemap</a></li>
                    </ul>
                    <ul>
                        <li><a href="#">Who We Are</a></li>
                        <li><a href="#">Our Services</a></li>
                        <li><a href="#">Projects</a></li>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">Innovation</a></li>
                        <li><a href="#">Testimonials</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="footer__widget">
                    <h6>Join Our Newsletter Now</h6>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <form action="#">
                        <input type="text" placeholder="Enter your mail">
                        <button type="submit" class="site-btn">Subscribe</button>
                    </form>
                    <div class="footer__widget__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="footer__copyright">
                    <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p></div>
                    <div class="footer__copyright__payment"><img src="{{ asset('user_files/img/payment-item.png') }}" alt=""></div>
                </div>
            </div>
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
        }else{
            location.reload();
        }
    }
</script>

</body>

</html>
