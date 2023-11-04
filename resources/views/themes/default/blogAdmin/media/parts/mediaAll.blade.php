    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Media
        <small>All</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Media</a></li>
        <li class="active">All</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-sm-12">

          @include('alerts')

          <div class="box box-widget">
           <div class="box-body text-center">

             @include('blogAdmin.media.includes.forms.mediaUploadForm')

           </div>
         </div>

          <div class="box box-widget">
            <div class="box-header">
              <h3 class="box-title">
                Media All
              </h3>
            </div>
           <div class="box-body ">

            <div class="box box-widget">
              <div class="box-body" style="background-color: #ccc;">
                @include('blogAdmin.media.includes.others.mediaAll')
              
              </div>
            </div>

             

           </div>
         </div>




        </div>
      </div>
      

    </section>
    <!-- /.content -->

