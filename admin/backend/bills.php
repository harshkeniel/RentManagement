<?php
    
    require_once "../../includes/connection.php";

    $amount = (int) mysqli_real_escape_string($conn,$_POST['amount']);
    $date = mysqli_real_escape_string($conn,$_POST['date']);

    if(isset($_POST['id'])){
        if(!empty($amount) && !empty($date)){

            $id = mysqli_real_escape_string($conn, $_POST['id']);
            if($_FILES['light_bill']['name'] != null){
                $fileName = $_FILES['light_bill']['name'];
                $tmpName = $_FILES['light_bill']['tmp_name'];
                $fileSplit = explode(".", $fileName);
                $fileExt = end($fileSplit);
                if($fileExt == "pdf"){
                    $time = $date."-".time();
                    $newFileName = $time."-lightbill.pdf";
                    // $newFileName = str_replace(" ", "-", $newFileName);
                    if(move_uploaded_file($tmpName, "../../files/".$id."/lightbill/".$newFileName)){
                        $sql = mysqli_query($conn, "SELECT * FROM lightbill WHERE user_id = $id");
                        if(mysqli_num_rows($sql)==0){
                            $sql1 = mysqli_query($conn, "INSERT INTO lightbill (user_id, date, amount, file) VALUES ({$id}, '{$date}', {$amount}, '{$newFileName}')");
                            if($sql1){
                                echo "success";
                            }
                            else{
                                echo "error";
                            }
                        }
                        else{
                            $month = explode("-",$date);
                            $month = $month[0]."-".$month[1];
                            $update = true;

                            while($row = mysqli_fetch_assoc($sql)){
                                
                                $date1 = $row['date'];
                                $month1 = explode("-",$date1);
                                $month1 = $month1[0]."-".$month1[1];

                                if($month==$month1){
                                    $sql1 = mysqli_query($conn, "UPDATE lightbill SET date = '{$date}', amount = {$amount}, file = '{$newFileName}' WHERE  id = {$row['id']} ");
                                    $update = false;
                                    if($sql1 && unlink("../../files/".$id."/lightbill/".$row['file'])){
                                        echo "success";
                                    }
                                    else{
                                        echo "error";
                                    }
                                    break;
                                }

                            }
                            if($update){
                                $sql1 = mysqli_query($conn, "INSERT INTO lightbill (user_id, date, amount, file) VALUES ({$id}, '{$date}', {$amount}, '{$newFileName}')");
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
    else{
        echo "Select an User";
    }