
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        {{-- <li class="header">MAIN NAVIGATION</li> --}}

        <li class=" treeview{{ session('lsbm') == 'dashboard' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}"><a href="{{route('blogAdmin.dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard </a></li>

            <li class="{{ session('lsbsm') == 'blogParameter' ? ' active ' : '' }}"><a href="{{route('admin.blogParameter')}}"><i class="fa fa-circle-o"></i> Blog Parameters </a></li>

          </ul>
        </li>

        <li class=" treeview{{ session('lsbm') == 'categories' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-th"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'categoryAddNew' ? ' active ' : '' }}"><a href="{{route('admin.categoryAddNew')}}"><i class="fa fa-circle-o"></i> Add New Category </a></li>

            <li class="{{ session('lsbsm') == 'categoriesAll' ? ' active ' : '' }}"><a href="{{route('admin.categoriesAll')}}"><i class="fa fa-circle-o"></i> Categories All </a></li>
          </ul>
        </li>


        <li class=" treeview{{ session('lsbm') == 'divisions' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-th"></i> <span>Division, District, Location</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            {{-- <li class="{{ session('lsbsm') == 'divisionAddNew' ? ' active ' : '' }}"><a href="{{route('admin.divisionAddNew')}}"><i class="fa fa-circle-o"></i> Add New Division </a></li> --}}

            <li class="{{ session('lsbsm') == 'divisionsAll' ? ' active ' : '' }}"><a href="{{route('admin.divisionsAll')}}"><i class="fa fa-circle-o"></i> Divisions All </a></li>

            <li class="{{ session('lsbsm') == 'districtsAll' ? ' active ' : '' }}"><a href="{{route('admin.districtsAll')}}"><i class="fa fa-circle-o"></i> District All </a></li>

            <li class="{{ session('lsbsm') == 'thanaAll' ? ' active ' : '' }}"><a href="{{route('admin.thanaAll')}}"><i class="fa fa-circle-o"></i> Thana /Location All </a></li>

          </ul>
        </li>

        <li class=" treeview{{ session('lsbm') == 'posts' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-file-text"></i> <span>Posts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'postAddNew' ? ' active ' : '' }}"><a href="{{route('admin.postAddNew')}}"><i class="fa fa-circle-o"></i> Add New Post </a></li>

            <li class="{{ session('lsbsm') == 'postsAll' ? ' active ' : '' }}"><a href="{{route('admin.postsAll')}}"><i class="fa fa-circle-o"></i> Posts All </a></li>
          </ul>
        </li>

        <li class=" treeview{{ session('lsbm') == 'media' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-upload"></i> <span>Media</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'mediaAll' ? ' active ' : '' }}"><a href="{{route('admin.mediaAll')}}"><i class="fa fa-circle-o"></i> Media All </a></li>

          </ul>
        </li>

        <li class=" treeview{{ session('lsbm') == 'ad' ? ' active ' : '' }}">
          <a href="#">
            <i class="fa fa-file"></i> <span>Ad Space</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="{{ session('lsbsm') == 'newAd' ? ' active ' : '' }}"><a href="{{route('admin.newAd')}}"><i class="fa fa-circle-o"></i> New Ad Space </a></li>

            <li class="{{ session('lsbsm') == 'allAds' ? ' active ' : '' }}"><a href="{{route('admin.allAds')}}"><i class="fa fa-circle-o"></i> All Ad Spaces </a></li>

          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>