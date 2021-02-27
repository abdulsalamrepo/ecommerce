
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <meta charset="UTF-8">
    <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="{{asset('store2/images/logo/logo-2.png')}}" rel="shortcut icon">
    <title>Sanofa - Electronics, Apparel, Computers, Books, DVDs & more</title>

    <!--====== Google Font ======-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet">

    <!--====== Vendor Css ======-->
    <link rel="stylesheet" href="{{asset('store2/css/vendor.css')}}">

    <!--====== Utility-Spacing ======-->
    <link rel="stylesheet" href="{{asset('store2/css/utility.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.0/css/font-awesome.min.css">

    <!--====== App ======-->
    <link rel="stylesheet" href="{{asset('store2/css/app.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.css">
    <style>
        .fade.show {
    opacity: 1;
}
.alert-warning {
    color: #856404;
    background-color: #fff3cd;
    border-color: #ffeeba;
}
.alert-dismissible {
    padding-right: 4rem;
}
.alert {
    position: relative;
    padding: .75rem 1.25rem;
    margin-bottom: 1rem;
    border: 1px solid transparent;
    border-radius: .25rem;
}
.fade {
    opacity: 0;
    transition: opacity .15s linear;
}
.close:not(:disabled):not(.disabled) {
    cursor: pointer;
}
.close:focus, .close:hover {
    color: #000;
    text-decoration: none;
    opacity: .75;
}
.alert-dismissible .close {
    position: absolute;
    top: 0;
    right: 0;
    padding: .75rem 1.25rem;
    color: inherit;
}
button.close {
    padding: 0;
    background-color: transparent;
    border: 0;
    -webkit-appearance: none;
}

.close {
    float: right;
    font-size: 1.5rem;
    font-weight: 700;
    line-height: 1;
    color: #000;
    text-shadow: 0 1px 0 #fff;
    opacity: .5;
}
    </style>
</head>
<body class="config" id="js-scrollspy-trigger">
    <div class="preloader is-active">
        <div class="preloader__wrap">

            <img class="preloader__img" src="{{asset('store2/images/logo/logo-2.png')}}" alt=""></div>
    </div>

    <!--====== Main App ======-->
    <div id="app">


        <!--====== Main Header ======-->
        <header class="header--style-2">

            <!--====== Nav 1 ======-->
            <nav class="primary-nav-wrapper">
                <div class="container">

                    <!--====== Primary Nav ======-->
                    <div class="primary-nav">

                        <!--====== Main Logo ======-->

                        <a class="main-logo" href="index-2.html">

                            <img width="75" src="{{asset($ms->logo??'store2/images/logo/logo-2.png')}}" alt=""></a>
                        <!--====== End - Main Logo ======-->

                        <!--====== Search Form ======-->
                        <form action="{{route('user.search')}}" method="get" class="main-form">
                            <label for="main-search"></label>
                            <input class="input-text input-text--border-radius input-text--style-2" type="text" id="main-search" name="n" placeholder="Search here" placeholder="Search">
                            <button class="btn btn--icon fas fa-search main-search-button" type="submit"></button>
                        </form>
                        <!--====== End - Search Form ======-->
                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation">
                            <button class="btn btn--icon toggle-button toggle-button--white fas fa-cogs" type="button"></button>
                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">
                                <span class="ah-close">✕ Close</span>
                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-white">
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Account">
                                        <a><i class="far fa-user-circle"></i></a>
                                        <!--====== Dropdown ======-->
                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">

@guest
                                            <li>
                                                <a href="{{route('user.signup')}}"><i class="fas fa-user-plus u-s-m-r-6"></i>
                                                    <span>Signup</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('user.login')}}"><i class="fas fa-lock u-s-m-r-6"></i>
                                                    <span>Signin</span>
                                                </a>
                                            </li>
@else
                                            <li>
                                                <a href="dashboard.html"><i class="fas fa-user-circle u-s-m-r-6"></i>
                                                    <span>Account</span>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{route('user.logout')}}"><i class="fas fa-lock-open u-s-m-r-6"></i>
                                                    <span>Signout</span>
                                                </a>
                                            </li>
