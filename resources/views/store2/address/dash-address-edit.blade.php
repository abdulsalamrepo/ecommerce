@extends('store2.customer_dashboard_layout')
@section('headc')


<style>

#_checkbox
{
    display: none;
}

.labelCustom
{
    position: absolute;
    right: 0;
    left: 0;
    width: 50px;
    height: 50px;
    margin: 0 0 0 10%;
    background-color: #00becc;
    transform: translateY(-50%);
    border-radius: 50%;
    box-shadow: 0 7px 10px #b3d5d8;
    cursor: pointer;
    transition: 0.2s ease transform, 0.2s ease background-color, 0.2s ease box-shadow;
    overflow: hidden;
    z-index: 1;
}

.labelCustom:before
{
    content: "";
    position: absolute;
    top: 50%;
    right: 0;
    left: 0;
    width: 30px;
    height: 30px;
    margin: 0 auto;
    background-color: #fff;
    transform: translateY(-50%);
    border-radius: 50%;
    box-shadow: inset 0 7px 10px #b3d5d8;
    transition: 0.2s ease width, 0.2s ease height;
}

.labelCustom:hover:before
{
    width: 55px;
    height: 55px;
    box-shadow: inset 0 7px 10px #00becc;
}

.labelCustom:active
{
    transform: translateY(-50%) scale(0.9);
}

#tick_mark {
    position: absolute;
    top: -1px;
    right: 0;
    left: 0;
    width: 20px;
    height: 35px;
    margin-left: 7px;
    transform: rotateZ(-40deg);
}

#tick_mark:before, #tick_mark:after
{
    content: "";
    position: absolute;
    background-color: #fff;
    border-radius: 2px;
    opacity: 0;
    transition: 0.2s ease transform, 0.2s ease opacity;
}

#tick_mark:before {
    left: 0;
    bottom: 0;
    width: 4px;
    height: 12px;
    box-shadow: -2px 0 5px rgb(0 0 0 / 23%);
    transform: translateY(-68px);
}

#tick_mark:after {
    left: 0;
    bottom: 0;
    width: 116%;
    height: 4px;
    box-shadow: 0 3px 5px rgb(0 0 0 / 23%);
    transform: translateX(78px);
}

#_checkbox:checked + label
{
    background-color: #00becc;
    box-shadow: 0 7px 10px #b3d5d8;
}

#_checkbox:checked + label:before
{
    width: 0;
    height: 0;
}

#_checkbox:checked + label #tick_mark:before, #_checkbox:checked + label #tick_mark:after
{
    transform: translate(0);
    opacity: 1;
}
</style>
@endsection
@section('customer_content')
<div class="col-lg-9 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white">
        <div class="dash__pad-2">
            <h1 class="dash__h1 u-s-m-b-14">Edit Address</h1>

            <span class="dash__text u-s-m-b-30">We need an address where we could deliver products.</span>
            <form class="dash-address-manipulation" action="{{route('dashboard.user.address.store')}}" method="POST">
                @csrf
                <input type="hidden" name="address_id" value="{{$address->id}}">
                <div class="gl-inline">
                    <div class="u-s-m-b-30">
                        <label class="gl-label" for="address-phone">PHONE *</label>
                        <input class="input-text input-text--primary-style" type="text" name="phone_number" value="{{$address->phone_number}}"  placeholder="Phone Number">
                    </div>
                    <div class="u-s-m-b-30">
                        <label class="gl-label" for="address-street">ADDRESS *</label>
                        <textarea class="input-text input-text--primary-style" style="padding: 11px;" rows="15" name="address" placeholder="Address"> {{$address->address}} </textarea>
                    </div>
                </div>
                <div class="gl-inline">
                    <div class="u-s-m-b-30">
                        <label  for="_checkbox">Default</label>
                    </div>
                </div>
                <div class="gl-inline">
                    <div class="u-s-m-b-30" style="padding: 15px;">
                        @if ($address->default)
                        <input type="checkbox" name="default" checked id="_checkbox">
                        <label class="labelCustom" for="_checkbox">
                          <div id="tick_mark"></div>
                        </label>
                        @else
                        <input type="checkbox" name="default" id="_checkbox">
                        <label class="labelCustom" for="_checkbox">
                          <div id="tick_mark"></div>
                        </label>
                        @endif

                    </div>
                </div>
                <button class="btn btn--e-brand-b-2" type="submit">SAVE</button>
            </form>
        </div>
    </div>
</div>
@endsection
