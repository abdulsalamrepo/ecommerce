@extends('store2.layout_master')
@section('head')
@yield('headc')
@endsection
@section('content')
<div class="app-content">
    @include('includes.errors')
    @include('includes.success')
    <!--====== Section 1 ======-->
    <div class="u-s-p-y-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="breadcrumb">
                    <div class="breadcrumb__wrap">
                        <ul class="breadcrumb__list">
                            <li class="has-separator">

                                <a href="{{route('user.home')}}">Home</a></li>
                            <li class="is-marked">

                                <a href="dashboard.html">My Account</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="dash">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-12">

                            <!--====== Dashboard Features ======-->
                            <div class="dash__box dash__box--bg-white dash__box--shadow u-s-m-b-30">
                                <div class="dash__pad-1">

                                    <span class="dash__text u-s-m-b-16">Hello, {{$user->first_name . ' ' . $user->last_name}}</span>
                                    <ul class="dash__f-list">
                                        <li>

                                            <a class="dash-active" href="{{route('dashboard.user.dashboard')}}">Manage My Account</a></li>
                                        <li>

                                            <a href="{{route('dashboard.user.profile')}}">My Profile</a></li>
                                        <li>

                                            <a href="{{route('dashboard.user.address')}}">Address Book</a></li>
                                        {{-- <li>

                                            <a href="dash-track-order.html">Track Order</a></li> --}}
                                        <li>

                                            <a href="{{route('dashboard.my.order')}}">My Orders</a></li>
                                        {{-- <li>

                                            <a href="dash-payment-option.html">My Payment Options</a></li> --}}
                                        {{-- <li>

                                            <a href="dash-cancellation.html">My Returns &amp; Cancellations</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                            <div class="dash__box dash__box--bg-white dash__box--shadow dash__box--w">
                                <div class="dash__pad-1">
                                    <ul class="dash__w-list">
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-1"><i class="fas fa-cart-arrow-down"></i></span>

                                                <span class="dash__w-text">4</span>

                                                <span class="dash__w-name">Orders Placed</span></div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-2"><i class="fas fa-times"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Cancel Orders</span></div>
                                        </li>
                                        <li>
                                            <div class="dash__w-wrap">

                                                <span class="dash__w-icon dash__w-icon-style-3"><i class="far fa-heart"></i></span>

                                                <span class="dash__w-text">0</span>

                                                <span class="dash__w-name">Wishlist</span></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!--====== End - Dashboard Features ======-->
                        </div>
                        @yield('customer_content')
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>

@endsection
