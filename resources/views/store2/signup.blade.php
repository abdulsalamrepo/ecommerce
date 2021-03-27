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

<!--====== App Content ======-->
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

                                        <a href="signup.html">Signup</a></li>
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
                                    <h1 class="section__heading u-c-secondary">CREATE AN ACCOUNT</h1>
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
                                        <h1 class="gl-h1">PERSONAL INFORMATION</h1>
                                        <form class="l-f-o__form" method="POST" id="signupForm">
                                            @csrf
                                            <div class="gl-s-api">
                                                <div class="u-s-m-b-15">
                                                    <button class="gl-s-api__btn gl-s-api__btn--fb" type="button"><i class="fab fa-facebook-f"></i>
                                                        <span>Signup with Facebook</span>
                                                    </button>
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <button class="gl-s-api__btn gl-s-api__btn--gplus" type="button"><i class="fab fa-google"></i>
                                                        <span>Signup with Google</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="reg-fname">FIRST NAME *</label>
                                                <input class="input-text input-text--primary-style" type="text" name="fname" id="fname" placeholder="First Name">
                                                {!! $errors->first('fname', '<label class="error">:message</label>') !!}
                                            </div>

                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="reg-lname">LAST NAME *</label>
                                                <input class="input-text input-text--primary-style" type="text" id="lname" name="lname" placeholder="Last Name">
                                                {!! $errors->first('lname', '<label class="error">:message</label>') !!}
                                            </div>
                                            <div class="gl-inline">
                                                <div class="u-s-m-b-30">

                                                    <!--====== Date of Birth Select-Box ======-->

                                                    <span class="gl-label">BIRTHDAY</span>
                                                    <div class="gl-dob">
                                                        <select id="selectMonth" onchange="changeMonth(this)" name="month" class="select-box select-box--primary-style">
                                                            <option value="" selected>Month</option>
                                                            <option value="1">January</option>
                                                            <option value="2">February</option>
                                                            <option value="3">March</option>
                                                            <option value="4">April</option>
                                                            <option value="5">May</option>
                                                            <option value="6">June</option>
                                                            <option value="7">July</option>
                                                            <option value="8">August</option>
                                                            <option value="9">September</option>
                                                            <option value="10">Octopber</option>
                                                            <option value="11">November</option>
                                                            <option value="12">December</option>
                                                        </select>

                                                        <select id="selectDay" name="day" class="select-box select-box--primary-style">
                                                            <option value="" selected>Day</option>

                                                        </select>
                                                        <select onchange="selectYeara(this)" name="year" id="selectYear" class="select-box select-box--primary-style">
                                                            <option value="" selected>Year</option>

                                                        </select>

                                                    </div>
                                                    <!--====== End - Date of Birth Select-Box ======-->
                                                </div>
                                                <div class="u-s-m-b-30">
                                                    <label class="gl-label" for="gender">GENDER</label>
                                                    <select class="select-box select-box--primary-style u-w-100" id="gender" name="gender">
                                                        <option value="" selected>Select</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        <div class="gl-inline">
                                            <div class="u-s-m-b-15">
                                                <label class="gl-label" for="reg-email">ADDRESS *</label>
                                                <textarea class="input-text input-text--primary-style" name="address" id="address" placeholder="Address" style="padding: 11px;" cols="10" rows="10"></textarea>
                                             {!! $errors->first('address', '<label class="error">:message</label>') !!}

                                            </div>
                                        </div>
                                        <div class="gl-inline">
                                             <div class="u-s-m-b-15">
                                                <label class="gl-label" for="reg-email">TEL *</label>
                                                <input class="input-text input-text--primary-style" type="tel" name="tel" id="tel" placeholder="Telephone">
                                             {!! $errors->first('tel', '<label class="error">:message</label>') !!}
                                            </div>

                                        </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="reg-email">E-MAIL *</label>
                                                <input class="input-text input-text--primary-style" type="text" name="email" id="email" onkeyup="myFunction()" placeholder="Enter E-mail">
                                                <div id="for_duplicate-email"></div>
                                                {!! $errors->first('email', '<label class="error">:message</label>') !!}
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="password">PASSWORD *</label>
                                                <input class="input-text input-text--primary-style" type="password" id="pass" name="pass" placeholder="Enter Password">
                                                {!! $errors->first('pass', '<label class="error">:message</label>') !!}
                                            </div>
                                            <div class="u-s-m-b-30">
                                                <label class="gl-label" for="password">CONFIRM PASSWORD *</label>
                                                <input class="input-text input-text--primary-style" type="password" name="confirm_password" id="confirm_password" placeholder="Enter Password">
                                                {!! $errors->first('confirm_password', '<label class="error">:message</label>') !!}
                                            </div>
                                            <div class="u-s-m-b-15">
                                                <button class="btn btn--e-transparent-brand-b-2" type="submit">CREATE</button>
                                            </div>
                                            <a class="gl-link" href="{{route('user.home')}}">Return to Store</a>
                                        </form>
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
        <!--====== End - App Content ======-->
        @endsection
