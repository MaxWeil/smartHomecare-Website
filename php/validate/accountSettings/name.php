<?php

  if(isset($_POST['name'])){

    //variables to validate
    $name = $_POST['name'];

    //error booleans
    $errorEmpty = false;
    $errorInvalid = false;

    if(empty($name) == true){
      echo "please type a name!";
      $errorEmpty = true;
    }elseif (preg_match("/^[a-zA-Z'-]+$/", $name) == false) {
      echo "please type a valid name!";
      $errorInvalid = true;
    }
    else{
      echo "Name";
    }

  }else{
    header("Location: ../../accountSettings.php?error");
    exit();
  }

 ?>

<script>
  $("#name").removeClass("input-error-field");
  $("#pName").removeClass("input-error-description");

  var errorEmpty = "<?php echo $errorEmpty; ?>"
  var errorInvalid = "<?php echo $errorInvalid; ?>"

  if((errorEmpty == true) || (errorInvalid == true)){
    $("#name").addClass("input-error-field");
    $("#pName").addClass("input-error-description");
  }
</script>
