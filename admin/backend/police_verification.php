<?php
    
    require_once "../../includes/connection.php";

    $fdate = mysqli_real_escape_string($conn,$_POST['fdate']);
    $tdate = mysqli_real_escape_string($conn,$_POST['tdate']);

    if(isset($_POST['id'])){
        if(!empty($fdate) && !empty($tdate)){

            $id = mysqli_real_escape_string($conn, $_POST['id']);
            if($_FILES['verification']['name'] != null){
                $fileName = $_FILES['verification']['name'];
                $tmpName = $_FILES['verification']['tmp_name'];
                $fileSplit = explode(".", $fileName);
                $fileExt = end($fileSplit);
                if($fileExt == "pdf"){
                    $time = $tdate."-".time();
                    $newFileName = $time."-verification.pdf";
                    // $newFileName = str_replace(" ", "-", $newFileName);
                    if(move_uploaded_file($tmpName, "../../files/".$id."/policeVerification/".$newFileName)){
                        $sql = mysqli_query($conn, "SELECT * FROM police_verification WHERE user_id = $id");
                        if(mysqli_num_rows($sql)==0){
                            $sql1 = mysqli_query($conn, "INSERT INTO police_verification (user_id, fdate, tdate, file) VALUES ({$id}, '{$fdate}', '{$tdate}', '{$newFileName}')");
                            if($sql1){
                                echo "success";
                            }
                            else{
                                echo "error";
                            }
                        }
                        else{
                            // $year = explode("-",$fdate);
                            // $year = $year[0];
                            $update = true;

                            // while($row = mysqli_fetch_assoc($sql)){
                                
                            //     $date1 = $row['date'];
                            //     $year1 = explode("-",$date1);
                            //     $year1 = $year1[0];

                            //     if($year==$year1){
                            //         $sql1 = mysqli_query($conn, "UPDATE agreement SET date = '{$date}', file = '{$newFileName}' WHERE  id = {$row['id']} ");
                            //         $update = false;
                            //         if($sql1 && unlink("../../files/".$id."/agreement/".$row['file'])){
                            //             echo "success";
                            //         }
                            //         else{
                            //             echo "error";
                            //         }
                            //         break;
                            //     }

                            // }
                            if($update){
                                $sql1 = mysqli_query($conn, "INSERT INTO police_verification (user_id, fdate, tdate, file) VALUES ({$id}, '{$fdate}', '{$tdate}', '{$newFileName}')");
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