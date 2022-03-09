<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .showImg{
            margin-top: 20px;
        }
        .showImg img{
            height: 250px;
        }
    </style>
</head>
<body>
<form action="save.php" method="post" enctype="multipart/form-data">
    <label>Single File Upload</label>
    <br>
    <br>
    <input type="file" name="upload[]" accept="image/jpeg,image/png" multiple>
    <button>Upload</button>
</form>

<div class="showImg">
    <h4>Uploaded Photo</h4>
    <?php
        $img = scandir("store/");
        foreach($img as $key=>$i){
    ?>
            <img src="store/<?php echo $i ?>" alt="">
    <?php
        }
    ?>
</div>

</body>
</html>