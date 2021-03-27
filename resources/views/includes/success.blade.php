@if (session('status'))
    <div class="alert alert-success alert-dismissible fade show" style="width: 100%;color: white;" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        <strong>{{session('status')}} </strong>
    </div>
    <script>
        $(".alert").alert();
    </script>
@endif
