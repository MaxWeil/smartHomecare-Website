<?php
  session_start();

  // if(!isset($_SESSION['u_id'])){
  //   header("Location: ./index.php?error");
  // }

  // if($_SESSION['u_auth_lvl'] == 0){
  //   header("Location: ./accountSettings.php");
  // }
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width">
     <meta name="description" content="!!">
     <meta name="author" content="Maximilian Weilbuchner">

     <link rel="stylesheet" href="/css/master.css">
     <link rel="stylesheet" href="/css/accountSettings.css">

     <link rel="icon" href="./img/logo.png">
     <link rel="fonts" href="./fonts/ubuntu.css">

     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
     <script src="./js/topbar-navigation.js"></script>
     <script src="./js/validate/basic_accountSettings.js"></script>
     <script src="./js/validate/password_accountSettings.js"></script>
     <script src="./js/accountSettings.js"></script>

     <title>Account</title>
   </head>
   <body>
     <?php include './components/topbar-navigation.php'; ?>

     <div class="content">
       <p class="heading">Account</p>

       <div class="settings-container">
         <form id="form-basic" class="settings-form">
           <p class="settings-heading">Basic Information</p>

           <input id="name" class="input settings-input" type="text" name="name">
           <p id="name-info" class="input-info settings-input-info">Name</p>

           <input id="surname" class="input settings-input" type="text" name="surname">
           <p id="surname-info" class="input-info settings-input-info">Surname</p>

           <input id="email" class="input settings-input" type="text" name="email">
           <p id="email-info" class="input-info settings-input-info">Email</p>

           <input id="phone" class="input settings-input" type="text" name="phone">
           <p id="phone-info" class="input-info settings-input-info">Phone</p>

           <p id="button-basic-info" class="input-info settings-input-info"></p>
           <button id="settings-save-button" class="button settings-save-button" type="submit" name="btnSaveBasic" onclick="save_basic_accountSettings()">save</button>
         </form>
       </div>

       <div class="settings-container">
         <form id="form-password" class="settings-form">
           <p class="settings-heading">Change password</p>

           <input id="password" class="input settings-input" type="password" name="password">
           <p id="password-info" class="input-info settings-input-info">Password</p>

           <input id="newPassword" class="input settings-input" type="password" name="newPassword">
           <p id="newPassword-info" class="input-info settings-input-info">New password</p>

           <input id="newPasswordConfirm" class="input settings-input" type="password" name="newPasswordConfirm">
           <p id="newPasswordConfirm-info" class="input-info settings-input-info">Confirm new password</p>

           <p id="button-password-info" class="input-info settings-input-info"></p>
           <button id="button-password" class="button settings-save-button" type="submit" name="btnSavePassword" onclick="save_password_accountSettings()">save new password</button>
         </form>
       </div>
     </div>

     <?php include './components/footer.php'; ?>
   </body>
 </html>
