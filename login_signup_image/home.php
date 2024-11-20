<?php
//connection:
$con = mysqli_connect("localhost", "root", "", "signupforms");
if(!$con){
    echo "Connection Unsuccessful";
}
?>

<?php
//redirecting to login if no session exists:
session_start();
if(!isset($_SESSION['username'])){
    header("Location: signup.php");
    exit();
} else {
    $username = $_SESSION['username'];
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home</title>

        <style>
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background-color: #f4f6f9;
            }

            .container {
                background-color: #ffffff;
                padding: 20px;
                border-radius: 10px;
                width: 350px;
                text-align: center;
            }

            h1 {
                color: #4a4e69;
                text-align: center;
            }

            label {
                display: block;
                text-align: left;
                font-weight: bold;
                color: #4a4e69;
                margin-top: 10px;
            }

            input[type="text"], select, input[type="file"] {
                width: 40%;
                padding: 10px;
                margin-top: 5px;
                margin-bottom: 15px;
                border-radius: 5px;
                border: 1px solid #ddd;
            }

            input[type="submit"] {
                width: 10%;
                padding: 10px;
                margin: 5px 1%;
                border: none;
                border-radius: 5px;
                background-color: #4a4e69;
                color: white;
                font-size: 16px;
            }

            input[type="submit"]:hover {
                background-color: #9a8c98;
            }

            table {
                width: 35%;
            }

            table td {
                padding: 8px;
                border-bottom: 1px solid #ddd;
            }

            table img {
                border-radius: 10px;
                width: 100px;
            }

            nav {
                background-color: #4a4e69;
                text-align: right;
                padding: 10px;
            }

            nav button {
                background-color: white;
                color: white;
                border: none;
                border-radius: 5px;
                padding: 10px;
            }

            nav button:hover {
                background-color: #9a8c98;
                color: white;
            }

            nav a {
                text-decoration: none;
            }
        </style>
    </head>
    <body>
    <nav>
        <button><a href="signup.php">Sign Out</a></button>
    </nav>

    <h1 style="margin-right: 20px">Welcome <?php echo htmlspecialchars($username); ?></h1>

    <div style="display:grid; grid-template-columns: 1fr 1fr; grid-repeat">
        <form action="home.php" method="post" enctype="multipart/form-data" style="margin-right: 25px; margin-left: 40px;">
            <?php
            //File Uploads: Enables the form to handle file uploads. Multipart Encoding: Splits the form data into multiple parts,
            //making it possible to send files along with text data.
            ?>

            <label>Name: </label>
            <input type="text" placeholder="Enter Name" name="name" required><br>

            <label>Gender: </label>
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>

            <label>Profile Picture: </label>
            <input type="file" name="profile_picture" accept="image/*" required><br>

            <div style="display: flex">
                <input type="submit" value="Save" name="save">
                <input type="submit" value="Display" name="display">
            </div>
        </form>

        <div style="margin-lef">
            <?php
            if(isset($_POST['display'])) {
                // Retrieve user information from database to display
                $query = "SELECT * FROM user_info WHERE username = '$username' ORDER BY id DESC LIMIT 1";
                $result = mysqli_query($con, $query);
                if($result && mysqli_num_rows($result) > 0) {
                    $user_info = mysqli_fetch_assoc($result); ?>
                    <table>
                        <tr><td>Name: </td><td><?php echo htmlspecialchars($user_info['name']); ?></td></tr>
                        <tr><td>Gender: </td><td><?php echo htmlspecialchars($user_info['gender']); ?></td></tr>
                        <tr><td>Profile Picture: </td><td><img src="uploads/<?php echo htmlspecialchars($user_info['profile_picture']); ?>" width="100"></td></tr>
                    </table>
                    <?php
                } else {
                    echo "No information found. Please save your information first.";
                }
            }
            ?>
        </div>
    </div>
    </body>
    </html>

<?php
//form submission and saving of data:
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['save'])){
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $profile_picture = $_FILES['profile_picture']['name'];
    $target_directory = "uploads/";
    $target_file_path = $target_directory.basename($profile_picture);
    if(move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file_path)){
        $query = "INSERT INTO user_info (username, name, gender, profile_picture) VALUES ('$username', '$name', '$gender', '$profile_picture') ON DUPLICATE KEY UPDATE name = '$name', gender = '$gender', profile_picture = '$profile_picture'";
        $result = mysqli_query($con, $query);
        if($result){
            echo "Data Uploaded Successfully";
        } else {
            echo "Failed To Upload Data";
        }
    } else {
        echo "Failed To Upload Profile Picture";
    }
}
?>
