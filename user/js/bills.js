viewBtn = document.getElementById("view");
amountField = document.getElementById("amount");
const form = document.querySelector(".signup form");
uploadBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}
let data;
function file(val){
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/bills.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                data = xhr.response;
                data = data.split("&");
                amountField.value = data[1];
                viewBtn.disabled = false;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("id",val);
    formData.append("file","1");
    xhr.send(formData); // sending form data to php
}

viewBtn.onclick=()=>{
    window.open(data[0]);
}

uploadBtn.onclick = ()=>{

    uploadBtn.disabled = true;

    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/bills.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success"){
                    alert("Receipt Uploaded Succesfully!");
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