<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="{{ route('mahasiswa.form') }}" method="POST">
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
            <label for="nim">NIM:</label>
            <input type="text" class="form-control" id="nim" name="nim" value="{{ old('nim') }}" required>
            @error('nim')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="angkatan">Angkatan:</label>
            <input type="number" class="form-control" id="angkatan" name="angkatan" value="{{ old('angkatan') }}" required>
            @error('angkatan')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="jurusan">Jurusan:</label>
            <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ old('jurusan') }}" required>
            @error('jurusan')
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
    
</body>
</html>