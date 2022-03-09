<?php

print_r($_GET);

unlink("store/".$_GET['name']);
header("location:index.php");