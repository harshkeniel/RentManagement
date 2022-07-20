
function total(id){
    cnf = confirm("This will calculate the total payment for all users");
    if(cnf){
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/total.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == ""){
                        alert("Payment Calculated!");
                        location.href = "dashboard.php";
                    }else{
                        console.log(data);
                        alert("Something went wrong!");
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(); //creating new formData
        formData.append("total",id);
        xhr.send(formData); // sending form data to php
    }
}

function reminder(id){
    cnf = confirm("This will send reminder to all users");
    if(cnf){
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/total.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == ""){
                        alert("Reminder sent!");
                        location.href = "dashboard.php";
                    }else{
                        // console.log(data);
                        alert("Something went wrong!");
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(); //creating new formData
        formData.append("reminder",id);
        xhr.send(formData); // sending form data to php
    }
}

function fine(id){
    cnf = confirm("This will add fine for those users who have not paid!");
    if(cnf){
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/total.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == ""){
                        alert("Fine Added!");
                        location.href = "dashboard.php";
                    }else{
                        console.log(data);
                        alert("Something went wrong!");
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(); //creating new formData
        formData.append("fine",id);
        xhr.send(formData); // sending form data to php
    }
}