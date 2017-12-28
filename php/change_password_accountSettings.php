<?php
  include './database.php';

  session_start();

  $password = password_hash($_GET['password'], PASSWORD_DEFAULT);

  $sqlQuery = " UPDATE employee
                SET password=\"".$password."\"
                WHERE employee.ID=".$_GET['id'];

  $result = mysqli_query($connection, $sqlQuery);

  echo "success";

  exit();
 ?>
