var url = window.location.pathname;
var filename = url.substring(url.lastIndexOf('/')+1);

dashboard = document.getElementById("menu-dashboard");
member = document.getElementById("menu-member");
payment = document.getElementById("menu-payment");
feedback = document.getElementById("menu-feedback");
bills = document.getElementById("menu-bills");
files = document.getElementById("menu-files");
noticeBoard = document.getElementById("menu-notice-board");
menuOpen = document.getElementById("menu-open");
menuClose = document.getElementById("menu-close");

dashboard.classList.remove("active");
member.classList.remove("active");
payment.classList.remove("active");
feedback.classList.remove("active");
bills.classList.remove("active");
files.classList.remove("active");
noticeBoard.classList.remove("active");

if(filename=="dashboard.php"){
    dashboard.classList.add("active");
}
else if(filename=="member.php"){
    member.classList.add("active");
}
else if(filename=="payment.php"){
    payment.classList.add("active");
}
else if(filename=="feedback.php"){
    feedback.classList.add("active");
}
else if(filename=="bills.php"){
    bills.classList.add("active");
}
else if(filename=="files.php"){
    files.classList.add("active");
}
else if(filename=="notice_board.php"){
    noticeBoard.classList.add("active");
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