<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document Viewer</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            padding: 20px;
        }
        iframe {
            margin-top: 20px;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
    @if($data)
        <div>
            <h1>{{ $data->name }}</h1>
            <p>{{ $data->deskripsi }}</p>
            <iframe 
                src="{{ url('/assets/' . $data->file) }}" 
                width="85%" 
                height="975px">
            </iframe>
        </div>
    @else
        <p>Data tidak ditemukan.</p>
    @endif
</body>
</html>
