<?php

  session_start();

  if(isset($_SESSION['u_id'])){

  }else{
    header("Location: index.php?error");
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
    <link rel="stylesheet" href="./css/contentStyle.css">
    <link rel="icon" href="./img/logo.jpg">
    <link href="./fonts/ubuntu.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Clients</title>
  </head>
  <body>

  </body>
</html>
