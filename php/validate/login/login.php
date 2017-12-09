<?php
include '../../database.php';

if(isset($_POST['btnLogin'])){

  //variables to validate
  $email = $_POST['email'];
  $password = $_POST['password'];

  //check if email is already taken
  $sqlQuery = "SELECT * FROM employee WHERE email=\"".$email."\"";
  $result = mysqli_query($connection, $sqlQuery);
  $row = mysqli_fetch_assoc($result);

  //error booleans
  $errorEmailEmpty = false;
  $errorEmailInvalid = false;
  $errorEmailTaken = false;
  $errorPasswordEmpty = false;
  $errorPasswordWrong = false;

  if(empty($email) == true) {
    echo "Please type a email!";
    $errorEmailEmpty = true;
  }else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Please type a valid email!";
    $errorEmailInvalid = true;
  }else if(mysqli_num_rows($result) < 1) {
    echo "There is no a account referring to this email adress!";
    $errorEmailTaken = true;
  }else if(!password_verify($password, $row['password'])) {
    echo "Wrong email/password combination!"
    $errorPasswordWrong = true;
  }else {
    echo "";
  }

}else{
  header("Location: ../../accountSettings.php?error");
  exit();
}
 ?>

 <script>
   $("#email").removeClass("input-error-field");
   $("#pEmail").removeClass("input-error-description");

   var errorEmailEmpty = "<?php echo $errorEmailEmpty; ?>"
   var errorEmailInvalid = "<?php echo $errorEmailInvalid; ?>"
   var errorEmailTaken = "<?php echo $errorEmailTaken; ?>"
   var errorPasswordWrong = "<?php echo $errorPasswordWrong; ?>"

   if((errorEmailEmpty == true) || (errorEmailInvalid == true) || (errorEmailTaken == true) || (errorPasswordWrong == true)){
     $("#pInfo").addClass("input-error-description");
   } else if(!(errorEmailEmpty && errorEmailInvalid && errorEmailTaken && errorPasswordWrong)){
     incude;
   }

 </script>
