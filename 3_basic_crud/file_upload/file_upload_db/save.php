<?php

$conn = mysqli_connect("localhost","root","","my_list");

$file = $_FILES['upload'];
$tempNameArr = $file['tmp_name'];
$fileNameArr = $file['name'];

$storeFolder = "store/";

foreach ($fileNameArr as $key=>$s){

    $newName = $storeFolder.uniqid()."_".$fileNameArr[$key];

    move_uploaded_file($tempNameArr[$key],$newName);

    $sql = "INSERT INTO photos(`photo_link`) VALUES ('$newName')";
    mysqli_query($conn,$sql);

}

header("location:index.php");



