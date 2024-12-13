<?php
    include("connect.php");
    if (!isset($_GET["id"])) {
        header("location: index.php");
        exit;
    }

    $id = $_GET['id'];
    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
        $sql = "SELECT * FROM `ticket` WHERE id='$id'";  
        $result = $con->query($sql);
                if (!$result) {
            die("Error executing query: " . $con->error);  
        }
        // Lấy data từ rơw
        $row = $result->fetch_assoc();
        
        if (!$row) {
            header("location: index.php");
            exit;
        }
        $name = $row["bandname"];
        $location = $row["LocaEvent"];
        $email = $row["mail"];  // Make sure the column name here matches your database column
        $time = $row["time"];
    } else {
        $name = $_POST["bandname"];
        $location = $_POST["LocaEvent"];
        $email = $_POST["email"];
        $time = $_POST["time"];

        $sql = "UPDATE `ticket` SET bandname='$name', LocaEvent='$location', mail='$email', time='$time' WHERE id='$id'";
        $result = $con->query($sql);
        
        if (!$result) {
            die("Error executing update query: " . $con->error);
        }
                header("location: ../qlband.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Event</title>
    <link rel="stylesheet" href="./createE.css?v=<?php echo time(); ?>">
</head>
<body>
<div class="heading-wrapper">
        <div class="heading">
            <div class="heading-menu">
                <a class="heading-text" href="">Edit Ticket</a>
                <ul id="nav" class="heading-list">
                      <li><a class="heading-item" href="../index.php">Home</a></li>

                    <li><a class="heading-item" href="./create.php">Create Ticket</a></li>
                    <li><a class="heading-item" href="../qlband.php">Tickets purchased</a></li>
                    <li class=""><a class="heading-item heading-item_login btn-hover" href="./login.php">Login</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container">
        <h3 class="title">Edit Event</h3>
        <form method="post">  <!-- Fixed the form method -->
            <div>
                <label>Event ID</label>
                <input type="text" name="id" id="id" disabled value="<?php echo $id; ?>">
            </div>
            <div>
                <label for="name">Band Name</label>
                <input type="text" name="bandname" value="<?php echo $name; ?>">
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div>
                <label for="LocaEvent">Location</label>
                <input type="text" name="LocaEvent" value="<?php echo $location; ?>">
            </div>
            <div>
                <label for="time">Event Time</label>
                <input type="text" name="time" value="<?php echo $time; ?>">
            </div>
            <input type="submit" name="submit" value="Update">
            <a href="../index.php"><input type="button" value="Cancel" class="cancel"></a>
        </form>
    </div>
</body>
</html>
