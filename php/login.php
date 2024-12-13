<?php
session_start();
include("connect.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username-lo'];
    $password = $_POST['password-lo'];

    // Kiểm tra tài khoản trong cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['username'] = $username;
            header("Location: ../index.php");
            exit;
        } else {
            echo "<p>Invalid Password</p>";
        }
    } else {
        echo "<p>Account not exsit!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="./login_sign.css">

</head>

<body>
    <div class="heading-wrapper">
        <div class="heading">
            <div class="heading-menu">
                <a class="heading-text" href="">Login</a>
                <ul id="nav" class="heading-list">
                    <li><a class="heading-item" href="../index.php">Home</a></li>

                    <li><a class="heading-item" href="./create.php">Create Ticket</a></li>
                    <li><a class="heading-item" href="../qlband.php">Tickets purchased</a></li>

                </ul>
            </div>
        </div>

    </div>
    <div class="container">
        <form action="login.php" method="post">
            <label>Username</label>
            <input type="text" name="username-lo" required><br>
            <label>Password</label>
            <input type="password" name="password-lo" required><br>
            <button type="submit">Login</button>
        </form>
        <a class="btn-change" href="sign.php">Sign up account!</a>
    </div>
</body>

</html>