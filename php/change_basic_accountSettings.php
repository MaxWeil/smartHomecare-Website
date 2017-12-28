<?php
  include 'database.php';

  session_start();

  $sqlQuery = " UPDATE employee
                SET name=\"".$_GET['name']."\", surname=\"".$_GET['surname']."\", email=\"".$_GET['email']."\", phone=\"".$_GET['phone']."\"
                WHERE employee.ID=".$_GET['id'];
  $result = mysqli_query($connection, $sqlQuery);

  $_SESSION['u_phone'] = $_GET['phone'];

  echo "success";

  exit();
 ?>
