<?php
    session_start();
    require_once "../../includes/connection.php";

    if(isset($_POST['file'])){
        $sql = mysqli_query($conn, "SELECT * FROM lightbill WHERE id = {$_POST['id']}");
        $row = mysqli_fetch_assoc($sql);

        echo "../files/".$row['user_id']."/lightbill/".$row['file']."&".$row['amount'];
    }
    else{
        if(isset($_POST['id'])){
            $id = (int) $_POST['id'];
            
            if($_FILES['receipt']['name'] != null){
                $fileName = $_FILES['receipt']['name'];
                $tmpName = $_FILES['receipt']['tmp_name'];
    
                $fileSplit = explode(".", $fileName);
                $fileExt = end($fileSplit);
    
                if($fileExt == "pdf"){
                    $time = date("Y-m-d")."-".time();
                    $newFileName = $time."-receipt.pdf";
    
                    if(move_uploaded_file($tmpName, "../../files/".$_SESSION['USER_ID']."/lightbill/receipt/".$newFileName)){
                        $sql = mysqli_query($conn, "UPDATE lightbill SET receipt = '{$newFileName}' WHERE id = $id");
                        if($sql){
                            echo "success";
                        }
                        else{
                            echo "error";
                        }
                    }
                    else{
                        echo "Unable to upload files!";
                    }
                }
                else{
                    echo "Please select pdf files only!!";
                }
            }
            else{
                echo "Please select a file to upload!";
            }    
        }
        else{
            echo "Select a month";
        }
    }
