@extends('store2.layout_master')
@section('content')
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- STORE -->
            <div id="store" class="col-md-12">
                <!-- store products -->
                <div class="row">
                    @foreach($products as $product)
                    <!-- product -->
                    <div class="col-md-4 col-xs-6">
                        <div class="u-s-m-b-30">
                            <div class="product-o product-o--hover-on">
                                <div class="product-o__wrap">

                                    <a class="aspect aspect--bg-grey aspect--square u-d-block" href="product-detail.html">
                                        <img class="aspect__img" src="uploads/products/{{$product->id}}/{{$product->image_name}}" alt=""></a>
                                    <div class="product-o__action-wrap">
                                        <ul class="product-o__action-list">
                                            <li>

                                                <a data-modal="modal" data-modal-id="#quick-look" data-tooltip="tooltip" data-placement="top" title="Quick View"><i class="fas fa-search-plus"></i></a></li>
                                            <li>

                                                <a data-modal="modal" data-modal-id="#add-to-cart" data-tooltip="tooltip" data-placement="top" title="Add to Cart"><i class="fas fa-plus-circle"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Add to Wishlist"><i class="fas fa-heart"></i></a></li>
                                            <li>

                                                <a href="signin.html" data-tooltip="tooltip" data-placement="top" title="Email me When the price drops"><i class="fas fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <span class="product-o__category">

                                    <a href="shop-side-version-2.html">Electronics</a></span>

                                <span class="product-o__name">

                                    <a href="product/{{$product->id}}">{{$product->name}}</a></span>
                                <div class="product-o__rating gl-rating-style"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <span class="product-o__review">(23)</span></div>
                                <span class="product-o__price">${{$product->price}}
                                    <span class="product-o__discount">${{$product->discount}}</span></span>
                            </div>
                        </div>

                            {{-- <div class="add-to-cart">
                                <a class="add-to-cart-btn" href="{{route('user.view',['id'=>$product->id])}}"><i class="fa fa-shopping-cart"></i>Purchase</a>
                            </div> --}}
                    </div>
                    <!-- /product -->
                    @endforeach
                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>

    @endsection
