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
        <label>Enter Country Name: </label>
        <input type="text" name="country">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    //associative array = an array which is made up of key to value pairs. it is similar to dictionary in python

    $capitals = array("USA" => "Washington D.C", "Japan" => "Kyoto", "South Korea" => "Seoul");

    if (isset($_POST["country"])){
        $capital = $capitals[$_POST["country"]];

        echo $capital;
    }
?>
