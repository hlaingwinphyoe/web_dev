<?php
//echo "<pre>";
//print_r($_FILES);

$file = $_FILES['upload'];
$tempNameArr = $file['tmp_name'];
$fileNameArr = $file['name'];

$storeFolder = "store/";

foreach ($fileNameArr as $key=>$s){
    move_uploaded_file($tempNameArr[$key],$storeFolder.uniqid()."_".$fileNameArr[$key]);
}

header("location:index.php");



