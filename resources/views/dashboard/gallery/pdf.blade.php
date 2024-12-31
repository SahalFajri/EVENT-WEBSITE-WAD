<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            padding: 20px;
        }
        .gallery-item {
            margin-bottom: 20px;
        }
        .gallery-item img {
            max-width: 100%;
            height: auto;
        }
        .gallery-item h3 {
            margin: 10px 0 5px;
            font-size: 18px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gallery</h1>
        @foreach($galleries as $gallery)
            <div class="gallery-item">
                <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/storage/'.$gallery->image))); ?>" width="120">
                <h3>{{ $gallery->image_alt }}</h3>
            </div>
        @endforeach
    </div>
</body>
</html>
