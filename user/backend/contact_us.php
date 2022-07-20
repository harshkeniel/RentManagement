<?php
    session_start();
    require_once("../../includes/connection.php");

    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $fname = mysqli_real_escape_string($conn,$_POST['fname']);
    $lname = mysqli_real_escape_string($conn,$_POST['lname']);
    $msg = mysqli_real_escape_string($conn,$_POST['message']);


    if(!empty($email) && !empty($fname) && !empty($lname) && !empty($msg)){

        $subject = "Mail from $fname $lname ($email)";
        $sender = "From:addtogether917@gmail.com";
        $receiver = "addtogether917@gmail.com"; 

        if(mail($receiver, $subject, $msg, $sender)){
            echo "success";
        }else{
            echo "failed";
        }
    }
    else{
        echo "Fields cannot be blank";
    }
