@extends('store2.customer_dashboard_layout')
@section('customer_content')
<div class="col-lg-9 col-md-12">
    <form class="dash__address-make">
        <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius u-s-m-b-30">
            <h2 class="dash__h2 u-s-p-xy-20">Make default Shipping Address</h2>
            <div class="dash__table-2-wrap gl-scroll">
                <table class="dash__table-2">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($addresses as $address)
                        <tr>
                            @if ($address->default)
                            <td>
                                <div class="radio-box">
                                    <input type="radio" id="address-1" name="default-address" checked>
                                    <div class="radio-box__state radio-box__state--primary">
                                        <label class="radio-box__label" for="address-1"></label>
                                    </div>
                                </div>
                            </td>
                            @else
                            <td>
                                <div class="radio-box">
                                    <input type="radio" id="address-1" name="default-address" >
                                    <div class="radio-box__state radio-box__state--primary">
                                        <label class="radio-box__label" for="address-1"></label>
                                    </div>
                                </div>
                            </td>
                            @endif

                            <td>{{$address->address}}</td>
                            <td>{{$address->phone_number}}</td>
                            @if ($address->default)
                                <td>
                                    <div class="gl-text">Default Shipping Address</div>
                                </td>
                            @else
                                <td></td>
                            @endif

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div>

            <button class="btn btn--e-brand-b-2" type="button" id="saveDefaultBtn">SAVE</button></div>
    </form>
</div>
@endsection
