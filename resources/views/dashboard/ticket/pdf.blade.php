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
    <h1 style="font-size: 24px; margin: 0;">MelodyMania Tickets</h1>
    <p style="font-size: 16px; color:#777">List of all tickets</p>

  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>Name</th>
        <th>Stock</th>
        <th>Price</th>
        <th>Description</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($tickets as $ticket)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $ticket->name }}</td>
          <td>{{ $ticket->stock }}</td>
          <td>{{ $ticket->price }}</td>
          <td>{{ $ticket->description }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <footer style="text-align: center; margin-top: 30px;">
    <p>© MelodyMania Tickets</p>
  </footer>
</body>

</html>