@endguest

                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li class="has-dropdown" data-tooltip="tooltip" data-placement="left" title="Settings">
                                        <a><i class="fas fa-user-cog"></i></a>
                                        <!--====== Dropdown ======-->
                                        <span class="js-menu-toggle"></span>
                                        <ul style="width:120px">
                                            <li class="has-dropdown has-dropdown--ul-right-100">
                                                <a>Language<i class="fas fa-angle-down u-s-m-l-6"></i></a>
                                                <!--====== Dropdown ======-->
                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:120px">
                                                    <li><a class="{{$ms->language == 'en' ? 'u-c-brand':''}}">ENGLISH</a></li>
                                                    <li><a class="{{$ms->language == 'sw' ? 'u-c-brand':''}}">SWEDISH</a></li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                            <li class="has-dropdown has-dropdown--ul-right-100">

                                                <a>Currency<i class="fas fa-angle-down u-s-m-l-6"></i></a>

                                                <!--====== Dropdown ======-->

                                                <span class="js-menu-toggle"></span>
                                                <ul style="width:225px">
                                                    <li><a class="{{$ms->currency == 'dollar' ? 'u-c-brand':''}}">DOLLAR</a></li>
                                                    <li><a class="{{$ms->currency == 'krone'  ? 'u-c-brand':''}}">KRONE</a></li>
                                                </ul>
                                                <!--====== End - Dropdown ======-->
                                            </li>
                                        </ul>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Contact">

                                        <a href="tel:{{$ms->phone}}"><i class="fas fa-phone-volume"></i></a></li>
                                    <li data-tooltip="tooltip" data-placement="left" title="Mail">

                                        <a href="mailto:{{$ms->email}}"><i class="far fa-envelope"></i></a></li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Primary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 1 ======-->


            <!--====== Nav 2 ======-->
            <nav class="secondary-nav-wrapper">
                <div class="container">

                    <!--====== Secondary Nav ======-->
                    <div class="secondary-nav">

                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation1">

                            <button class="btn btn--icon toggle-mega-text toggle-button" type="button">M</button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

    <!--====== List ======-->
    <ul class="ah-list">
        <li class="has-dropdown">

            <span class="mega-text" style="width: max-content;padding:5px;height: max-content;">Categories</span>
            <span class="js-menu-toggle"></span>
            <div class="mega-menu">

            <!--====== Mega Menu ======-->
            <div class="mega-menu-wrap">

                    <div class="mega-menu-list">
                        <ul>
            @foreach ($cat as $key => $item)

                            <li class="{{$key == 0 ? 'js-active':''}}">
                                {{-- <li class="js-active"> --}}
                                <a href="{{route('user.search.cat',['id'=>$item->id])}}">
                                    <i class="{{$item->type}} u-s-m-r-6"></i>
                                    <span>{{$item->name}}</span>
                                </a>
                                <span class="js-menu-toggle"></span>
                            </li>
            @endforeach

                        </ul>
                    </div>
                    @foreach ($cat as $key => $item)
    <!--======  ======-->
    <div class="mega-menu-content {{$key == 0 ? 'js-active':''}}">
        {{-- <div class="mega-menu-content js-active"> --}}
        <div class="row">
            @foreach ($item->images as $i)
            <div class="col-lg-4 mega-image">
                <div class="mega-banner">
                    <a class="u-d-block" href="javascript:;">
                        <img class="u-img-fluid u-d-block" src="{{asset($i->image_path)}}" alt="">
                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    <!--====== End  ======-->
    @endforeach

</div>

