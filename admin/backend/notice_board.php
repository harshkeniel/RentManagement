<?php

    require_once "../../includes/connection.php";

    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    
    $date = date("Y-m-d");

    if(!empty($message) && !empty($subject)){
        $sql = mysqli_query($conn, "INSERT INTO notice (date, subject, msg) VALUES ('{$date}', '{$subject}', '{$message}')");  
            if($sql){
                echo "success";
            }
            else{
                echo "Error";
            }
    }
    else{
        echo "Fields cannot be blank!";
    }