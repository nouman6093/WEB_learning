<?php
    $conn = mysqli_connect("localhost", "root", "", "signupinfo");
    if (!$conn) {
        echo "Connection Unsuccessful";
    }
?>

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
    <form action="index.php" method="post">
        <input type="text" name="username", placeholder="username">
        <input type="text" name="new_username", placeholder="new username">
        <input type="submit" name="insert" value="insert">
        <input type="submit" name="delete" value="delete">
        <input type="submit" name="update" value="update">
        <input type="submit" name="display" value="display">
    </form>
</body>
</html>

<?php
    if (isset($_POST["insert"])) {
        $username = $_POST["username"];
        $sql = "INSERT INTO registration (username) VALUES ('$username');";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            echo "inserted";
        } else {
            echo "failed to insert";
        }
    } elseif (isset($_POST["delete"])) {
        $username = $_POST["username"];
        $sql = "DELETE FROM registration WHERE username = '$username';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            echo "deleted";
        } else {
            echo "failed to delete";
        }
    } elseif (isset($_POST["update"])) {
        $username = $_POST["username"];
        $new_username = $_POST["new_username"];
        $sql = "UPDATE registration SET username = '$new_username' WHERE username = '$username';";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            echo "updated";
        } else {
            echo "failed to update";
        }
    } elseif (isset($_POST["display"])){
        echo "<table>
                <tr>
                    <td>ID</td>
                    <td>Username</td>
                </tr>";
        $sql = "SELECT * FROM registration";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['username']}</td>
                      </tr>";
            }
        } else {
            echo "<tr>
                    <td>No Records Found</td>
                  </tr>";
        }
        echo "</table>";
    }
?>
