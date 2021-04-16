@extends('store2.layout_master')
@section('content')
<!--====== App Content ======-->
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
                            <li class="has-separator"><a href="{{route('user.home')}}">Home</a></li>
                            <li class="is-marked"><a href="{{route('user.checkout')}}">Checkout</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->
    <!--====== Section 2 ======-->
    {{-- <div class="u-s-p-b-60">
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div id="checkout-msg-group">
                            <div class="msg u-s-m-b-30">

                                <span class="msg__text">Returning customer?

                                    <a class="gl-link" href="#return-customer" data-toggle="collapse">Click here to login</a></span>
                                <div class="collapse" id="return-customer" data-parent="#checkout-msg-group">
                                    <div class="l-f u-s-m-b-16">

                                        <span class="gl-text u-s-m-b-16">If you have an account with us, please log in.</span>
                                        <form class="l-f__form">
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="login-email">E-MAIL *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="login-email" placeholder="Enter E-mail"></div>
                                                <div class="u-s-m-b-15">

                                                    <label class="gl-label" for="login-password">PASSWORD *</label>

                                                    <input class="input-text input-text--primary-style" type="text" id="login-password" placeholder="Enter Password"></div>
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-15">

                                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button></div>
                                                <div class="u-s-m-b-15">

                                                    <a class="gl-link" href="lost-password.html">Lost Your Password?</a></div>
                                            </div>

                                            <!--====== Check Box ======-->
                                            <div class="check-box">

                                                <input type="checkbox" id="remember-me">
                                                <div class="check-box__state check-box__state--primary">

                                                    <label class="check-box__label" for="remember-me">Remember Me</label></div>
                                            </div>
                                            <!--====== End - Check Box ======-->
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="msg">

                                <span class="msg__text">Have a coupon?

                                    <a class="gl-link" href="#have-coupon" data-toggle="collapse">Click Here to enter your code</a></span>
                                <div class="collapse" id="have-coupon" data-parent="#checkout-msg-group">
                                    <div class="c-f u-s-m-b-16">

                                        <span class="gl-text u-s-m-b-16">Enter your coupon code if you have one.</span>
                                        <form class="c-f__form">
                                            <div class="u-s-m-b-16">
                                                <div class="u-s-m-b-15">

                                                    <label for="coupon"></label>

                                                    <input class="input-text input-text--primary-style" type="text" id="coupon" placeholder="Coupon Code"></div>
                                                <div class="u-s-m-b-15">

                                                    <button class="btn btn--e-transparent-brand-b-2" type="submit">APPLY</button></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div> --}}
    <!--====== End - Section 2 ======-->
    <!--====== Section 3 ======-->
    <div class="u-s-p-b-60">
        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="checkout-f">
                    <div class="row">
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">DELIVERY INFORMATION</h1>
                            <form class="checkout-f__delivery" id="formaa" method="POST" action="{{route('user.proceed.checkout')}}">
                                @csrf
                                <button id="butt" style="display: none"></button>
                                <div class="u-s-m-b-30">
                                    {{-- <div class="u-s-m-b-15">
                                        <!--====== Check Box ======-->
                                        <div class="check-box">
                                            <input type="checkbox" id="get-address" name="defaultSipping">
                                            <div class="check-box__state check-box__state--primary">
                                                <label class="check-box__label" for="get-address">Use default shipping address from account</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->
                                    </div> --}}
                                    <!--====== First Name, Last Name ======-->
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-fname">FIRST NAME *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="billing-fname" name="fname" data-bill="" required>
                                        </div>
                                        <div class="u-s-m-b-15">
                                            <label class="gl-label" for="billing-lname">LAST NAME *</label>
                                            <input class="input-text input-text--primary-style" type="text" id="billing-lname" name="lname" data-bill="" required>
                                        </div>
                                    </div>
                                    <!--====== End - First Name, Last Name ======-->
                                    <!--====== PHONE ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-phone">PHONE *</label>
                                        <input class="input-text input-text--primary-style" type="text" name="phone" id="billing-phone" data-bill="" required>
                                    </div>
                                    <!--====== End - PHONE ======-->
                                    <!--====== Country ======-->
                                    <div class="u-s-m-b-15">
                                        <!--====== Select Box ======-->
                                        <label class="gl-label" for="billing-country">COUNTRY *</label>
                                        <select class="select-box select-box--primary-style" id="billing-country" name="country" data-bill="" required>
                                            <option selected value="">Choose Country</option>
                                            <option value="se">Sweden (SE)</option>
                                            <option value="sy">Syrian Arab Republic (SY)</option>
                                        </select>
                                        <!--====== End - Select Box ======-->
                                    </div>
                                    <!--====== End - Country ======-->
                                    <!--====== Town / City ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-town-city">TOWN/CITY *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="billing-town-city" name="city" data-bill="" required>
                                    </div>
                                    <!--====== End - Town / City ======-->
                                    <!--====== STATE/PROVINCE ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-state">STATE/PROVINCE *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="billing-state" name="state" data-bill="" required>
                                    </div>
                                    <!--====== Street Address ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-street">STREET ADDRESS *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="billing-street" placeholder="" name="street" data-bill="" required>
                                    </div>
                                    <!--====== End - Street Address ======-->

                                    <!--====== ZIP/POSTAL ======-->
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-zip">ZIP/POSTAL CODE *</label>
                                        <input class="input-text input-text--primary-style" type="text" id="billing-zip" placeholder="Zip/Postal Code" name="zip" data-bill=""required>
                                    </div>
                                    <!--====== End - ZIP/POSTAL ======-->
                                    <div class="u-s-m-b-10">

                                        <!--====== Check Box ======-->
                                        {{-- <div class="check-box">

                                            <input type="checkbox" id="make-default-address" data-bill="">
                                            <div class="check-box__state check-box__state--primary">

                                                <label class="check-box__label" for="make-default-address">Make default shipping and billing address</label></div>
                                        </div> --}}
                                        <!--====== End - Check Box ======-->
                                    </div>
                                    {{-- <div class="u-s-m-b-10">

                                        <a class="gl-link" href="#create-account" data-toggle="collapse">Want to create a new account?</a></div>
                                    <div class="collapse u-s-m-b-15" id="create-account">

                                        <span class="gl-text u-s-m-b-15">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</span>
                                        <div>

                                            <label class="gl-label" for="reg-password">Account Password *</label>

                                            <input class="input-text input-text--primary-style" type="text" data-bill id="reg-password"></div>
                                    </div> --}}
                                    <div class="u-s-m-b-10">
                                        <label class="gl-label" for="order-note">ORDER NOTE</label>
                                        <textarea class="text-area text-area--primary-style" id="order-note" name="notes"></textarea>
                                    </div>
                                    <div class="u-s-m-b-15">
                                        <label class="gl-label" for="billing-swish">Swish Number *</label>
                                        <input class="input-text input-text--primary-style" type="number" placeholder="Swish Number without +" name="swish" id="billing-swish" data-bill="" required>
                                    </div>
                                    <div class="o-summary__section u-s-m-b-30">
                                        <div class="o-summary__box">
                                            <h1 class="checkout-f__h1">PAYMENT INFORMATION</h1>
                                                <div class="u-s-m-b-10">
                                                    <div class="radio-box">
                                                        <input type="radio" checked id="cash-on-delivery" name="payment" >
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="cash-on-delivery">Pay with Swish</label>
                                                        </div>
                                                    </div>
                                                    <span class="gl-text u-s-m-t-6">Swish must be eligible for use within the Sweden.</span>
                                                </div>

                                                {{-- <div class="u-s-m-b-10">
                                                    <div class="radio-box">
                                                        <input type="radio" id="direct-bank-transfer" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="direct-bank-transfer">Pay with Klarna</label>
                                                        </div>
                                                    </div>
                                                    <span class="gl-text u-s-m-t-6">Klarna must be eligible for use within the Sweden.</span>
                                                </div>

                                                <div class="u-s-m-b-10">
                                                    <div class="radio-box">
                                                        <input type="radio" id="pay-with-check" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="pay-with-check">Pay With Check</label>
                                                        </div>
                                                    </div>
                                                    <span class="gl-text u-s-m-t-6">Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.</span>
                                                </div>

                                                <div class="u-s-m-b-10">
                                                    <div class="radio-box">
                                                        <input type="radio" id="pay-with-card" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="pay-with-card">Pay With Master Credit Card</label>
                                                        </div>
                                                    </div>
                                                    <span class="gl-text u-s-m-t-6">International Credit Cards must be eligible for use within the Sweden.</span>
                                                </div>

                                                <div class="u-s-m-b-10">
                                                    <div class="radio-box">
                                                        <input type="radio" id="pay-pal" name="payment">
                                                        <div class="radio-box__state radio-box__state--primary">
                                                            <label class="radio-box__label" for="pay-pal">Pay Pal</label>
                                                        </div>
                                                    </div>
                                                    <span class="gl-text u-s-m-t-6">When you click "Place Order" below we'll take you to Paypal's site to set up your billing information.</span>
                                                </div> --}}

                                                <div class="u-s-m-b-15">
                                                    <div class="check-box">
                                                        <input type="checkbox" name="terms" id="term-and-condition" required>
                                                        <div class="check-box__state check-box__state--primary">
                                                            <label class="check-box__label" for="term-and-condition">I consent to the</label></div>
                                                    </div>
                                                    <a class="gl-link">Terms of Service.</a>
                                                </div>
                                        </div>
                                    </div>

                                <button class="btn btn--e-brand-b-2" type="button" id="submit">PLACE ORDER</button>
                            </div>
                                </div>
                            </form>
                        <div class="col-lg-6">
                            <h1 class="checkout-f__h1">ORDER SUMMARY</h1>
                            <!--====== Order Summary ======-->
                            <div class="o-summary">
                                <div class="o-summary__section u-s-m-b-30">
                                <div class="o-summary__item-wrap gl-scroll">
                                    @php
                                        $total=0;
                                    @endphp
                                    @forelse ($sales as $item)
                                    <div class="o-card">
                                        <div class="o-card__flex">
                                            <div class="o-card__img-wrap">
                                                <img style="height:inherit;" class="u-img-fluid" src="{{ asset($item->product->image_name) }}" alt=""></div>
                                            <div class="o-card__info-wrap">
                                                <span class="o-card__name">
                                                    <a href="#!">{{$item->product->name}}</a></span>
                                                <span class="o-card__quantity">Quantity x {{$item->quantity}}</span>
                                                <span class="o-card__price">{{$item->price}} SEK</span></div>
                                        </div>
                                        <a class="o-card__del far fa-trash-alt"></a>
                                    </div>
                                    @php
                                        $total += $item->total;
                                    @endphp
                                    @empty
                                    @endforelse
                                    </div>
                                </div>
                                {{-- <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <h1 class="checkout-f__h1">SHIPPING & BILLING</h1>
                                        <div class="ship-b">
                                            <span class="ship-b__text">Ship to:</span>
                                            <div class="ship-b__box u-s-m-b-10">
                                                <p class="ship-b__p">4247 Ashford Drive Virginia VA-20006 USA (+0) 900901904</p>
                                                <p class="ship-b__p">4247 Ashford Drive Virginia VA-20006 USA (+0) 900901904</p>
                                                <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a>
                                            </div>
                                            <div class="ship-b__box">
                                                <span class="ship-b__text">Bill to default billing address</span>
                                                <a class="ship-b__edit btn--e-transparent-platinum-b-2" data-modal="modal" data-modal-id="#edit-ship-address">Edit</a></div>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="o-summary__section u-s-m-b-30">
                                    <div class="o-summary__box">
                                        <table class="o-summary__table">
                                            <tbody>
                                                <tr>
                                                    <td>SHIPPING</td>
                                                    <td> {{$shipping}} SEK</td>
                                                </tr>
                                                <tr>
                                                    <td>TAX</td>
                                                    <td>0.00 SEK</td>
                                                </tr>
                                                <tr>
                                                    <td>SUBTOTAL</td>
                                                    <td>{{$total}} SEK</td>
                                                </tr>
                                                <tr>
                                                    <td>GRAND TOTAL</td>
                                                    <td>{{ceil($total+$shipping)}} SEK</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                            <!--====== End - Order Summary ======-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Content ======-->
    </div>
    <!--====== End - Section 3 ======-->
</div>
<!--====== End - App Content ======-->
@endsection
@section('js')
<script>
    $(document).ready(function () {
        $('#submit').click(function (e) {
            $.ajax({
            type: "GET",
            url: "/hik/"+$('#billing-swish').val(),
            success: function (response) {
                if(response.includes("errorMessage")){
                    alert('Please Insert a valid swish number')
                }
                else{
                    $('#butt').click();
                }
            }
        });
        });

    });
</script>
@endsection
