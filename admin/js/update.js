const rentField = document.getElementById("rent");
const maintenanceField = document.getElementById("maintenance");
const fineField = document.getElementById("fine");
const form = document.querySelector(".signup form");
updateBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

updateBtn.onclick = ()=>{
    var numbers = /[0-9]/g;
    
    if(!(rentField.value.match(numbers))){
        rentField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter numbers only!";  
        return false;
    }
    else if(!(maintenanceField.value.match(numbers))){
        maintenanceField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter numbers only!";  
        return false;
    }
    else if(!(fineField.value.match(numbers))){
        fineField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter numbers only!";  
        return false;
    }
    else{
        updateBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/update.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Update Succesfull!");
                        form.reset();
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
    updateBtn.disabled = false;

}