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
        <title>Signup</title>

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
                background-color: white; /* White background for the container */
                border-radius: 10px; /* Rounded corners */
                box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
                padding: 20px; /* Inner padding */
                width: 300px; /* Fixed width */
                text-align: center; /* Center text */
            }

            h1 {
                color: #333; /* Darker text color for the header */
            }

            label {
                display: block; /* Labels on a new line */
                margin-bottom: 5px; /* Space below labels */
                color: #555; /* Slightly lighter text color */
            }

            input[type="text"],
            input[type="password"] {
                width: 100%; /* Full width */
                padding: 10px; /* Inner padding */
                margin-bottom: 15px; /* Space below input fields */
                border: 1px solid #ccc; /* Light border */
                border-radius: 5px; /* Rounded corners */
                box-sizing: border-box; /* Include padding in width calculation */
            }

            input[type="checkbox"] {
                margin: 10px 0; /* Space around checkbox */
            }

            input[type="submit"],
            button {
                background-color: #007bff; /* Primary button color */
                color: white; /* Text color */
                border: none; /* No border */
                padding: 10px; /* Inner padding */
                border-radius: 5px; /* Rounded corners */
                cursor: pointer; /* Pointer cursor on hover */
                width: 100%; /* Full width */
                margin-top: 10px; /* Space above buttons */
            }

            input[type="submit"]:hover,
            button:hover {
                background-color: #0056b3; /* Darker button color on hover */
            }

            button {
                display: inline-block; /* Align button next to submit */
                margin-top: 15px; /* Space above button */
            }

            button a {
                color: white; /* Text color for link */
                text-decoration: none; /* No underline */
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h1>Sign Up</h1>

        <form action="signup.php" method="post">
            <label>Username</label>
            <input type="text" placeholder="Enter Username" name="username" required><br>

            <label>Password</label>
            <input type="password" placeholder="Enter Password" name="password" required><br>

            <label>
                <input type="checkbox" name="checkbox" required>
                I agree to the terms and Conditions
            </label><br>

            <input type="submit" value="Sign Up" name="signup">
            <button><a href="login.php">Login</a></button>
        </form>
    </div>
    </body>
    </html>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['signup'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM registration WHERE username = '$username'"; // For checking if username already exists
        $result = mysqli_query($con, $sql);
        if (mysqli_num_rows($result) > 0) {
            echo "<script>alert('Registration Failed. Username already exists.');</script>";
        } else {
            $sql = "INSERT INTO registration (username, password) VALUES ('$username', '$password')";
            $result = mysqli_query($con, $sql);
            if ($result) {
                echo "<script>alert('Successfully Registered');</script>";
            } else {
                echo "<script>alert('Registration Failed');</script>";
            }
        }
    }
}
?>
