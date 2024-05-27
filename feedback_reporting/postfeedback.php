<?php

    session_start();

    require_once '../config/dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $title = $_POST["title"] ?? "";
        $message = $_POST['message'] ?? "";
        $userId = $_SESSION['id'] ?? "";

        if(($title != null || $title != "") && ($message != null || $message != "") && ($userId != null || $userId != "")){
            $query = "INSERT INTO feedbacks (user_ID,title,message) VALUES ('$userId','$title','$message')";

            try{
				$query_run = mysqli_query($conn,$query);
			}catch(mysqli_sql_exception $e){
				$_SESSION['message'] = "Post feedback unsuccessful.";
				$_SESSION['messagestatus'] = "danger";
            	header("Location: ./");
            	exit(0);
			}
         
            $_SESSION['message'] = "Post feedback successfully.";
			$_SESSION['messagestatus'] = "success";
            header("Location: ./");
            exit(0);
            
        }

        $_SESSION['message'] = "Post feedback unsuccessful.";
        $_SESSION['messagestatus'] = "danger";
        header("Location: ./");
        exit(0);
    }

    $_SESSION['message'] = "Post feedback unsuccessful.";
    $_SESSION['messagestatus'] = "danger";
    header("Location: ./");
    exit(0);