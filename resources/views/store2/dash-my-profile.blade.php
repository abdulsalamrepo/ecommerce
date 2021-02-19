@extends('store2.customer_dashboard_layout')
@section('customer_content')
<div class="col-lg-9 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
        <div class="dash__pad-2">
            <h1 class="dash__h1 u-s-m-b-14">My Profile</h1>

            <span class="dash__text u-s-m-b-30">Look all your info, you could customize your profile.</span>
            <div class="row">
                <div class="col-lg-4 u-s-m-b-30">
                    <h2 class="dash__h2 u-s-m-b-8">Full Name</h2>

                    <span class="dash__text">John Doe</span>
                </div>
                <div class="col-lg-4 u-s-m-b-30">
                    <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                    <span class="dash__text">johndoe@domain.com</span>
                    <div class="dash__link dash__link--secondary">

                        <a href="#">Change</a></div>
                </div>
                <div class="col-lg-4 u-s-m-b-30">
                    <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                    <span class="dash__text">Please enter your mobile</span>
                    <div class="dash__link dash__link--secondary">

                        <a href="#">Add</a></div>
                </div>
                <div class="col-lg-4 u-s-m-b-30">
                    <h2 class="dash__h2 u-s-m-b-8">Birthday</h2>

                    <span class="dash__text">1991-02-02</span>
                </div>
                <div class="col-lg-4 u-s-m-b-30">
                    <h2 class="dash__h2 u-s-m-b-8">Gender</h2>

                    <span class="dash__text">Male</span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="dash__link dash__link--secondary u-s-m-b-30">

                        <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
                    <div class="u-s-m-b-16">

                        <a class="dash__custom-link btn--e-transparent-brand-b-2" href="dash-edit-profile.html">Edit Profile</a></div>
                    <div>

                        <a class="dash__custom-link btn--e-brand-b-2" href="#">Change Password</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
