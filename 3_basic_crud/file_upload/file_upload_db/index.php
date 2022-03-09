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
            margin-right: 10px;
            border: 1px solid black;
        }
        .img-container{
            display: inline-block;
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
    $conn = mysqli_connect("localhost","root","","my_list");

    $sql = "SELECT * FROM photos";
    $query = mysqli_query($conn,$sql);

    while($row = mysqli_fetch_assoc($query)){
    ?>
        <div class="img-container">
            <img src="<?php echo $row['photo_link'] ?>" alt="">
            <br>
            <a href="delete.php?id=<?php echo $row['id'] ?>">Delete</a>
        </div>
    <?php
        }
    ?>
</div>

</body>
</html>