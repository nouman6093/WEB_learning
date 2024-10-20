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
        <label>Enter a Number to Count Upto:</label>
        <input type="text" name = "counter">
        <input type="submit" value="Start">
    </form>
</body>
</html>

<?php
    if(isset($_POST["counter"])){
        $counter = $_POST["counter"];

        for ($i = 1; $i <= $counter; $i++){
            echo $i." ";
        }
    }
?>
