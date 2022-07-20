var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);

dashboard = document.getElementById("menu-dashboard");
createUser = document.getElementById("menu-create-user");
update = document.getElementById("menu-update");
bills = document.getElementById("menu-bills");
property = document.getElementById("menu-property");
agreement = document.getElementById("menu-agreement");
verification = document.getElementById("menu-verification");
extraCharges = document.getElementById("menu-extra-charges");
files = document.getElementById("menu-files");
userTable = document.getElementById("menu-user-table");
memberTable = document.getElementById("menu-member-table");
feedback = document.getElementById("menu-feedback");
noticeBoard = document.getElementById("menu-notice-board");
removeUser = document.getElementById("menu-remove-user");
menuOpen = document.getElementById("menu-open");
menuClose = document.getElementById("menu-close");

dashboard.classList.remove("active");
createUser.classList.remove("active");
update.classList.remove("active");
bills.classList.remove("active");
property.classList.remove("active");
agreement.classList.remove("active");
verification.classList.remove("active");
extraCharges.classList.remove("active");
files.classList.remove("active");
userTable.classList.remove("active");
memberTable.classList.remove("active");
feedback.classList.remove("active");
noticeBoard.classList.remove("active");
removeUser.classList.remove("active");

if(filename=="dashboard.php"){
    dashboard.classList.add("active");
}
else if(filename=="create_user.php"){
    createUser.classList.add("active");
}
else if(filename=="update.php"){
    update.classList.add("active");
}
else if(filename=="bills.php"){
    bills.classList.add("active");
}
else if(filename=="property.php"){
    property.classList.add("active");
}
else if(filename=="agreement.php"){
    agreement.classList.add("active");
}
else if(filename=="police_verification.php"){
    verification.classList.add("active");
}
else if(filename=="extra_charges.php"){
    extraCharges.classList.add("active");
}
else if(filename=="files.php"){
    files.classList.add("active");
}
else if(filename=="user_table.php"){
    userTable.classList.add("active");
}
else if(filename=="member_table.php"){
    memberTable.classList.add("active");
}
else if(filename=="feedback.php"){
    feedback.classList.add("active");
}
else if(filename=="notice_board.php"){
    noticeBoard.classList.add("active");
}
else if(filename=="remove_user.php"){
    removeUser.classList.add("active");
}

menuOpen.onclick = () =>{
    menuOpen.hidden = true;
    menuClose.hidden = false;
}
menuClose.onclick = () =>{
    menuOpen.hidden = false;
    menuClose.hidden = true;
}

if(window.innerWidth <= 1000){
    menuOpen.hidden = false;
    menuClose.hidden = true;
}
else{
    menuOpen.hidden = true;
    menuClose.hidden = false;
}

var width = $(window).width();
$(window).on('resize', function() {
  if ($(this).width() !== width) {
    width = $(this).width();
    //console.log(width);
    if(width <= 1000){
        menuOpen.hidden = false;
        menuClose.hidden = true;
    }
    else{
        menuOpen.hidden = true;
        menuClose.hidden = false;
    }
  }
});