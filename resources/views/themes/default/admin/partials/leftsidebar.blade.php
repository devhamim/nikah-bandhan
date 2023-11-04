<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{url('/')}}" class="brand-link">
    <img src="{{
        asset('img/logo.png')
    }}" alt="VIP MM Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">VIP MM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{asset('alt3/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Admin</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!-- <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div> -->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

               <li class="nav-item {{ session('lsbm') == 'dashboard' ? ' menu-open ' : '' }}">
                <a href="#" class="nav-link {{ session('lsbm') == 'dashboard' ? ' active ' : '' }}">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                    Dashboard
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="{{route('dashboard')}}"
                      class="nav-link {{ session('lsbsm') == 'dashboard' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Dashboard</p>
                    </a>
                  </li>

                </ul>
              </li>

        <li class="nav-item {{ session('lsbm') == 'website' ? ' menu-open ' : '' }}">
          <a href="#" class="nav-link {{ session('lsbm') == 'website' ? ' active ' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Website
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.websiteParameters')}}"
                class="nav-link {{ session('lsbsm') == 'webParameter' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Website Parameters</p>
              </a>
            </li>

          </ul>
        </li>

        <li class="nav-item {{ session('lsbm') == 'userP' ? ' menu-open ' : '' }}">
          <a href="#" class="nav-link {{ session('lsbm') == 'userP' ? ' active ' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Users Roles
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{route('admin.userlist')}}"
                class="nav-link {{ session('lsbsm') == 'users' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Users</p>
              </a>
            </li>

          </ul>
        </li>
        <li class="nav-item {{ session('lsbm') == 'rolePermission' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('lsbm') == 'rolePermission' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Role & Permissions
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('roles.index') }}"
                  class="nav-link {{ session('lsbsm') == 'allRole' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Roles</p>
                </a>
              </li>
              @can('role-create')
              <li class="nav-item">
                <a href="{{ route('roles.create') }}"
                  class="nav-link {{ session('lsbsm') == 'newRole' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Role</p>
                </a>
              </li>
              @endcan


              <li class="nav-item">
                <a href="{{ route('permissions.index') }}"
                  class="nav-link {{ session('lsbsm') == 'allPermission' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Permissions</p>
                </a>
              </li>

               <!-- <li class="nav-item">
                <a href="{{ route('permissions.create') }}"
                  class="nav-link {{ session('lsbsm') == 'newPermission' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Permissions</p>
                </a>
              </li> -->

            </ul>
          </li>


        <li class="nav-item {{ session('lsbm') == 'pages' ? ' menu-open ' : '' }}">
          <a href="#" class="nav-link {{ session('lsbm') == 'pages' ? ' active ' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Pages
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{route('admin.pagesAll')}}"
                class="nav-link {{ session('lsbsm') == 'pagesAll' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Page All</p>
              </a>
            </li>

            <li class="nav-item">
              <a href="{{route('admin.userSettingList')}}"
                class="nav-link {{ session('lsbsm') == 'userSetting' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>User Setting Fields</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{route('admin.userSettingFieldValue')}}"
                class="nav-link  {{ session('lsbsm') == 'userSettingFieldValue' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>Setting Field Value</p>
              </a>
            </li>
          </ul>
        </li>



        <li class="nav-item {{ session('lsbm') == 'package' ? ' menu-open ' : '' }}">
          <a href="#" class="nav-link {{ session('lsbm') == 'package' ? ' active ' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Membership Package
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ route('admin.membershipPackageAddNew') }}"
                class="nav-link {{ session('lsbsm') == 'membershipPackageAddNew' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.allMembershipPackages') }}"
                class="nav-link {{ session('lsbsm') == 'allMembershipPackages' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>List</p>
              </a>
            </li>

          </ul>
        </li>


        <li class="nav-item {{ session('lsbm') == 'payments' ? ' menu-open ' : '' }}">
          <a href="#" class="nav-link {{ session('lsbm') == 'payments' ? ' active ' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Payments
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item {{ session('lsbsm') == 'paymentAddNew' ? 'active' : '' }}">
                <a
                    class="nav-link" href="{{ route('admin.paymentAddNew') }}">
                    <i class="far fa-circle nav-icon"></i>
                     Add New Payment
                </a>
            </li>

            <li class="nav-item">
              <a href="{{ route('admin.allPendingPayments') }}"
                class="nav-link {{ session('lsbsm') == 'allPendingPayments' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All Pending Payments</p>
              </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('admin.allPaidPayments') }}"
                  class="nav-link {{ session('lsbsm') == 'allPaidPayments' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Paid Payments</p>
                </a>
            </li>

              <li class="nav-item {{ session('lsbsm') == 'allFreePayments' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.allFreePayments') }}">
                    <i class="far fa-circle nav-icon"></i>
                    All Free Payments
                </a>
              </li>

          </ul>
        </li>


        <li class="nav-item {{ session('lsbm') == 'proposal' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('lsbm') == 'proposal' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Proposals
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('admin.proposalsGroup', 'all_proposals')}}"
                  class="nav-link {{ session('lsbsm') == 'all_proposals' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Proposals</p>
                </a>
              </li>

              <li class="nav-item">
                  <a href="{{route('admin.proposalsGroup', 'pending_proposals')}}"
                    class="nav-link {{ session('lsbsm') == 'pending_proposals' ? ' active ' : '' }}">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Panding Proposals</p>
                  </a>
                </li>

                <li class="nav-item">
                    <a href="{{route('admin.proposalsGroup', 'accepted_proposals')}}"
                      class="nav-link {{ session('lsbsm') == 'accepted_proposals' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Accepted Proposals</p>
                    </a>
                  </li>

            </ul>
          </li>




          <li class="nav-item {{ session('lsbm') == 'report' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('lsbm') == 'report' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Report/Complains
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('admin.reportsAll')}}"
                  class="nav-link {{ session('lsbsm') == 'reportsAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Rports</p>
                </a>
              </li>
            </ul>

          </li>




        <li class="nav-item {{ session('lsbm') == 'contact' ? ' menu-open ' : '' }}">
          <a href="#" class="nav-link {{ session('lsbm') == 'contact' ? ' active ' : '' }}">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Contacted Messages
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">

            <li class="nav-item">
              <a href="{{ route('admin.allContact') }}"
                class="nav-link {{ session('lsbsm') == 'allContact' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>All</p>
              </a>
            </li>
            {{-- <li class="nav-item">
              <a href="{{ route('admin.newContact') }}"
                class="nav-link {{ session('lsbsm') == 'newContact' ? ' active ' : '' }}">
                <i class="far fa-circle nav-icon"></i>
                <p>New Messages <small>({{ $countUnseen }})</small></p>
              </a>
            </li> --}}
          </ul>
        </li>

        <li class="nav-item {{ session('lsbm') == 'user' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('lsbm') == 'user' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                @can('user-create')
                <li class="nav-item">
                    <a href="{{ route('admin.newUser') }}"
                      class="nav-link {{ session('lsbsm') == 'newUser' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>New User</p>
                    </a>
                  </li>
                @endcan
              <li class="nav-item">
                <a href="{{ route('admin.usersAll') }}"
                  class="nav-link {{ session('lsbsm') == 'allUser' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.usersGroup', 'active_users')}}"
                  class="nav-link {{ session('lsbsm') == 'active_users' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.usersGroup', 'inactive_users')}}"
                  class="nav-link {{ session('lsbsm') == 'inactive_users' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Deactive Users</p>
                </a>
              </li>
              {{-- <li class="nav-item">
                <a href="{{ route('admin.aboutPostAddNew') }}"
                  class="nav-link {{ session('lsbsm') == 'blogAddNew' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Blog</p>
                </a>
              </li> --}}
            </ul>
          </li>


        <li class="nav-item {{ session('lsbm') == 'blog' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('lsbm') == 'blog' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Blogs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

                <li class="nav-item">
                    <a href="{{ route('admin.categoryAddNew') }}"
                      class="nav-link {{ session('lsbsm') == 'categoryAddNew' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>New Blog Category</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{ route('admin.categoriesAll') }}"
                      class="nav-link {{ session('lsbsm') == 'categoriesAll' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Blog Category</p>
                    </a>
                  </li>

                  {{-- <li class="nav-item">
                    <a href="{{ route('admin.divisionsAll') }}"
                      class="nav-link {{ session('lsbsm') == 'divisionsAll' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Divission</p>
                    </a>
                  </li> --}}

                  {{-- <li class="nav-item">
                    <a href="{{ route('admin.districtsAll') }}"
                      class="nav-link {{ session('lsbsm') == 'districtsAll' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All District</p>
                    </a>
                  </li> --}}

                  {{-- <li class="nav-item">
                    <a href="{{ route('admin.thanaAll') }}"
                      class="nav-link {{ session('lsbsm') == 'thanaAll' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>All Thana/Location</p>
                    </a>
                  </li> --}}

              <li class="nav-item">
                <a href="{{ route('admin.postsAll') }}"
                  class="nav-link {{ session('lsbsm') == 'allPost' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Blogs</p>
                </a>
              </li>
              @can('blog-create')
              <li class="nav-item">
                <a href="{{ route('admin.aboutPostAddNew2') }}"
                  class="nav-link {{ session('lsbsm') == 'blogAddNew' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Blog</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>




          <li class="nav-item {{ session('lsbm') == 'sms' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('sms') == 'blog' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                SMS Email CV
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

                {{-- <li class="nav-item">
                    <a href="{{ route('admin.quickSmsBalanceCheck') }}"
                      class="nav-link {{ session('lsbsm') == 'quickSmsBalanceCheck' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>SMS Remaining</p>
                    </a>
                  </li> --}}

                  <li class="nav-item">
                    <a href="{{route('admin.quickSmsDraft')}}"
                      class="nav-link {{ session('lsbsm') == 'quickSmsDraft' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Draft</p>
                    </a>
                  </li>
                  @can('quick-sms-send')
                  <li class="nav-item">
                    <a href="{{route('admin.quickSms')}}"
                      class="nav-link {{ session('lsbsm') == 'quickSms' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Quick SMS</p>
                    </a>
                  </li>
                  @endcan
                  <li class="nav-item">
                    <a href="{{route('admin.sentSmsBulk')}}"
                      class="nav-link {{ session('lsbsm') == 'sentSmsBulk' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p> SMS Analytics</p>
                    </a>
                  </li>

                  <li class="nav-item">
                    <a href="{{route('admin.sendEmailSmsToUsers')}}"
                      class="nav-link {{ session('lsbsm') == 'sendEmailSmsToUsers' ? ' active ' : '' }}">
                      <i class="far fa-circle nav-icon"></i>
                      <p>Send Email Sms to Users</p>
                    </a>
                  </li>

              <!-- <li class="nav-item">
                <a href="{{route('admin.sendProfileToGivenEmail')}}"
                  class="nav-link {{ session('lsbsm') == 'sendProfileToGivenEmail' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send Profile to Given Email</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.sendCvToGivenEmail')}}"
                  class="nav-link {{ session('lsbsm') == 'sendCvToGivenEmail' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Send CV to Given Email</p>
                </a>
              </li> -->
            </ul>
          </li>

          <li class="nav-item {{ session('lsbm') == 'story' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('lsbm') == 'story' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Story
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{ route('admin.allStories') }}"
                  class="nav-link {{ session('lsbsm') == 'allStory' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All</p>
                </a>
              </li>
              @can('stories-create')
              <li class="nav-item">
                <a href="{{ route('admin.newStory') }}"
                  class="nav-link {{ session('lsbsm') == 'newStory' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>New Story</p>
                </a>
              </li>
              @endcan
            </ul>
          </li>

          <li class="nav-item {{ session('lsbm') == 'mobileAndEmail' ? ' menu-open ' : '' }}">
            <a href="#" class="nav-link {{ session('lsbm') == 'mobileAndEmail' ? ' active ' : '' }}">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Mobile & Email Numbers
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="{{route('admin.mobileNumbersAll')}}"
                  class="nav-link {{ session('lsbsm') == 'mobileNumbersAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Mobile Numbers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('admin.emailNumbersAll')}}"
                  class="nav-link {{ session('lsbsm') == 'emailNumbersAll' ? ' active ' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>All Email Numbers</p>
                </a>
              </li>
            </ul>
          </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
