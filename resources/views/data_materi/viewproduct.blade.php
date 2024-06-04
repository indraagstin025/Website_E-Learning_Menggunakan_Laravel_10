<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @if($data)
        <div class="text-center">
            <h1>{{ $data->name }}</h1>
            <p>{{ $data->deskripsi }}</p>

            @php
                $filePath = url('/assets/' . $data->file);
                $extension = pathinfo($data->file, PATHINFO_EXTENSION);
            @endphp

            @if($extension == 'pdf')
                <embed src="{{ $filePath }}" width="85%" height="975px" type="application/pdf"></embed>
            @elseif(in_array($extension, ['jpg', 'jpeg', 'png', 'gif']))
                <img src="{{ $filePath }}" alt="{{ $data->name }}" style="max-width: 100%; height: auto;">
            @elseif(in_array($extension, ['mp4', 'webm', 'ogg']))
                <video width="85%" height="auto" controls>
                    <source src="{{ $filePath }}" type="video/{{ $extension }}">
                    Your browser does not support the video tag.
                </video>
            @elseif(in_array($extension, ['docx', 'pptx']))
                <embed src="{{ url('/assets/' . pathinfo($data->file, PATHINFO_FILENAME) . '.pdf') }}" width="85%" height="975px" type="application/pdf"></embed>
            @else
                <p>Format file tidak didukung untuk pratinjau.</p>
                <a href="{{ $filePath }}" download>Download File</a>
            @endif
        </div>
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</body>
</html>
