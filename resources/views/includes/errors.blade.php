{{-- @if (count($errors)>0)
    <div class="row mt-2">
        <div class="col-sm-12">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <div class="alert-icon"><i class="flaticon-warning"></i></div>
                <div class="alert-text">
                    <ul class="list-unstyled">
                        @foreach($errors->all()  as  $error)
                            <li style=""><span>{{ $error }}</span></li>
                        @endforeach
                    </ul>
                </div>
                <div class="alert-close">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="la la-close"></i></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endif --}}

@if($errors->any())

    @foreach($errors->all() as $err)

            <div class="alert alert-warning alert-dismissible fade show" style="width: 100%;color: white;" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <strong style="color: black;">{{$err}} </strong>
            </div>

            <script>
              $(".alert").alert();
            </script>

    @endforeach
@endif

