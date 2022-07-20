
function show(Btn){
    
    replyBtn = Btn;
    responseForm = Btn.parentElement;
    response = responseForm.querySelector("textarea");
    sendBtn = responseForm.querySelector("#send");
    fileField = responseForm.querySelector("input[type='file']");

    responseForm.onsubmit = (e)=>{
        e.preventDefault(); //preventing form from submitting
    }

    console.log(responseForm);
    replyBtn.hidden = true;
    sendBtn.hidden = false;
    response.hidden = false;
    fileField.hidden = false;
}

function sent(sendBtn){
    responseForm = sendBtn.parentElement;
    replyBtn = responseForm.querySelector("#reply");
    response = responseForm.querySelector("textarea");
    sendBtn = responseForm.querySelector("#send");
    fileField = responseForm.querySelector("input[type='file']");

    responseForm.onsubmit = (e)=>{
        e.preventDefault(); //preventing form from submitting
    }

    if(response.value.length == 0){
        response.focus();
        $(response).popover("show");
    }
    else{
        $(response).popover("hide");
        replyBtn.hidden = false;
        sendBtn.hidden = true;
        response.hidden = true;
        fileField.hidden = true;

        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/feedback.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Responded!");
                        response.value = "";
                        window.location = "feedback.php";
                        // console.log(data);
                    }else{
                        alert(data);
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(responseForm); //creating new formData
        xhr.send(formData); // sending form data to php
    }

}