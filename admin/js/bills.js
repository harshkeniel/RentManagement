const amountField = document.getElementById("amount");
const dateField = document.getElementById("date");
const form = document.querySelector(".signup form");
uploadBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

uploadBtn.onclick = ()=>{
    var numbers = /[0-9]/g;
    
    if(dateField.value.length==0){
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please select a date!";  
        return false;
    }
    else if(!(amountField.value.match(numbers))){
        amountField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter numbers only!";  
        return false;
    }
    else{
        uploadBtn.disabled = true;
    
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/bills.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("File Uploaded Succesfully!");
                        form.reset();
                        window.location = "bills.php";
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
        
        uploadBtn.disabled = false;

    }
}