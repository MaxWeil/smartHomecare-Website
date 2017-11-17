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
     <link rel="stylesheet" href="./css/accountSettings.css">
     <link rel="icon" href="./img/logo.jpg">
     <link href="./fonts/ubuntu.css" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

     <title>Account Settings</title>
   </head>
   <body class="bodyAccountSettings">
    <?php
      include_once 'navbar.php'
    ?>

    <div class="Settings">
      <span>Your Account</span>

      <form class="settingsForm" action="php/changeSettings.php" method="POST">
        <input class="inputField inputFieldSettings" type="text" name="name" value=
          <?php
            echo $_SESSION['u_name'];
           ?>
        >
        <p>Name</p>

        <input class="inputField inputFieldSettings" type="text" name="surname" value=
          <?php
            echo $_SESSION['u_surname'];
           ?>
        >
        <p>Surname</p>

        <input class="inputField inputFieldSettings" type="text" name="email" value=
          <?php
            echo $_SESSION['u_email'];
           ?>
        >
        <p>EMail</p>

        <input class="inputField inputFieldSettings" type="password" name="oldPassword">
        <p>current password</p>

        <input class="inputField inputFieldSettings" type="password" name="newPassword1">
        <p>new password</p>

        <input class="inputField inputFieldSettings" type="password" name="newPassword2">
        <p>confirm new password</p>

        <button id="saveButton" type="submit" name="btnSaveSettings">save settings</button>
      </form>

    </div>

    <?php
      include_once 'footer.php'
    ?>
   </body>
 </html>