</div>
<!--====== End - Mega Menu ======-->

                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation2">

                            <button class="btn btn--icon toggle-button toggle-button--white fas fa-cog" type="button"></button>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design2 ah-list--link-color-white">
                                    <li>

                                        <a href="javascript:;">NEW ARRIVALS</a></li>

                                    <li>

                                        <a href="{{route('user.search')}}">ALL PRODUCTS</a></li>
                                    <li>

                                        <a href="javascript:;">CUSTOM SEARCH</a></li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->


                        <!--====== Dropdown Main plugin ======-->
                        <div class="menu-init" id="navigation3">

                            <button class="btn btn--icon toggle-button toggle-button--white fas fa-shopping-bag toggle-button-shop" type="button"></button>

                            <span class="total-item-round">2</span>

                            <!--====== Menu ======-->
                            <div class="ah-lg-mode">

                                <span class="ah-close">✕ Close</span>

                                <!--====== List ======-->
                                <ul class="ah-list ah-list--design1 ah-list--link-color-white">
                                    <li>

                                        <a href="{{route('user.home')}}"><i class="fas fa-home u-c-brand"></i></a></li>
                                    <li>

                                        <a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                    <li class="has-dropdown">

                                        <a class="mini-cart-shop-link"><i class="fas fa-shopping-bag"></i>

                                            <span class="total-item-round">2</span></a>

                                        <!--====== Dropdown ======-->

                                        <span class="js-menu-toggle"></span>
                                        <div class="mini-cart">

                                            <!--====== Mini Product Container ======-->
                                            <div class="mini-product-container gl-scroll u-s-m-b-15">

                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="javascript:;">Electronics</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">Yellow Wireless Headphone</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/electronic/product18.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="javascript:;">Electronics</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">Nikon DSLR Camera 4k</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/women/product8.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="javascript:;">Women Clothing</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">New Dress D Nice Elegant</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->


                                                <!--====== Card for mini cart ======-->
                                                <div class="card-mini-product">
                                                    <div class="mini-product">
                                                        <div class="mini-product__image-wrapper">

                                                            <a class="mini-product__link" href="product-detail.html">

                                                                <img class="u-img-fluid" src="images/product/men/product8.jpg" alt=""></a></div>
                                                        <div class="mini-product__info-wrapper">

                                                            <span class="mini-product__category">

                                                                <a href="javascript:;">Men Clothing</a></span>

                                                            <span class="mini-product__name">

                                                                <a href="product-detail.html">New Fashion D Nice Elegant</a></span>

                                                            <span class="mini-product__quantity">1 x</span>

                                                            <span class="mini-product__price">$8</span></div>
                                                    </div>

                                                    <a class="mini-product__delete-link far fa-trash-alt"></a>
                                                </div>
                                                <!--====== End - Card for mini cart ======-->
                                            </div>
                                            <!--====== End - Mini Product Container ======-->


                                            <!--====== Mini Product Statistics ======-->
                                            <div class="mini-product-stat">
                                                <div class="mini-total">

                                                    <span class="subtotal-text">SUBTOTAL</span>

                                                    <span class="subtotal-value">$16</span></div>
                                                <div class="mini-action">

                                                    <a class="mini-link btn--e-brand-b-2" href="checkout.html">PROCEED TO CHECKOUT</a>

                                                    <a class="mini-link btn--e-transparent-secondary-b-2" href="cart.html">VIEW CART</a></div>
                                            </div>
                                            <!--====== End - Mini Product Statistics ======-->
                                        </div>
                                        <!--====== End - Dropdown ======-->
                                    </li>
                                </ul>
                                <!--====== End - List ======-->
                            </div>
                            <!--====== End - Menu ======-->
                        </div>
                        <!--====== End - Dropdown Main plugin ======-->
                    </div>
                    <!--====== End - Secondary Nav ======-->
                </div>
            </nav>
            <!--====== End - Nav 2 ======-->

        </header>
        <!--====== End - Main Header ======-->
        @yield('content')
        <!-- START Bootstrap-Cookie-Alert -->
        <div class="alert text-center cookiealert" style="position: fixed;bottom: 0" role="alert">
            <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website.
            <a href="https://cookiesandyou.com/" target="_blank">Learn more</a>
            <button type="button" class="btn btn-primary btn-sm acceptcookies">
                I agree
            </button>
        </div>
        <!-- END Bootstrap-Cookie-Alert -->

        <!--====== Main Footer ======-->
        <footer>
            <div class="outer-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="outer-footer__content u-s-m-b-40">

                                <span class="outer-footer__content-title">Contact Us</span>
                                <div class="outer-footer__text-wrap"><i class="fas fa-home"></i>
                                    <span>{{$ms->address}}</span></div>
                                <div class="outer-footer__text-wrap"><i class="fas fa-phone-volume"></i>
                                    <span>{{$ms->tel}}</span></div>
                                <div class="outer-footer__text-wrap"><i class="far fa-envelope"></i>
                                    <span>{{$ms->email}}</span></div>
                                    <div class="outer-footer__social">
                                        <ul>
                                            <li>
                                                <a class="s-fb--color-hover" href="{{$ms->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                            <li>
                                                <a class="s-tw--color-hover" href="{{$ms->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                            <li>

                                                <a class="s-youtube--color-hover" href="{{$ms->youtube}}"><i class="fab fa-youtube"></i></a></li>
                                            <li>

                                                <a class="s-insta--color-hover" href="{{$ms->instagram}}"><i class="fab fa-instagram"></i></a></li>
                                            <li>

                                                <a class="s-gplus--color-hover" href="{{$ms->google}}"><i class="fab fa-google-plus-g"></i></a></li>

                                            <li>
                                                <a class="s-gplus--color-hover" href="{{$ms->whatsapp}}"><i class="fab fa-whatsapp"></i></a></li>
                                        </ul>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">

                                        <span class="outer-footer__content-title">Information</span>
                                        <div class="outer-footer__list-wrap">
                                            <ul>
                                                <li>

                                                    <a href="cart.html">Cart</a></li>
                                                <li>

                                                    <a href="dashboard.html">Account</a></li>
                                                <li>

                                                    <a href="javascript:;">Manufacturer</a></li>
                                                <li>

                                                    <a href="dash-payment-option.html">Finance</a></li>
                                                <li>

                                                    <a href="javascript:;">Shop</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="outer-footer__content u-s-m-b-40">
                                        <div class="outer-footer__list-wrap">

                                            <span class="outer-footer__content-title">Our Company</span>
                                            <ul>
                                                <li>

                                                    <a href="about.html">About us</a></li>
                                                <li>

                                                    <a href="contact.html">Contact Us</a></li>
                                                <li>

                                                    <a href="index-2.html">Sitemap</a></li>
                                                <li>

                                                    <a href="dash-my-order.html">Delivery</a></li>
                                                <li>

                                                    <a href="javascript:;">Store</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="outer-footer__content">

                                <span class="outer-footer__content-title">Join our Newsletter</span>
                                <form class="newsletter">
                                    <div class="u-s-m-b-15">
                                        <div class="radio-box newsletter__radio">

                                            <input type="radio" id="male" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="male">Male</label></div>
                                        </div>
                                        <div class="radio-box newsletter__radio">

                                            <input type="radio" id="female" name="gender">
                                            <div class="radio-box__state radio-box__state--primary">

                                                <label class="radio-box__label" for="female">Female</label></div>
                                        </div>
                                    </div>
                                    <div class="newsletter__group">

                                        <label for="newsletter"></label>

                                        <input class="input-text input-text--only-white" type="text" id="newsletter" placeholder="Enter your Email">

                                        <button class="btn btn--e-brand newsletter__btn" type="submit">SUBSCRIBE</button></div>

                                    <span class="newsletter__text">Subscribe to the mailing list to receive updates on promotions, new arrivals, discount and coupons.</span>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="lower-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="lower-footer__content">
                                <div class="lower-footer__copyright">
                                    <span>Copyright © {{now()->format('Y')}}</span>
                                    <a href="http://sanofa.se">Sanofa</a>
                                    <span>All Right Reserved</span>
                                </div>
                                <div class="lower-footer__payment">
                                    <ul>
                                        <li><i class="fab fa-cc-stripe"></i></li>
                                        <li><i class="fab fa-cc-paypal"></i></li>
                                        <li><i class="fab fa-cc-mastercard"></i></li>
                                        <li><i class="fab fa-cc-visa"></i></li>
                                        <li><i class="fab fa-cc-discover"></i></li>
                                        <li><i class="fab fa-cc-amex"></i></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        <!--====== Modal Section ======-->


        <!--====== Quick Look Modal ======-->
        <div class="modal fade" id="quick-look">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal--shadow">

                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-5">

                                <!--====== Product Breadcrumb ======-->
                                <div class="pd-breadcrumb u-s-m-b-30">
                                    <ul class="pd-breadcrumb__list">
                                        <li class="has-separator">

                                            <a href="index.hml">Home</a></li>
                                        <li class="has-separator">

                                            <a href="javascript:;">Electronics</a></li>
                                        <li class="has-separator">

                                            <a href="javascript:;">DSLR Cameras</a></li>
                                        <li class="is-marked">

                                            <a href="javascript:;">Nikon Cameras</a></li>
                                    </ul>
                                </div>
                                <!--====== End - Product Breadcrumb ======-->


                                <!--====== Product Detail ======-->
                                <div class="pd u-s-m-b-30">
                                    <div class="pd-wrap">
                                        <div id="js-product-detail-modal">
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
                                        </div>
                                    </div>
                                    <div class="u-s-m-t-15">
                                        <div id="js-product-detail-modal-thumbnail">
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-1.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
                                            <div>

                                                <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div>
                                        </div>
                                    </div>
                                </div>
                                <!--====== End - Product Detail ======-->
                            </div>
                            <div class="col-lg-7">

                                <!--====== Product Right Side Details ======-->
                                <div class="pd-detail">
                                    <div>

                                        <span class="pd-detail__name">Nikon Camera 4k Lens Zoom Pro</span></div>
                                    <div>
                                        <div class="pd-detail__inline">

                                            <span class="pd-detail__price">$6.99</span>

                                            <span class="pd-detail__discount">(76% OFF)</span><del class="pd-detail__del">$28.97</del></div>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>

                                            <span class="pd-detail__review u-s-m-l-4">

                                                <a href="product-detail.html">23 Reviews</a></span></div>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__inline">

                                            <span class="pd-detail__stock">200 in stock</span>

                                            <span class="pd-detail__left">Only 2 left</span></div>
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <span class="pd-detail__preview-desc">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</span></div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__inline">

                                            <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                                <a href="signin.html">Add to Wishlist</a>

                                                <span class="pd-detail__click-count">(222)</span></span></div>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <div class="pd-detail__inline">

                                            <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                                <a href="signin.html">Email me When the price drops</a>

                                                <span class="pd-detail__click-count">(20)</span></span></div>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <ul class="pd-social-list">
                                            <li>

                                                <a class="s-fb--color-hover" href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li>

                                                <a class="s-tw--color-hover" href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li>

                                                <a class="s-insta--color-hover" href="#"><i class="fab fa-instagram"></i></a></li>
                                            <li>

                                                <a class="s-wa--color-hover" href="#"><i class="fab fa-whatsapp"></i></a></li>
                                            <li>

                                                <a class="s-gplus--color-hover" href="#"><i class="fab fa-google-plus-g"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <form class="pd-detail__form">
                                            <div class="pd-detail-inline-2">
                                                <div class="u-s-m-b-15">

                                                    <!--====== Input Counter ======-->
                                                    <div class="input-counter">

                                                        <span class="input-counter__minus fas fa-minus"></span>

                                                        <input class="input-counter__text input-counter--text-primary-style" type="text" value="1" data-min="1" data-max="1000">

                                                        <span class="input-counter__plus fas fa-plus"></span></div>
                                                    <!--====== End - Input Counter ======-->
                                                </div>
                                                <div class="u-s-m-b-15">

                                                    <button class="btn btn--e-brand-b-2" type="submit">Add to Cart</button></div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="u-s-m-b-15">

                                        <span class="pd-detail__label u-s-m-b-8">Product Policy:</span>
                                        <ul class="pd-detail__policy-list">
                                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                <span>Buyer Protection.</span></li>
                                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                <span>Full Refund if you don't receive your order.</span></li>
                                            <li><i class="fas fa-check-circle u-s-m-r-8"></i>

                                                <span>Returns accepted if product not as described.</span></li>
                                        </ul>
                                    </div>
                                </div>
                                <!--====== End - Product Right Side Details ======-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Quick Look Modal ======-->


        <!--====== Add to Cart Modal ======-->
        <div class="modal fade" id="add-to-cart">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal-radius modal-shadow">

                    <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <div class="success u-s-m-b-30">
                                    <div class="success__text-wrap"><i class="fas fa-check"></i>

                                        <span>Item is added successfully!</span></div>
                                    <div class="success__img-wrap">

                                        <img class="u-img-fluid" src="images/product/electronic/product1.jpg" alt=""></div>
                                    <div class="success__info-wrap">

                                        <span class="success__name">Beats Bomb Wireless Headphone</span>

                                        <span class="success__quantity">Quantity: 1</span>

                                        <span class="success__price">$170.00</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="s-option">

                                    <span class="s-option__text">1 item (s) in your cart</span>
                                    <div class="s-option__link-box">

                                        <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>

                                        <a class="s-option__link btn--e-white-brand-shadow" href="cart.html">VIEW CART</a>

                                        <a class="s-option__link btn--e-brand-shadow" href="checkout.html">PROCEED TO CHECKOUT</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Add to Cart Modal ======-->


        <!--====== Newsletter Subscribe Modal ======-->
        <div class="modal fade new-l" id="newsletter-modal">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content modal--shadow">

                    <button class="btn new-l__dismiss fas fa-times" type="button" data-dismiss="modal"></button>
                    <div class="modal-body">
                        <div class="row u-s-m-x-0">
                            <div class="col-lg-6 new-l__col-1 u-s-p-x-0">

                                <a class="new-l__img-wrap u-d-block" href="javascript:;">

                                    <img class="u-img-fluid u-d-block" src="images/newsletter/newsletter.jpg" alt=""></a></div>
                            <div class="col-lg-6 new-l__col-2">
                                <div class="new-l__section u-s-m-t-30">
                                    <div class="u-s-m-b-8 new-l--center">
                                        <h3 class="new-l__h3">Newsletter</h3>
                                    </div>
                                    <div class="u-s-m-b-30 new-l--center">
                                        <p class="new-l__p1">Sign up for emails to get the scoop on new arrivals, special sales and more.</p>
                                    </div>
                                    <form class="new-l__form">
                                        <div class="u-s-m-b-15">

                                            <input class="news-l__input" type="text" placeholder="E-mail Address"></div>
                                        <div class="u-s-m-b-15">

                                            <button class="btn btn--e-brand-b-2" type="submit">Sign up!</button></div>
                                    </form>
                                    <div class="u-s-m-b-15 new-l--center">
                                        <p class="new-l__p2">By Signing up, you agree to receive Reshop offers,<br />promotions and other commercial messages. You may unsubscribe at any time.</p>
                                    </div>
                                    <div class="u-s-m-b-15 new-l--center">

                                        <a class="new-l__link" data-dismiss="modal">No Thanks</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Newsletter Subscribe Modal ======-->
        <!--====== End - Modal Section ======-->
    </div>
    <!--====== End - Main App ======-->


    {{-- <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> --}}
    <!--====== Vendor Js ======-->
    <script src="{{asset('store2/js/vendor.js')}}"></script>
    <script src="{{asset('js/dist/jquery.validate.js')}}"></script>

    <!--====== jQuery Shopnav plugin ======-->
    <script src="{{asset('store2/js/jquery.shopnav.js')}}"></script>

    <!--====== App ======-->
    <script src="{{asset('store2/js/app.js')}}"></script>

<!-- Include cookiealert script -->
<script src="https://cdn.jsdelivr.net/gh/Wruczek/Bootstrap-Cookie-Alert@gh-pages/cookiealert.js"></script>

@yield('js')
    <!--====== Noscript ======-->
    <noscript>
        <div class="app-setting">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="app-setting__wrap">
                            <h1 class="app-setting__h1">JavaScript is disabled in your browser.</h1>

                            <span class="app-setting__text">Please enable JavaScript in your browser or upgrade to a JavaScript-capable browser.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </noscript>
</body>
</html>
