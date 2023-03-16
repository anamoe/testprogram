<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('')}}">
        <div class="sidebar-brand-icon">
            <!-- <img class="rounded-circle" src="{{asset('public/logo/logoku.jpg')}}" width="60" height="auto" alt=""> -->
            
        </div>
        <div class="sidebar-brand-text mx-3">LKP Kursus Speedy</div>
    </a>

    <!-- Divider -->

    <hr class="sidebar-divider my-0">
    <li class="nav-item active ">
        <a class="nav-link">
        <i class="fas fa-fw fa-user"></i>
            <span>INSTRUKTUR</span></a>
    </li>
    
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::segment(1) === 'admin_dashboard' ? 'active' : null }}">
        <a class="nav-link" href="{{url('home')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span></a>
    </li>
    <li class="nav-item {{ Request::segment(1) === 'admin_dashboard' ? 'active' : null }}">
        <a class="nav-link" href="{{url('jadwal-instruktur')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Jadwal Kursus</span></a>
    </li>
    

    <li class="nav-item {{ Request::segment(1) === 'logout' ? 'active' : null }}">
        <a class="nav-link" href="{{url('logout')}}">
            <i class="fas fa-fw fa-home"></i>
            <span>Logout</span></a>
    </li>

    <!-- Divider -->
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>


</ul>
