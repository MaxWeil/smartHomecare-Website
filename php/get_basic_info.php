<?php
  include 'database.php';

  $sqlQuery = "SELECT * FROM employee WHERE ID=".$_GET['id'];
  $result = mysqli_query($connection, $sqlQuery);

  $row = mysqli_fetch_assoc($result);

  //echo data in JSON format
  $return = '{
    "name" : "'.$row['name'].'",
    "surname" : "'.$row['surname'].'",
    "email" : "'.$row['email'].'",
    "phone" : "'.$row['phone'].'"
  }';

  echo $return;
 ?>
