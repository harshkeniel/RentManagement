
function approve(id){
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/member.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert("Member Approved!");
                        window.location = "member_table.php";
                    }else{
                        alert(data);
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(); //creating new formData
        formData.append("id",id);
        formData.append("status",1);
        xhr.send(formData); // sending form data to php
}

function disapprove(id){
    //Ajax
    let xhr = new XMLHttpRequest(); //creating XML object
    xhr.open("POST", "backend/member.php", true);
    xhr.onload = ()=>{
        if(xhr.readyState == XMLHttpRequest.DONE){
            if(xhr.status == 200){
                let data = xhr.response;
                if(data == "success"){
                    alert("Member Disapproved!");
                    window.location = "member_table.php";
                }else{
                    alert(data);
                }
            }
        }
    }
    // Sending data from Ajax to php
    let formData = new FormData(); //creating new formData
    formData.append("id",id);
    formData.append("status",2);
    xhr.send(formData); // sending form data to php
}