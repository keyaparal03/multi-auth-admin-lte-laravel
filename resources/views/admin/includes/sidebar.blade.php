<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <!-- <img src="/dist/img/logo.png" style="width: 200px;" alt="AdminLTE Logo" class="brand-image elevation-3"> -->
      <span class="brand-text font-weight-light" style="color: #000;">Logo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!-- <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        
      </div> -->

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="<?php echo url('/admin/dashboard');?>" class="nav-link {{ Request::segment(2)=="dashboard"?'active':''}}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            

         
          <li class="nav-item has-treeview">
            <a href="<?php echo url('/admin/users');?>" class="nav-link  {{ Request::segment(2)=="users"?'active':''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Users
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo url('/admin/users');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View all</p>
                </a>
              </li>

            </ul>
          </li>
          
          

          <li class="nav-item has-treeview">
            <a href="<?php echo url('/admin/cms');?>" class="nav-link {{ Request::segment(2)=="cms"?'active':''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Pages
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo url('/admin/cms');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View all</p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo url('/admin/cms/create');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create</p>
                    </a>
              </li>
            </ul>
          </li>
         

          <li class="nav-item has-treeview">
            <a href="<?php echo url('/admin/blog');?>" class="nav-link {{ Request::segment(2)=="blog"?'active':''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                blog
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo url('/admin/blog');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View all</p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo url('/admin/blog/create');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create</p>
                    </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo url('/admin/team');?>" class="nav-link {{ Request::segment(2)=="team"?'active':''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Team
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo url('/admin/team');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View all</p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo url('/admin/team/create');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create</p>
                    </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="<?php echo url('/admin/event');?>" class="nav-link {{ Request::segment(2)=="event"?'active':''}}">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Protfolio
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">

              <li class="nav-item">
                <a href="<?php echo url('/admin/event');?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p> View all</p>
                </a>
              </li>
              <li class="nav-item">
                    <a href="<?php echo url('/admin/event/create');?>" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Create</p>
                    </a>
              </li>
            </ul>
          </li>
          <li>
            <a href="{{ route('admin.logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            Logout
            </a>

            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
            </form>

          </li>

        </ul>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
