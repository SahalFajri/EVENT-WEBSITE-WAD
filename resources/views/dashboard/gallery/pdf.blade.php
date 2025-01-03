<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMania Gallery</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px 0;
      font-size: 16px;
      text-align: left;
    }

    table,
    th,
    td {
      border: 1px solid black;
    }

    th,
    td {
      padding: 12px;
    }

    th {
      background-color: #f2f2f2;
      text-align: center;
    }

    tbody tr:nth-child(even) {
      background-color: #f9f9f9;
    }
  </style>
</head>

<body>
  <div style="text-align: center; margin-bottom: 20px;">
    <h1 style="font-size: 24px; margin: 0;">MelodyMania Galleries</h1>
    <p style="font-size: 16px; color:#777">List of all galleries</p>

  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Image</th>
        <th>Image Alt</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($galleries as $gallery)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>
            <img src="data:image/png;base64,<?php echo base64_encode(file_get_contents(base_path('public/storage/' . $gallery->image))); ?>" width="120">
          </td>
          <td>{{ $gallery->image_alt }}</td>
          <td>{{ $gallery->created_at->format('d M Y H:i') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <footer style="text-align: center; margin-top: 30px;">
    <p>© MelodyMania Galleries</p>
  </footer>
</body>

</html>
