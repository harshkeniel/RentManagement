const form = document.querySelector("form");
const cpswrdField = document.getElementById("cpassword");
const npswrdField = document.getElementById("npassword");
changeBtn = document.querySelector(".modal-footer .btn-primary");
errortxt = document.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

changeBtn.onclick = ()=>{
    
    var lowerCaseLetters = /[a-z]/g;
    var upperCaseLetters = /[A-Z]/g;
    var numbers = /[0-9]/g;
    
    if(!(cpswrdField.value.match(lowerCaseLetters) && cpswrdField.value.match(upperCaseLetters) && cpswrdField.value.match(numbers) && cpswrdField.value.length >= 8)){
        cpswrdField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters!";
    }
    else if(!(npswrdField.value.match(lowerCaseLetters) && npswrdField.value.match(upperCaseLetters) && npswrdField.value.match(numbers) && npswrdField.value.length >= 8)){
        npswrdField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters!";
    } 
    else{
        changeBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest//creating XML object
        xhr.open("POST", "backend/profile.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Password Changed Successfully!!");
                        location.href = "profile.php";
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
    changeBtn.disabled = false;

}
