const fdateField = document.getElementById("fdate");
const tdateField = document.getElementById("tdate");
const form = document.querySelector(".signup form");
uploadBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

uploadBtn.onclick = ()=>{
    
    if(fdateField.value.length==0){
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please select a From date!";  
        return false;
    }
    else if(tdateField.value.length==0){
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please select a To date!";
        return false;
    }
    else{
        uploadBtn.disabled = true;
    
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/agreement.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("File Uploaded Succesfully!");
                        form.reset();
                        window.location = "agreement.php";
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