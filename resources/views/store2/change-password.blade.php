
@extends('store2.layout_master')
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
                                <a href="{{route('dashboard.users.form.change.password')}}">Change Password</a></li>
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
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <div class="l-f-o__form">
                                    <form class="l-f-o__form" method="post">
                                        @csrf
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="login-email">OLD PASSWORD *</label>
                                        <input class="input-text input-text--primary-style" type="text" name="old_password"  placeholder="Enter Old Password">
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <label class="gl-label" for="login-password">NEW PASSWORD *</label>
                                        <input class="input-text input-text--primary-style" type="password" name="password" placeholder="Enter Password">
                                    </div>
                                        <div class="u-s-m-b-30">
                                            <label class="gl-label" for="login-password">REPEAT PASSWORD *</label>
                                            <input class="input-text input-text--primary-style" type="password" name="password_confirmation" placeholder="Enter Password">
                                        </div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">
                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">Change</button>
                                        </div>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 2 ======-->
</div>
@endsection
