<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="{{ asset('images/avatar.png') }}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Admin</p>
          <!-- <p>@if(Auth::check()) {{ Auth::user()->name }} @endif</p> -->
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">HEADER</li>
        <!-- Optionally, you can add icons to the links -->
    
        <!-- Ctaegories element -->
        <li class="treeview">
          <a href=""><i class="fa fa-link"></i> <span>Categories</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">

            <li><a href="{{ route('categories.index') }}"><i class="fa fa-hashtag"></i>All Categories</a></li>
           
            <li><a href="{{ route('subCategories.index') }}"><i class="fa fa-hashtag"></i>Sub-Category</a></li>
          </ul>
        </li>
        <!-- Sub Companies Element -->
        <li class="treeview">
          <a href=""><i class="fa fa-link"></i> <span>Companies</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('companies.index') }}"><i class="fa fa-building"></i>All Companies</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Branches</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('branches.index') }}"><i class="fa fa-industry"></i>All branches</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Setting</span>
            <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('intervals.index') }}"><i class="fa fa-cogs"></i>Interval</a></li>
          </ul>
        </li>
        <li class="">
          <a href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> <span>Sign-out</span></a>
        </li>

      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>