<?php

session_start();

  if(isset($POST['submit'])){
    include_once 'database.php';

    $email = mysql_real_escape_string($dbConnection, $_POST['userEmail']);
    $password = mysql_real_escape_string($dbConnection, $_POST['userPassword']);

    //error handlers
    //check for empty fields
    if(empty($email) || empty($password)){
      header("Location: ../index.php=empty");
      exit();
    } else {
      //check for valid characters
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../index.php=invalidEmail");
        exit();
      } else {
        //check if email matches to a account
        $sqlQuery = "SELECT ID FROM Account WHERE email=$email";
        $result = mysqli_query($connection, $sqlQuery);

        if(mysqli_num_rows($result) < 1){
          header("Location: ../index.php=invalidEmail");
          exit();
        }else{
          //check if account ID matches to a nurse
          $row = mysqli_fetch_assoc($result);
          $sqlQuery = "SELECT * FROM Nurse WHERE ID=$row["ID"]";
          $result = mysqli_query($connection, $sqlQuery);

          if(mysqli_num_rows($result) < 1){
            header("Location: ../index.php=invalidAccount");
            exit();
          }else{
            //de-hashing the password
            $hashedPasswordCheck = password_verify($password, $row["password"]);

            if($hashedPasswordCheck == false){
              header("Location: ../index.php=error");
              exit();
            }else if($hashedPasswordCheck == true){
              //log the user in
              $_SESSION['u_id'] = $row['ID'];
              $_SESSION['u_email'] = $row['email'];
              $_SESSION['u_name'] = $row['name'];
              $_SESSION['u_surname'] = $row['surname'];
              $_SESSION['u_auth_lvl'] = $row['auth_lvl'];
              header("Location: .. /index.php=success");
              exit();
            }

          }
        }
      }
    }
  }else{
    header("Location: ../index.php");
    exit();
  }
 ?>
