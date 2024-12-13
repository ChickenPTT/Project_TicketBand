<?php
    include("connect.php");
    if (isset($_POST["submit"])) {
        // Nó sẽ lấy dữ liệu thừ input có thuộc tính for = "<name>"
        $name = $_POST["bandname"]; 
        $Location = $_POST["location"];
        $email = $_POST["email"];
        $time = $_POST["time"];
        $sql = "INSERT INTO `ticket`(`bandname`, `LocaEvent`, `mail`, `time`) 
        VALUES ('$name', '$Location', '$email', '$time')";

        $result = $con->query($sql);
        //Kiểm tra lỗi
        if (!$result) {
            die("Query failed: " . $con->error);
        }
        //Chuyển tiếp về trang index khi thêm mới thành công
        header("location: ../index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Event</title>
    <!-- Để trình diệt thấy chỉ có 1 file css tại 1 thời điểm. -->
    <link rel="stylesheet" href="./createE.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
        integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <div class="heading-wrapper">
        <div class="heading">
            <div class="heading-menu">
                <a class="heading-text" href="">Create New Ticket</a>
                <ul id="nav" class="heading-list">
                    <li><a class="heading-item" href="../index.php">Home</a></li>

                    <li><a class="heading-item" href="./create.php">Create Ticket</a></li>
                    <li><a class="heading-item" href="../qlband.php">Tickets purchased</a></li>
                    <li class=""><a class="heading-item heading-item_login btn-hover" href="./login.php">Login</a></li>
                </ul>
            </div>
        </div>

    </div>
    <div class="container-middle">
        <div class="container">
            <form method="post">
                <div class="form-row">
                    <div class="upload">
                        <input id="file" type="file" accept="image/*" hidden>
                        <div class="img-area" data_img="">
                            <i class="fa-solid fa-cloud-arrow-up icon"></i>
                            <h3>Upload Image</h3>
                            <p>Image size must be less than <span>2MB</span></p>
                        </div>
                        <button class="select-image" type="button">Select Image</button>
                    </div>

                    <div class="form-column">
                        <div>
                            <label for="bandname">Band Name</label>
                            <input type="text" name="bandname" placeholder="Enter the band's name">
                        </div>
                        <div>
                            <label for="location">Location</label>
                            <input type="text" name="location" placeholder="Enter the event location">
                        </div>
                        <div>
                            <label for="email">Email</label>
                            <input type="email" name="email" placeholder="Enter contact email">
                        </div>
                        <div>
                            <label for="time">Time</label>
                            <input type="date" name="time" placeholder="Enter the event time">
                        </div>
                    </div>

                </div>
                <div class="form-actions">
                    <input type="submit" name="submit" value="Add Ticket">
                    <button type="button" class="cancel" onclick="window.location.href='../index.php';">Cancel</button>
                </div>
            </form>
        </div>

    </div>
    <script src="../js/create.js"></script>
</body>

</html>