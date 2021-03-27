@extends('store2.customer_dashboard_layout')
@section('customer_content')
<div class="col-lg-9 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
        <div class="dash__pad-2">
            <h1 class="dash__h1 u-s-m-b-14">Add new Address</h1>

            <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>
            <form class="dash-address-manipulation" method="POST">
                @csrf
                <div class="gl-inline">
                    <div class="u-s-m-b-30">

                        <label class="gl-label" for="address-fname">Address *</label>

                        <input class="input-text input-text--primary-style" type="text" name="address" required placeholder="Address"></div>
                    <div class="u-s-m-b-30">

                        <label class="gl-label" for="address-lname">Phone Number *</label>

                        <input class="input-text input-text--primary-style" type="text" name="phone" placeholder="Phone Number" required></div>
                </div>
                <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
            </form>
        </div>
    </div>
</div>
@endsection
