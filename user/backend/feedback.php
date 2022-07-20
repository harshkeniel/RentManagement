<?php
    session_start();
    require_once "../../includes/connection.php";

    $id = $_SESSION['USER_ID'];
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);
    $date = date("Y-m-d");
    
    if(!empty($subject) && !empty($message) ){
        if($_FILES['feedback_img']['name'] != null){
            $fileName = $_FILES['feedback_img']['name'];
            $tmpName = $_FILES['feedback_img']['tmp_name'];
            $fileSplit = explode(".", $fileName);
            $fileExt = end($fileSplit);
            $files = ["jpg","jpeg","png"];
            if(in_array($fileExt,$files)){
                $time = date("d-m-Y")."-".time();
                $newFileName = $time.$fileName;
                $newFileName = str_replace(" ", "-", $newFileName);
                if(move_uploaded_file($tmpName, "../../files/feedbackImg/".$newFileName)){
                    $sql = mysqli_query($conn, "INSERT INTO feedback (user_id, subject, msg, img, date) VALUES ({$id}, '{$subject}', '{$message}', '{$newFileName}', '{$date}')");
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
                echo "Please select ('jpg', 'jpeg', 'png') files only!!";
            }
        }
        else{
            $sql1 = mysqli_query($conn, "INSERT INTO feedback (user_id, subject, msg, date) VALUES ({$id}, '{$subject}', '{$message}', '{$date}')");
            if($sql1){
                echo "success";
            }
            else{
                echo "error";
            }
        }
    }
    else{
        echo "Fields cannot be blank!";
    }         