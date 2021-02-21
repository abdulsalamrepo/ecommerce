@extends('store2.layout_master')
@section('content')

@if(session('message'))

<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading"></h4>
  <p>{{session('message')}}</p>
  <p class="mb-0"></p>
</div>
@endif
@if($errors->any())

    @foreach($errors->all() as $err)

            <div class="alert alert-warning alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong>{{$err}} </strong>
            </div>

            <script>
              $(".alert").alert();
            </script>

    @endforeach
@endif

<div class="app-content">

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

                                <a href="{{route('user.login')}}">Signin</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== End - Section 1 ======-->


    <!--====== Section 2 ======-->
    <div class="u-s-p-b-60">

        <!--====== Section Intro ======-->
        <div class="section__intro u-s-m-b-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__text-wrap">
                            <h1 class="section__heading u-c-secondary">ALREADY REGISTERED?</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--====== End - Section Intro ======-->


        <!--====== Section Content ======-->
        <div class="section__content">
            <div class="container">
                <div class="row row--center">
                    <div class="col-lg-6 col-md-8 u-s-m-b-30">
                        <div class="l-f-o">
                            <div class="l-f-o__pad-box">
                                <h1 class="gl-h1">I'M NEW CUSTOMER</h1>

                                <span class="gl-text u-s-m-b-30">By creating an account with our store, you will be able to move through the checkout process faster, store shipping addresses, view and track your orders in your account and more.</span>
                                <div class="u-s-m-b-15">

                                    <a class="l-f-o__create-link btn--e-transparent-brand-b-2" href="signup.html">CREATE AN ACCOUNT</a></div>
                                <h1 class="gl-h1">SIGNIN</h1>

                                <span class="gl-text u-s-m-b-30">If you have an account with us, please log in.</span>
                                <div class="l-f-o__form" >

                                    <div class="gl-s-api">
                                        <div class="u-s-m-b-15">

                                            <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>

                                                <span>Signin with Facebook</span></button></div>
                                        <div class="u-s-m-b-15">

                                            <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>

                                                <span>Signin with Google</span></button></div>
                                    </div>
                                    <form class="l-f-o__form" method="post" id="loginForm">
                                        @csrf
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-email">E-MAIL *</label>

                                        <input class="input-text input-text--primary-style" type="text" name="email" id="email" placeholder="Enter E-mail"></div>
                                    <div class="u-s-m-b-30">

                                        <label class="gl-label" for="login-password">PASSWORD *</label>

                                        <input class="input-text input-text--primary-style" type="text" id="pass" name="pass" placeholder="Enter Password"></div>
                                    <div class="gl-inline">
                                        <div class="u-s-m-b-30">

                                            <button class="btn btn--e-transparent-brand-b-2" type="submit">LOGIN</button></div>
                                        <div class="u-s-m-b-30">

                                            <a class="gl-link" href="lost-password.html">Lost Your Password?</a></div>
                                    </div>
                                    <div class="u-s-m-b-30">
                                        <!--====== Check Box ======-->
                                        <div class="check-box">
                                            <input type="checkbox" name="remember-me" id="remember-me">
                                            <div class="check-box__state check-box__state--primary">
                                                <label class="check-box__label" for="remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                        <!--====== End - Check Box ======-->
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

@section('js')

<!--JQUERY Validation-->
<script>

	$(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();
console.log('ss')
		// validate signup form on keyup and submit
		$("#loginForm").validate({
			rules: {

				email: {
					required: true,
					email: true
				},
				pass: {
					required: true,
					minlength: 5
				}
			},
			messages: {

				email: "Please enter a valid email address",


				pass: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				}


			}
		});


	});
	</script>

@endsection
