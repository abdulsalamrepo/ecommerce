@extends('admin_panel.adminLayout') @section('content')
<style>label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a style="color:green;" href="{{route('admin.slides')}}">
                                < Back to List</a>
                                    <br>
                                    <br>
                                    <h4 >Edit Slide</h4>
                                    <br>
                                    <div id="empty_image"> </div>
                                    <form class="forms-sample" method="post"  id="slide_form" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <div class="form-group">
                                            <div class="col-md-12 col-12 d-inline-block">
                                                        <div  class="photos-wrapper d-flex" style="width: 40%">
                                                        <a  id="uploadPhotoBtn" href="javascript:void(0)" onclick="document.getElementById('inp_files').click();">
                                                            <div  class="text-center">
                                                            <div ><i  class="fa fa-upload"></i></div>
                                                            <div >
                                                                Upload Photo
                                                            </div>
                                                            </div>
                                                        </a>
                                                        <img id="imageHolder" src="{{asset($slide->img)}}"  width="100px" height="100px">
                                                    </div>
                                                <input type="file" name="img" accept="image/*" id="inp_files" class="form-control d-none"></div>
                                            </div>
                                        <input id="inp_img" name="img" type="hidden" value="">
                                        <br><br>
                                        <div id="for_extension_error"></div>
                                        <div class="form-group">
                                            <label  >Row1*</label>
                                            <input type="text" class="form-control" id="row1" name="row1"  value="{{$slide->row1}}">
                                        </div>
                                        <div class="form-group">
                                            <label  >Row2*</label>
                                            <input type="text" class="form-control" name="row2" id="row2" value="{{$slide->row2}}">
                                        </div>
                                        <div class="form-group">
                                            <label  >Row3*</label>
                                            <input type="text" class="form-control" id="row3"  name="row3" value="{{$slide->row3}}">
                                        </div>
                                        <div class="form-group">
                                            <label >Row4*</label>
                                            <input type="text" class="form-control" id="row4" name="row4" value="{{$slide->row4}}">
                                        </div>
                                        <div class="form-group">
                                            <label >Row5*</label>
                                            <input type="text" class="form-control" id="row5" name="row5" value="{{$slide->row5}}">
                                        </div>
                                        <div class="form-group">
                                            <label >Href button*</label>
                                            <input type="text" class="form-control" id="href_button" name="href_button" value="{{$slide->href_button}}">
                                        </div>
                                        <div class="form-group">
                                            <label >Text Button*</label>
                                            <input type="text" class="form-control" id="text_button" name="text_button" value="{{$slide->text_button}}">
                                        </div>
                                        <div class="form-group row" style="padding: 10px;">
                                            <label style="margin: 10px">View</label>
                                            @if ($slide->view == 1)
                                            <input style="margin: 10px" type="checkbox" checked  id="view" name="view">
                                            @else
                                            <input style="margin: 10px" type="checkbox"  id="view" name="view">
                                            @endif
                                        </div>

                                        <input type="submit" name="saveButton" class="btn btn-success mr-2" id="saveButton" value="Update"  />
                                    </form>
                                    @if($errors->any())


                                    <ul>
                                        @foreach($errors->all() as $err)
                                        <tr>
                                            <td>
                                                <li>{{$err}}</li>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </ul>
                                    @endif
                        </div>
                </div>

            </div>
        </div>
    </div>
</div>



@endsection
