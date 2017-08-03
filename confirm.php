<?php
session_start();
if(empty($_SESSION['rcode'])):
header('Location:index.php');
endif;
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
      <td><?php echo $_SESSION['rcode']; ?></td>
      <th>Reservation Date: </th>
      <td>Aug 05, 2017</td>
    </tr>
    <tr>
      <th class="tblHeading">Name: </th>
      <td><?php echo $_SESSION['name']; ?></td>
      <th class="tblHeading">Email: </th>
      <td><?php echo $_SESSION['email']; ?></td>
    </tr>
    <tr>
      <th class="tblHeading">Contact #: </th>
      <td><?php echo $_SESSION['contact_num']; ?></td>
      <th class="tblHeading">Venue for the Event: </th>
      <td><?php echo $_SESSION['venue']; ?></td>
    </tr>
    <tr>
      <th class="tblHeading">Address: </th>
      <td><?php echo $_SESSION['address']; ?></td>
      <th class="tblHeading">Total Payable: </th>
      <td><?php echo $_SESSION['total_price']; ?>&#8369</td>
    </tr>
    <tr>
      <th class="tblHeading">Reservation Status: </th>
      <td><?php echo "Pending"; ?></td>
      <!-- <td class="tblHeading">Balance: </td>
      <td>2700.00</td> -->
    </tr>
    <!--
      <tr>
       <th class="tblHeading">Team Assigned: </th>
      <td>Team A</td> -->
      <!-- <th class="tblHeading">Motif: </th>
      <td>Blue</td>
    </tr>
  -->
  </table>
  <br><hr>
  <h4> Menus </h4>
  <?php
    include(includes/dbconn.php);
    foreach($_SESSION['post']['menus'] as $id){
  ?>
    <p><?php echo $id; ?> ............. <?php echo $_SESSION['pax']; ?>pcs
  <?php
    }
   ?>

</center>
</div>
<br>
<center>
  <div class="btn-group btn-group-lg" role="group" aria-label="...">
      <button type="button" onclick="printDiv('printable')" class="btn btn-primary fa fa-print"> Print</button>
      <button type="button" onclick="cancel()" class="btn btn-danger fa fa-remove"> Cancel</button>
      <button type="button" onclick="confirm()"  class="btn btn-success fa fa-check"> Confirm</button>
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
