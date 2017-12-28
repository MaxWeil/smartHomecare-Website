$("input").keyup(function() {
  var name = $("#name").val();
  var surname = $("#surname").val();
  var email = $("#email").val();
  var phone = $("#phone").val();
  var btnSave = $("#btnSave").val();

  $.get("../php/validate_basic_accountSettings.php", {
    name: name,
    surname: surname,
    email: email,
    phone: phone
  }, function(data){
    var infoMessages = JSON.parse(data);

    $("#name-info").val(data['info_name']);
    $("#surname-info").val(data['info_surname']);
    $("#email-info").val(data['info_email']);
    $("#phone-info").val(data['info_phone']);
  });
});
