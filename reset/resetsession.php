<?php

    session_start();

    require_once '../config/dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $session = $_POST["sessions"] ?? 30;
        $idno = $_POST['idno'] ?? "";

        if($idno != null || $idno != ""){
            $query = "UPDATE users SET sessions = '$session' WHERE idno = '$idno'";
            $query_run = mysqli_query($conn,$query);

            try{
				$query_run = mysqli_query($conn,$query);
			}catch(mysqli_sql_exception $e){
				$_SESSION['message'] = "Reset session for $idno unsuccessful.";
				$_SESSION['messagestatus'] = "danger";
            	header("Location: session.php");
            	exit(0);
			}
         
            $_SESSION['message'] = "Reset session for $idno successfully.";
			$_SESSION['messagestatus'] = "success";
            header("Location: session.php");
            exit(0);
            
        }

        $_SESSION['message'] = "No idno to reset session";
        $_SESSION['messagestatus'] = "danger";
        header("Location: session.php");
        exit(0);
    }

    $_SESSION['message'] = "Reset session unsuccessful.";
    $_SESSION['messagestatus'] = "danger";
    header("Location: session.php");
    exit(0);