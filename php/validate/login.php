<?php
  include '../database.php';
  session_start();

  //get email & password from form
  $email = mysqli_real_escape_string($connection, $_GET['email']);
  $password = mysqli_real_escape_string($connection, $_GET['password']);

  //get row from accounts db
  $sqlQuery = "SELECT * FROM employee WHERE email=\"".$email."\"";
  $result = mysqli_query($connection, $sqlQuery);
  $row = mysqli_fetch_assoc($result);

  //error booleans
  $errorEmail = false;
  $errorPassword = false;

  //error messages
  $messageEmail = "Email";
  $messagePassword = "Password";

  //error handlers
  //check for empty email
  if(empty($email) == true) {
    $messageEmail = "Please type your email!";
    $errorEmail = true;
  }else{
    //check for valid email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $messageEmail = "Please type a valid email!";
      $errorEmail = true;
    }else{
      //check if account exists
      if(mysqli_num_rows($result) < 1) {
        $messageEmail = "There is no a account referring to this email adress!";
        $errorEmail = true;
      }
    }
  }

  if($errorEmail == false){
    //check for empty password
    if(empty($password) == true){
      $messagePassword = "Please enter your password";
      $errorPassword = true;
    }else{
      //check for valid password
      if(!password_verify($password, $row['password'])) {
        $messagePassword = "Wrong password!";
        $errorPassword = true;
      }
    }
  }

  if(!($errorEmail || $errorPassword)){
    //log the user in
    $_SESSION['u_id'] = $row['ID'];
    $_SESSION['u_name'] = $row['name'];
    $_SESSION['u_surname'] = $row['surname'];
    $_SESSION['u_email'] = $row['email'];
    $_SESSION['u_auth_lvl'] = $row['auth_lvl'];
    $_SESSION['u_phone'] = $row['phone'];
  }
  
  $return = '{
    "info_email" : "'.$messageEmail.'",
    "info_password" : "'.$messagePassword.'"
  }';

  echo $return;
?>
