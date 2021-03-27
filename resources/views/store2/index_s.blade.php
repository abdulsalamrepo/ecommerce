@extends('store2.layout_master')
@section('content')
<!--====== App Content ======-->
        <div class="app-content">
            <div class="fixed-list">
                <ul class="nav" style="height: 250px; overflow: auto;" id="init-scrollspy">
                    @foreach ($categories as $item)
                    <li><a class="nav-link" title="{{$item->name}}" href="#category{{$item->id}}" data-click-scroll="#category{{$item->id}}"><i class="category{{$item->type}}"></i></a></li>
                    @endforeach
                </ul>
            </div>
            <!--====== Anti Flash White Background ======-->
            <div class="bg-anti-flash-white">
                <!--====== White Container ======-->
                <div class="white-container">
                    <div class="container" style="padding:25px;">
                        <!--====== Primary Slider ======-->
                        <div class="s-skeleton s-skeleton--h-600 s-skeleton--bg-black">
                            <div class="owl-carousel primary-style-2" id="hero-slider">
                                @foreach ($slides as $slide)
                                <div class="hero-slide " style="background-image: url({{asset($slide->img)}})">
                                    <div class="primary-style-2-container">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="slider-content slider-content--animation">
                                                    <span class="content-span-1 u-c-white">{{$slide->row1}}</span>
                                                    <span class="content-span-2 u-c-white">{{$slide->row2}}</span>
                                                    <span class="content-span-3 u-c-white">{{$slide->row3}}</span>
                                                    <span class="content-span-4 u-c-white">{{$slide->row4}}
                                                        <span class="u-c-brand">{{$slide->row5}}</span>
                                                    </span>
                                                    <a class="shop-now-link btn--e-brand" href="{{$slide->href_button}}">{{$slide->text_button}}</a></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                        </div>
                        <!--====== End - Primary Slider ======-->
                    </div>

                    <!--====== Section 1 ======-->

{{--
                    <!--====== Electronic Category ======-->
                    <div class="u-s-p-y-60" id="electronic-01">

                        <!--====== Section Intro ======-->
                        <div class="section__intro u-s-m-b-46">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="block">

                                            <span class="block__title">ELECTRONIC TOP CATEGORY</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Section Intro ======-->


                        <!--====== Section Content ======-->
                        <div class="section__content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                                        <div class="category-o">
                                            <div class="aspect aspect--bg-grey aspect--square category-o__img-wrap">

                                                <img class="aspect__img category-o__img" src="images/product/electronic/product23.jpg" alt=""></div>
                                            <div class="category-o__info">

                                                <a class="category-o__shop-now btn--e-white-brand" href="shop-side-version-2.html">Laptops</a></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                                        <div class="category-o">
                                            <div class="aspect aspect--bg-grey aspect--square category-o__img-wrap">

                                                <img class="aspect__img category-o__img" src="images/product/electronic/product35.jpg" alt=""></div>
                                            <div class="category-o__info">

                                                <a class="category-o__shop-now btn--e-white-brand" href="shop-side-version-2.html">Smartphones</a></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                                        <div class="category-o">
                                            <div class="aspect aspect--bg-grey aspect--square category-o__img-wrap">

                                                <img class="aspect__img category-o__img" src="images/product/electronic/product3.jpg" alt=""></div>
                                            <div class="category-o__info">

                                                <a class="category-o__shop-now btn--e-white-brand" href="shop-side-version-2.html">Headphones</a></div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 u-s-m-b-30">
                                        <div class="category-o">
                                            <div class="aspect aspect--bg-grey aspect--square category-o__img-wrap">

                                                <img class="aspect__img category-o__img" src="images/product/electronic/product32.jpg" alt=""></div>
                                            <div class="category-o__info">

                                                <a class="category-o__shop-now btn--e-white-brand" href="shop-side-version-2.html">TV's</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Section Content ======-->
                    </div> --}}

                    <!--====== Electronic Category ======-->
                    <!--====== End - Section 1 ======-->


                    <!--====== Section 2 ======-->

