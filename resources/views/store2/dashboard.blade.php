@extends('store2.customer_dashboard_layout')
@section('customer_content')
<div class="col-lg-9 col-md-12 col-sm-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
        <div class="dash__pad-2">
            <h1 class="dash__h1 u-s-m-b-14">Manage My Account</h1>
            <span class="dash__text u-s-m-b-30">From your "My Account Dashboard" you have the ability to view a snapshot of your recent account activity and update your account information. Select a link below to view or edit information.</span>
            <div class="row">
                <div class="col-lg-4 u-s-m-b-30">
                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                        <div class="dash__pad-3">
                            <h2 class="dash__h2 u-s-m-b-8">PERSONAL PROFILE</h2>
                            <div class="dash__link dash__link--secondary u-s-m-b-8">
                                <a href="{{route('dashboard.user.profile')}}">View</a>
                                <a href="{{route('dashboard.edit.profile')}}">Edit</a>
                            </div>
                            <span class="dash__text">{{$user->first_name . ' ' . $user->last_name}}</span>
                            <span class="dash__text">{{$user->email}}</span>
                            {{-- <div class="dash__link dash__link--secondary u-s-m-t-8">
                                <a data-modal="modal" data-modal-id="#dash-newsletter">Subscribe Newsletter</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 u-s-m-b-30">
                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                        <div class="dash__pad-3">
                            <h2 class="dash__h2 u-s-m-b-8">ADDRESS BOOK</h2>
                            <span class="dash__text-2 u-s-m-b-8">Default Shipping Address</span>
                            <div class="dash__link dash__link--secondary u-s-m-b-8">
                                <a href="{{route('dashboard.user.address')}}">View</a>

                                <a href="{{is_null($address)?'#!':route('dashboard.user.address.edit',$address->id)}}">Edit</a>
                            </div>
                            <span class="dash__text">{{is_null($address)?'No Default Address':$address->address}}</span>
                            <span class="dash__text">{{is_null($address)?'No Default Phone Number':$address->phone_number}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 u-s-m-b-30">
                    <div class="dash__box dash__box--bg-grey dash__box--shadow-2 u-h-100">
                        <div class="dash__pad-3">
                            {{-- <h2 class="dash__h2 u-s-m-b-8">BILLING ADDRESS</h2>
                            <span class="dash__text-2 u-s-m-b-8">Default Billing Address</span>
                            <span class="dash__text">4247 Ashford Drive Virginia - VA-20006 - USA</span>
                            <span class="dash__text">(+0) 900901904</span> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="dash__box dash__box--shadow dash__box--bg-white dash__box--radius">
        <h2 class="dash__h2 u-s-p-xy-20">RECENT ORDERS</h2>
        <div class="dash__table-wrap gl-scroll">
            <table class="dash__table">
                <thead>
                    <tr>
                        <th>Order #</th>
                        <th>Placed On</th>
                        <th>Items</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($lastRecent as $item)

                    <tr>
                        <td>{{md5($item->id)}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>
                            <div class="dash__table-img-wrap">
                                {{-- <img class="u-img-fluid" src="{{asset('uploads/products/'.$item->product->id.'/'.$item->product->image_name)}}" alt=""></div> --}}
                                <img class="u-img-fluid" src="{{asset($item->product->image_name)}}" alt=""></div>
                        </td>
                        <td>
                            <div class="dash__table-total">
                                <span>${{$item->total}}</span>
                                <div class="dash__link dash__link--brand">
                                    <a href="{{route('dashboard.manage.order',$item->id)}}">MANAGE</a></div>
                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

