<?php

    require_once "../../includes/connection.php";

    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['pnumber']);
    $aadhar = mysqli_real_escape_string($conn, $_POST['anumber']);
    $pan = mysqli_real_escape_string($conn, $_POST['pannumber']);
    $deposit = (int) mysqli_real_escape_string($conn, $_POST['deposit']);

    // $name = "harsh";
    // $phone = "0987654321";
    // $email = "harsh@gmail.com";
    // $aadhar = "987654321123456";
    // $pan = "XYZ1234567";
    // $deposit = 102;

    $name = $fname.' '.$lname;
    $pass = "User@123";
    $password = password_hash($pass, PASSWORD_DEFAULT);

    if(!empty($name) && !empty($phone) && !empty($email) && !empty($aadhar) && !empty($pan) && !empty($deposit)){
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE email = '{$email}'");
        if(mysqli_num_rows($sql) == 0){
            $sql1 = mysqli_query($conn, "INSERT INTO user (name, phone, email, aadhar, pan, deposit, password) VALUES ('{$name}', '{$phone}', '{$email}', '{$aadhar}', '{$pan}', {$deposit}, '{$password}') ");
            if($sql1){
                $sql2 = mysqli_query($conn,"SELECT * FROM user WHERE email = '{$email}'");
                $row = mysqli_fetch_assoc($sql2);
                $id = (int) $row['user_id'];
                $dir = "../../files/".$id."/";
                $description = "Rent: 0,Maintenance: 0,Extra-Charges: 0,Dues: 0,Fine: 0";

                $sql3 = mysqli_query($conn, "INSERT INTO payment (user_id, description) VALUES ({$id}, '{$description}') ");
                if($sql3){
                    if(mkdir($dir) && mkdir($dir."lightbill") && mkdir($dir."lightbill/receipt") && mkdir($dir."agreement") && mkdir($dir."propertyTax") && mkdir($dir."propertyTax/receipt") && mkdir($dir."policeVerification")){
                        echo "success";
                    }
                    else{
                        echo "Something went wrong!";
                    }

                }
                else{
                    echo "error";
                }
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
