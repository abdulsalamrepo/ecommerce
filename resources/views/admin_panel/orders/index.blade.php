@extends('admin_panel.adminLayout')
@section('head')
<style>
    .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 10px;
  text-align: center;
  font-family: arial;
}

.price {
  color: grey;
  font-size: 22px;
}



</style>
@endsection
@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Orders Management</h4>
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Order Number</th>
                                    <th>Name</th>
                                    <th>Billing Adress</th>
                                    <th>Shipping Adress</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th>Is Paid</th>
                                    <th>Placed at</th>
                                    <th>Status</th>
                                    <th>View</th>
                                    <th>Update</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($sale as $s)
                                <tr>
                                    <td>{{$s->order_number}}</td>
                                    <td>{{$s->shipping_fullname}}</td>
                                    <td>
                                        {{$s->address->address .' '.$s->address->phone_number }}
                                    </td>
                                    <td>
                                        {{ ($s->shopping_country == 'se' ? 'Sweden':'Syrian Arab Republic') . ' '.$s->shipping_state . ' '.$s->shipping_city . ' '.$s->shipping_zipcode . ' '.$s->shipping_address . ' '.$s->shipping_phone}}
                                    </td>
                                    <td>{{$s->item_count}}</td>
                                    <td>{{$s->grand_total}} SEK</td>
                                    <td>{{$s->is_paid?'Paid':'Not Paid'}}</td>
                                    <td>
                                        {{$s->created_at}}
                                    </td>
                                    <td>
                                    {{$s->order_status}}
                                    </td>
                                    <td>
                                        <a href="#!" style="color:#d61f4f;" data-toggle="modal" data-target="#sale{{$s->id}}">View</a>
                                    </td>
                                    <td>
                                        <form method="post" style="display:inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$s->id}}" name="orderId">
                                            @if ($s->order_status == 'pending' )
                                                <span>PENDING</span>
                                            @else
                                                <select name="stat">
                                                    {{-- @foreach($status as $x) --}}
                                                    @if($s->order_status == 'pending')
                                                        <option value="processing">processing</option>
                                                        <option value="decline">decline</option>
                                                    @endif
                                                    @if($s->order_status == 'processing')
                                                        <option value="completed">completed</option>
                                                        <option value="decline">decline</option>
                                                    @endif
                                                    {{-- @endforeach --}}
                                                </select>
                                            @endif
                                            @if ($s->order_status != 'pending')
                                                <button type="submit" class="btn btn-sm btn-warning  mdi mdi-content-save" ></button>
                                            @endif
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @foreach ($sale as $s)
                            <div class="modal fade" id="sale{{$s->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Order Details {{$s->order_number}}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                        </div>
                                        <div class="modal-body">
                                            @foreach ($s->products as $p)
                                            <div class="card">
                                                <img src="{{asset($p->product->image_name)}}" alt="" style="width:100%">
                                                <h1>{{$p->product->name}}</h1>
                                                <p class="price">{{$p->quantity}}</p>
                                                <p class="price">{{$p->price}} SEK</p>
                                              </div>
                                            @endforeach


                                        </div>
                                        {{-- <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
