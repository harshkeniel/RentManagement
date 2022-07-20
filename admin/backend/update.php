<?php

    require_once "../../includes/connection.php";

    $rent = (int) mysqli_real_escape_string($conn, $_POST['rent']);
    $maintenance = (int) mysqli_real_escape_string($conn, $_POST['maintenance']);
    $fine = (int) mysqli_real_escape_string($conn, $_POST['fine']);
    
    // $email = "harsh@gmail.com";
    // $rent = 1001;
    // $maintenance = 201;
    // $fine = 101;
    if(isset($_POST['id'])){
        $id = mysqli_real_escape_string($conn, $_POST['id']);
        if(!empty($id) && !empty($rent) && !empty($maintenance) && !empty($fine) ){
            $sql = mysqli_query($conn,"UPDATE user SET maintenance = $maintenance, rent = $rent, fine = $fine WHERE user_id = {$id}"); 
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
    }
    else{
        echo "Select an User";
    }    
