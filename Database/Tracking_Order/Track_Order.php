<!DOCTYPE html>
<html lang="en">
<html>
<head>
<script src="track_order_script.js"></script>
<link  rel="stylesheet" type="text/css" href="track_order_style.css">
</head>
<body>
<h1>Tracking Order</h1>
<table id="table">
  <thead>
    <tr>
      <th>Order ID</th>
      <th>Product Name</th>
      <th>Quantity</th>
      <th>Price</th>
      <th>Status</th>
      <th>Address</th>
      <th>SOT</th>
    </tr>
  </thead>
  <tbody>
    <?php include_once("track_order_server.php"); ?>
  </tbody>
</table>
</body>
</html>
