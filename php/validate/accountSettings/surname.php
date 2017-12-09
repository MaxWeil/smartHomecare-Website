<?php

  if(isset($_POST['surname'])){

    //variables to validate
    $surname = $_POST['surname'];

    //error booleans
    $errorEmpty = false;
    $errorInvalid = false;

    if(empty($surname) == true){
      echo "please type a surname!";
      $errorEmpty = true;
    }elseif (preg_match("/^[a-zA-Z'-]+$/", $surname) == false) {
      echo "please type a valid surname!";
      $errorInvalid = true;
    }
    else{
      echo "Surname";
    }

  }else{
    header("Location: ../../accountSettings.php?error");
    exit();
  }

 ?>

<script>
  $("#surname").removeClass("input-error-field");
  $("#psurname").removeClass("input-error-description");

  var errorEmpty = "<?php echo $errorEmpty; ?>"
  var errorInvalid = "<?php echo $errorInvalid; ?>"

  if((errorEmpty == true) || (errorInvalid == true)){
    $("#surname").addClass("input-error-field");
    $("#psurname").addClass("input-error-description");
  }
</script>
