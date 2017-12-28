function toggleSidenav(){
  if($("#sidenav-container").hasClass("sidenav-container-show")){
    $("#sidenav-container").removeClass("sidenav-container-show");
    $("#sidenav-container").addClass("sidenav-container-hide");
  } else{
    $("#sidenav-container").removeClass("sidenav-container-hide");
    $("#sidenav-container").addClass("sidenav-container-show");
  }
}

function logout() {
    $(".topbar-logout").load("./php/logout.php", {
      btnLogout: "submit"
    });
}

function statsClick(s) {
  if(s == 'clients'){
    window.location = "./clients.php";
  } else if(s == 'employees'){
    window.location = "./employees.php";
  } else if(s == 'recents'){
    window.location = "./timestamps.php";
  } else{
    window.location = "./dashboard.php?error";
  }
}
