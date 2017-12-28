function save_password_accountSettings(){
  $("#form-password").submit(function(event){
    event.preventDefault();
    $.get("../php/get_session.php", function(session){
      messages = JSON.parse(session);

      var password = $('#password').val();
      var newPassword = $('#newPassword').val();
      var newPasswordConfirm = $('#newPasswordConfirm').val();
      var id = messages['id'];


      $.get("../php/validate/password_accountSettings.php", {
        password: password,
        newPassword: newPassword,
        newPasswordConfirm: newPasswordConfirm,
        id: id
      }, function (data){
        var messages = JSON.parse(data);

        $('#password-info').text(messages['info_password']);
        $('#newPassword-info').text(messages['info_newPassword']);
        $('#newPasswordConfirm-info').text(messages['info_newPasswordConfirm']);

        //password
        if(messages['info_password'] != "Password"){
          $('#password').addClass("input-error");
          $('#password-info').addClass("input-info-error");
        }else{
          $('#password').removeClass("input-error");
          $('#password-info').removeClass("input-info-error");
        }

        //new password
        if(messages['info_newPassword'] != "New password"){
          $('#newPassword').addClass("input-error");
          $('#newPassword-info').addClass("input-info-error");
        }else{
          $('#newPassword').removeClass("input-error");
          $('#newPassword-info').removeClass("input-info-error");
        }

        //new password confirmation
        if(messages['info_newPasswordConfirm'] != "Confirm new password"){
          $('#newPasswordConfirm').addClass("input-error");
          $('#newPasswordConfirm-info').addClass("input-info-error");
        }else{
          $('#newPasswordConfirm').removeClass("input-error");
          $('#newPasswordConfirm-info').removeClass("input-info-error");
        }

        $('#button-password-info').text("");

        if(messages['ready'] == true){
          $.get("../php/change_password_accountSettings.php", {
            password: newPassword,
            id: id
          }, function(success){
            $('#button-password-info').text("");
            $('#button-password-info').removeClass("button-info-success");
            $('#button-password-info').removeClass("button-info-error");

            $('#button-password-info').text(success);

            if(success == "success"){
              $('#button-password-info').text("success!");
              $('#button-password-info').addClass("button-info-success");
              $('#password').val("");
              $('#newPassword').val("");
              $('#newPasswordConfirm').val("");
            }else{
              $('#button-password-info').text("error!");
              $('#button-password-info').addClass("button-info-error");
            }
          });
        }
      });
    });
  });
}
