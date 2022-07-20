const dateField = document.getElementById("date");
const form = document.querySelector(".signup form");
uploadBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

uploadBtn.onclick = ()=>{
    
    if(dateField.value.length==0){
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please select a date!";  
        return false;
    }
    else{
        uploadBtn.disabled = true;
    
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/property.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("File Uploaded Succesfully!");
                        form.reset();
                        window.location = "property.php";
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


function upload(btn){
    const receiptForm = btn.parentElement;

    receiptForm.onsubmit = (e)=>{
        e.preventDefault(); //preventing form from submitting
    }
    receiptField = receiptForm.querySelector("#receipt");
    submitBtn = receiptForm.querySelector("#submit");
    receiptField.hidden = false;
    btn.hidden = true;
    submitBtn.hidden = false;

    submitBtn.onclick=()=>{
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/property.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Receipt Uploaded Succesfully!");
                        receiptForm.reset();
                        window.location = "property.php";
                    }else{
                        alert(data);
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(receiptForm); //creating new formData
        xhr.send(formData); // sending form data to php
    }

}