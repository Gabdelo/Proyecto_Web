<?php
    $servername = "172.26.10.1";
    $username = "root"; 
    $password = "1234";
    $dbname = "grupo5";

    $conn = new mysqli($servername, $username, $password, $dbname);

    /*
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    } else {
        echo "Conexión exitosa";
    }
        */
?>