@foreach ($categories as $key => $item)
                    <!--====== Electronics Tab ======-->
                    <div class="u-s-p-b-60">
                        <!--====== Section Intro ======-->
                        <div class="section__intro u-s-m-b-46">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="block">
                                            <span class="block__title">{{$item->name}}</span>
                                            <ul class="nav tab-list">
                                                {{-- <li class="nav-item"><a class="nav-link btn--e-white-brand-shadow" data-toggle="tab" href="#e-l-p">LATEST PRODUCTS</a></li>
                                                <li class="nav-item"><a class="nav-link btn--e-white-brand-shadow active" data-toggle="tab" href="#e-b-s">BEST SELLING</a></li>
                                                <li class="nav-item"><a class="nav-link btn--e-white-brand-shadow" data-toggle="tab" href="#e-t-r">TOP RATING</a></li> --}}
                                                {{-- <li class="nav-item"><a class="nav-link btn--e-white-brand-shadow" data-toggle="tab" href="#e-f-p{{$item->id}}">FEATURED PRODUCTS</a></li> --}}
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Section Intro ======-->
                        <!--====== Section Content ======-->
                        <div class="section__content">
                            <div class="container">
                                <div class="tab-content">
                                    {{-- <!--====== Tab 1 ======-->
                                    <div class="tab-pane" id="e-l-p">
                                        <div class="slider-fouc">
                                            <div class="owl-carousel tab-slider" data-item="4">
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Tab 1 ======-->


                                    <!--====== Tab 2 ======-->
                                    <div class="tab-pane fade show active" id="e-b-s">
                                        <div class="slider-fouc">
                                            <div class="owl-carousel tab-slider" data-item="4">
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Tab 2 ======-->


                                    <!--====== Tab 3 ======-->
                                    <div class="tab-pane" id="e-t-r">
                                        <div class="slider-fouc">
                                            <div class="owl-carousel tab-slider" data-item="4">
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Tab 3 ======--> --}}


                                    <!--====== Tab 4 ======-->
                                    <div class="tab-pane fade show active" id="category{{$item->id}}">
                                        <div class="slider-fouc">
                                            <div class="owl-carousel tab-slider" data-item="4">
                                    @foreach ($item->products as $i)
                                                <div class="u-s-m-b-30">
                                                    <div class="product-o product-o--hover-on">
                                                        <div class="product-o__wrap">
                                                            <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">
{{-- <img class="aspect__img" src="{{asset('uploads/products/'.$i->id.'/'.$i->image_name)}}" alt=""></a> --}}
<img class="aspect__img" src="{{asset($i->image_name)}}" alt=""></a>
                                                        @if (Session::has('user'))
                                                            <div class="product-o__action-wrap">
                                                                <ul class="product-o__action-list">
                                                                    <li><a data-modal="modal" data-modal-id="#quick-look{{$i->id}}" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                                                    <li><a class="addToCart" data-modal="modal" data-modal-id="#add-to-cart" data-id="{{$i->id}}"   data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                                                    <li><a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                                                    <li><a href="javascript:;" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                                                </ul>
                                                            </div>
                                                        @endif

                                                        </div>

                                                        <span class="product-o__category"><a href="javascript:;">{{$item->name}}</a></span>
                                                        <span class="product-o__name"><a href="javascript:;">{{$i->name}}</a></span>
                                                        <div class="product-o__rating gl-rating-style">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span class="product-o__review">(23)</span>
                                                        </div>
                                                            <span class="product-o__price">{{$i->price}}
                                                            <span class="product-o__discount">{{$i->discount}}</span>
                                                            </span>
                                                    </div>
                                                </div>


                                    @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    <!--====== End - Tab 4 ======-->
                                </div>
                            </div>
                        </div>
                        <!--====== End - Section Content ======-->
                    </div>
