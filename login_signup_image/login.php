<?php
// Connection:
$con = mysqli_connect("localhost", "root", "", "signupforms");
if (!$con) {
    echo "Connection Unsuccessful";
}
?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>

        <style>
            body {
                margin: 0;
                font-family: Arial, Helvetica, sans-serif;
                background-color: #f0f8ff; /* Light background color */
                display: flex;
                justify-content: center; /* Center horizontally */
                align-items: center; /* Center vertically */
                height: 100vh; /* Full viewport height */
            }

            .container {
                background-color: white;
                border-radius: 10px; /* Rounded corners */
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
                padding: 20px; /* Inner padding */
                width: 300px; /* Fixed width */
                text-align: center;
            }

            h1 {
                color: blueviolet; /* Header color */
                font-size: 24px;
                margin-bottom: 20px;
            }

            label {
                display: block;
                margin-bottom: 5px;
                color: #555; /* Label color */
            }

            input[type="text"], input[type="password"] {
                width: 100%; /* Full width for input fields */
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                box-sizing: border-box;
            }

            input[type="submit"] {
                background-color: blueviolet;
                color: antiquewhite;
                border: none;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
                font-size: 16px;
                margin-top: 10px;
            }

            input[type="submit"]:hover {
                background-color: antiquewhite;
                color: blueviolet;
            }

            button {
                background-color: blueviolet;
                color: antiquewhite;
                padding: 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                width: 100%;
                font-size: 16px;
                margin-top: 10px;
            }

            button:hover {
                background-color: antiquewhite;
                color: blueviolet;
            }

            button a {
                color: antiquewhite; /* Text color */
                text-decoration: none;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h1>Login</h1>

        <form action="login.php" method="post">
            <label>Username</label>
            <input type="text" placeholder="Enter Username" name="username" required><br>

            <label>Password</label>
            <input type="password" placeholder="Enter Password" name="password" required><br>

            <input type="submit" value="Login" name="submit">
            <button><a href="signup.php">Sign Up</a></button>
        </form>
    </div>
    </body>
    </html>

<?php
// Retrieving from database:
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM registration WHERE username = '$username' AND password = '$password'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        $result1 = mysqli_num_rows($result);
        if ($result1 > 0) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
        } else {
            echo "<script>alert('Invalid Credentials');</script>";
        }
    } else {
        echo "<script>alert('Error connecting to database');</script>";
    }
}
?>
