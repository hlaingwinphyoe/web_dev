<?php
include "template/header.php";

if (categoryDelete()){
    echo "<script>location.href = 'category_list.php'</script>";
}