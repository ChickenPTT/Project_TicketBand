<?php
    if(isset($_GET["id"])){
        $id = $_GET["id"];
        include("connect.php");
        $sql = "DELETE FROM ticket WHERE id=$id";
        $number = "ALTER TABLE ticket AUTO_INCREMENT = 1";


        $con->query($sql);
        $con->query($number);

       
        header("location: ../index.php");
    exit;
    }
?>  