<?php
    session_start();
    require_once("../../includes/connection.php");
    if($_POST['otp']==null){
        $email = mysqli_real_escape_string($conn,$_POST['email']);

        if(!empty($email)){

            $sql = mysqli_query($conn, "SELECT * FROM user WHERE email='{$email}'");
            if(mysqli_num_rows($sql)>0){
                $otp = "";
                while(strlen($otp)<6){
                    $otp = $otp.rand(0,9);
                }
                $_SESSION['otp']=$otp;
                $msg = "Your OTP is ".$otp;
                $subject = "OTP for Changing Password";
                $sender = "From:addtogether917@gmail.com";

                if(mail($email, $subject, $msg, $sender)){
                    echo "success";
                }else{
                    echo "failed";
                }
            }
            else{
                echo "Email does not exist";
            }
        }
        else{
            echo "Email cannot be blank";
        }
    }
    else{
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $otp = mysqli_real_escape_string($conn,$_POST['otp']);
        $password = mysqli_real_escape_string($conn,$_POST['password']);

        if(!empty($otp) && !empty($password)){
            if($otp==$_SESSION['otp']){
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $sql = mysqli_query($conn,"UPDATE user SET password = '{$pass}' WHERE email = '{$email}'");
                if($sql){
                    session_destroy();
                    echo "success";
                }else{
                    echo "failed";
                }
            }
            else{
                echo "OTP is incorrect!";
            }

        }
        else{
            echo "Fields cannot be blank";
        }
    }
