<?php
    require_once("../../includes/connection.php");
    $total = 0;
    $description = "";
    if(isset($_POST['total'])){
        if($_POST['total']==0){
            //rent for all users;
            //extra charges
            $charges = 0;
            $sql = mysqli_query($conn,"SELECT * FROM extra_charges ORDER BY date DESC");
            while($row = mysqli_fetch_assoc($sql)){
                $date = date('F Y', strtotime($row['date']));
                $cdate = date('F Y', strtotime("-1 month"));
                if($date==$cdate){
                    $charges = $charges + $row['amount'];
                }
                else if(date('Y', strtotime($date)) == date('Y', strtotime("-1 year"))){
                    break;
                }
            }
            // due,rent,maintainence
            $sql1 = mysqli_query($conn,"SELECT * FROM user WHERE removed = 0");
            while($row1 = mysqli_fetch_assoc($sql1)){
                $sql2 = mysqli_query($conn,"SELECT * FROM payment WHERE user_id = {$row1['user_id']}");
                $row2 = mysqli_fetch_assoc($sql2);
                //total
                $description = "Rent: ".$row1['rent'].",Maintenance: ".$row1['maintenance'];
                $total = $row1['rent'] + $row1['maintenance'];
                
                if($charges!=0){
                    $description = $description.",Extra-Charges: ".$charges;
                    $total = $total + $charges;
                }
                else{
                    $description = $description.",Extra-Charges: 0";
                }
                if($row2['total']!=0){
                    $description = $description.",Dues: ".$row2['total'];
                    $total = $total + $row2['total'];
                }
                else{
                    $description = $description.",Dues: 0";
                }
                $sql3 = mysqli_query($conn, "UPDATE payment SET total = $total, status=0, description = '{$description}' WHERE user_id = {$row1['user_id']}");
                if($sql3){
                    $total = 0;
                    $description = "";
                }
                else{
                    echo "Error";
                    break;
                }
            }
            $tdate = date("Y-m-d");
            $sql4 = mysqli_query($conn , "UPDATE admin SET btn_date = '{$tdate}'");
        }
        else{
            //rent for individual user
            //extra charges
            $id = $_POST['total'];
            $charges = 0;
            $sql = mysqli_query($conn,"SELECT * FROM extra_charges ORDER BY date DESC");
            while($row = mysqli_fetch_assoc($sql)){
                $date = date('F Y', strtotime($row['date']));
                $cdate = date('F Y', strtotime("-1 month"));
                if($date==$cdate){
                    $charges = $charges + $row['amount'];
                }
                else if(date('Y', strtotime($date)) == date('Y', strtotime("-1 year"))){
                    break;
                }
            }
            // due,rent,maintainence
            $sql1 = mysqli_query($conn,"SELECT * FROM user WHERE user_id = $id");
            $row1 = mysqli_fetch_assoc($sql1);
            $sql2 = mysqli_query($conn,"SELECT * FROM payment WHERE user_id = $id");
            $row2 = mysqli_fetch_assoc($sql2);
            //total
            $description = "Rent: ".$row1['rent'].",Maintenance: ".$row1['maintenance'];
            $total = $row1['rent'] + $row1['maintenance'];
            
            if($charges!=0){
                $description = $description.",Extra-Charges: ".$charges;
                $total = $total + $charges;
            }
            else{
                $description = $description.",Extra-Charges: 0";
            }
            if($row2['total']!=0){
                $description = $description.",Dues: ".$row2['total'];
                $total = $total + $row2['total'];
            }
            else{
                $description = $description.",Dues: 0";
            }
            $sql3 = mysqli_query($conn, "UPDATE payment SET total = $total, status=0, description = '{$description}' WHERE user_id = $id");
            if($sql3){
                $total = 0;
                $description = "";
            }
            else{
                echo "Error";
            }
        }    
    }

    if(isset($_POST['fine'])){
        if($_POST['fine']==0){

            //fine for all users
            $sql = mysqli_query($conn,"SELECT * FROM user WHERE removed = 0");
            while($row = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($conn,"SELECT * FROM payment WHERE status = 0 AND user_id = {$row['user_id']}");
                $row1 = mysqli_fetch_assoc($sql1);
                if($row1==null){
                    continue;
                }
    
                $description = $row1['description'].",Fine: ".$row['fine'];
                $total = $row1['total'] + $row['fine'];
                $sql2 = mysqli_query($conn, "UPDATE payment SET total = $total, description = '{$description}' WHERE user_id = {$row['user_id']}");
                if($sql2){
                    $total = 0;
                    $description = "";
                }
                else{
                    echo "Error";
                    break;
                }
            }
        }
        else{
            //fine for individual user
            $id = $_POST['fine'];
            $sql = mysqli_query($conn,"SELECT * FROM user WHERE user_id = $id");
            $row = mysqli_fetch_assoc($sql);
            $sql1 = mysqli_query($conn,"SELECT * FROM payment WHERE user_id = $id");
            $row1 = mysqli_fetch_assoc($sql1);

            $description = $row1['description'].",Fine: ".$row['fine'];
            $total = $row1['total'] + $row['fine'];
            $sql2 = mysqli_query($conn, "UPDATE payment SET total = $total, description = '{$description}' WHERE user_id = $id");
            if($sql2){
                $total = 0;
                $description = "";
            }
            else{
                echo "Error";
            }
        }
    }

    if(isset($_POST['reminder'])){
        if($_POST['reminder']==0){
            //reminer for all users
            $sql = mysqli_query($conn,"SELECT * FROM user WHERE removed = 0");
            while($row = mysqli_fetch_assoc($sql)){
                $sql1 = mysqli_query($conn,"SELECT * FROM payment WHERE status = 0 AND user_id = {$row['user_id']}");
                $row1 = mysqli_fetch_assoc($sql1);
                if($row1==null){
                    continue;
                }

                $msg = "Hi ".$row['name'].",You have due of ₹.".$row1['total']." Please pay the amount before ".date('d-m-Y', strtotime("+2 days"))." To avoid fine";
                $sql2 = mysqli_query($conn, "INSERT INTO notification (user_id, msg) VALUES ({$row['user_id']}, '{$msg}') ");
                if($sql2){
                    continue;
                }
                else{
                    echo "Error";
                    break;
                }

            }
        }
        else{
            $id = $_POST['reminder'];
            //reminer for individual user
            $sql = mysqli_query($conn,"SELECT * FROM user WHERE user_id = $id");
            $row = mysqli_fetch_assoc($sql);
            $sql1 = mysqli_query($conn,"SELECT * FROM payment WHERE status = 0 AND user_id = $id");
            $row1 = mysqli_fetch_assoc($sql1);

            $msg = "Hi ".$row['name'].",You have due of ₹.".$row1['total']." Please pay the amount before ".date('d-m-Y', strtotime("+2 days"))." To avoid fine";
            $sql2 = mysqli_query($conn, "INSERT INTO notification (user_id, msg) VALUES ($id, '{$msg}') ");
            if($sql2){}
            else{
                echo "Error";
            }
        }    
    }