@endforeach

                    <!--====== End - Electronics Tab ======-->
                    <!--====== End - Section 2 ======-->

                    <!--====== Section 7 ======-->
                    <div class="u-s-p-b-60">

                        <!--====== Section Intro ======-->
                        {{-- <div class="section__intro u-s-m-b-46">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section__text-wrap">
                                            <h1 class="section__heading u-c-secondary u-s-m-b-12">EXCLUSIVE PRODUCT</h1>

                                            <span class="section__span u-c-silver">FIND EXCLUSIVE PRODUCT</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                        <!--====== End - Section Intro ======-->


                        <!--====== Section Content ======-->
                        {{-- <div class="section__content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-6 u-s-m-b-30">
                                        <div class="x-product u-h-100">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <ul class="x-product__feature-list">
                                                        <li class="feature">

                                                            <span class="feature__name">NAME</span>

                                                            <span class="feature__value">New Fashion A Sweater</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">PRICE</span>

                                                            <span class="feature__value">$125.00</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">COLOR</span>

                                                            <span class="feature__value">Black</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">SIZE</span>

                                                            <span class="feature__value">XL</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">MATERIAL</span>

                                                            <span class="feature__value">Cotton</span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="x-product__img-wrap">

                                                        <a class="u-d-block" href="product-detail.html">

                                                            <img class="u-d-block u-img-fluid" src="" alt=""></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 u-s-m-b-30">
                                        <div class="x-product u-h-100">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 col-sm-4">
                                                    <ul class="x-product__feature-list">
                                                        <li class="feature">

                                                            <span class="feature__name">NAME</span>

                                                            <span class="feature__value">New Fashion A Nice Elegant</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">PRICE</span>

                                                            <span class="feature__value">$125.00</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">COLOR</span>

                                                            <span class="feature__value">White Black</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">SIZE</span>

                                                            <span class="feature__value">XL</span></li>
                                                        <li class="feature">

                                                            <span class="feature__name">MATERIAL</span>

                                                            <span class="feature__value">Cotton</span></li>
                                                    </ul>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-8">
                                                    <div class="x-product__img-wrap">

                                                        <a class="u-d-block" href="product-detail.html">

                                                            <img class="u-d-block u-img-fluid" src="" alt=""></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!--====== Section Content ======-->
                    </div>
                    <!--====== End - Section 7 ======-->


                    <!--====== Section 10 ======-->
                    <div class="u-s-p-b-60">

                        <!--====== Section Content ======-->
                        <div class="section__content">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="service u-h-100">
                                            <div class="service__icon"><i class="fas fa-truck"></i></div>
                                            <div class="service__info-wrap">

                                                <span class="service__info-text-1">Free Shipping</span>

                                                <span class="service__info-text-2">Free shipping on all US order or order above $200</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="service u-h-100">
                                            <div class="service__icon"><i class="fas fa-redo"></i></div>
                                            <div class="service__info-wrap">

                                                <span class="service__info-text-1">Shop with Confidence</span>

                                                <span class="service__info-text-2">Our Protection covers your purchase from click to delivery</span></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4 col-md-6 u-s-m-b-30">
                                        <div class="service u-h-100">
                                            <div class="service__icon"><i class="fas fa-headphones-alt"></i></div>
                                            <div class="service__info-wrap">

                                                <span class="service__info-text-1">24/7 Help Center</span>

                                                <span class="service__info-text-2">Round-the-clock assistance for a smooth shopping experience</span></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--====== End - Section Content ======-->
                    </div>
                    <!--====== End - Section 10 ======-->
                </div>
                <!--====== End - White Container ======-->
            </div>
            <!--====== End - Anti Flash White Background ======-->
        </div>

        <!--====== End - App Content ======-->
        @foreach ($categories as $item)
        @foreach ($item->products as $key => $i)
                <!--====== Quick Look Modal ======-->
                <div class="modal fade" id="quick-look{{$i->id}}">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content modal--shadow">
                            <button class="btn dismiss-button fas fa-times" type="button" data-dismiss="modal"></button>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-lg-5">

                                        <!--====== Product Breadcrumb ======-->
                                        {{-- <div class="pd-breadcrumb u-s-m-b-30">
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
                                        </div> --}}
                                        <!--====== End - Product Breadcrumb ======-->


                                        <!--====== Product Detail ======-->
                                        <div class="pd u-s-m-b-30">
                                            <div class="pd-wrap">
                                                <div id="js-product-detail-modal">
                                                    <div>
                                                        <img class="u-img-fluid" src="{{asset('uploads/products/'.$i->id.'/'.$i->image_name)}}" alt=""></a>
                                                    </div>
                                                    {{-- <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
                                                    <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
                                                    <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
                                                    <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div> --}}
                                                </div>
                                            </div>
                                            <div class="u-s-m-t-15">
                                                <div id="js-product-detail-modal-thumbnail">
                                                    <div><img class="u-img-fluid" src="{{asset('uploads/products/'.$i->id.'/'.$i->image_name)}}" style=" width:60px;" alt=""></a></div>
                                                    {{-- <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-2.jpg" alt=""></div>
                                                    <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-3.jpg" alt=""></div>
                                                    <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-4.jpg" alt=""></div>
                                                    <div>
                                                        <img class="u-img-fluid" src="images/product/product-d-5.jpg" alt=""></div> --}}
                                                </div>
                                            </div>
                                        </div>
                                        <!--====== End - Product Detail ======-->
                                    </div>
                                    <div class="col-lg-7">

                                        <!--====== Product Right Side Details ======-->
                                        <div class="pd-detail">
                                            <div>

                                                <span class="pd-detail__name">{{$i->name}}</span></div>
                                            <div>
                                                <div class="pd-detail__inline">

                                                    <span class="pd-detail__price">{{$i->discount}}</span>

                                                    <span class="pd-detail__discount">({{(($i->price - $i->discount)*100)/$i->price}}% OFF)</span><del class="pd-detail__del">${{$i->price}}</del></div>
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <div class="pd-detail__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                                                    <span class="pd-detail__review u-s-m-l-4">
                                                        <a href="javascript:;">23 Reviews</a></span></div>
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <div class="pd-detail__inline">

                                                    <span class="pd-detail__stock">200 in stock</span>

                                                    <span class="pd-detail__left">Only 2 left</span></div>
                                            </div>
                                            <div class="u-s-m-b-15">

                                                <span class="pd-detail__preview-desc">{!!$i->description!!}</span></div>
                                            {{-- <div class="u-s-m-b-15">
                                                <div class="pd-detail__inline">

                                                    <span class="pd-detail__click-wrap"><i class="far fa-heart u-s-m-r-6"></i>

                                                        <a href="signin.html">Add to Wishlist</a>

                                                        <span class="pd-detail__click-count">(222)</span></span></div>
                                            </div> --}}
                                            {{-- <div class="u-s-m-b-15">
                                                <div class="pd-detail__inline">

                                                    <span class="pd-detail__click-wrap"><i class="far fa-envelope u-s-m-r-6"></i>

                                                        <a href="signin.html">Email me When the price drops</a>

                                                        <span class="pd-detail__click-count">(20)</span></span></div>
                                            </div> --}}
                                            {{-- <div class="u-s-m-b-15">
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
                                            </div> --}}
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
                                                            <button class="btn btn--e-brand-b-2 addToCartM" data-id="{{$i->id}}" type="button">Add to Cart</button></div>
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

                                        <img class="u-img-fluid" src="{{asset('uploads/products/'.$i->id.'/'.$i->image_name)}}" alt=""></a></div>
                                    <div class="success__info-wrap">

                                        <span class="success__name">{{$i->name}}</span>

                                        <span class="success__quantity">Quantity: 1</span>

                                        <span class="success__price">${{$i->discount}}</span></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="s-option">

                                    <span class="s-option__text">1 item (s) in your cart</span>
                                    <div class="s-option__link-box">
                                        <a class="s-option__link btn--e-white-brand-shadow" data-dismiss="modal">CONTINUE SHOPPING</a>
                                        <a class="s-option__link btn--e-white-brand-shadow" href="{{route('user.cart')}}">VIEW CART</a>
                                        <a class="s-option__link btn--e-brand-shadow" href="#">PROCEED TO CHECKOUT</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Add to Cart Modal ======-->

@endforeach
@endforeach
        @endsection
@section('js')
<script>
    $(document).ready(function () {
        $('.addToCart').click(function () {
            addToCart($(this).data('id'),1)
        });
        $('.addToCartM').click(function () {
            addToCart($(this).data('id'),$(this).parent().parent().find('.input-counter').find('input').val())
        });

        function addToCart(id,quantity) {
        let token = "{{CSRF_TOKEN()}}"
         $.ajax({
             type: "post",
             url: "{{route('user.addToCart')}}",
             data: {
                 _token:token,id,quantity
             },
             dataType: "JSON",
             success: function (response) {
                Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Add to cart has been successfully',
                showConfirmButton: false,
                timer: 1500
                })
                location.reload()
             }
         });
        }
    });
</script>

@endsection
