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
    <link rel="stylesheet" href="./css/contentStyle.css">
    <link rel="icon" href="./img/logo.jpg">
    <link href="./fonts/ubuntu.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Dashboard</title>

  </head>

  <body class="bodyDashboard">

    <?php
      include_once 'navbar.php';
     ?>
    <div class="welcome">
      <?php echo("Logged in as ".$_SESSION['u_name']." ".$_SESSION['u_surname']);?>
      <a href="accountSettings.php">change Account Settings</a>
    </div>

    <a href="employees.php">
      <div id="employeeCount">

      </div>
    </a>

    <a href="clients.php">
      <div id="clientCount">

      </div>
    </a>

    <?php
      include_once 'footer.php';
     ?>

  </body>

</html>
