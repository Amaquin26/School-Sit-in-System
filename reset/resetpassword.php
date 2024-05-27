<?php

    session_start();

    require_once '../config/dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $password = $_POST["password"] ?? "password123";
        $idno = $_POST['idno'] ?? "";
        $hashedpassword = password_hash($password,PASSWORD_DEFAULT);

        if($idno != null || $idno != ""){
            $query = "UPDATE users SET password = '$hashedpassword' WHERE idno = '$idno'";
            $query_run = mysqli_query($conn,$query);

            try{
				$query_run = mysqli_query($conn,$query);
			}catch(mysqli_sql_exception $e){
				$_SESSION['message'] = "Reset password for $idno unsuccessful.";
				$_SESSION['messagestatus'] = "danger";
            	header("Location: password.php");
            	exit(0);
			}
         
            $_SESSION['message'] = "Reset password for $idno successfully.";
			$_SESSION['messagestatus'] = "success";
            header("Location: password.php");
            exit(0);
            
        }

        $_SESSION['message'] = "No idno to reset password";
        $_SESSION['messagestatus'] = "danger";
        header("Location: password.php");
        exit(0);
    }

    $_SESSION['message'] = "Reset password unsuccessful.";
    $_SESSION['messagestatus'] = "danger";
    header("Location: password.php");
    exit(0);