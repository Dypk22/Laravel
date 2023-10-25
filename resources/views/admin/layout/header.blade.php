<nav class="sb-topnav navbar navbar-expand navbar-light bg-clr">
   <a class="navbar-brand logo-brand" href="/">{{config('constants.site_name')}}</a>
   <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
   <a href="{{config('constants.site_path')}}" target="_blank" class="frnt-link"><i class="fas fa-external-link-alt"></i>Home</a>
   <ul class="navbar-nav ml-auto mr-md-0">
      <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
         <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <!-- <a class="dropdown-item admin-dropdown-item" href="edit_profile">Edit Profile</a> -->
            @php $name = explode(' ', Auth::user()->name); @endphp
            <a class="dropdown-item admin-dropdown-item" href="{{url('admin/profile')}}">Hey {{ $name[0] }}!</a>
            <a class="dropdown-item admin-dropdown-item" href="{{url('admin/logout')}}">{{ __('Logout') }}</a>
         </div>
      </li>
   </ul>
</nav>