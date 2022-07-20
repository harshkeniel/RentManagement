<?php
    
    require_once "../../includes/connection.php";

    if(isset($_POST['id'])){
       
        $sql = mysqli_query($conn, "UPDATE user SET removed = 1 WHERE user_id = {$_POST['id']}");
        if($sql){
            echo "success";
        }
        else{
            echo "error";
        }
    }    
    else{
        echo "Select an User";
    }