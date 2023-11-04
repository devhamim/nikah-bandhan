<section class="content-header">
  <h1>
    Page Item
    <small>Edit</small>
  </h1>
 
</section>



<!-- Main content -->
<section class="content">




  <!-- Info cardes -->
  <div class="row">
    <div class="col-md-12">

      @include('alerts')


      <div class="card card-widget">
        <div class="card-body">
          <div class="card card-widget mb-0">
            <div class="card-body w3-gray ">
              @include('admin.pages.includes.pageSingleWithoutDel')

              <div class="row">
                <div class="col-sm-10 col-sm-offset-1">

                  @foreach($page->items as $item)
                  @include('admin.pages.includes.pageItemSingle')
                  @endforeach

                </div>
              </div>


            </div>
          </div>
        </div>
      </div>


      <div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-edit"></i> Update Page Part <span class="label label-default">{{
              $it->title }}</span> of <span class="label label-default">{{ $page->page_title }}</span> Page</h3>
        </div>

        <div class="card-body">
          <div class="card card-widget mb-0">
            <div class="card-body w3-gray ">




              <div class="row">
                <div class="col-sm-7">

                  <div class="card card-widget mb-0">
                    <div class="card-body">


                      @include('admin.pages.includes.pagePartEditForm')



                    </div>
                  </div>

                </div>

                <div class="col-sm-5">

                  @include('admin.media.mediaContainer')

                   
                </div>
              </div>




            </div>
          </div>
        </div>
      </div>






      {{-- <div class="card card-widget">
        <div class="card-header with-border">
          <h3 class="card-title"><i class="fa fa-edit"></i> Page Edit <span class="label label-default">{{
              $page->page_title }}</span></h3>
        </div>

        <div class="card-body">
          <div class="card card-widget mb-0">
            <div class="card-body w3-gray ">




              <div class="card card-widget">
                <div class="card-body">
                  Page ID: <b>{{ $page->id }}</b>, &nbsp;
                  Page Title: <b> {{ $page->page_title }}</b>, &nbsp;
                  Route Name: <b> {{ $page->route_name }}</b>, &nbsp;
                  Active: <b>{{ $page->active ? 'Yes' : 'No' }}</b>,
                  List In Menu: <b>{{ $page->list_in_menu ? 'Yes' : 'No' }}</b>,
                  Title Hide: <b>{{ $page->title_hide ? 'Yes' : 'No' }}</b>,

                  <div class="pull-right">
                    <a class="w3-btn w3-blue btn btn-xs " href="">Edit</a>
                    &nbsp;
                    <a class="w3-btn w3-blue btn btn-xs " href="">Add Page Part</a>
                    &nbsp;
                    <a class="w3-btn w3-red btn btn-xs " href="">Delete</a>
                  </div>
                </div>
              </div>



            </div>
          </div>
        </div>
      </div> --}}



    </div>
  </div>
  <!-- /.row -->




</section>
