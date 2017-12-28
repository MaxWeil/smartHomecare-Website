<?php
  session_start();

  if(!isset($_SESSION['u_id'])){
    header("Location: ./login.php");
  }

  if(isset($_SESSION['u_id'])){
    header("Location: ./dashboard.php");
  }

 ?>
