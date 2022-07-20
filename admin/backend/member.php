<?php

    require_once "../../includes/connection.php";

    if(isset($_POST['id'])){
        $sql = mysqli_query($conn, "UPDATE member SET status = {$_POST['status']} WHERE id = {$_POST['id']}");  
        if($sql){
            echo "success";
        }
        else{
            echo "Error";
        }
    }

