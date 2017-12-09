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
     <link rel="icon" href="./img/logo.png">
     <link href="./fonts/ubuntu.css" rel="stylesheet">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
     <script>

     $(document).ready(function() {
       $("input").keyup(function() {
         var name = $("#name").val();
         var surname = $("#surname").val();
         var email = $("#email").val();
         var currentPassword = $("#currentPassword").val();
         var newPassword1 = $("#newPassword1").val();
         var newPassword2 = $("#newPassword2").val();
         var phone = $("#phone").val();
         var submit = $("btnSave").val();

         $("#pName").load("php/validate/accountSettings/name.php", {name: name});
         $("#pSurname").load("php/validate/accountSettings/surname.php", {surname: surname});
         $("#pEmail").load("php/validate/accountSettings/email.php", {email: email});
         $("#pPassword").load("php/validate/accountSettings/password.php", {password: currentPassword});
         $("#pNewPassword1, #pNewPassword2").load("php/validate/accountSettings/accountSettings/newPassword.php", {newPassword1: newPassword1, newPassword2: newPassword2});
         $("#phone").load("php/validate/accountSettings/phone.php");
       });
     });

     </script>

     <title>Account Settings</title>
   </head>
   <body class="bodyAccountSettings">
    <?php
      include_once 'navbar.php'
    ?>

    <div class="Settings">
      <span>Your Account</span>

      <form class="settingsForm" action="php/validate/login.php" method="POST">
        <input id="name" class="inputField inputFieldSettings" type="text" name="name" value=<?php echo $_SESSION['u_name'];?> >
        <p id="pName">Name</p>

        <input id="surname" class="inputField inputFieldSettings" type="text" name="surname" value=<?php echo $_SESSION['u_surname'];?> >
        <p id="pSurname">Surname</p>

        <input id="email" class="inputField inputFieldSettings" type="text" name="email" value=<?php echo $_SESSION['u_email'];?> >
        <p id="pEmail">Email</p>

        <input id="currentPassword" class="inputField inputFieldSettings" type="password" name="currentPassword">
        <p id="pOldPassword">current password</p>

        <input id="newPassword1" class="inputField inputFieldSettings" type="password" name="newPassword1">
        <p id="pNewPassword1">new password</p>

        <input id="newPassword2" class="inputField inputFieldSettings" type="password" name="newPassword2">
        <p id="pNewPassword2">confirm new password</p>

        <input type="phone" class="inputField inputFieldSettings" type="text" name="phone" value=<?php echo $_SESSION['phone'];?> >
        <p id="phone">phone number</p>

        <button id="btnSave" type="submit" name="btnSave">save settings</button>
      </form>

    </div>

    <?php
      include_once 'footer.php'
    ?>
   </body>
 </html>
