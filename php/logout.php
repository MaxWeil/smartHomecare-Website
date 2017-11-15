<?php
  include 'database.php';

  session_start();

  if(isset($_POST['btnLogout'])){

    session_unset();
    session_destroy();

    header("Location: ../index.php?Logout=success");
    exit();
  }else{
    header("Location: ../dashboard.php?Logout=error");
    exit();
  }
 ?>
