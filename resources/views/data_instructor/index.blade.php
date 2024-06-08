<!-- Custom styles for this page -->
@extends('halaman_dashboard.index')
@if (Auth::user()->role === 'admin')
    @section('navitem')
        <!-- Divider -->
        <hr class="sidebar-divider my-0" style="color:black;" >

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/admin" style="color:black;">
                <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="color:black;">

        <!-- Heading -->
        <div class="sidebar-heading" style="color:black;">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo" style="color:black;">
                <i class="fas fa-fw fa-cog" style="color:black;"></i>
                <span>Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                <div class="bg-white py-2 collapse-inner rounded" style="color:black;">
                    <h6 class="collapse-header" style="color:black;">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html" style="color:black;">Buttons</a>
                    <a class="collapse-item" href="cards.html" style="color:black;">Cards</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities" style="color:black;">
                <i class="fas fa-fw fa-wrench" style="color:black;"></i>
                <span>Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header" style="color:black;">Custom Utilities:</h6>
                    <a class="collapse-item" href="{{ route('usercontrol') }}" style="color:black;">User Control</a>
                    <a class="collapse-item" href="utilities-color.html" style="color:black;">Colors</a>
                    <a class="collapse-item" href="utilities-border.html" style="color:black;">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html" style="color:black;">Animations</a>
                    <a class="collapse-item" href="utilities-other.html"style="color:black;">Other</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="color:black;">

        <!-- Heading -->
        <div class="sidebar-heading" style="color:black;">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages" style="color:black;">
                <i class="fas fa-fw fa-folder" style="color:black;"></i>
                <span>Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header" style="color:black;">Login Screens:</h6>
                    <a class="collapse-item" href="{{ route('datainstructor') }}" style="color:black;">Data Instructor</a>
                    <a class="collapse-item" href="login.html" style="color:black;">Login</a>
                    <a class="collapse-item" href="register.html" style="color:black;">Register</a>
                    <a class="collapse-item" href="forgot-password.html" style="color:black;">Forgot Password</a>
                    <div class="collapse-divider" style="color:black;"></div>
                    <h6 class="collapse-header" style="color:black;">Other Pages:</h6>
                    <a class="collapse-item" href="404.html" style="color:black;">404 Page</a>
                    <a class="collapse-item" href="blank.html" style="color:black;">Blank Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html" style="color:black;">
                <i class="fas fa-fw fa-chart-area" style="color:black;"></i>
                <span>Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html">
                <i class="fas fa-fw fa-table"></i>
                <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" style="color:black;">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline" style="color:black;">
            <button class="rounded-circle border-0" id="sidebarToggle" style="color:black;"></button>
        </div>
    @endsection
@elseif(Auth::user()->role === 'instructor')
    @section('navitem')
        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active" >
            <a class="nav-link" href="/user">
                <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
                <span style="color:black;">Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider" style="color:black;">

        <!-- Heading -->
        <div class="sidebar-heading" style="color:black;">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo "
                aria-expanded="true" aria-controls="collapseTwo" style="color:black;">
                <i class="fas fa-fw fa-cog" style="color:black;"></i>
                <span style="color:black;">Components</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar" >
                <div class="bg-white py-2 collapse-inner rounded" style="color:black;">
                    <h6 class="collapse-header" style="color:black;">Custom Components:</h6>
                    <a class="collapse-item" href="buttons.html" style="color:black;">Buttons</a>
                    <a class="collapse-item" href="cards.html" style="color:black;">Cards</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                aria-expanded="true" aria-controls="collapseUtilities" style="color:black;">
                <i class="fas fa-fw fa-wrench" style="color:black;"></i>
                <span style="color:black;">Utilities</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar" >
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                    <a class="collapse-item" href="utilities-other.html">Other</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading" style="color:black;">
            Addons
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" style="color:black;">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                aria-expanded="true" aria-controls="collapsePages" style="color:black;">
                <i class="fas fa-fw fa-folder" style="color:black;"></i>
                <span style="color:black;">Pages</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded" style="color:black;">
                    <h6 class="collapse-header" style="color:black;">Login Screens:</h6>
                    <a class="collapse-item" href="{{ route('datainstructor') }}" style="color:black;">Data Instructor</a>
                    <a class="collapse-item" href="login.html" style="color:black;">Login</a>
                    <a class="collapse-item" href="register.html" style="color:black;">Register</a>
                    <a class="collapse-item" href="forgot-password.html" style="color:black;">Forgot Password</a>
                    <div class="collapse-divider" style="color:black;"></div>
                    <h6 class="collapse-header" style="color:black;">Other Pages:</h6>
                    <a class="collapse-item" href="404.html" style="color:black;">404 Page</a>
                    <a class="collapse-item" href="blank.html" style="color:black;">Blank Page</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="charts.html" style="color:black;">
                <i class="fas fa-fw fa-chart-area" style="color:black;"></i>
                <span style="color:black;">Charts</span></a>
        </li>

        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="tables.html" style="color:black;">
                <i class="fas fa-fw fa-table" style="color:black;"></i>
                <span style="color:black;">Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block" style="color:black;">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle" style="color:black;"></button>
        </div>
    @endsection
@endif
@section('main')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Data Instructor</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-4">Data Instructor</h6>
        
                @if ( $isAdmin = Auth::user()->role === 'admin')
                <a href="/tambahdatainstructor" class="btn btn-primary btn-sm">Tambah Data</a>
                @endif
        
                {{-- Error Handling dan Success Message --}}
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
        
                @if (Session::has('success'))
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        Swal.fire(
                            'Sukses',
                            '{{ Session::get('success') }}',
                            'success'
                        );
                    });
                </script>
                @endif
            </div>
            <div class="card-body">
                @foreach ($data as $item)
                    <div class="card mb-3">
                        <div class="card-body">
                            <td class="py-1">
                                <img src="{{ asset('picture/accounts/' . $item->gambar) }}" alt="image" height="50" width="50" />

                            </td>
                            
                                    <p class="card-text"><strong>Nama: </strong>{{ $item->nama_lengkap }}</p>
                                    <p class="card-text"><strong>Email:</strong> {{ $item->email }}</p>
                                    <p class="card-text"><strong>NIDN:</strong> {{ $item->nidn }}</p>
                                    <p class="card-text"><strong>Departemen:</strong> {{ $item->departemen }}</p>
                                    <p class="card-text"><strong>Tanggal Lahir:</strong> {{ $item->tanggal_lahir }}</p>
                                    <div class="mt-2">
                                        <a href="/editdatainstructor/{{ $item->id }}" class="btn btn-warning btn-sm">Edit</a>
                                        @if (Auth::user()->role === 'admin')
                                            <form onsubmit="return confirmHapus(event)" action="/hapusdatainstructor/{{ $item->id }}" method="post" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
        
    <!-- /.container-fluid -->
@endsection
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    function confirmHapus(event) {
        event.preventDefault(); // Menghentikan form dari pengiriman langsung

        Swal.fire({
            title: 'Yakin Hapus Data?',
            text: "Data yang dihapus tidak dapat dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
            cancelButtonText: 'Batal'
        }).then((willDelete) => {
            if (willDelete.isConfirmed) {
                event.target.submit(); // Melanjutkan pengiriman form
            } else {
                swal('Your imaginary file is safe!');
            }
        });
    }
</script>
