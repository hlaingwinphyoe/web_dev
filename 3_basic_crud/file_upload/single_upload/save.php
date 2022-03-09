<?php
echo "<pre>";

$supportFileType = ['image/png','image/jpeg'];
$tempFile = $_FILES['upload']['tmp_name'];
$fileName = $_FILES['upload']['name'];


if($_FILES['upload']['name']){
    // print_r($_FILES);
    if(in_array($_FILES['upload']['type'],$supportFileType)){
        $storeFolder = "store/";

        if (move_uploaded_file($tempFile,$storeFolder.uniqid()."_".$fileName)){
            header("location:index.php");
        }
    }else{
        echo "file not supported";
    }
   
}else{
    echo "ma shi buu";
}
