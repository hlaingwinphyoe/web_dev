<?php

session_start();

if ($_SESSION['name']){
    echo "Hello ".$_SESSION['name'];
    echo "<a href='clear.php'>Log Out</a>";
}else{
    header("location:index.php");
}