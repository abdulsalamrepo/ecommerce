@extends('admin_panel.adminLayout') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Products Table <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('admin.products.create')}}">+ Add Product</a></h4>
                    <br><br>
                    <div class="table-responsive">
                        <table id="products" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                        Images
                                    </th>
                                    <th>
                                        Name
                                    </th>
                                    {{-- <th>
                                        Delete
                                    </th> --}}
                                    <th>
                                        Price
                                    </th>
                                    {{-- <th>
                                        Description
                                    </th> --}}
                                    <th>
                                        Category
                                    </th>

                                    <th>
                                        Update
                                    </th>

                                </tr>
                            </thead>
                            <tbody>
                             {{-- @foreach($prdlist as $prd)
                                <tr>
                                    <td>
                                        <img src="../uploads/products/{{$prd->id}}/{{$prd->image_name}}" style="width:100px;height:100px;border-radius:10%;" alt="">
                                    </td>
                                    <td>
                                        {{$prd->name}}
                                    </td>
                                    <td>
                                        {{$prd->price}}
                                    </td> --}}
                                    {{-- <td>
                                        {{$prd->category->name}}
                                    </td> --}}
                                    {{-- <td>
                                        <div class="btn-group">
                                            <a href="{{route('admin.products.delete', ['id' => $prd->id])}}"class="btn btn-danger btn-sm "><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <a href="{{route('admin.products.edit', ['id' => $prd->id])}}" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>
                                        </div>
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
</div>
@endsection

@section('js')
<script>
$(document).ready(function() {
    var dt = $('#products').DataTable({
        searching: true,
        info: false,
        ajax: {
            type: 'get',
            url: 'get_all_products',
            dataSrc: '',
            // data: function(d) {
            //     d.page = $('#selectGroup').val()
            // },
            error: function(xhr, error, thrown) {
                dt.ajax.reload();
            }
        },
        columns: [
            // {
            //     data: 'id'
            // },
            // {defaultContent:`<input type="checkbox">`}
            {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     return `<img src="../uploads/products/${full.id}/${full.image_name}" style="width:100px;height:100px;border-radius:10%;" alt="">`;
                 }
             },
            {
                data: 'name'
            },
            {
                data: 'price'
            },
            {
                data: 'category.name'
            },

            {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     return `
                     <div class="btn-group">
                                            <a href="products/delete/${full.id}"class="btn btn-danger btn-sm "><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            <a href="products/edit/${full.id}" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>
                                        </div>
                     `;
                 }
             }
        ],
        // initComplete: function() {
        //     this.api().columns().every(function() {
        //         var column = this.column(0);
        //         var select = $('#selectGroup')
        //             .on('change', function() {
        //                 dt.ajax.reload();

        //             });

        //     });
        // }
    });
});
</script>
@endsection
