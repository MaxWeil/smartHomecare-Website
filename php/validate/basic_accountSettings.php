<?php
  include '../database.php';

  session_start();

  //getting data from $_GET
  $name = $_GET['name'];
  $surname = $_GET['surname'];
  $email = $_GET['email'];
  $phone = $_GET['phone'];

  //error booleans
  $errorName = false;
  $errorSurname = false;
  $errorEmail = false;
  $errorPhone = false;

  //error messages
  $messageName = "Name";
  $messageSurname = "Surname";
  $messageEmail = "Email";
  $messagePhone = "Phone";

  //check for validity
  //name
  //check if empty
  if(empty($name) == true){
    $messageName = "Please type a name!";
    $errorName = true;
  }else{
    //check for valid characters
    if(preg_match("/^[a-zA-Z'-]+$/", $name) == false){
      $messageName = "Please type a valid name!";
      $errorName = true;
    } else{
      $messageName = "Name";
    }
  }

  //surname
  //check if empty
  if(empty($surname) == true){
    $messageSurname = "Please type a surname!";
    $errorSurname = true;
  }else{
    //check for valid characters
    if(preg_match("/^[a-zA-Z'-]+$/", $surname) == false){
      $messageSurname = "Please type a valid surname!";
      $errorSurname = true;
    } else{
      $messageSurname = "Surname";
    }
  }

  //email
  //check if empty
  if(empty($email) == true){
    $messageEmail = "Please type a email!";
    $errorEmail = true;
  }else{
    //check for valid characters & format
    if(filter_var($email, FILTER_VALIDATE_EMAIL) == false){
      $messageEmail = "Please type a valid email!";
      $errorEmail = true;
    }else{
      //check if email is taken
      $sqlQuery = "SELECT * FROM employee WHERE email=\"".$email."\" AND NOT ID=".$_SESSION['u_id'];
      $result = mysqli_query($connection, $sqlQuery);
      if(mysqli_num_rows($result) > 0){
        $messageEmail = "Email is already taken!";
        $errorEmail = true;
      }else{
        $messageEmail = "Email";
      }
    }
  }

  //phone
  //check for valid phone
  // if(/*phone is invalid*/){
  //   $messagePhone = "Please type a valid phone number!";
  //   $errorPhoneInvalid = true;
  // }else{
      //check if phone is already taken
      $sqlQuery = "SELECT * FROM employee WHERE phone=\"".$phone."\" AND NOT ID=".$_SESSION['u_id'];
      $result = mysqli_query($connection, $sqlQuery);
      if(mysqli_num_rows($result) > 0){
        $messagePhone = "Phone number is already taken!";
        $errorPhone = true;
      }else{
        $messagePhone = "Phone";
      }
  // }
  $ready = false;

  if(!($errorName || $errorSurname || $errorEmail || $errorPhone)){
    $ready = true;
  }

  //echo data in JSON format
  $return = '{
    "info_name" : "'.$messageName.'",
    "info_surname" : "'.$messageSurname.'",
    "info_email" : "'.$messageEmail.'",
    "info_phone" : "'.$messagePhone.'",
    "ready" : "'.$ready.'"
  }';

  echo $return;
 ?>
