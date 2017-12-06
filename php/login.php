<?php

include 'database.php';

session_start();

  if(isset($_POST['btnLogin'])){

    $email = mysqli_real_escape_string($connection, $_POST['userEMail']);
    $password = mysqli_real_escape_string($connection, $_POST['userPassword']);

    //error handlers
    //check for empty fields
    if(empty($email) || empty($password)){
      header("Location: ../index.php?login=empty");
      exit();
    } else {
      //check for valid characters
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../index.php?login=invalidEmail");
        exit();
      } else {
        //check if email matches to a account
        $sqlQuery = "SELECT * FROM employee WHERE email='$email'";
        $result = mysqli_query($connection, $sqlQuery);


        if(mysqli_num_rows($result) < 1){
          header("Location: ../index.php?login=invalidEmail");
          exit();
        }else{

            if(mysqli_num_rows($result) < 1){
              header("Location: ../index.php?login=invalidAccount".$row['ID']);
              exit();
            }else{

              $row = mysqli_fetch_assoc($result);
              //de-hashing the password
              $hashedPasswordCheck = password_verify($password, $row['password']);

              //password check
              if($hashedPasswordCheck == false){
                header("Location: ../index.php?login=wrongPassword");
                exit();
              }else if($hashedPasswordCheck == true){
                //log in the user
                $_SESSION['u_id'] = $row['ID'];
                $_SESSION['u_name'] = $row['name'];
                $_SESSION['u_surname'] = $row['surname'];
                $_SESSION['u_email'] = $row['email'];
                $_SESSION['u_auth_lvl'] = $row['auth_lvl'];
                $_SESSION['phone'] = $row['phone'];

                header("Location: ../dashboard.php?login=success");
                exit();
              }
            }
        }
      }
    }
  }else{
    header("Location: ../index.php?login=error");
    exit();
  }
 ?>
