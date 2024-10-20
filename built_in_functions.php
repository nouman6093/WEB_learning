<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="index.php" method="post">
        <label>X: </label>
        <input type="text" name="x">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    if(isset($_POST["x"])){
        echo round($_POST["x"]);    //will round off the given input number and this is a built-in function
    }
?>
