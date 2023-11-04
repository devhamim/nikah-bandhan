    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Blog Admin Dashboard
        <small>Home</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blog Admin Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

          <div class="panel panel-default">
            <div class="panel-heading">Blog Admin Dashboard</div>

            <div class="panel-body">
              @if (session('status'))
              <div class="alert alert-success">
                {{ session('status') }}
              </div>
              @endif

              You are logged in!
            </div>
          </div>

        </div>
      </div>
      

    </section>
    <!-- /.content -->