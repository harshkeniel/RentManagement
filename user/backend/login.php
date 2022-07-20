<?php
    session_start();
    require_once "../../includes/connection.php";

    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // $email = "prajwal@gmail.com";
    // $password = "user@123";

    if(!empty($email) && !empty($password) ){
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE email = '{$email}'");
            
            if(mysqli_num_rows($sql) > 0){
                $row = mysqli_fetch_assoc($sql);
                $check = password_verify($password, $row['password']);
                if($check){
                    echo "success";
                    $_SESSION['USER_ID'] = $row['user_id'];
                }
                else{
                    echo "Password is Incorrect!";
                }
            }
            else{
                echo "Email does not exist! Contact Us to create new account";
            }
    }
    else{
        echo "Fields cannot be blank!";
    }
