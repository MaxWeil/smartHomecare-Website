function login(){
  $('.form').submit(function(event){
    event.preventDefault();

    var email = $("#email").val();
    var password = $("#password").val();

    $.get("../php/validate/login.php", {
      email: email,
      password: password
    }, function(data){
      var messages = JSON.parse(data);

      $('#email-info').text(messages['info_email']);
      $('#password-info').text(messages['info_password']);

      //manage css classes
      if(messages['info_email'] != "Email"){
        $('#email').addClass("input-error");
        $('#email-info').addClass("input-info-error");
      }else{
        $('#email').removeClass("input-error")
        $('#email-info').removeClass("input-info-error");
      }

      if(messages['info_password'] != "Password"){
        $('#password').addClass("input-error");
        $('#password-info').addClass("input-info-error");
      }else{
        $('#password').removeClass("input-error");
        $('#password-info').removeClass("input-info-error");
      }

      if((messages['info_email'] == "Email") && (messages['info_password'] == "Password")){
        window.location = "../dashboard.php";
      }

    });
  });
}
