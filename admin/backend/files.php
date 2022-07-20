<?php
    session_start();
    require_once("../../includes/connection.php");
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $sql = mysqli_query($conn,"SELECT * FROM user WHERE user_id = $id ");
        $row = mysqli_fetch_assoc($sql);
        $name = $row['name'];
    }
    
    if($_POST['val']=="lb"){
        $files=glob("../../files/".$id."/lightbill/*.*");
        $zipname = $name."-lightbills.zip";
    }
    else if($_POST['val']=="lbr"){
        $files=glob("../../files/".$id."/lightbill/receipt/*.*");
        $zipname = $name."-lightbill-receipts.zip";
    }
    else if($_POST['val']=="agr"){
        $files=glob("../../files/".$id."/agreement/*.*");
        $zipname = $name."-agreements.zip";
    }
    else if($_POST['val']=="pt"){
        $files=glob("../../files/".$id."/propertyTax/*.*");
        $zipname = $name."-propertytax.zip";
    }
    else if($_POST['val']=="ptr"){
        $files=glob("../../files/".$id."/propertyTax/receipt/*.*");
        $zipname = $name."-propertytax-receipts.zip";
    }

    if($_POST['val']=="unlink"){
        unlink('./'.$_POST['file']);
        echo "success";
    }
    else{
        $exp = explode(".",$zipname); 
        $zip = new ZipArchive;
        $zip->open($zipname, ZipArchive::CREATE);
        $zip->addEmptyDir($exp[0]);
        foreach($files as $file){
            $new_filename = substr($file,strrpos($file,'/') + 1);
            $zip->addFile($file,"./".$exp[0]."/".$new_filename);
        }
        $zip->close();
        echo $zipname;
    }