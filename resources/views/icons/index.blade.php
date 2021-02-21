@extends('admin_panel.adminLayout')
@section('content')
<div class="content-wrapper">
    <div class="row">
        @foreach ($icons as $icon)
        <div class="col-3 grid-margin stretch-card">
            <div>
                <i class="mdi mdi-{{$icon['name']}}" style="font-size: 35px;" title="{{$icon['name']}}" aria-hidden="true"></i>
                <span class="m-2">mdi mdi-{{$icon['name']}}</span>
            </div>
        </div>
        @endforeach
        @foreach ($iconsf as $icon)
        <div class="col-3 grid-margin stretch-card">
            <div>
                <i class="fa {{$icon['c']}}" style="font-size: 35px;" title="{{$icon['l']}}" aria-hidden="true"></i>
                <span class="m-2">fa {{$icon['c']}}</span>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
