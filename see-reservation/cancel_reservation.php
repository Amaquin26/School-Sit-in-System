<?php
    session_start();
    require_once '../config/dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $reserve_id = $_POST['id'];

        $query = "SELECT id FROM reservation WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $reserve_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $query = "UPDATE reservation SET status = '2' WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $reserve_id);
        mysqli_stmt_execute($stmt);
        

        if(!(mysqli_stmt_affected_rows($stmt) > 0)) {
            $_SESSION['message'] = "Reservation was not cancelled";
            $_SESSION['messagestatus'] = "danger";
            exit(0);
        }

        $_SESSION['message'] = "Reservation cancelled.";
        $_SESSION['messagestatus'] = "success";
        exit(0);
    } else {

    }
?>
