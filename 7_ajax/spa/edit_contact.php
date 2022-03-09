<?php

require_once "base.php";
$id = $_POST['id'];
$name = $_POST['contact_name'];
$phone = $_POST['phone'];

$sql = "UPDATE contacts SET name='$name',phone='$phone' WHERE id=$id";
$con = con();
$query = mysqli_query($con,$sql);

if ($query){
    echo "success";
}else{
    mysqli_error($con);
}