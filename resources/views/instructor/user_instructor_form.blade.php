<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
    @if (!session('instructor_form_filled'))
    <form action="{{ route('instructor.store') }}" method="POST">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    
        <div class="form-group">
            <label for="name">Nama :</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="nidn">NIDN:</label>
            <input type="text" class="form-control" id="nidn" name="nidn" value="{{ old('nidn') }}" required>
            @error('nidn')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="program_studi">Program Studi:</label>
            <input type="text" class="form-control" id="program_studi" name="program_studi" value="{{ old('program_studi') }}" required>
            @error('program_studi')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="nama_lengkap">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengka" name="nama_lengkap" value="{{ old('nama_lengkap') }}" required>
            @error('nama_lengkap')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="tanggal_lahir">Tanggal Lahir</label>
            <input type="text" class="tanggal_lahir" id="tanggal_lahir" name="tanggal_lahir" value="{{ old('tanggal_lahir') }}" required>
            @error('tanggal_lahir')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <button type="submit" class="btn btn-primary">Kirim Data</button>
    </form>
    @else
    <p>Tambahkan Data Anda</p>
    <a class="collapse-item" href="{{ route('instructor.form') }}" style="color: black;">Isi Data Tambahan</a>
    <a class="collapse-item" href="{{ route('datainstructor') }}">Cek Data Anda</a>
@endif
</body>
</html>