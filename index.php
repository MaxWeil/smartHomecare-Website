<?php
  session_start();
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-height">
    <meta name="description" content="!!">
    <meta name="author" content="Maximilian Weilbuchner">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./img/logo.jpg">
    <link href="./fonts/ubuntu.css" rel="stylesheet">

    <title>smartHomecare Login</title>
  </head>
  <body id="loginBody">
    <?php
      if(isset($_SESSION['u_id'])){
        echo "logged in!";
      } else {
        echo "not logged in!";
      }
     ?>
    <div class="loginContainer">

      <!--<div id="txtLogin">Login</div>-->

      <img src="img/logo.jpg">

      <form class="loginForm" action="php/login.php" method="POST">
        <input class="inputField" type="text" name="userEMail" placeholder="E-Mail">
        <input class="inputField" type="password" name="userPassword" placeholder="Password">

        <button id="loginButton" type="submit" name="btnLogin">Login</button>
      </form>

    </div>

    <footer id="loginFooter">
      <span>&copy; smartHomecare - Dimploma Project: Maximilian Kapper (Server & Database) | Noah Zuchna (Mobile App) | Maximilian Weilbuchner (Website)</span>
    </footer>

  </body>
</html>
