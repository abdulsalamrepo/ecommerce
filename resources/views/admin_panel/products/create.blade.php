@extends('admin_panel.adminLayout') @section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<script src="{{asset('js/dist/additional-methods.js')}}"></script>

<style>label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}
</style>
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <a style="color:green;" href="{{route('admin.products')}}">
                                < Back to List</a>
                                    <br>
                                    <br>
                                    <h4 >Create product</h4>
                                    <br>
                                    {{-- <img  id="imageHolder" src="" alt="add image" height="300" width="300"/>
                                    <br> --}}
                                    {{-- <input  type="file" name="inp_files" id="inp_files" multiple="multiple" > --}}

                                    {{-- <br> --}}
                                    <div id="empty_image"> </div>
                                    <form class="forms-sample" method="post"  id="product_form">
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
                                                <input type="file"   id="inp_files"  class="form-control d-none"></div>
                                            </div>
                                        <input id="img_hidden" name="img" type="hidden" value="">
                                        <br><br>
                                        <div id="for_extension_error"></div>
                                        <div class="form-group">
                                            <label  >Product Name*</label>
                                            <input type="text" class="form-control" id="Name" name="Name"  value="">
                                        </div>
                                        <div class="form-group">
                                            <label  for="Description">Product Description*</label>
                                            <textarea type="textarea" class="form-control" id="Description" name="Description"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label  for="Category">Category*</label>
                                            <select class="form-control form-control-md" id="Category" name="Category">
                                                @php foreach($catlist->all() as $cat) {
                                                echo "<option value=".$cat->id." >".$cat->name." </option>"; $select_attribute=''; }
                                                @endphp
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label  >Product Price*</label>
                                            <input type="number" min="0" class="form-control" name="Price" id="Price" value="">
                                        </div>
                                        <div class="form-group">
                                            <label  >Product Discounted Price*</label>
                                            <input type="number" min="0" class="form-control" id="Discounted_Price"  name="Discounted_Price" value="">
                                        </div>
                                        <div class="form-group">
                                            <label  >Product Weight*</label>
                                            <input type="number" min="0" class="form-control" id="weight"  name="weight" value="">
                                        </div>
                                        <div class="form-group ">
                                            <label  >Product Colors*</label>
                                            <input type="color" id="picker" class="form-control col-md-2" style="height: 50px;">
                                            <br>
                                            <a onclick="addColor()" class="btn btn-sm btn-primary" >add</a>
                                            <br>
                                            <br>
                                            <div id="colors" style="border:1px solid #eee">
                                            </div>
                                            <br>
                                            <input type="text" class="form-control" id="color_list" name="Colors" value="" hidden>
                                        </div>

                                        <div class="form-group">
                                            <label >Product Tags*</label>
                                            <input type="text" class="form-control" id="Tags" name="Tags" value="">
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
    document.getElementById('inp_files').addEventListener('change', fileChange, false);
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imageHolder').attr('src', e.target.result);
                $('#img_hidden').val(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    function onReadyColorList(arrayOfColor){
        var addedColor = document.querySelector("#color_list").value;
        var arrayOfColor = addedColor.split(',');
        for(var i =0 ; i< arrayOfColor.length; i++){
            newColor = `<div style="height:25px;display:inline-block;margin:5px;width:25px!important;background-color:${arrayOfColor[i]}"></div>`;
            document.querySelector("#colors").innerHTML += newColor;
        }
    }

    function addColor(){
        var pickedColor = document.querySelector("#picker").value;
        newColor = `<div style="height:25px;display:inline-block;margin:5px;width:25px!important;background-color:${pickedColor}"></div>`;
        var addedColor = document.querySelector("#color_list").value;
        var arrayOfColor = [];
        if (addedColor != ""){
            arrayOfColor = addedColor.split(',');
            if(!arrayOfColor.includes(pickedColor)){
                arrayOfColor.push(pickedColor);
                document.querySelector("#color_list").value = arrayOfColor.join(',');
                document.querySelector("#colors").innerHTML += newColor;
            }
        }
        else{
            arrayOfColor.push(pickedColor);
            document.querySelector("#colors").innerHTML += newColor;
            document.querySelector("#color_list").value = pickedColor;
        }
    }

	$(document).ready(function() {
		$("#product_form").validate({
			rules: {
                Name: "required",

                Description: "required",
                Category: "required",
                Price: {
					required: true,
					number: true
				},
                Discounted_Price: {
					required: true,
					number: true
				},
                colors: "required",
                Tags: "required"
			},
			messages: {
				Name: "No Name is Entered",

                Description: "No Description is Entered",
                Category: "No Category is Selected",
				Price: {
					required: "No Price is Entered",
					number: "Invalid Price"
				},
                Discounted_Price: {
					required: "No Price is Entered",
					number: "Invalid Price"
				},
                colors: "No Color is Selected",
                Tags: "No Tags is Selected",
			}
		});
	});
	</script>
<!--/JQUERY Validation-->
@endsection
