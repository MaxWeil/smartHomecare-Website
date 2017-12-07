<?php

  if(isset($_POST['btnSave'])){

    //variables to validate
    $name = $_POST['surname'];

    //error booleans
    $errorEmpty = false;
    $errorInvalid = false;

    if(empty($name) == true){
      echo "please type a surname!";
      $errorEmpty = true;
    }elseif (!preg_match("/^[a-zA-Z'-]+$/", $surname)) {
      echo "please type a valid surname!"
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
