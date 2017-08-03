<?php
  session_start();
  if(empty($_SESSION['rcode'])):
  header('Location:index.php');
  endif;
  include("includes/dbconn.php");
  $name = $_SESSION['name'];
  $email = $_SESSION['email'];
  $date = $_SESSION['date'];
  $time = $_SESSION['time'];
  $contact_num = $_SESSION['contact_num'];
  $address = $_SESSION['address'];
  $venue = $_SESSION['venue'];
  $pax = $_SESSION['pax'];
  $rcode = $_SESSION['rcode'];
  $total_price = $_SESSION['total_price'];
  $date_made = date("m-d-y", strtotime($date));
  $sql = "INSERT INTO reservations (client_name,email,res_date,res_time,contact_number,address,venue,pax,rcode,total_price,date_made) VALUES('{$name}','{$email}','{$date}','{$time}','{$contact_num}','{$address}','{$venue}','{$pax}','{$rcode}','{$total_price}','{$date_made}')";

  if ($conn->query($sql) === TRUE) {
    foreach($_SESSION['post']['menus'] as $order){
      $sql = "INSERT INTO orders (rcode,order_name,quantity) VALUES('{$rcode}','{$order}','{$pax}')";
      if ($conn->query($sql) === TRUE) {
        header('Location: session_destroy.php');
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }
    }
    $conn->close();
  } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
  }
?>
