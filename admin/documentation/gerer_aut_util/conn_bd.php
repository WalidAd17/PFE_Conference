<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "pfe_conf";

        // Create connection 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        $conn->set_charset("utf8");

        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

?>