@extends('admin_panel.adminLayout') @section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Slides
     <a class="btn btn-lg btn-success" style="float:right;color:white" href="{{route('admin.slides.create')}}">+ Add Slide</a></h4>
                    <br><br>
                    <div class="table-responsive">
                        <table id="slides" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>
                                       Image
                                    </th>
                                    <th>
                                        Row1
                                    </th>
                                    <th>
                                        Row2
                                    </th>
                                    <th>
                                        Row3
                                    </th>
                                    <th>
                                        Row4
                                    </th>
                                    <th>
                                        Row5
                                    </th>
                                    <th>
                                        href_button
                                    </th>
                                    <th>
                                        text_button
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
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
    var dt = $('#slides').DataTable({
        searching: true,
        info: false,
        ajax: {
            type: 'get',
            url: 'get_all_slides',
            dataSrc: '',
            error: function(xhr, error, thrown) {
                dt.ajax.reload();
            }
        },
        columns: [
            {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     return `<img src="/${full.img}" style="width:100px;height:100px;border-radius:10%;" alt="">`;
                 }
             },
            {
                data: 'row1'
            },
            {
                data: 'row2'
            },
            {
                data: 'row3'
            },
            {
                data: 'row4'
            },
            {
                data: 'row5'
            },
            {
                data: 'href_button'
            },
            {
                data: 'text_button'
            },
            {
                 sortable: false,
                 "render": function ( data, type, full, meta ) {
                     return `
                     <div class="btn-group">
                        <a href="slides/delete/${full.id}"class="btn btn-danger btn-sm "><i class="fa fa-trash" aria-hidden="true"></i></a>
                        <a href="slides/edit/${full.id}" class="btn btn-warning btn-sm "><i class="fa fa-edit"></i></a>
                    </div>
                     `;
                 }
             }
        ],
    });
});
</script>
@endsection
