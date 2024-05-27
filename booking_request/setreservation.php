<?php

    session_start();

    require_once '../config/dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $reserveId = $_POST["reserveId"] ?? "";
        $message = $_POST['message'] ?? "";
        $status = $_POST['status'] ?? "";

        $query = "UPDATE reservation SET message = '$message', status = '$status' WHERE id = '$reserveId'";
        try{
            $query_run = mysqli_query($conn,$query);
            $_SESSION['message'] = "Updated reservation successfully.";
            $_SESSION['messagestatus'] = "success";
            header("Location: ./");
            exit(0);
        }catch(mysqli_sql_exception $e){
            $_SESSION['message'] = "Updating reservation unsuccessful." . $e;
            $_SESSION['messagestatus'] = "danger";
            header("Location: ./");
            exit(0);
        }
    }