@extends('admin.master.dashboardmaster')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Blog <small>All</small></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Blog</a></li>
            <li class="breadcrumb-item active">All</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <section class="container">


      <div class="row">
          <div class="col-sm-12">

              @include('alerts.alerts')

            <div class="card card-white">
              <div class="card-header">
                <h3 class="card-title">All Categories</h3>

                <div class="card-tools">
                  {{-- <div class="input-group input-group-sm" style="width: 250px;">
                    <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default w3-deep-orange w3-border-deep-orange"><i class="fa fa-search"></i></button>
                    </div>
                  </div> --}}
                  <a class="btn btn-primary btn-sm" href="{{route('admin.categoryAddNew')}}">Add New Category</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive bg-white">
                <table class="table">
                    <thead>
                        <tr>
                        <th style="width: 50px;">ID</th>
                        <th >Category Name</th>
                        <th style="width: 150px;">Action</th>
                      </tr>
                    </thead>
                </table>

                </div>
              <!-- /.card-body -->

            </div>
            <!-- /.box -->



                                       @if($cats->count())
                                       <div class="card card-widget">
                                           <div class="card-body bg-white">
                                               @foreach($cats as $cat)

                                <table class="table table-condensed table-cat">
                                @include('admin.categories.ajax.catTable')
                            </table>

                            @endforeach
                                           </div>
                                       </div>
                                       @endif





          </div>
        </div>

      </section>
      @endsection


      @push('js')
      <script>
          $(function(){
              $(document).on('click', '.btn-cat-edit', function(e){
                //   alert(1);
          e.preventDefault();
          var that = $(this),
          url = that.attr('href'),
        //   alert(1);
          table = that.closest('.table-cat');
              // alert(url);
              $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
              })
              .done(function(response) {
               table.empty().append(response);
             })
              .fail(function() {
                alert("error");
              });
            });

          $(document).on('submit','.form-cat-update',function(s){
          s.preventDefault();
        //   alert(1);
          var form = $(this),
          url = form.attr('action'),
          type = form.attr('method'),
          alldata = new FormData( this ),
          table = form.closest('table');
        //   alert(url);
        // alert($('meta[name="csrf-token"]').attr('content'));

          $.ajax({
            url: url,
            type: type,
              // dataType: 'json',
              data: alldata,
              // mimeType:"multipart/form-data",
              contentType: false,
              cache: false,
              processData:false,
              _token: $('meta[name="csrf-token"]').attr('content'),

            }).done(function(response) {
              table.empty().append(response);
            })
            .fail(function() {
              alert("error");
            });
          });


          $(document).on('click', '.btn-cat-delete', function(e){
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
