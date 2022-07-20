modal = document.querySelector(".modal-body");

function details(id, amount){
    //Ajax
    let xhr = new XMLHttpRequest//creating XML object
    xhr.open("POST", "backend/user_table.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                modal.innerHTML = data;
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("id",id);
    formData.append("amount",amount);
    xhr.send(formData); // sending form data to php
}