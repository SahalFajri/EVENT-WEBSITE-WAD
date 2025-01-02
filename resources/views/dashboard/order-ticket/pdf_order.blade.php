<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MelodyMania Deetail Order Ticket</title>
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
    <h1 style="font-size: 24px; margin: 0;">MelodyMania Detail Order Ticket</h1>
  </div>

  <table>
    <thead>
      <tr>
        <th>Item Name</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Total</th>
        <th>Created At</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($order->details as $detail)
        <tr>
          <td>{{ $detail->ticket->name }}</td>
          <td>{{ $detail->quantity }}</td>
          <td>Rp{{ number_format($detail->price, 0, ',', '.') }}</td>
          <td>Rp{{ number_format($detail->quantity * $detail->price, 0, ',', '.') }}</td>
          <td>{{ $detail->created_at }}</td>
        </tr>
      @endforeach
    </tbody>
  </table>

  <footer style="text-align: center; margin-top: 30px;">
    <p>© MelodyMania Detail Order Ticket</p>
  </footer>
</body>

</html>
