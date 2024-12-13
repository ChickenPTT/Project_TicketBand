<?php
session_start();
include("php/connect.php");
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Band</title>
        <link rel="stylesheet" href="./1.css">
    </head>
    <body>
         <div class="container_purchased " id="js-container-purchased">
            <h3 class="title">Tickets Purchased</h3>
            <div class="btn_link">
                <a class="submit" name="btn-add"  href="./php/create.php">Add Your Band</a>

                <div class="submit" name="btn-ticket" onclick="toggleContainer('create')">Manage Band </div>
                <?php if (isset($_SESSION['username'])):?>
                    <a class="submit" href="php/logout.php">Log out</a>
            <?php else: ?>
                <a class="submit" href="php/login.php">Login</a>
            <?php endif; ?>
                <a class="submit" name="btn-cancel" href="index.php">Cancel</a>
            
            </div>
            <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Band name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                <?php
                // ket noi toi php admin 
                if (isset($_SESSION['username'])){

                
                    include("php/connect.php");
                    if ($con->connect_error) {
                        die("Connection failed: " . $con->connect_error);
                    }
                    $sql = "SELECT * FROM `ticket`";
                    $result = $con->query($sql);
                    if (!$result) {
                        die("Query failed: " . $con->error);
                    }
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "
                                <tr>
                                    <td>{$row['id']}</td>
                                    <td>{$row['bandname']}</td>
                                    <td>{$row['LocaEvent']}</td>
                                    <td>{$row['mail']}</td>
                                    <td>{$row['time']}</td>
                                    <td>
                                        
                                        <a class='btn danger' style='margin-right: 0;' href='php/delete.php?id={$row['id']}'>Xóa</a>
                                    </td>
                                </tr>
                            ";
                        }
                    } 
                } else {
                    echo "<tr><td colspan='6'>Login to use this Feature</td></tr>";
                    
                }
    ?>

                </tbody>
                
            </table>
            </div>
        </div>
        <!-- container create -->
        <div class="container_create hidden" id="js-container-create">
            <h3 class="title">Manage Band</h3>
            <div class="btn_link">
                <a class="submit" name="btn-add"  href="./php/create.php">Add Your Band</a>
                <a class="submit" name="btn-cancel" href="index.php">Cancel</a>
                <div class="submit" onclick="toggleContainer('purchased')" name="btn-ticket" >Tickets Purchased</div>
                <?php if (isset($_SESSION['username'])):?>
                    <a class="submit" href="php/logout.php">Log out</a>
            <?php else: ?>
                <a class="submit" href="php/login.php">Login</a>
            <?php endif; ?>
            </div>
            <div class="table">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Band name</th>
                        <th>Location</th>
                        <th>Email</th>
                        <th>Time</th>
                        <th>Hành động</th>
                    </tr>
                </thead>

                <tbody>
                <?php
        if (isset($_SESSION["username"])){
                include("php/connect.php");

                if ($con->connect_error) {
                    die("Connection failed: " . $con->connect_error);
                }
                $sql = "SELECT * FROM `ticket`";
                $result = $con->query($sql);
                if (!$result) {
                    die("Query failed: " . $con->error);
                }
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                            <tr>
                                <td>{$row['id']}</td>
                                <td>{$row['bandname']}</td>
                                <td>{$row['LocaEvent']}</td>
                                <td>{$row['mail']}</td>
                                <td>{$row['time']}</td>
                                <td>
                                    <div>
                                        <a class='btn primary' href='./php/edit.php?id={$row['id']}'>Sửa</a>
                                        <a class='btn danger' style='margin-right: 0;' href='php/delete.php?id={$row['id']}'>Xóa</a>

                                    </div>

                                </td>
                            </tr>
                        ";
                    }
                }
            } else {
                echo "<tr><td colspan='6'>Login to use this Feature</td></tr>";
                
            }
    ?>

                </tbody>
            
                
            </table>

            </div>
        </div>




        <!-- js -->
       <script >
            function toggleContainer(containerId) {
                const purchasedContainer = document.getElementById("js-container-purchased");
                const createContainer = document.getElementById("js-container-create");
                // const a =document.querySelector(a[href^= "php/delete"]);
                if (containerId === "create") { 
                    purchasedContainer.classList.add("hidden");
                    createContainer.classList.remove("hidden");
                } else if (containerId === "purchased") {
                    purchasedContainer.classList.remove("hidden");
                    createContainer.classList.add("hidden");
                    // a.style.display=  "block";
                }
            }
       </script>
    </body>
    </html>
