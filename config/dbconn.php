<?php

    $conn = mysqli_connect("localhost","root","","sitindb");

    if(!$conn){
        echo "Database not connected" . mysqli_connect_error();
        die();
    }