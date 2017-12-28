<?php
  session_start();

  $session = '{
    "name":"'.$_SESSION['u_name'].'",
    "surname":"'.$_SESSION['u_surname'].'",
    "email":"'.$_SESSION['u_email'].'",
    "phone":"'.$_SESSION['u_phone'].'",
    "id":"'.$_SESSION['u_id'].'"
  }';

  echo $session;
 ?>
