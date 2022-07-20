const form = document.querySelector(".signup form");
removeBtn = form.querySelector(".button input");
errortxt = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); //preventing form from submitting
}

removeBtn.onclick = ()=>{

    removeBtn.disabled = true;

    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/remove_user.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success"){
                    alert("User Removed Succesfully!");
                    form.reset();
                    window.location = "remove_user.php";
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
    
    removeBtn.disabled = false;


}