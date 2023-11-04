@extends('admin.master.dashboardmaster')
@push('css')

      <style type="text/css">
    .select2-dropdown .select2-search__field:focus, .select2-search--inline .select2-search__field:focus {
        outline: none !important;
        border: none !important;
      }
  </style>
@endpush

@section('content')<!-- Content Header (Page header) -->
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
    <div class="card card-primary">
          <div class="card-body">
            @include('alerts.alerts')
            <div class="card-body table-responsive no-padding">
                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th>Feature Image</th>
                        <th>ID, Title & Status</th>
                        <th width="200">Category & Tags</th>
                        {{-- <th width="120">Div, Dist & Thana</th> --}}
                        <th>Excerpt</th>
                        <th>Content</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="post-tr-{{$post->id}}">
                            <td>
                                @if($post->imgFeature())
                                    <img class="img-responsive" width="100" src="{{asset($post->fi())}}">
                                @endif

                            </td>
                            <td>
                                <b>ID:</b> {{$post->id}} <br>
                                <b>Title:</b> {{$post->title}} <br>
                                <b>Status:</b> {{$post->publish_status}} <br>
                                <b>Headline:</b> {{$post->headline ? 'Yes' : 'No'}} <br>
                                <b>Front Slider:</b> {{$post->front_slider ? 'Yes' : 'No'}} <br>
                                <b>Comment Total:</b> {{$post->comments->count()}}
                            </td>
                            <td>
                                <b>Cat:</b> {{$post->cats()}} <br>
                                <b>Tags:</b> {{$post->tags}}
                            </td>
                            {{-- <td>
                                <b>Div:</b> {{$post->div()}} <br>
                                <b>Dist:</b> {{$post->dist()}} <br>
                                <b>Thana:</b> {{$post->thana()}}
                            </td> --}}
                            <td>
                                 {{str_limit($post->excerpt, $limit = 200, $end = "..")}}
                            </td>
                            <td>
                                 {{str_limit($post->description, $limit = 200, $end = "..")}}
                            </td>
                            <td style="min-width: 100px;">



                        <div class="btn-group btn-group-xs pull-right ">
                            @can('blog-edit')
                            <a class="btn btn-primary" target="_blank" href="{{route('admin.postEdit',$post)}}">Edit</a>
                            @endcan
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                          <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu" role="menu">

                            {{-- <li><a  target="_blank" href="{{route('welcome.postDetailsCheck',[$post,$post->title])}}">Details</a></li> --}}

                          {{-- <li><a class="make-directory-inactive" href="">Make Draft</a></li> --}}


                        @can('blog-delete')
                        <li>
                            <a href="{{route('admin.postDelete',$post)}}" onclick="return confirm('Do you really want to delete this post?');">Delete</a>
                        </li>
                        @endcan

                        </ul>
                      </div>

                            </td>
                    </tr>
                @endforeach
                    </tbody>


                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                  <div class="pull-right">
                      {{$posts->links()}}
                  </div>
              </div>

          </div>
    </div>
</section>



@endsection
