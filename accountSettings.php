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

     <?php echo $_SESSION['test']; ?>

     <title>Account Settings</title>
   </head>
   <body class="bodyAccountSettings">
    <?php
      include_once 'navbar.php'
    ?>

    <div class="Settings">
      <span>Your Account</span>

      <form class="settingsForm" action="php/changeSettings.php" method="POST">
        <input id="fieldName" class="inputField inputFieldSettings" type="text" name="name" value=<?php echo $_SESSION['u_name'];?> >
        <p id="pName">Name</p>

        <input id="fieldSurname" class="inputField inputFieldSettings" type="text" name="surname" value=<?php echo $_SESSION['u_surname'];?> >
        <p id="pSurname">Surname</p>

        <input id="fieldEmail" class="inputField inputFieldSettings" type="text" name="email" value=<?php echo $_SESSION['u_email'];?> >
        <p id="pEmail">E-Mail</p>

        <input id="fieldOldPassword" class="inputField inputFieldSettings" type="password" name="currentPassword">
        <p id="pOldPassword">current password</p>

        <input id="fieldNewPassword1" class="inputField inputFieldSettings" type="password" name="newPassword1">
        <p id="pNewPassword1">new password</p>

        <input id="fieldNewPassword2" class="inputField inputFieldSettings" type="password" name="newPassword2">
        <p id="pNewPassword2">confirm new password</p>

        <input type="phone" class="inputField inputFieldSettings" type="text" name="phone" value=<?php echo $_SESSION['phone'];?> >
        <p id="phone">phone number</p>

        <button id="saveButton" type="submit" name="btnSave">save settings</button>
      </form>

    </div>

    <?php
      include_once 'footer.php'
    ?>
   </body>
 </html>
