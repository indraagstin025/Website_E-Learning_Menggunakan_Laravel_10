<!-- Custom styles for this page -->
@extends('halaman_dashboard.index')
@if (Auth::user()->role === 'admin')
    @section('navitem')
          <!-- Divider -->
              
          <hr class="sidebar-divider d-none d-md-block" style="border-color: black;">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/admin" style="color:black;">
                <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
                <span>Dashboard</span></a>
        </li>

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
                    <a class="collapse-item" href="{{ route('datamahasiswa') }}" style="color:black;">Data Mahasiswa</a>
                </div>
            </div>
        </li>
       
        <hr class="sidebar-divider d-none d-md-block" style="border-color: black;">
<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle" style="background-color: black;"></button>
</div>
    @endsection
@elseif(Auth::user()->role === 'user')
    @section('navitem')

    <hr class="sidebar-divider my-0" style="color:black;" >

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active" >
            <a class="nav-link" href="/user">
                <i class="fas fa-fw fa-tachometer-alt" style="color:black;"></i>
                <span style="color:black;">Dashboard</span></a>
        </li>
     <hr class="sidebar-divider" style="color:black;">

        

        
        <!-- Divider -->
       

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
                    <a class="collapse-item" href="{{ route('datamahasiswa') }}" style="color:black;">Data Mahasiswa</a>
                    <a class="collapse-item" href="{{ route('datamateri') }}" style="color: black;">Daftar Materi</a>
                </div>
            </div>
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
        <h1 class="h3 mb-2 text-gray-800">Data Mahasiswa</h1>
        

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary mb-4">Data Mahasiswa</h6>
                <button type="button" class="btn btn-primary" onclick="window.location.href='/user'">Dashboard</button>

                {{-- new --}}
                @if ( $isAdmin = Auth::user()->role === 'admin')
                <a href="/damatambah" class="btn-sm btn-primary text-decoration-none">Tambah data</a>

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
            @endif
            <div class="card-body">
                @foreach ($data as $item)
                    <div class="card mb-1">
                        <div class="card-body p-4 d-flex flex-column flex-md-row align-items-start"> 
                            <img src="{{ asset('picture/accounts/' . $item->gambar) }}" alt="image" class="img-thumbnail rounded mr-3 mb-3 mb-md-0" style="width: 120px; height: 160px;">
                            <div class="w-100" style="font-family: Arial, sans-serif; font-size: 10pt;">
                                <dl class="row">
                                    <dt class="col-md-4">Nama:</dt>
                                    <dd class="col-md-8">{{ $item->nama_lengkap }}</dd>
            
                                    <dt class="col-md-4">Email:</dt>
                                    <dd class="col-md-8">{{ $item->email }}</dd>
            
                                    <dt class="col-md-4">NIDN:</dt>
                                    <dd class="col-md-8">{{ $item->nim }}</dd>
            
                                    <dt class="col-md-4">Angkatan:</dt>
                                    <dd class="col-md-8">{{ $item->angkatan }}</dd>
            
                                    <dt class="col-md-4">Jurusan:</dt>
                                    <dd class="col-md-8">{{ $item->jurusan }}</dd>
            
                                    <dt class="col-md-4">Tanggal Lahir:</dt>
                                    <dd class="col-md-8">{{ $item->tanggal_lahir }}</dd>
                                </dl>
                            </div>
            
                            <div class="mt-2 mt-md-0 ml-md-auto"> <div class="d-flex flex-column flex-md-row align-items-md-end">
                                <a href="/editdatainstructor/{{ $item->id }}" class="btn btn-warning btn-sm mb-2 mb-md-0 mr-md-2">Edit</a>
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
                @endforeach
            </div>
            
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Arial&family=Courier+New&display=swap" rel="stylesheet">

