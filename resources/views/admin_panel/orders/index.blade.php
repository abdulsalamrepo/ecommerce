@extends('admin_panel.adminLayout') @section('content')
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
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Adress
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Color
                                    </th>
                                    <th>
                                        Placed at
                                    </th>
                                    <th>
                                        Status
                                    </th>

                                    <th>
                                        Update
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($sale as $s)
                                <tr>

                                    <td>{{md5($s->id)}}</td>
                                    <td>{{$s->user->first_name}} {{$s->user->last_name}}</td>
                                    {{-- <td>{{$s->user->addresses->area??''}}, {{$s->user->addresses->city??''}}, {{$s->user->addresses->zip??''}}</td> --}}
                                    <td></td>
                                    <td>{{$s->product->name}}</td>
                                    <td>{{$s->quantity}}</td>
                                    <td>{!!$s->product->colors!!}</td>
                                    <td>
                                        {{$s->created_at}}
                                    </td>
                                    <td>
                                    {{$s->order_status}}
                                    </td>
                                    <td>
                                        <form method="post" style="display:inline-block">
                                            {{csrf_field()}}
                                            <input type="hidden" value="{{$s->id}}" name="orderId">
                                            <select name="stat">
                                                @foreach($status as $x)
                                                    @if($s->order_status!=$x)
                                                        <option value="{{$x}}">{{$x}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                            <input type="submit" class="btn btn-sm btn-warning" value="Update">
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
