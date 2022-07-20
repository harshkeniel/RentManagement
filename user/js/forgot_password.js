const form = document.querySelector(".login form");
const pswrdField = document.querySelector(".form input[type='password']");
const emailField = document.querySelector(".form input[type='email']");
const otpField = document.querySelector(".form input[type='text']");
const otpDiv = document.querySelector(".form .otp");
const pswrdDiv = document.querySelector(".form .pswrd");
otpBtn = form.querySelector(".form form .button input");
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

otpBtn.onclick = ()=>{
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;

    if(otpDiv.hidden){

        if(!(emailField.value.match(email))){
            emailField.focus();
            errortxt.style.display = "block";
            errortxt.innerHTML = "Please enter a valid Email!";  
        }
        else{
            //Ajax
            let xhr = new XMLHttpRequest//creating XML object
            xhr.open("POST", "backend/mail.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200){
                        let data = xhr.response;
                        if(data == "success"){
                            alert("OTP sent successfully!");
                            // console.log(data);
                            errortxt.style.display = "none";
                            otpDiv.hidden = false;
                            pswrdDiv.hidden = false;
                            emailField.disabled = true;
                            otpBtn.value = "Change Password";
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
    else{
        if(otpField.value.length == 0){
            otpField.focus();
            errortxt.style.display = "block";
            errortxt.innerHTML = "OTP field cannot be blank!";
        }
        else if(!(pswrdField.value.match(lowerCaseLetters) && pswrdField.value.match(upperCaseLetters) && pswrdField.value.match(numbers) && pswrdField.value.length >= 8)){
            pswrdField.focus();
            errortxt.style.display = "block";
            errortxt.innerHTML = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters!";
        } 
        else{
            emailField.disabled = false;
            //Ajax
            let xhr = new XMLHttpRequest//creating XML object
            xhr.open("POST", "backend/mail.php", true);
            xhr.onload = ()=>{
                if(xhr.readyState == XMLHttpRequest.DONE){
                    if(xhr.status == 200){
                        let data = xhr.response;
                        if(data == "success"){
                            alert("Password Changed Successfully!");
                            errortxt.style.display = "none";
                            location.href = "index.php";
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

}
