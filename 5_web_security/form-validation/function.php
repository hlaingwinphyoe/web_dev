<?php

function old($inputName){
    if (isset($_POST[$inputName])){
        return $_POST[$inputName];
    }else{
        return "";
    }
}

function textFilter($text){
    $text = trim($text);
    $text = htmlentities($text);
    $text = stripslashes($text);

    return $text;
}

function setError($inputName,$message){
    $_SESSION['error'][$inputName] = $message;
}

function getError($inputName){
    if (isset($_SESSION['error'][$inputName])){
        return $_SESSION['error'][$inputName];
    }else{
        return "";
    }
}

function clearError(){
    $_SESSION['error'] = [];
}

function register(){

    global $genderArr,$skillArr;

    $errorStatus = 0;
    $name = "";
    $email = "";
    $phone = "";
    $address = "";
    $gender = "";
    $skill = "";

    if (empty($_POST['name'])){
        setError("name","Name is Required!");
        $errorStatus = 1;
    }else{
        if (strlen($_POST['name']) < 5){
            setError("name","Name is too short");
            $errorStatus = 1;
        }else{
            if (strlen($_POST['name']) >= 30){
                setError("name","Name is too long");
                $errorStatus = 1;
            }else{
                if (!preg_match("/^[a-zA-Z' ]*$/",$_POST['name'])) {
                    setError("name","Only letters and white space allowed");
                    $errorStatus = 1;
                }else{
                    $name = textFilter($_POST['name']);
                }
            }
        }
    }

    if (empty($_POST['email'])){
        setError("email","Email is Required!");
        $errorStatus = 1;
    }else{
        if (!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
            setError("email","Wrong email format!");
            $errorStatus = 1;
        }else{
            $email = textFilter($_POST['email']);
        }
    }

    if (empty($_POST['phone'])){
        setError("phone","Phone is Required!");
        $errorStatus = 1;
    }else{
        if (!preg_match("/^[0-9' ]*$/",$_POST['phone'])){
            setError("phone","Wrong phone format!");
            $errorStatus = 1;
        }else{
            $phone = textFilter($_POST['phone']);
        }
    }

    if (empty($_POST['address'])){
        setError("address","Address is Required!");
        $errorStatus = 1;
    }else{
        $address = textFilter($_POST['address']);
    }

    if (empty($_POST['gender'])){
        setError("gender","Gender is Required!");
        $errorStatus = 1;
    }else{
        if (!in_array($_POST['gender'],$genderArr)){
            setError("gender","Gender is incorrect!");
            $errorStatus = 1;
        }else{
            $gender = textFilter($_POST['gender']);
        }
    }

    if (empty($_POST['skill'])){
        setError("skill","Skill is Required!");
        $errorStatus = 1;
    }else{
            $skill = $_POST['skill'];
            $skillError = 0;
            foreach ($skill as $s){
                if (!in_array($s,$skillArr)){
                    setError("skill","Skill is incorrect!");
                    $errorStatus = 1;
                    $skillError = 1;
                }
            }
            if (!$skillError){
                $skill = $_POST['skill'];
            }
    }

    $supportFileType = ['image/png','image/jpeg'];


    if($_FILES['upload']['name']){
        $tempFile = $_FILES['upload']['tmp_name'];
        $fileName = $_FILES['upload']['name'];
        if(in_array($_FILES['upload']['type'],$supportFileType)){
            $storeFolder = "store/";

//            if (move_uploaded_file($tempFile,$storeFolder.uniqid()."_".$fileName)){
//                header("location:index.php");
//            }
        }else{
            setError("upload","file not supported!");
            $errorStatus = 1;
        }

    }else{
        setError("upload","file is required");
        $errorStatus = 1;
    }

    if (!$errorStatus){
        print_r($_POST);
        print_r($_FILES);
    }
}