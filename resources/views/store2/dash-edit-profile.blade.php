@extends('store2.customer_dashboard_layout')
@section('customer_content')

<div class="col-lg-9 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
        <div class="dash__pad-2">
            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

            <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>
            <div class="row">
                <div class="col-lg-12">
                    <form id="pofileForm" class="dash-edit-p" method="POST">
                        @csrf
                            <div class="u-s-m-b-30">
                                <label class="gl-label" for="reg-fname">FIRST NAME *</label>
                                <input class="input-text input-text--primary-style" type="text" name="fname" id="fname" placeholder="First Name" value="{{$user->first_name}}">
                                {!! $errors->first('fname', '<label class="error">:message</label>') !!}
                            </div>

                            <div class="u-s-m-b-30">
                                <label class="gl-label" for="reg-lname">LAST NAME *</label>
                                <input class="input-text input-text--primary-style" type="text" id="lname" name="lname" placeholder="Last Name" value="{{$user->last_name}}">
                                {!! $errors->first('lname', '<label class="error">:message</label>') !!}
                            </div>
                            <div class="u-s-m-b-30">
                                <label class="gl-label" for="reg-lname">Phone *</label>
                                <input class="input-text input-text--primary-style" type="text" id="phone" name="phone" placeholder="Phone" value="{{$user->phone}}">
                                {!! $errors->first('phone', '<label class="error">:message</label>') !!}
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
                        <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')

<!--JQUERY Validation-->
<script>
	$(document).ready(function() {
		// validate the comment form when it is submitted
		//$("#commentForm").validate();
		// validate signup form on keyup and submit
		$("#pofileForm").validate({
			rules: {
				fname: "required|min:3",
				lname: "required|min:3",
				month: "required",
				day: "required",
				year: "required",
                phone: "required|numeric",
			},
			messages: {
				fname: "Please enter your First name",
				lname: "Please enter your Last name",
				day: "Please enter your Day of Birthdate",
				month: "Please enter your Month of Birthdate",
				year: "Please enter your Year of Birthdate",
                phone: "Please enter your Phone number",
			}



		});


	});
	</script>
<!--/JQUERY Validation-->



<!--Duplicate Email Validation-->
<script>

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
