<?php
  include_once '../../database.php';

  session_start();

  if(isset($_SESSION['u_id']) == false){
    header("Location: index.php?error");
    exit();
  }else{
    if(isset($_POST['email'])){

      //variables to validate
      $email = $_POST['email'];

      //check if emai is already taken
      $sqlQuery = "SELECT * FROM employee WHERE email=\"".$email."\" AND NOT ID=".$_SESSION['u_id'];
      $result = mysqli_query($connection, $sqlQuery);

      //error booleans
      $errorEmpty = false;
      $errorInvalid = false;
      $errorEmailTaken = false;

      if(empty($email) == true) {
        echo "Please type a email!";
        $errorEmpty = true;
      }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please type a valid Email!";
        $errorInvalid = true;
      }elseif(mysqli_num_rows($result) > 0) {
        echo "Pmail already taken!";
        $errorEmailTaken = true;
      }else {
        echo "Email";
      }

    }else{
      header("Location: ../../accountSettings.php?error");
      exit();
    }
  }
 ?>

<script>
  $("#email").removeClass("input-error-field");
  $("#pEmail").removeClass("input-error-description");

  var errorEmpty = "<?php echo $errorEmpty; ?>"
  var errorInvalid = "<?php echo $errorInvalid; ?>"
  var errorEmailTaken = "<?php echo $errorEmailTaken; ?>"

  if((errorEmpty == true) || (errorInvalid == true) || (errorEmailTaken == true)){
    $("#email").addClass("input-error-field");
    $("#pEmail").addClass("input-error-description");
  }
</script>
