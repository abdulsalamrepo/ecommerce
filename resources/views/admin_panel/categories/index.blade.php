@extends('admin_panel.adminLayout')
@section('content')
<script src="{{asset('js/lib/jquery.js')}}"></script>
<script src="{{asset('js/dist/jquery.validate.js')}}"></script>
<style>label.error {
  color: #a94442;
  background-color: #f2dede;
  border-color: #ebccd1;
  padding:1px 20px 1px 20px;
}</style>

<div class="content-wrapper">
    <div class="row">
        <div class="col-12 stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Add Category</h4>
                    <form class="forms-sample" method="post" id="cat_form">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="category_id">Parent Category</label>
                            <select class="form-control select2 {{ $errors->has('category') ? 'is-invalid' : '' }}" name="category_id" id="category_id">
                                <option value="">Please select</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @foreach($category->childCategories as $childCategory)
                                        <option value="{{ $childCategory->id }}" {{ old('category_id') == $childCategory->id ? 'selected' : '' }}>-- {{ $childCategory->name }}</option>
                                    @endforeach
                                @endforeach
                            </select>
                            @if($errors->has('category'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('category') }}
                                </div>
                            @endif
                            {{-- <span class="help-block">{{ trans('cruds.productCategory.fields.category_helper') }}</span> --}}
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Name*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="Name" id="Name" placeholder="Enter Category Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Icon*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="Icon"  placeholder="Enter Icon of Category">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Description*</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="description" id="description" placeholder="Enter Description"> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Slug*</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="slug"  placeholder="Enter Slug">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2">Add</button>
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

        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Categories Table</h4>
                    <div class="table-responsive">
                        <table class="table table-striped" id="categories">
                            <thead>
                                <tr>
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Created At
                                    </th>
                                    <th>
                                        Icon
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
{{-- @foreach($catlist as $cat)
<tr>
    <td>
        {{$cat->name}}
    </td>
    <td>
        {{$cat->type}}
    </td>
    <td>
        {{$cat->created_at}}
    </td>
    <td>
        {{$cat->updated_at}}
    </td>
    <td>
        <a href="{{route('admin.categories.edit', ['id' => $cat->id])}}" class="btn btn-warning">Edit</a>
    </td>
    <td>
        <a href="{{route('admin.categories.delete', ['id' => $cat->id])}}" onclick="delete()" class="btn btn-danger">Delete</a>
    </td>
</tr>
@endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('admin.categories.add.image')}}" enctype="multipart/form-data" id="addFormImage">
        @csrf
        <input type="hidden" name="category_id" id="category_image_id">
        <input type="file" name="image" accept="image/*" id="inp_files"  class="d-none">
    </form>
</div>

<!--JQUERY Validation-->
<script>
	$(document).ready(function() {
		$("#cat_form").validate({
			rules: {
				Name: "required",
				Type: "required",
			},
			messages: {
				Name: "Category Name is Required",
				Type: "Category Type is Required",
			}
		});
	});
</script>
<!--/JQUERY Validation-->
<script>
$(document).ready(function() {
    var dt = $('#categories').DataTable({
        searching: true,
        info: false,
        ajax: {
                type: 'get',
                url: 'get_all_categories',
                dataSrc:'',
                error: function(xhr, error, thrown)
                {
                    dt.ajax.reload();
                }
             },
        columns: [
            {
                data: 'name'
            },
            {
                data: 'created_at'
            },
            {
                "render": function ( data, type, full, meta )
                 {
                     return `
                     <div style="font-size: 25px;">
                        <i class="${full.type}" aria-hidden="true"></i>
                     </div>
                     `;
                 }
            },
            {
                 sortable: false,
                 "render": function ( data, type, full, meta )
                 {
                     return `
                     <div class="btn-group">
                        <a href="javascript:void(0)" onclick="clickAddImage(this)" data-id="${full.id}" class="btn btn-primary btn-sm "><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-image" aria-hidden="true"></i></a>
                        <a href="/admin_panel/categories/delete/${full.id}"class="btn btn-danger btn-sm "><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a href="/admin_panel/categories/edit/${full.id}" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>
                     </div>
                     `;
                 }
             }
        ],
    });
    $('#inp_files').change(function (e) {
        e.preventDefault();
        $('#addFormImage').submit();
    });
});

function clickAddImage(e)
{
    document.getElementById('category_image_id').value = e.dataset['id'];
    document.getElementById('inp_files').click();
}
</script>

@endsection
