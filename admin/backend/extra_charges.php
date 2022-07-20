<?php

    require_once "../../includes/connection.php";

    $amount = (int) mysqli_real_escape_string($conn, $_POST['amount']);
    $reason = mysqli_real_escape_string($conn, $_POST['reason']);
    
    $date = date("Y-m-d");

    if(!empty($amount) && !empty($reason)){
        $sql = mysqli_query($conn, "INSERT INTO extra_charges (amount, reason, date) VALUES ({$amount}, '{$reason}', '{$date}')");  
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