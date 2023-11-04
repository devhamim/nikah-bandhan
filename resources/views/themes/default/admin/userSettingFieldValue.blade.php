
    @extends('admin.master.dashboardmaster')
    @section('content')<!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">User Setting Field Value
                <small>All</small></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">All</a></li>
                <li class="breadcrumb-item active">User Setting Field Value</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>


      <!-- Main content -->
      <section class="content">

        <div class="row">
          <div class="col-sm-12">

            @include('alerts.alerts')

            <div class="card card-widget">
             <div class="card-body text-center">

              @include('admin.partials.userSettingFieldValueForm')


             </div>
           </div>

           <div class="card card-warning">
            <div class="card-header with-border">
              <h3 class="card-title">All User Setting Field Values</h3>

              </div>
              <!-- /.box-header -->
            </div>


            @foreach($fields as $field)

            @if ($field->hasValue())
              <div class="card card-widget">
              <div class="card-header with-border">
                <b>ID: {{ $field->id }} &nbsp; &nbsp; {{$field->title}}</b>
              </div>
              <div class="card-body">

                <table class="table table-condensed table-striped table-bordered">
                  <thead>
                    <tr>
                      <th width="50">SL</th>
                      <th>Setting Field Value</th>
                      <th width="150">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $i = 1; ?>

                    @foreach($field->values as $value)

                    @include('admin.ajax.settingValueSingleTr')
                    <div class="modal fade" id="valueedit{{$value->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="{{route('admin.userSettingValueEdit',$value->id)}}" method="POST">
                                @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="">Value</label>
                                    <input type="text" name="value" value="{{$value->title}}" class="form-control">
                                </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                          </div>
                        </form>
                        </div>
                      </div>
                    <?php $i++; ?>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            @endif


            @endforeach


          </div>
        </div>


      </section>
      <!-- /.content -->
  @endsection
  @push('js')

<script>
    $(function(){
        $(document).on('click', '.btn-value-edit', function(e){
    e.preventDefault();
    var that = $(this),
    url = that.attr('href'),
    tr = that.closest('tr');
        // alert(url);
        $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
        })
        .done(function(response) {
         tr.empty().append(response);
       })
        .fail(function() {
          alert("error");
        });
      });

    $(document).on('submit','form.form-value-update',function(s){
    s.preventDefault();

    var form = $(this),
    url = form.attr('action'),
    type = form.attr('method'),
    alldata = new FormData( this ),
    tr = form.closest('tr');
    $.ajax({
      url: url,
      type: type,
        // dataType: 'json',
        data: alldata,
        // mimeType:"multipart/form-data",
        contentType: false,
        cache: false,
        processData:false,

      }).done(function(response) {
        tr.empty().append(response);
      })
      .fail(function() {
        alert("error");
      });
    });



    $(document).on('click', '.btn-value-delete', function(e){
    e.preventDefault();
    var that = $(this),
    url = that.attr('href'),
    table = that.closest('.table-cat');
        // alert(url);
        $.ajax({
          url: url,
          type: 'POST',
          dataType: 'json',
        })
        .done(function(response) {
         if(response.success)
         {
          table.remove();
         }
       })
        .fail(function() {
          alert("error");
        });
      });
    });
</script>
@endpush
