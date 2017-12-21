<?php
include 'database.php';

session_start();

if(true){
  //get email & password from form
  $email = mysqli_real_escape_string($connection, $_POST['email']);
  $password = mysqli_real_escape_string($connection, $_POST['password']);

  //get row from accounts db
  $sqlQuery = "SELECT * FROM employee WHERE email=\"".$email."\"";
  $result = mysqli_query($connection, $sqlQuery);
  $row = mysqli_fetch_assoc($result);

  //error booleans
  $errorEmailEmpty = false;
  $errorEmailInvalid = false;
  $errorEmailNonExistent = false;
  $errorPasswordEmpty = false;
  $errorPasswordInvalid = false;

  //check for empty email
  if(empty($email) == true) {
    echo "Please type your email!";
    $errorEmailEmpty = true;
  }else{
    //check for empty password
    if(empty($password) == true){
      echo "Please enter your password";
      $errorPasswordEmpty = true;
    }else{
      //check for valid email format
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please type a valid email!";
        $errorEmailInvalid = true;
      }else{
        //check if account exists
        if(mysqli_num_rows($result) < 1) {
          echo "There is no a account referring to this email adress!";
          $errorEmailNonExistent = true;
        }else{
          //check for valid password
          if(!password_verify($password, $row['password'])) {
            echo "Wrong email/password combination!";
            $errorPasswordInvalid = true;
          } else {
            //if there is no error -> clear the info paragraph & log the user in
            echo "";
            if(($errorEmailEmpty && $errorEmailInvalid && $errorEmailNonExistent && $errorPasswordEmpty && $errorPasswordInvalid) ==  false){
              //log the user in
              $_SESSION['u_id'] = $row['ID'];
              $_SESSION['u_name'] = $row['name'];
              $_SESSION['u_surname'] = $row['surname'];
              $_SESSION['u_email'] = $row['email'];
              $_SESSION['u_hashed_password'] = $row['password'];
              $_SESSION['u_auth_lvl'] = $row['auth_lvl'];
              $_SESSION['phone'] = $row['phone'];

              //header("Location: ../dashboard.php?login=success");
              echo "<script>window.location = \"../\"</script>";
              exit();
            }
          }
        }
      }
    }
  }
}else{
  header("Location: ../index.php?error");
  exit();
}
?>

<script>
  $("#email").removeClass("input-error-field");
  $("#pEmail").removeClass("input-error-description");

  var errorEmailEmpty        = "<?php echo $errorEmailEmpty; ?>";
  var errorEmailInvalid      = "<?php echo $errorEmailInvalid; ?>";
  var errorEmailNonExistent  = "<?php echo $errorEmailNonExistent; ?>";
  var errorPasswordEmpty     = "<?php echo $errorPasswordEmpty?>";
  var errorPasswordWrong     = "<?php echo $errorPasswordWrong; ?>";

  if(errorEmailEmpty || errorEmailInvalid || errorEmailNonExistent || errorPasswordEmpty || errorPasswordWrong){
    $("#pInfo").addClass("input-error-description");
  } else if(!(errorEmailEmpty && errorEmailInvalid && errorEmailTaken && errorPasswordWrong)){
    $_POST['loginEmail'] = $email;
    $_POST['loginPassword'] = $password;
  }
</script>
