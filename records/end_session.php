<?php
    session_start();
    require_once '../config/dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
        $sitinrecord_id = $_POST['id'];

        $query = "SELECT idno FROM sitinrecord WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $sitinrecord_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $idno);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);

        $query = "UPDATE sitinrecord SET time_ended = NOW() WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $sitinrecord_id);
        mysqli_stmt_execute($stmt);
        

        if(!(mysqli_stmt_affected_rows($stmt) > 0)) {
            $_SESSION['message'] = "Session was not ended";
            $_SESSION['messagestatus'] = "danger";
            exit(0);
        }

        $query = "UPDATE users SET `sessions` = `sessions` - 1 WHERE idno = $idno";
        $query_run = mysqli_query($conn,$query);

        if(!$query_run) {
            $_SESSION['message'] = "Session was not deducted";
            $_SESSION['messagestatus'] = "danger";
            exit(0);
        }

        $_SESSION['message'] = "Session ended.";
        $_SESSION['messagestatus'] = "success";
        exit(0);
    } else {
    }
?>
