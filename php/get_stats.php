<?php
  include 'database.php';

  //get count of employees
  $sqlQuery = "SELECT * FROM employee";
  $result = mysqli_query($connection, $sqlQuery);
  $countEmployees = mysqli_num_rows($result);

  //get count of clients
  $sqlQuery = "SELECT * FROM client";
  $result = mysqli_query($connection, $sqlQuery);
  $countClients = mysqli_num_rows($result);

  //echo data in JSON format
  $return = '{
    "clients" : "'.$countClients.'",
    "employees" : "'.$countEmployees.'"
  }';

  echo $return;
  exit();
 ?>
