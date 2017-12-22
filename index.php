<?php
  session_start();

  if(isset($_SESSION['u_id'])){
    header("Location: ../dashboard.php?login=success");
  }
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-height">
    <meta name="description" content="!!">
    <meta name="author" content="Maximilian Weilbuchner">

    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="icon" href="./img/logo.png">
    <link href="./fonts/ubuntu.css" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <title>smartHomecare Login</title>
  </head>

  <body id="loginBody">
    <div class="loginContainer">

      <!--<div id="txtLogin">Login</div>-->

      <img src="img/logo.png">

      <form class="loginForm">
        <span id="pInfo"></span>

        <input id="email" class="inputField" type="text" name="email">
        <p id="pEmail">Email</p>

        <input id="password" class="inputField" type="password" name="password">
        <p id="pPassword">Password</p>

        <button id="loginButton" type="submit" name="btnLogin" onclick="loginFunc()">Login</button>
      </form>

    </div>

    <footer id="loginFooter">
      <span>&copy; smartHomecare - Dimploma Project: Maximilian Kapper  |  Noah Zuchna  |  Maximilian Weilbuchner</span>
    </footer>
<script>

function loginFunc() {
    // Code to be executed

      $(".loginForm").submit(function(event) {
        event.preventDefault();
          var email = $("#email").val();
          var password = $("#password").val();

          $("#pInfo").load("./php/login.php", {
            email: email,
            password: password
          });
      });

}



</script>
  </body>
</html>
