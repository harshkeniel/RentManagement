const subjectField = document.getElementById("subject");
const messageField = document.getElementById("message");
const form = document.querySelector(".signup form");
sendBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

sendBtn.onclick = ()=>{

    if(subjectField.value.length == 0){
        subjectField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter subject!";  
        return false;
    }
    else if(messageField.value.length == 0){
        messageField.focus();
        errortxt.style.display = "block";
        errortxt.innerHTML = "Please enter message!";  
        return false;
    }
    else{
        sendBtn.disabled = true;
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/feedback.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Feedback Sent Succesfully!");
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
    sendBtn.disabled = false;

}