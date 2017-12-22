<?php
  include 'database.php';
  session_start();

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

  //error handlers
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
              $_SESSION['u_auth_lvl'] = $row['auth_lvl'];
              $_SESSION['phone'] = $row['phone'];

              //forward user to dashboard
              echo "<script>window.location = \"../dashboard.php\"</script>";
              exit();
            }
          }
        }
      }
    }
  }
?>

<script>
  $("#email-info").removeClass("error-info");
  $("#password-info").removeClass("error-info");

  var errorEmailEmpty        = "<?php echo $errorEmailEmpty; ?>";
  var errorEmailInvalid      = "<?php echo $errorEmailInvalid; ?>";
  var errorEmailNonExistent  = "<?php echo $errorEmailNonExistent; ?>";
  var errorPasswordEmpty     = "<?php echo $errorPasswordEmpty?>";
  var errorPasswordWrong     = "<?php echo $errorPasswordWrong; ?>";

  if(errorEmailEmpty || errorEmailInvalid || errorEmailNonExistent)
    $("#email-info").addClass("error-info");

  if(errorPasswordEmpty || errorPasswordWrong)
    $("#password-info").addClass("error-info");

</script>
