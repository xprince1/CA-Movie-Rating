<?php

    $servername = "localhost";
    $username = "admin";
    $password = "admin4321";
    $dbname = "ca-php";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // $sql = "SELECT id, name, image, description FROM movieDetail";
    // $result = $conn->query($sql);
    
    // if ($result->num_rows > 0) {
    //     while($row = $result->fetch_array()) {
    //         echo $row['name'];
    //     }
    // } else {
    //     echo "0 results";
    // }
    // $conn->close();
    
?>