<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMania Order Ticket</title>
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
    <h1 style="font-size: 24px; margin: 0;">MelodyMania Order Ticket</h1>
    <p style="font-size: 16px; color:#777">List of all Order Ticket</p>

  </div>

  <table>
    <thead>
      <tr>
        <th>No</th>
        <th>User</th>
        <th>Order ID</th>
        <th>Ticket Name</th>
        <th>Status</th>
        <th>Notes</th>
        <th>Total Price</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($orders as $order)
        <tr>
          <th>{{ $loop->iteration }}</th>
          <td>{{ $order->user->name }}</td>
          <td>{{ $order->id }}</td>
          <td>{{ $order->details->first()->ticket->name }}</td>
          <td>{{ $order->status }}</td>
          <td>{{ $order->notes }}</td>
          <td>Rp{{ number_format($order->gross_amount, 0, ',', '.') }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <footer style="text-align: center; margin-top: 30px;">
    <p>© MelodyMania Order Ticket</p>
  </footer>
</body>

</html>
