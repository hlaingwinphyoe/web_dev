<?php

require_once "base.php";

$name = $_POST['contact_name'];
$phone = $_POST['phone'];

$sql = "INSERT INTO contacts (name,phone) VALUES ('$name','$phone')";
$con = con();
$query = mysqli_query($con,$sql);

if ($query){
    echo "success";
}else{
    mysqli_error($con);
}