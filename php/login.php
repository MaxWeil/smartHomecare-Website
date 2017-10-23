<?php
  if(isset($POST['submit'])){
    include_once 'database.php';

    $email = mysql_real_escape_string($dbConnection, $_POST['userEmail']);
    $password = mysql_real_escape_string($dbConnection, $_POST['userPassword']);

    //error handlers
    // check for empty fields
    if(empty($email) || empty($password)){
      header("Location: ../index.php=empty");
      exit();
    } else {
      //check for valid characters
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../index.php=invalidEmail");
        exit();
      } else {
        $sqlQuery = "SELECT * FROM "
      }
    }

  }else{
    header("Location: ../index.php");
    exit();
  }
 ?>
