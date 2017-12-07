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

    //hash password
    $hashedPassword = password_hash($newPassword1, PASSWORD_DEFAULT);

    //error handlers
    //check if compulsory fields are empty
    if(empty($name) || empty($surname) || empty($email)){
      header("Location: ..accountSettings.php?save=emptyFields");
      exit();
    }else{
      //check for valid email
      if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location: ../accountSettings.php?save=invalidEmail");
        exit();
      }else{
        //check if a newPassword was entered -> check if both were entered
        if(empty($newPassword1)  != empty($newPassword2)){
          header("Location: ../accountSettings.php?save=emptyPasswords");
          exit();
        }else{
          //check if the newPasswords match
          if(!($newPassword1 === $newPassword2)){
            header("Location: ../accountSettings.php?save=unidenticalPasswords");
            exit();
          }else{
            //check for valid phone number
            if(!empty($phone) && !filter_var($phone, FILTER_SANITIZE_NUMBER_FORMAT)){
              header("Location: ../accountSettings.php?save=invalidPhone");
              exit();
            }else{
              //check for valid password
              $passwordCheck = password_verify($currentPassword, $_SESSION['u_hashed_password']);

              if($passwordCheck === false){
                header("Location: ../accountSettings.php?save=invalidPassword");
                exit();
              }else if($passwordCheck === true){
                
                //only update fields that are not empty
                function updateTable($table, $column, $value, $id){
                  $sqlQuery = " UPDATE ".$table."
                                SET ".$column."=".$value."
                                WHERE ".$table."ID=".$id;

                  $result = mysqli_query($connection, $sqlQuery);

                  //check if UPDATE was successful
                  if(mysqli_fetch_assoc($result) === false){
                    $_SESSION['test'] = "curPwd:".$currentPassword."\nhashedPwd:".$_SESSION['u_hashed_password']."\npwdCheck:".$passwordCheck."\n SQL:".$mysqli->error;
                    header("Location: ../accountSettings.php?save=SQLerror");
                    exit();
                  }
                }

                //name
                if(!empty($name)){
                  updateTable("employee", "name", $name, $_SESSION['ID']);
                }

                //surname
                if(!empty($surname)){
                  updateTable("employee", "surname", $surname, $_SESSION['ID']);
                }

                //email
                if(!empty($email)){
                  updateTable("employee", "email", $email, $_SESSION['ID']);
                }

                //password
                if(!empty($newPassword1)){
                  updateTable("employee", "password", $hashedPassword, $_SESSION['ID']);
                }

                //UPDATE even empty -> "delete"
                //phone number
                updateTable("employee", "phone", $phone, $_SESSION['ID']);

                header("Location: ../accountSettings.php?save=success");
                exit();
              }
            }
          }
        }
      }
    }

  }else{
    header("Location: ../accountSettings.php?error");
  }
 ?>
