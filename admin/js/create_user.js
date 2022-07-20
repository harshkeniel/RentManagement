const fnameField = document.getElementById("fname");
const lnameField = document.getElementById("lname");
const pnumberField = document.getElementById("pnumber");
const anumberField = document.getElementById("anumber");
const emailField = document.querySelector(".form input[type='email']");
const pannumberField = document.getElementById("pannumber");
const depositField = document.getElementById("deposit");
const form = document.querySelector(".signup form");
signupBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

signupBtn.onclick = ()=>{
    
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    var email = /^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
    var panumber = /([A-Z]){5}([0-9]){4}([A-Z]){1}$/;
    
    if(!((fnameField.value.match(lowerCaseLetters) || fnameField.value.match(upperCaseLetters)) && (lnameField.value.match(lowerCaseLetters) || lnameField.value.match(upperCaseLetters)))){
        errortxt.style.display = "block";
        errortxt.innerHTML = "Name must contain letters only!";  
    } 
    else if(!(emailField.value.match(email))){
        emailField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter a valid Email!";  
    }
    else if(!(pnumberField.value.match(numbers) && pnumberField.value.length == 10)){
        pnumberField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter a valid phone number!";  
        return false;
    }
    else if(!(anumberField.value.match(numbers) && anumberField.value.length == 16)){
        anumberField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter a valid 16 digit aadhar number!"; 
        return false;
    }  
    else if(!(pannumberField.value.match(panumber))){
        pannumberField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter a valid pan number!"; 
        return false;
    }
    else if(!(depositField.value.match(numbers))){
        depositField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter numbers only!";  
        return false;
    }
    else{
        signupBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/create_user.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("User Created Succesfully!");
                        form.reset();
                        //console.log(data);
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
    signupBtn.disabled = false;
}