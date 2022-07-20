const form = document.querySelector(".login form");
const emailField = document.querySelector(".form input[type='email']");
const fnameField = document.getElementById("fname");
const lnameField = document.getElementById("lname");
const msgField = document.getElementById("message");
sendBtn = form.querySelector(".button button");
errortxt = form.querySelector(".error-text");
spinner = document.getElementById("loader");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

sendBtn.onclick = ()=>{
    
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    
    if(!((fnameField.value.match(lowerCaseLetters) || fnameField.value.match(upperCaseLetters)) && (lnameField.value.match(lowerCaseLetters) || lnameField.value.match(upperCaseLetters)))){
        errortxt.style.display = "block";
        errortxt.innerHTML = "Name must contain letters only!";  
    }
    else if(!(emailField.value.match(email))){
        emailField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter a valid Email!";  
    }
    else if(msgField.value.length ==0){
        msgField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Message field cannot be blank!";
    } 
    else{
        sendBtn.disabled = true;
        sendBtn.classList.toggle('button--loading');
        //Ajax
        let xhr = new XMLHttpRequest//creating XML object
        xhr.open("POST", "backend/contact_us.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    sendBtn.disabled = false;
                    sendBtn.classList.toggle('button--loading');
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Message sent successfully!")
                        errortxt.style.display = "none";
                        location.href = "contact_us.php";
                        // console.log(data);
                    }else{
                        errortxt.textContent = data;
                        errortxt.style.display = "block";
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        xhr.send(formData); // sending form data to php
    }
    

}
