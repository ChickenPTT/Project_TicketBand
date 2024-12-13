<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bandtikhub";

    $con =  new mysqli($servername, $username, $password, $dbname);
    if ($con -> connect_error){
        
        die("Lỗi kết nối". $con -> connect_error );
    }
?>  
