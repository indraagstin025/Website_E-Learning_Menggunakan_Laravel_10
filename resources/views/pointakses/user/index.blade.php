@extends('halaman_dashboard.index')
@section('navitem')
    <!-- Divider -->
   <!-- Divider -->
<hr class="sidebar-divider my-0" style="border-color: black;">

<!-- Nav Item - Dashboard -->
<li class="nav-item active">
    <a class="nav-link" href="/user" style="color: black;">
        <i class="fas fa-fw fa-tachometer-alt" style="color: black;"></i>
        <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider" style="border-color: black;">

<!-- Heading -->
<div class="sidebar-heading" style="color: black;">
    Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
        aria-controls="collapseTwo" style="color: black;">
        <i class="fas fa-fw fa-cog" style="color: black;"></i>
        <span>Components</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" style="color: black;">Custom Components:</h6>
            <a class="collapse-item" href="buttons.html" style="color: black;">Buttons</a>
            <a class="collapse-item" href="cards.html" style="color: black;">Cards</a>
        </div>
    </div>
</li>

<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities" style="color: black;">
        <i class="fas fa-fw fa-wrench" style="color: black;"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" style="color: black;">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html" style="color: black;">Colors</a>
            <a class="collapse-item" href="utilities-border.html" style="color: black;">Borders</a>
            <a class="collapse-item" href="utilities-animation.html" style="color: black;">Animations</a>
            <a class="collapse-item" href="utilities-other.html" style="color: black;">Other</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider" style="border-color: black;">

<!-- Heading -->
<div class="sidebar-heading" style="color: black;">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
        aria-expanded="true" aria-controls="collapsePages" style="color: black;">
        <i class="fas fa-fw fa-folder" style="color: black;"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" style="color: black;">Login Screens:</h6>
            <a class="collapse"></a>
            <a class="collapse-item" href="login.html" style="color: black;">Login</a>
            <a class="collapse-item" href="register.html" style="color: black;">Register</a>
            <a class="collapse-item" href="forgot-password.html" style="color: black;">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header" style="color: black;">Other Pages:</h6>
            <a class="collapse-item" href="404.html" style="color: black;">404 Page</a>
            <a class="collapse-item" href="blank.html" style="color: black;">Blank Page</a>
        </div>
    </div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html" style="color: black;">
        <i class="fas fa-fw fa-chart-area" style="color: black;"></i>
        <span>Charts</span></a>
</li>

<!-- Nav Item - Tables -->
<li class="nav-item">
    <a class="nav-link" href="tables.html" style="color: black;">
        <i class="fas fa-fw fa-table" style="color: black;"></i>
        <span>Tables</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block" style="border-color: black;">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: black;"></button>
</div>

@endsection
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 fs-5 font-monospace">
                                    {{ Auth::user()->email }}</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ Auth::user()->role }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i> <!-- Change from fa-calendar to fa-users -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            

           

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="col-auto">
                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                    </div>
                                    <div class="col">
                                        <div class="progress progress-sm mr-2">
                                            <div class="progress-bar bg-info" role="progressbar" style="width: 50%"
                                                aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Pending Requests</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-comments fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>     
@endsection
