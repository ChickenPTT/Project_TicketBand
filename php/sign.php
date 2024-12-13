<?php
session_start();

include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    if ($password == $confirm_password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert tài khoản mới vào cơ sở dữ liệu
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
        if ($con->query($sql) === TRUE) {
            header("location: login.php");

            exit;
        } else {
            echo "Username is used";
        }
    } else {
        echo "Password does not match!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up Account</title>
    <link rel="stylesheet" href="./login_sign.css">
</head>
<body>
<div class="heading-wrapper">
        <div class="heading">
            <div class="heading-menu">
                <a class="heading-text" href="">Sign Up</a>
                <ul id="nav" class="heading-list">
                <li><a class="heading-item" href="../index.php">Home</a></li>

                    <li><a class="heading-item" href="./create.php">Create Ticket</a></li>
                    <li><a class="heading-item" href="../qlband.php">Tickets purchased</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container">
        <form action="sign.php" method="post">
            <label>Username</label>
            <input type="text" name="username" required><br>
            <label>Password</label>
            <input type="password" name="password" required><br>
            <label>Confirm Password</label>
            <input type="password" name="confirm_password" required><br>
            <button type="submit">Sign Up</button>
        </form>

    </div>
</body>
</html>
