@extends('halaman_dashboard.index')
@section('navitem')
<!-- Divider -->
<hr class="sidebar-divider my-0" style="border-color: black;"">

    <!-- Nav Item - Dashboard -->
    <li class=" nav-item active">
<a class="nav-link" href="/admin" style="color: black;">
    <i class="fas fa-fw fa-tachometer-alt" style="color: black;"></i>
    <span>Dashboard</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider" style="border-color: black;">


<!-- Nav Item - Utilities Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true"
        aria-controls="collapseUtilities" style="color: black;">
        <i class="fas fa-fw fa-wrench" style="color: black;"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" style="color: black;">Custom Utilities:</h6>
            <a class="collapse-item" href="{{ route('usercontrol') }}" style="color: black;">User Control</a>
        </div>
    </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider" style="color: black;">

<!-- Heading -->
<div class="sidebar-heading" style="color: black;">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
        aria-controls="collapsePages" style="color: black;">
        <i class="fas fa-fw fa-folder" style="color: black;"></i>
        <span>Pages</span>
    </a>
    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header" style="color: black;">Login Screens:</h6>
            <a class="collapse-item" href="{{ route('datamahasiswa') }}" style="color: black;">Data Mahasiswa</a>
            <a class="collapse-item" href="{{ route('datainstructor') }}" style="color: black;">Data Instructor</a>
            <a class="collapse-item" href="{{ route('datamateri') }}" style="color: black;">Daftar Materi</a>
            <div class="collapse-divider"></div>
        </div>
    </div>
</li>



<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block" style="color: black;">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle" style="color: black;"></button>
</div>
@endsection
@section('main')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ Auth::user()->email }}</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ Auth::user()->role }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endsection