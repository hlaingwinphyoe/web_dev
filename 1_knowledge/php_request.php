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

<ul>
    <li>get (url)</li>
    <li>post</li>
</ul>

<a href="php_respond.php?name=hlaingwinphyoe&age=19&job=webdeveloper">to server</a>

<h4>url ? keyword=value&keyword=value</h4>

<form action="php_respond.php" method="post" enctype="multipart/form-data">
    <input type="text" name="name" value="Hlaing Win Phyoe">
    <input type="text" name="age" value="19">
    <input type="text" name="job" value="Web Developer">
    <input type="file" name="photo">
    <input type="submit">
</form>

</body>
</html>