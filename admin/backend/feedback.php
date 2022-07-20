<?php

    require_once "../../includes/connection.php";

    $id = (int) mysqli_real_escape_string($conn, $_POST['id']);
    $response = mysqli_real_escape_string($conn, $_POST['reason']);

    $file = true;
    if(!empty($id) && !empty($response)){
        $newFileName = "";
        if($_FILES['response_file']['name'] != null){
            $file = false;
            $fileName = $_FILES['response_file']['name'];
            $tmpName = $_FILES['response_file']['tmp_name'];
            $fileSplit = explode(".", $fileName);
            $fileExt = end($fileSplit);
            if($fileExt == "pdf"){
                $time = date("Y-m-d")."-".time();
                $newFileName = $time."-response.pdf";
                // $newFileName = str_replace(" ", "-", $newFileName);
                if(move_uploaded_file($tmpName, "../../files/responseFile/".$newFileName)){
                    $file = true;   
                }
                else{
                    echo "Unable to upload file!";
                }
            }
            else{
                echo "Please select pdf file only!!";
            }
        }
        if($file){
            $sql = mysqli_query($conn, "UPDATE feedback SET response = '{$response}', response_file = '{$newFileName}' WHERE id = {$id}"); 
            if($sql){
                echo "success";
            }
            else{
                echo "Error";
            }
        }
    }
    else{
        echo "Fields cannot be blank!";
    }

    