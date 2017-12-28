<?php
  include 'database.php';

  session_start();

  if(isset($_POST['btnLogout'])){
    session_unset();
    session_destroy();
    echo "<script>window.location = \"../index.php?success\"</script>";
    exit();
  }else{
    echo "<script>window.location = \"../dashboard.php?error\"</script>";
    exit();
  }
 ?>
