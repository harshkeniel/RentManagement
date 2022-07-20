const amountField = document.getElementById("amount");
const reasonField = document.getElementById("reason");
const form = document.querySelector(".signup form");
chargesBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

chargesBtn.onclick = ()=>{
    var numbers = /[0-9]/g;
    
    if(!(amountField.value.match(numbers))){
        amountField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter numbers only!";  
        return false;
    }
    else if(reasonField.value.length == 0){
        reasonField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "This field cannot be blank!";  
        return false;
    }
    else{
        chargesBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/extra_charges.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Charges Added Succesfully!");
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
    chargesBtn.disabled = false;

}