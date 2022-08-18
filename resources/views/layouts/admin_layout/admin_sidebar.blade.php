  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/admin_images/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('images/admin_images/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
          {{-- <img src="{{asset($data->image)}}" alt="" width="100" height="100" srcset=""> --}}
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ ucwords(Auth::guard('admin')->user()->name) }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            @if(Session::get('page')=="dashboard")
            <?php $active = "active"; ?>
            @else
            <?php $active = ""; ?>
            @endif
          <a href="{{ url('/admin/dashboard') }}" class="nav-link {{ $active}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>


          {{-- Sidebar Banner Menu--}}
          @if(Session::get('page')=="navbar"
          || Session::get('page')=="banner"
          || Session::get('page')=="about.info"
          || Session::get('page')=="about.us"
          || Session::get('page')=="packagetype"
          || Session::get('page')=="package"
          || Session::get('page')=="service"
          || Session::get('page')=="service.info"
          || Session::get('page')=="project"
          || Session::get('page')=="blog"
          || Session::get('page')=="testimonial"
          || Session::get('page')=="footer"
          || Session::get('page')=="aboutus.contact"
          || Session::get('page')=="contact.us")

          <?php $menuOpen = "menu-open";
           $active = "active" ?>
          @else
          <?php $menuOpen = ""; $active = ""?>
          @endif
          <li class="nav-item has-treeview  {{ $menuOpen }} ">
            <a href="#" class="nav-link {{ $active}}">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Banner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>


            <ul class="nav nav-treeview">
              @if(Session::get('page')=="navbar")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.navbar') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Navbar</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="banner")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>       
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.banner') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Banner</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="about.info")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.edit.about.info') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Info</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="about.us")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.edit.about.us') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="packagetype")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.packagetype') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Package Type</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="package")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.package') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Our Packages</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="service")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.service') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Our Services</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="service.info")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.edit.service.info') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service Info</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="project")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.project') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Our Projects</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="blog")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.blog') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Blog</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="testimonial")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.testimonial') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Guest Testimonial</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="footer")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.edit.footer') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Footer</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="aboutus.contact")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.aboutus.contact') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>About Us Request</p>
                </a>
              </li>
            </ul>

            <ul class="nav nav-treeview">
              @if(Session::get('page')=="contactus")
                 <?php $active = "active"; ?>
                 @else
                 <?php $active = ""; ?>
                 @endif
              <li class="nav-item">
                <a href="{{ route('admin.contact.us') }}" class="nav-link {{ $active}}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact Us Request</p>
                </a>
              </li>
            </ul>
            
          </li>



          {{-- this is for order --}}
          @if(Session::get('page')=="showorder"
             || Session::get('page')=="users")
          <?php $menuOpen = "menu-open";
          $active = "active" ?>
         @else
         <?php $menuOpen = ""; $active = ""?>
         @endif
         
         <li class="nav-item has-treeview  {{ $menuOpen }} ">
           <a href="#" class="nav-link {{ $active}}">
       <i class="nav-icon fas fa-th"></i>
       <p>
         Order
         <i class="right fas fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
       @if(Session::get('page')=="showorder")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
       <li class="nav-item">
         <a href="{{ url('admin/showorder') }}" class="nav-link {{ $active}}">
           <i class="far fa-circle nav-icon"></i>
           <p>Show Order Packages</p>
         </a>
       </li>
     </ul>

     <ul class="nav nav-treeview">
      @if(Session::get('page')=="users")
         <?php $active = "active"; ?>
         @else
         <?php $active = ""; ?>
         @endif
      <li class="nav-item">
        <a href="{{ route('admin.users') }}" class="nav-link {{ $active}}">
          <i class="far fa-circle nav-icon"></i>
          <p>Users</p>
        </a>
      </li>
    </ul>
   </li>

          @if(Session::get('page')=="settings" || Session::get('page')=="update-admin-details")
          <?php $menuOpen = "menu-open";
          $active = "active" ?>
         @else
         <?php $menuOpen = ""; $active = ""?>
         @endif
         
         <li class="nav-item has-treeview  {{ $menuOpen }} ">
           <a href="#" class="nav-link {{ $active}}">
       <i class="nav-icon fas fa-th"></i>
       <p>
         Settings
         <i class="right fas fa-angle-left"></i>
       </p>
     </a>
     <ul class="nav nav-treeview">
       @if(Session::get('page')=="settings")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
       <li class="nav-item">
         <a href="{{ url('admin/settings') }}" class="nav-link {{ $active}}">
           <i class="far fa-circle nav-icon"></i>
           <p>Update Admin Password</p>
         </a>
       </li>
       @if(Session::get('page')=="update-admin-details")
          <?php $active = "active"; ?>
          @else
          <?php $active = ""; ?>
          @endif
       <li class="nav-item">
         <a href="{{ url('admin/update-admin-details') }}" class="nav-link {{ $active}}">
           <i class="far fa-circle nav-icon"></i>
           <p>Update Admin Details</p>
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