<?php
    session_start();
    require_once "../../includes/connection.php";

    $id = $_SESSION['USER_ID'];
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['pnumber']);
    $aadhar = mysqli_real_escape_string($conn, $_POST['anumber']);
    $pan = mysqli_real_escape_string($conn, $_POST['pannumber']);

    $name = $fname.' '.$lname;
    if(!empty($name) && !empty($phone) && !empty($email) && !empty($aadhar) && !empty($pan)){
        $sql = mysqli_query($conn,"SELECT * FROM member WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) == 0){
            $sql1 = mysqli_query($conn, "INSERT INTO member (user_id, name, phone, email, aadhar, pan) VALUES ({$id}, '{$name}', '{$phone}', '{$email}', '{$aadhar}', '{$pan}') ");
            if($sql1){
                echo "success";
            }    
            else{
                echo "error";
            }
        }
        else{
            echo "Email already exist! Use another email";
        }
    }
    else{
        echo "Fields cannot be blank!";
    }