@section('js')

<!--JQUERY Validation-->
<script>
	$(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();

		// validate signup form on keyup and submit
		$("#signupForm").validate({
			rules: {
				fname: "required",
				lname: "required",
				month: "required",
				day: "required",
				year: "required",
				email: {
					required: true,
					email: true
				},
                address: "required",
                city: "required",
                zip: {
					required: true,
					number: true
				},
                tel: "required",
				pass: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#pass"
				}



			},
			messages: {
				fname: "Please enter your First name",
				lname: "Please enter your Last name",
				day: "Please enter your Day of Birthdate",
				month: "Please enter your Month of Birthdate",
				year: "Please enter your Year of Birthdate",
				email: "Please enter a valid email address",
                address: "Please enter your Address",
                city: "Please enter your City",
                address: "Please enter your Address",
				zip: {
					required: "Please enter Zipcode",
					number: "Invalid Zipcode"
				},
                tel: "Please enter your Phone number",
				pass: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}


			}



		});


	});
	</script>
<!--/JQUERY Validation-->



<!--Duplicate Email Validation-->
<script>
function myFunction()
{
    var email=$("#email").val();
    var token=$("input[name=_token]").val();
    var url="{{route('user.signup.check_email')}}";
            $.ajax({
                type:'post',
                url:url,
                dataType: "JSON",
                async: false,
                data:{email: email, _token: token},
                success:function(msg)
                {
                    if(msg == "1")
                        {
                            document.getElementById("for_duplicate-email").innerHTML = "<label class='error'>This Email Address is Already taken</label>";
                        }
                    else
                        {
                            document.getElementById("for_duplicate-email").innerHTML = "";
                        }
                }
             });

}
/**
 * @param {int} The month number, 0 based
 * @param {int} The year, not zero based, required to account for leap years
 * @return {Date[]} List with date objects for each day of the month
 */
//  function getDaysInMonth(month, year) {
//   var date = new Date(year, month, 1);
//   var days = [];
//   while (date.getMonth() === month) {
//     days.push(new Date(date));
//     date.setDate(date.getDate() + 1);
//   }
//   return days;
// }
var getDaysInMonth = function(month,year) {
  // Here January is 1 based
  //Day 0 is the last day in the previous month
 return new Date(year, month, 0).getDate();
// Here January is 0 based
// return new Date(year, month+1, 0).getDate();
};
let year=0;
// console.log()
var changeMonth =function(e)
{

    for (let index = 1; index < getDaysInMonth(parseInt(e.options[e.selectedIndex].value), year) ; index++) {
        var opt = document.createElement("option");
        opt.value= index;
        opt.innerHTML = index; // whatever property it has

        // then append it to the select element
        document.getElementById('selectDay').appendChild(opt);
    }
document.getElementById('selectDay').disabled = false;

};
document.getElementById('selectMonth').disabled = true;
document.getElementById('selectDay').disabled = true;

var selectYeara = function (e)
{
    year=e.options[e.selectedIndex].value;
    document.getElementById('selectMonth').disabled = false;
}

    for (let index = new Date().getFullYear(); index > 1950 ; index--) {
        var opt = document.createElement("option");
        opt.value= index;
        opt.innerHTML = index; // whatever property it has

        // then append it to the select element
        document.getElementById('selectYear').appendChild(opt);
    }

</script>
<!--/Duplicate Email Validation-->

@endsection
