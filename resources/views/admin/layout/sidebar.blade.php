<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
   <div class="sb-sidenav-menu">
      <div class="nav">
         <a class="nav-link {{ request()->is('admmin/dashboard') ? 'active' : '' }}" title="Dashboard" href="{{url('admin/dashboard')}}">
            <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
            Dashboard
         </a>
      </div>
   </div>
</nav>