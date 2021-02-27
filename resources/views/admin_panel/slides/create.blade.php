@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>

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
                                    <h4 >Add Slide</h4>
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
                                                        <img id="imageHolder" src=""  width="100px" height="100px">
                                                    </div>
                                                <input type="file" name="img" accept="image/*" id="inp_files" class="form-control d-none"></div>
                                            </div>
                                        <input id="inp_img" name="img" type="hidden" value="">
                                        <br><br>
                                        <div id="for_extension_error"></div>
                                        <div class="form-group">
                                            <label  >Row1*</label>
                                            <input type="text" class="form-control" id="row1" name="row1"  value="">
                                        </div>
                                        <div class="form-group">
                                            <label  >Row2*</label>
                                            <input type="text" class="form-control" name="row2" id="row2" value="">
                                        </div>
                                        <div class="form-group">
                                            <label  >Row3*</label>
                                            <input type="text" class="form-control" id="row3"  name="row3" value="">
                                        </div>
                                        <div class="form-group">
                                            <label >Row4*</label>
                                            <input type="text" class="form-control" id="row4" name="row4" value="">
                                        </div>
                                        <div class="form-group">
                                            <label >Row5*</label>
                                            <input type="text" class="form-control" id="row5" name="row5" value="">
                                        </div>
                                        <div class="form-group">
                                            <label >Href button*</label>
                                            <input type="text" class="form-control" id="href_button" name="href_button" value="">
                                        </div>
                                        <div class="form-group">
                                            <label >Text Button*</label>
                                            <input type="text" class="form-control" id="text_button" name="text_button" value="">
                                        </div>
                                        <div class="form-group row" style="padding: 10px;">
                                            <label style="margin: 10px">View</label>
                                            <input style="margin: 10px" type="checkbox"  id="view" name="view">
                                        </div>

                                        <input type="submit" name="saveButton" class="btn btn-success mr-2" id="saveButton" value="Create"  />
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
</div>

<script>

  function fileChange(e) {
    readURL(this);
}

    //  document.getElementById('inp_img').value = '';

    //  for (var i = 0; i < e.target.files.length; i++) {

    //     var file = e.target.files[i];

    //     if (file.type == "image/jpeg" || file.type == "image/png") {

    //        var reader = new FileReader();
    //        reader.onload = function(readerEvent) {

    //           var image = new Image();
    //           image.onload = function(imageEvent) {

    //              var max_size = 600;
    //              var w = image.width;
    //              var h = image.height;

    //              if (w > h) {  if (w > max_size) { h*=max_size/w; w=max_size; }
    //              } else     {  if (h > max_size) { w*=max_size/h; h=max_size; } }

    //              var canvas = document.createElement('canvas');
    //              canvas.width = w;
    //              canvas.height = h;
    //              canvas.getContext('2d').drawImage(image, 0, 0, w, h);
    //              if (file.type == "image/jpeg") {
    //                 var dataURL = canvas.toDataURL("image/jpeg", 1.0);
    //              } else {
    //                 var dataURL = canvas.toDataURL("image/png");
    //              }
    //              document.getElementById('inp_img').value += dataURL + '|';
    //              console.log(document.getElementById('inp_img').value)
    //           }
    //           image.src = readerEvent.target.result;

    //        }
    //        reader.readAsDataURL(file);


        // } else {
        //    document.getElementById('inp_files').value = '';
        //    alert('Please only select images in JPG or PNG format.');
        //    return false;
        // }
    //  }

  document.getElementById('inp_files').addEventListener('change', fileChange, false);

    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imageHolder').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

	$(document).ready(function() {
		$("#product_form").validate({
			rules: {
                row5: "required",
                row4: "required",
                row3: "required",
                row2: "required",
                row1: "required",
                href_button: "required",
                text_button: "required",
			},
			messages: {
				row1: "No Row1 is Entered",
				row2: "No Row2 is Entered",
				row3: "No Row3 is Entered",
				row4: "No Row4 is Entered",
				row5: "No Row5 is Entered",
                href_button: "No href button is Entered",
                text_button: "No text button is Entered",
			}
		});
	});
	</script>
<!--/JQUERY Validation-->
@endsection
