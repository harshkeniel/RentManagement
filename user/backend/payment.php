<?php
    session_start();
    require_once("../../includes/connection.php");

    $id = $_SESSION['USER_ID'];
    $amount = (int) mysqli_real_escape_string($conn, $_POST['amount']);
    $payid = mysqli_real_escape_string($conn, $_POST['payid']);
    $date = date("Y-m-d");
    $description = "Rent: 0,Maintenance: 0,Extra-Charges: 0,Dues: 0,Fine: 0";

    if(!empty($id) && !empty($amount) && !empty($payid)){
        $sql = mysqli_query($conn, "UPDATE payment SET total = 0, date = '{$date}', status = 1, description = '{$description}' WHERE user_id = $id");
        $sql1 = mysqli_query($conn, "INSERT INTO payment_details (user_id, amount, date, payment_id) VALUES ($id, $amount, '{$date}', '{$payid}')");
        if($sql && $sql1){
            echo "success";
        }
        else{
            echo "error";
        }
    }
    
