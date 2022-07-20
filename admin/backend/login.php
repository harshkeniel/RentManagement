<?php
    session_start();
    require_once "../../includes/connection.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    
    // $password = password_hash($pass, PASSWORD_DEFAULT);

    if(!empty($email) && !empty($password) ){
        $sql = mysqli_query($conn,"SELECT * FROM admin WHERE email = '{$email}'");
            
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                $check = password_verify($password, $row['password']);
                if($check){
                    $_SESSION['ID'] = $row['admin_id'];
                    echo "success";
                }
                else{
                    echo "Password is Incorrect!";
                }
            }
            else{
                echo "Email does not exist!";
            }
    }
    else{
        echo "Fields cannot be blank!";
    }        