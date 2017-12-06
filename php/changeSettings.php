<?php
  include 'database.php';

  session_start();

  if(isset($_POST['btnSave'])){

    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $surname = mysqli_real_escape_string($connection, $_POST['surname']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $currentPassword = mysqli_real_escape_string($connection, $_POST['currentPassword']);
    $newPassword1 = mysqli_real_escape_string($connection, $_POST['newPassword1']);
    $newPassword2 = mysqli_real_escape_string($connection, $_POST['newPassword2']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);

    //error handlers
    //check for empty fields
    if(empty($name) || empty($surname) || empty($email)){
      header("Location: ../accountSettings?save=empty");
      exit();
    } else {
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../accountSettings?save=invalidEmail");
        exit();
      }else{
        if(!empty($currentPassword)){
          if((empty($newPassword1) || empty($newPassword2)){
            header("Location: ../accountSettings?save=emptyPasswords");
            exit();
          }else(!($newPassword1 == $newPassword2)){
            header("Location: ../accountSettings?save=noMatchingPasswords");
            exit();
          }
        }else {
          if()
        }
      }
    }

  }else{
    header("Location: ../accountSettings?error")
  }
 ?>
