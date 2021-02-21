@extends('admin_panel.adminLayout')
@section('content')
<div class="content-wrapper">
{{-- begin setting  --}}
    <div class="form-horizontal">
        <form action="{{route('admin.market.settings')}}" method="POST"  enctype="multipart/form-data" >
            @csrf

            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name" value="{{$ms->name}}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">tel</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="tel" value="{{$ms->tel}}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" name="email" value="{{$ms->email}}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="address" value="{{$ms->address}}" >
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Language</label>
                <div class="col-sm-10">
                    <select name="language" class="form-control" >
                        @if($ms->currency == 'en' )
                        <option selected value="en">English</option>
                        @else
                        <option  value="en">English</option>
                        @endif
                        @if($ms->currency == 'sw' )
                        <option selected value="sw">Swedish</option>
                        @else
                        <option  value="sw">Swedish</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Currency</label>
                <div class="col-sm-10">
                    <select name="currency"  class="form-control">
                        @if($ms->currency == 'dollar' )
                        <option selected value="dollar">Dollar</option>
                        @else
                        <option  value="dollar">Dollar</option>
                        @endif
                        @if($ms->currency == 'krone' )
                        <option selected value="krone">Krone</option>
                        @else
                        <option  value="krone">Krone</option>
                        @endif
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Facebook</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon background_pre_gray" style="color: #282871" ><i class="fa fa-facebook" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="facebook" value="{{$ms->facebook}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Youtube</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon background_pre_gray" style="color: #c7092d"><i class="fa fa-youtube" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="youtube" value="{{$ms->youtube}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Twitter</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon background_pre_gray" style="color: #00c180"><i class="fa fa-twitter" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="twitter" value="{{$ms->twitter}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Google</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon background_pre_gray" style="color: #00c180"><i class="fa fa-google-plus" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="google" value="{{$ms->google}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">Instagram</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon background_pre_gray" style="color: orange"><i class="fa fa-instagram" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="instagram" value="{{$ms->instagram}}">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label for="inputSkills" class="col-sm-2 control-label">whatsapp</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <span class="input-group-addon background_pre_gray" style="color: #2ce22c"><i class="fa fa-whatsapp" aria-hidden="true"></i></span>
                        <input type="text" class="form-control" name="whatsapp" value="{{$ms->whatsapp}}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-12 d-inline-block">
                            <div  class="photos-wrapper d-flex" style="width: 40%">
                            <a  id="uploadPhotoBtn" href="javascript:void(0)" onclick="document.getElementById('my_file').click();">
                                <div  class="text-center">
                                <div ><i  class="fa fa-upload"></i></div>
                                <div >
                                    Upload Photo
                                </div>
                                </div>
                            </a>
                            <img id="uploadPhotoShow" src="{{asset($ms->logo)}}"  width="100px" height="100px">
                        </div>
                    <input type="file" name="logo" accept="image/*" id="my_file" class="form-control d-none"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-warning"><i class="fa fa-save"> Update </i></button>
                    </div>
                </div>
        </form>
    </div>
{{-- end setting --}}
</div>
@endsection
@section('js')
<script>
    $(document).ready(function() {

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#uploadPhotoShow').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#my_file").change(function() {
$("#uploadPhotoShow").css("width", "50%");
readURL(this);
});
// readURL($('#my_file'));
    });
    </script>
@endsection
