<?php
  session_start();

//  if (isset($_SESSION['u_id']))
//    header("Location: ./dashboard.php");
 ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta name="description" content="!!">
    <meta name="author" content="Maximilian Weilbuchner">

    <link rel="stylesheet" href="/css/master.css">
    <link rel="stylesheet" href="/css/login.css">

    <link rel="icon" href="./img/logo.png">
    <link rel="fonts" href="./fonts/ubuntu.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>

    <title>smartHomecare Login</title>
  </head>
  <body>
    <div class="login-container">
      <form class="form">
        <img id="login-logo" src="./img/logo.png">

        <p id="info-span"></p>

        <input class="input" id="email-input" type="text" name="email">
        <p class="input-info" id="email-info">Email</p>

        <input class="input" id="password-input" type="password" name="password">
        <p class="input-info" id="password-info">Password</p>

        <button class="button" id="login-button" type="submit" name="btnLogin" onclick="login()">Login</button>
      </form>
    </div>

    <footer class="footer">
      <span>&copy; smartHomecare - Dimploma Project: Maximilian Kapper | Noah Zuchna | Maximilian Weilbuchner</span>
    </footer>

    <script>
      function login() {
          $(".form").submit(function(event) {
            event.preventDefault();
            var email = $("#email-input").val();
            var password = $("#password-input").val();

            $("#info-span").load("./php/login.php", {
              email: email,
              password: password
            });
          });
      }
    </script>

  </body>
</html>
