<?php
  include 'php/database.php';

  session_start();

  if(isset($_SESSION['u_id']) == false){
    header("Location: index.php?error");
    exit();
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="!!">
    <meta name="author" content="Maximilian Weilbuchner">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/logo.jpg">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Dashboard</title>

  </head>

  <body>

<?php
  include_once 'navbar.php';
 ?>

 <?php
  $sqlQuery = mysqli_query($connection, "SELECT * FROM account WHERE ID=".$_SESSION['u_id']);
  $row = mysqli_fetch_assoc($sqlQuery);

  echo("Willkommen ".$row['name']." ".$row['surname']);
  ?>

<?php
  include_once 'footer.php';
 ?>

  </body>

</html>
