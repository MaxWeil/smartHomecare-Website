$.get('../php/get_session.php', function(data){
  var session = JSON.parse(data);

  $.get('../php/get_basic_info.php', {
    id: session['id']
  }, function(message){
    var basic = JSON.parse(message);

    $('#name').val(basic['name']);
    $('#surname').val(basic['surname']);
    $('#email').val(basic['email']);
    $('#phone').val(basic['phone']);
  })
});

$(document).keyup(function() {
  $(document).ready(function(){
    var name = $('#name').val();
    var surname = $('#surname').val();
    var email = $('#email').val();
    var phone = $('#phone').val();

    $.get('../php/validate/basic_accountSettings.php', {
      name: name,
      surname: surname,
      email: email,
      phone: phone
    }, function(data){
      var messages = JSON.parse(data);

      $('#name-info').text(messages['info_name']);
      $('#surname-info').text(messages['info_surname']);
      $('#email-info').text(messages['info_email']);
      $('#phone-info').text(messages['info_phone']);

      if(messages['info_name'] != "Name"){
        $("#name").addClass("input-error");
        $("#name-info").addClass("input-info-error");
      }else{
        $("#name").removeClass("input-error");
        $("#name-info").removeClass("input-info-error");
      }

      //surname
      if(messages['info_surname'] != "Surname"){
        $("#surname").addClass("input-error");
        $("#surname-info").addClass("input-info-error");
      }else{
        $("#surname").removeClass("input-error");
        $("#surname-info").removeClass("input-info-error");
      }

      //email
      if(messages['info_email'] != "Email"){
        $("#email").addClass("input-error");
        $("#email-info").addClass("input-info-error");
      }else{
        $("#email").removeClass("input-error");
        $("#email-info").removeClass("input-info-error");
      }

      //phone
      if(messages['info_phone'] != "Phone"){
        $("#phone").addClass("input-error");
        $("#phone-info").addClass("input-info-error");
      }else {
        $("#phone").removeClass("input-error");
        $("#phone-info").removeClass("input-info-error");
      }
    });
  });
});

function save_basic_accountSettings(){
  $('#form-basic').submit(function(event){
    event.preventDefault();

    var name = $('#name').val();
    var surname = $('#surname').val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var id;

    $.get("../php/get_session.php", function(data){
      var messages = JSON.parse(data);
      id = messages['id'];
    })

    $.get('../php/validate/basic_accountSettings.php', {
      name: name,
      surname: surname,
      email: email,
      phone: phone
    }, function(data){
      var messages = JSON.parse(data);

      if(messages['ready'] == true){
        $.get('../php/change_basic_accountSettings.php', {
          name: name,
          surname: surname,
          email: email,
          phone: phone,
          id: id
        },function(success){
          $('#button-basic-info').text("");
          $('#button-basic-info').removeClass("button-info-success");
          $('#button-basic-info').removeClass("button-info-error");

          if(success == "success"){
            $('#button-basic-info').text("success!");
            $('#button-basic-info').addClass("button-info-success");
          }else{
            $('#button-basic-info').text("error!");
            $('#button-basic-info').addClass("button-info-error");
          }
        });
      }
    });
  });
}
