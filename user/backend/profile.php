<?php
    session_start();
    require_once "../../includes/connection.php";

    $cpassword = mysqli_real_escape_string($conn, $_POST['cpassword']);
    $npassword = mysqli_real_escape_string($conn, $_POST['npassword']);

    $password = password_hash($npassword, PASSWORD_DEFAULT);

    if(!empty($npassword) && !empty($cpassword) ){
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE user_id = {$_SESSION['USER_ID']}");     
        $row = mysqli_fetch_assoc($sql);
        $check = password_verify($cpassword, $row['password']);
        if($check){
            $sql1 = mysqli_query($conn,"UPDATE user SET password='{$password}' WHERE user_id = {$_SESSION['USER_ID']}");
            if($sql1){
                echo "success";
            }
            else{
                echo "error";
            }
        }
        else{
            echo "Password is Incorrect!";
        }
    }
    else{
        echo "Fields cannot be blank!";
    }
