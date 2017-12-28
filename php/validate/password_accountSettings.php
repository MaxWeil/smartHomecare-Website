<?php
  include '../database.php';

  session_start();

  //getting data from $_GET
  $password = $_GET['password'];
  $newPassword = $_GET['newPassword'];
  $newPasswordConfirm = $_GET['newPasswordConfirm'];
  $id = $_GET['id'];

  //error booleans
  $errorPassword = false;
  $errorNewPassword = false;
  $errorNewPasswordConfirm = false;

  //error messages
  $messagePassword = "Password";
  $messageNewPassword = "New password";
  $messageNewPasswordConfirm = "Confirm new password";

  //check for validity
  //password
  //check if empty
  if(empty($password)){
    $messagePassword = "Please type your password!";
    $errorPassword = true;
  } else{
    //check if password is valid
    $sqlQuery = "SELECT password FROM employee WHERE id=".$id;
    $result = mysqli_query($connection, $sqlQuery);

    $row = mysqli_fetch_assoc($result);

    if(!password_verify($password, $row['password'])){
      $messagePassword = "Wrong password!";
      $errorPassword = true;
    }
  }

  //new password
  //check if empty
  if(empty($newPassword)){
    $messageNewPassword = "Please type a new password!";
    $errorNewPassword = true;
  }

  //new passwornd confirmation
  //check if empty
  if(empty($newPasswordConfirm)){
    $messageNewPasswordConfirm = "Please confirm your new password!";
    $errorNewPasswordConfirm = true;
  }else{
    //check if new passwords match
    if(!($newPassword === $newPasswordConfirm)){
      $messageNewPasswordConfirm = "The passwords don't match!";
      $errorNewPasswordConfirm = true;
    }
  }

  $ready = false;

  if(!($errorPassword || $errorNewPassword || $errorNewPasswordConfirm)){
    $ready = true;
  }

  //echo data in JSON format
  $return = '{
    "info_password" : "'.$messagePassword.'",
    "info_newPassword" : "'.$messageNewPassword.'",
    "info_newPasswordConfirm" : "'.$messageNewPasswordConfirm.'",
    "ready" : "'.$ready.'"
  }';

  echo $return;

 ?>
