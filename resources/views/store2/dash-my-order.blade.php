@extends('store2.customer_dashboard_layout')
@section('customer_content')
<div class="col-lg-9 col-md-12">
    <div class="dash__box dash__box--shadow dash__box--radius dash__box--bg-white u-s-m-b-30">
        <div class="dash__pad-2">
            <h1 class="dash__h1 u-s-m-b-14">My Orders</h1>

            <span class="dash__text u-s-m-b-30">Here you can see all products that have been ordered.</span>
            <form class="m-order u-s-m-b-30">
                <div class="m-order__select-wrapper">

                    <label class="u-s-m-r-8" for="my-order-sort">Show:</label>
                    <select class="select-box select-box--primary-style" id="my-order-sort">
                        <option value="5" selected="">Last 5 orders</option>
                        <option value="15d">Last 15 days</option>
                        <option value="30d">Last 30 days</option>
                        <option value="6m">Last 6 months</option>
                        <option value="all">All Orders</option>
                    </select></div>
            </form>
            <div class="m-order__list">
            @foreach ($lastRecent as $item)
                <div class="m-order__get">
                    <div class="manage-o__header u-s-m-b-30">
                        <div class="dash-l-r">
                            <div>
                                <div class="manage-o__text-2 u-c-secondary">Order #{{md5($item->id)}}</div>
                                <div class="manage-o__text u-c-silver">Placed on {{$item->created_at}}</div>
                            </div>
                            <div>
                                <div class="dash__link dash__link--brand">

                                    <a href="{{route('dashboard.manage.order',$item->id)}}">MANAGE</a></div>
                            </div>
                        </div>
                    </div>
                    <div class="manage-o__description">
                        <div class="description__container">
                            <div class="description__img-wrap">

                                <img class="u-img-fluid" src="images/product/electronic/product3.jpg" alt=""></div>
                            <div class="description-title">{{$item->product->name}}</div>
                        </div>
                        <div class="description__info-wrap">
                            <div>

                                <span class="manage-o__badge badge--{{strtolower(str_replace(' ', '-',$item->status))}}">$item->status</span></div>
                            <div>

                                <span class="manage-o__text-2 u-c-silver">Quantity:

                                    <span class="manage-o__text-2 u-c-secondary">1</span></span></div>
                            <div>

                                <span class="manage-o__text-2 u-c-silver">Total:

                                    <span class="manage-o__text-2 u-c-secondary">$16.00</span></span></div>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
