<?php
session_start();
if(!isset($_POST['rcode'])):
header('Location:index.php');
endif;
include("includes/dbconn.php");
$rcode = $_POST['rcode'];
$sql = "SELECT * FROM reservations WHERE rcode = '$rcode'";
$result = $conn->query($sql);

if($result->num_rows > 0){
  while($row = $result->fetch_assoc()){
    $reservation_code = $row['rcode'];
    $name = $row['client_name'];
    $email = $row['email'];
    $res_date = $row['res_date'];
    $contact_num = $row['contact_number'];
    $address = $row['address'];
    $venue = $row['venue'];
    $pax = $row['pax'];
    $total_price = $row['total_price'];
    $date_made = $row['date_made'];
    $status = $row['status'];
  }
}
 ?>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <!-- Title and other stuffs -->
  <title>Confirm Reservation - Aganon's Catering</title>
  <style>
    .tblHeading{
      width:130px;
    }
    h4,h3{
      margin:0px;
    }
    table {
    table-layout: auto;
    border-collapse: collapse;
    width: 100%;
}
table td {
    border: 0px solid #ccc;
}
table .absorbing-column {
    width: 100%;
}
  </style>
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<div id="printable">
<body>
<h3 style="text-align:center">Aganon's Catering Services</h3>
<h4 style="text-align:center">2027 E.Florentino Sampaloc, Manila</h4>
<h4 style="text-align:center">Mobile No. : 09214670134</h4>
<h4 style="text-align:center">Email : catering.aganon@gmail.com</h4>
<hr>
<center>
<div class="alert alert-success">
  <b>Reminder: Please print your reservation summary and take note of your reservation code for reservation inquiry.</b>
</div>
  <table style="width:50%">
    <tr>
      <th class="tblHeading">Reservation Code: </th>
      <td><?php echo $reservation_code; ?></td>
      <th>Reservation Date: </th>
      <td><?php echo $res_date; ?></td>
    </tr>
    <tr>
      <th class="tblHeading">Name: </th>
      <td><?php echo $name; ?></td>
      <th class="tblHeading">Email: </th>
      <td><?php echo $email; ?></td>
    </tr>
    <tr>
      <th class="tblHeading">Contact #: </th>
      <td><?php echo $contact_num; ?></td>
      <th class="tblHeading">Venue for the Event: </th>
      <td><?php echo $venue; ?></td>
    </tr>
    <tr>
      <th class="tblHeading">Address: </th>
      <td><?php echo $address; ?></td>
      <th class="tblHeading">Total Payable: </th>
      <td><?php echo $total_price; ?>&#8369</td>
    </tr>
    <tr>
      <th class="tblHeading">Reservation Status: </th>
      <td><?php echo $status; ?></td>
      <th class="tblHeading">No. of PAX: </th>
      <td><?php echo $pax; ?></td>
    </tr>

      <tr>
       <th class="tblHeading">Date Inquired: </th>
      <td><?php echo $date_made; ?></td>
      <!-- <th class="tblHeading">Motif: </th>
      <td>Blue</td>
    </tr> -->
  </table>
  <br><hr>
  <h4> Menus </h4>
  <?php
    include(includes/dbconn.php);
    $sql = "SELECT * FROM orders WHERE rcode = '$rcode'";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $order_name = $row['order_name'];
        $quantity = $row['quantity'];
  ?>
    <p><?php echo $order_name; ?> ............. <?php echo $quantity; ?>pcs
  <?php
}}session_destroy();
   ?>

</center>
</div>
<br>
<center>
  <div class="btn-group btn-group-lg" role="group" aria-label="...">
      <button type="button" onclick="printDiv('printable')" class="btn btn-primary fa fa-print"> Print</button>
      <!--<button type="button" onclick="cancel()" class="btn btn-danger fa fa-remove"> Cancel</button>
      <button type="button" onclick="confirm()"  class="btn btn-success fa fa-check"> Confirm</button> -->
  </div>
</center>
<br>
<script>
function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
function cancel(){
  window.location = 'session_destroy.php';
}
function confirm(){
  window.location = 'save_reservation.php';
}
</script>

</body>
</html>
