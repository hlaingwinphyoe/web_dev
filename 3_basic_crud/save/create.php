<?php
require_once "conn.php";

//print_r($_GET);
if(isset($_GET['addBtn'])){
    $message = $_GET['message'];
//    echo $message;
    $sql = "INSERT INTO to_do (message) VALUES ('$message')";
    if (mysqli_query($conn,$sql)){
        header("location:create.php");
    }else{
        echo "query fail".mysqli_error();
    }
}


?>

<?php include "nav.php"; ?>

<form method="get">
    <input type="text" name="message" required>
    <button name="addBtn">Add</button>
</form>
