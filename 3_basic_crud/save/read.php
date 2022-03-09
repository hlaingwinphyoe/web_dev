<?php

require_once "conn.php";

include "nav.php";

$sql = "SELECT * FROM to_do";
$query = mysqli_query($conn,$sql);

//var_dump($query);
$total_row = mysqli_num_rows($query);

//echo $total_row;
echo "<ul>";

while ($row = mysqli_fetch_assoc($query)){
    $time = date("g:i",strtotime($row['created_at']));
    echo "<li>[{$row['id']}]  [$time] [<a href='delete.php?id={$row['id']}'>Delete</a>] [<a href='update.php?id={$row['id']}'>Edit</a>] {$row['message']}</li>";
}

echo "</ul>";