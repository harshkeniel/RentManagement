<?php
    
    require_once "../../includes/connection.php";

    
    if(isset($_POST['id'])){
        $date = mysqli_real_escape_string($conn,$_POST['date']);
        if(!empty($date)){

            $id = mysqli_real_escape_string($conn, $_POST['id']);
            if($_FILES['property']['name'] != null){
                $fileName = $_FILES['property']['name'];
                $tmpName = $_FILES['property']['tmp_name'];
                $fileSplit = explode(".", $fileName);
                $fileExt = end($fileSplit);
                if($fileExt == "pdf"){
                    $time = $date."-".time();
                    $newFileName = $time."-property.pdf";
                    // $newFileName = str_replace(" ", "-", $newFileName);
                    if(move_uploaded_file($tmpName, "../../files/".$id."/propertyTax/".$newFileName)){
                        $sql = mysqli_query($conn, "SELECT * FROM propertytax WHERE user_id = $id");
                        if(mysqli_num_rows($sql)==0){
                            $sql1 = mysqli_query($conn, "INSERT INTO propertytax (user_id, date, file) VALUES ({$id}, '{$date}', '{$newFileName}')");
                            if($sql1){
                                echo "success";
                            }
                            else{
                                echo "error";
                            }
                        }
                        else{
                            $year = explode("-",$date);
                            $year = $year[0];
                            $update = true;

                            while($row = mysqli_fetch_assoc($sql)){
                                
                                $date1 = $row['date'];
                                $year1 = explode("-",$date1);
                                $year1 = $year1[0];

                                if($year==$year1){
                                    $sql1 = mysqli_query($conn, "UPDATE propertytax SET date = '{$date}', file = '{$newFileName}' WHERE  id = {$row['id']} ");
                                    $update = false;
                                    if($sql1 && unlink("../../files/".$id."/propertyTax/".$row['file'])){
                                        echo "success";
                                    }
                                    else{
                                        echo "error";
                                    }
                                    break;
                                }

                            }
                            if($update){
                                $sql1 = mysqli_query($conn, "INSERT INTO propertytax (user_id, date, file) VALUES ({$id}, '{$date}', '{$newFileName}')");
                                if($sql1){
                                    echo "success";
                                }
                                else{
                                    echo "error";
                                }
                            }
                        }
                    }
                    else{
                        echo "Unable to upload file!";
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
            echo "Fields cannot be blank!";
        }
    }
    else if(!isset($_POST['receiptid'])){
        echo "Select an User";
    }


    if(isset($_POST['receiptid'])){
        $uid = (int) mysqli_real_escape_string($conn, $_POST['userid']);
        $id = (int) mysqli_real_escape_string($conn, $_POST['receiptid']);
        if($_FILES['receipt']['name'] != null){
            $fileName = $_FILES['receipt']['name'];
            $tmpName = $_FILES['receipt']['tmp_name'];
            $fileSplit = explode(".", $fileName);
            $fileExt = end($fileSplit);
            if($fileExt == "pdf"){
                $time = date("Y-m-d")."-".time();
                $newFileName = $time."-receipt.pdf";
                // $newFileName = str_replace(" ", "-", $newFileName);
                if(move_uploaded_file($tmpName, "../../files/".$uid."/propertyTax/receipt/".$newFileName)){
                    $sql = mysqli_query($conn, "UPDATE propertytax SET receipt = '{$newFileName}' WHERE id = $id");
                    if($sql){
                        echo "success";
                    }
                    else{
                        echo "error";
                    }
                }
                else{
                    echo "Unable to upload file!";
                }
            }
            else{
                echo "Please select pdf file only!!";
            }
        }
        else{
            echo "Please select a file to upload!";
        } 
    }