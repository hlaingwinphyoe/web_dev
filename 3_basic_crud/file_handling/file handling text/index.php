<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="write.php" method="post">
    <label for="username">User Name</label>
    <input type="text" name="username">
    <br>
    <label for="password">Password</label>
    <input type="password" name="password">
    <br>
    <button>Submit</button>

</form>
<ul>
    <?php
    echo "<pre>";

    $list = scandir("store");
    foreach ($list as $key=>$l){
        if ($l =="." || $l ==".."){
            continue;
        }
    ?>
    <li>
        <a href="del.php?name=<?php echo $l ?>">Delete</a> <a href="store/<?php echo $l ?>" target="_blank"><?php echo $l ?></a>
    </li>
    <?php
        }
    ?>
</ul>


</body>
</html>