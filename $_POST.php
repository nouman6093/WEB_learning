//for post:
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action = "index.php" method="post">
        <label>Quantity: </label>
        <input type="text" name = "quantity">
        <input type="submit" value="Submit">
    </form>
</body>
</html>

<?php
    if(isset($_POST["quantity"])){
        echo "You ordered {$_POST["quantity"]}";
    }
?>
