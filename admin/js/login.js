const form = document.querySelector(".login form");
const pswrdField = document.querySelector(".form input[type='password']");
const emailField = document.querySelector(".form input[type='email']");
loginBtn = form.querySelector(".form form .button input");
errortxt = form.querySelector(".error-text");
toggleIcon = document.querySelector(".form .field .fa-eye");

toggleIcon.onclick = () =>{
    if(pswrdField.type == "password"){
        pswrdField.type = "text";
        toggleIcon.classList.add("active");
    }else{
        pswrdField.type = "password";
        toggleIcon.classList.remove("active");
    }
}

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

loginBtn.onclick = ()=>{
    
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    
    if(!(emailField.value.match(email))){
        emailField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter a valid Email!";  
    }
    else if(!(pswrdField.value.match(lowerCaseLetters) && pswrdField.value.match(upperCaseLetters) && pswrdField.value.match(numbers) && pswrdField.value.length >= 8)){
        pswrdField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters!";
    } 
    else{
        loginBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest//creating XML object
        xhr.open("POST", "backend/login.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        location.href = "dashboard.php";
                        // console.log(data);
                        errortxt.style.display = "none";
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
    loginBtn.disabled = false;

}
