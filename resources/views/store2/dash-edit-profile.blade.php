@extends('store2.customer_dashboard_layout')
@section('customer_content')
<div class="col-lg-9 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
        <div class="dash__pad-2">
            <h1 class="dash__h1 u-s-m-b-14">Edit Profile</h1>

            <span class="dash__text u-s-m-b-30">Looks like you haven't update your profile</span>
            <div class="dash__link dash__link--secondary u-s-m-b-30">

                <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a></div>
            <div class="row">
                <div class="col-lg-12">
                    <form class="dash-edit-p">
                        <div class="gl-inline">
                            <div class="u-s-m-b-30">

                                <label class="gl-label" for="reg-fname">FIRST NAME *</label>

                                <input class="input-text input-text--primary-style" type="text" id="reg-fname" placeholder="John"></div>
                            <div class="u-s-m-b-30">

                                <label class="gl-label" for="reg-lname">LAST NAME *</label>

                                <input class="input-text input-text--primary-style" type="text" id="reg-lname" placeholder="Doe"></div>
                        </div>
                        <div class="gl-inline">
                            <div class="u-s-m-b-30">

                                <!--====== Date of Birth Select-Box ======-->

                                <span class="gl-label">BIRTHDAY</span>
                                <div class="gl-dob"><select class="select-box select-box--primary-style">
                                        <option selected="">Month</option>
                                        <option value="male">January</option>
                                        <option value="male">February</option>
                                        <option value="male">March</option>
                                        <option value="male">April</option>
                                    </select><select class="select-box select-box--primary-style">
                                        <option selected="">Day</option>
                                        <option value="01">01</option>
                                        <option value="02">02</option>
                                        <option value="03">03</option>
                                        <option value="04">04</option>
                                    </select><select class="select-box select-box--primary-style">
                                        <option selected="">Year</option>
                                        <option value="1991">1991</option>
                                        <option value="1992">1992</option>
                                        <option value="1993">1993</option>
                                        <option value="1994">1994</option>
                                    </select></div>
                                <!--====== End - Date of Birth Select-Box ======-->
                            </div>
                            <div class="u-s-m-b-30">

                                <label class="gl-label" for="gender">GENDER</label><select class="select-box select-box--primary-style u-w-100" id="gender">
                                    <option selected="">Select</option>
                                    <option value="male">Male</option>
                                    <option value="male">Female</option>
                                </select></div>
                        </div>
                        <div class="gl-inline">
                            <div class="u-s-m-b-30">
                                <h2 class="dash__h2 u-s-m-b-8">E-mail</h2>

                                <span class="dash__text">johndoe@domain.com</span>
                                <div class="dash__link dash__link--secondary">

                                    <a href="#">Change</a></div>
                            </div>
                            <div class="u-s-m-b-30">
                                <h2 class="dash__h2 u-s-m-b-8">Phone</h2>

                                <span class="dash__text">Please enter your mobile</span>
                                <div class="dash__link dash__link--secondary">

                                    <a href="#">Add</a></div>
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
