btn = document.querySelector(".form form .button input");
amountField = document.getElementById('amount');
descriptionField = document.getElementById('description');
const form = document.querySelector('.form form');
form.onsubmit = (e)=>{
    e.preventDefault();//preventing form from submitting
}
var options = {
    "key": "rzp_test_vBY5UEWW8EUUGX", // Enter the Key ID generated from the Dashboard
    "amount": amountField.value*100, // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
    "currency": "INR",
    "name": "Rent management",
    "description": descriptionField.value,
    "image": "../images/Logo.png",
    "handler": function (response){
        amountField.disabled = false;
        dbhandler(response);
        // console.log(response);
    }
};

var rzp1 = new Razorpay(options);
rzp1.on('payment.failed', function (response){
    alert(response.error.description);
    // console.log(response);
});

btn.onclick=()=>{
    if(amountField.value == 0){
        alert("Already Paid");
    }
    else{
        rzp1.open();
    }
}

function dbhandler(res){
    if(res.razorpay_payment_id != null){
        //Ajax
        let xhr = new XMLHttpRequest(); //creating XML object
        xhr.open("POST", "backend/payment.php", true);
        xhr.onload = ()=>{
            if(xhr.readyState == XMLHttpRequest.DONE){
                if(xhr.status == 200){
                    let data = xhr.response;
                    if(data == "success"){
                        alert('Payment Successful');
                        location.href = "dashboard.php";
                    }
                    else{
                        alert(data);
                    }
                }
            }
        }
        // Sending data from Ajax to php
        let formData = new FormData(form); //creating new formData
        formData.append("payid",res.razorpay_payment_id);
        xhr.send(formData); // sending form data to php
    }
    else{
        alert("Payment Not Successful");
    }
}

