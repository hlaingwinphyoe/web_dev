<?php

$name = "Hlaing Win Phyoe";
$age = 19;
$arr = ['x','y','z'];
$assoc = [
    "first_name" => "Hlaing",
    "last_name" => "Phyoe"
];

//echo "My name is $name and I'm $age years old";

//echo "This is $arr[1]";

//echo "First Name is {$assoc['first_name']}";

function run(){
    global $name;
    return $name;
}

echo run();