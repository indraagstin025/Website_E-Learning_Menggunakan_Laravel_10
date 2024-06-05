<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Materi</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        @if($course)
            <div class="jumbotron bg-light p-4 my-4 rounded">
                <h1 class="display-4 text-center">{{ $course->name }}</h1>
                <p class="lead text-center">{{ $course->deskripsi }}</p>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    @if($isEnrolled || (Auth::check() && (Auth::user()->role === 'admin' || Auth::user()->role === 'instructor')))
                        <div class="card mb-4">
                            <div class="card-body">
                                @php
                                    $filePath = url('/assets/' . $course->file);
                                    $extension = pathinfo($course->file, PATHINFO_EXTENSION);
                                @endphp

                                @if($extension == 'pdf')
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="{{ $filePath }}" type="application/pdf"></iframe>
                                    </div>
                                @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                                    <img src="{{ $filePath }}" class="img-fluid" alt="{{ $course->name }}">
                                @elseif(in_array($extension, ['mp4', 'webm', 'ogg']))
                                    <div class="embed-responsive embed-responsive-16by9">
                                        <video class="embed-responsive-item" controls>
                                            <source src="{{ $filePath }}" type="video/{{ $extension }}">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                @elseif(in_array($extension, ['docx', 'pptx']))
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <iframe class="embed-responsive-item" src="{{ url('/assets/' . pathinfo($course->file, PATHINFO_FILENAME) . '.pdf') }}" type="application/pdf"></iframe>
                                    </div>
                                @else
                                    <p class="text-danger">Format file tidak didukung untuk pratinjau.</p>
                                    <a href="{{ $filePath }}" download class="btn btn-primary">Download File</a>
                                @endif
                            </div>
                        </div>
                    @else
                        <div class="alert alert-warning" role="alert">
                            Anda harus mendaftar untuk melihat materi ini.
                        </div>
                    @endif

                    @if (Auth::check() && Auth::user()->role === 'user')
                        <div class="text-center">
                            <form action="{{ route('courses.enroll', $course->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-success">Enroll</button>
                            </form>
                            @if($isEnrolled)
                                <form action="{{ route('courses.unenroll', $course->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Unenroll</button>
                                </form>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        @else
            <div class="alert alert-danger" role="alert">
                Data tidak ditemukan.
            </div>
        @endif
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
</body>
</html>
