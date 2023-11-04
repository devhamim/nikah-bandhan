<section class="content-header">
  <h1>
    All	
    <small>Posts</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-plus"></i> All </a></li>
    <li class="active">Posts</li>
  </ol>
</section>

    <section class="content">

    @include('alerts')

    <div class="row">
        <div class="col-xs-12">
          <div class="box box-warning">
            <div class="box-header">
              <h3 class="box-title">All Posts</h3>
              {{-- <form class="pull-right">
                <div class="box-tools">
                  <div class="input-group input-group-sm " style="width: 250px;">
                    <input type="text" name="q" class="form-control input-xs pull-right profile-search w3-border" placeholder="Search By ID, Title, Content" data-url="">

                    <div class="input-group-btn">
                      <button type="button" class="btn btn-primary"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                </div>
                </form>  --}}
            </div>
            <!-- /.box-header -->
            <div class="profile-table-body">
            @include('blogAdmin.posts.ajax.postsAll')
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
	</section>