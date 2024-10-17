<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "userform");
} catch (mysqli_sql_exception $ex){
    echo "Could not Connect <br>" . $ex -> getMessage();
}

//issect() checks if button was pressed or not
//$_POST is a built-in array which is used to store all info submitted in a form.
if (isset($_POST["register"])) {
    $name = $_POST["username"];
    $gender = $_POST["gender"];
    $check = $_POST["check"];
    $query = "INSERT INTO usertable (Name, Gender) VALUES ('$name', '$gender')";
    $data = mysqli_query($conn, $query);

    if (!$data) {
        echo "Failed to insert Data.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Form</title>

    <style>
        body {
            margin: 0;
            background-color: antiquewhite;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container1 {
            background-color: beige;
        }
        .title {
            font-size: 30px;
            font-weight: bold;
            text-align: center;
            padding: 10px;
            color: blueviolet;
        }
        .form {
            font-size: 20px;
            padding: 20px;
        }
        .input {
            margin-left: 30px;
        }
        .btn {
            background-color: blueviolet;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            display: block;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class = "container1">
        <form action = "" method = "POST">
            <div class = "title">
                Registration Form
            </div>
            <div class = "form">
                <div class = "input_field" aria-required="true">
                    <label>Username</label>
                    <input type="text" placeholder="Enter Your Name" class = "input" name = "username">
                </div>

                <div class = "input_field" aria-required="true">
                    <label>Gender</label>
                    <select class = "input" name = "gender">
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>

                <div class = "input_field_check" aria-required="true">
                    <label>
                        <input type="checkbox" name = "check">
                        I agree to the terms and conditions
                    </label>
                </div>

                <div class = "input_field">
                    <input type="submit" value="Register" class = "btn" name = "register">
                </div>
            </div>
        </form>
    </div>
</body>
</html>
