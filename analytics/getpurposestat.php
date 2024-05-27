<?php
    session_start();
    require_once '../config/dbconn.php';
    
    $selectedDate = $_GET["date"] ?? date("Y-m-d");

    $labData = array();
    $query = "
        SELECT purpose, COUNT(*) AS sitins
        FROM sitinrecord
        WHERE time_ended IS NOT NULL
        AND DATE(time_ended) = '$selectedDate'
        GROUP BY purpose 
    ";

    $total_labsitins = 0;
    $formatted_labdata = array();

    $query_run = mysqli_query($conn,$query);
    if ($query_run) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $labData[] = $row;
        }
    }

    foreach ($labData as $row) {
        $total_labsitins += $row["sitins"];
        $formatted_labdata[] = array(
          "purpose" => $row["purpose"],
          "sitins" => (float) $row["sitins"],
        );
    }

    $labjson = json_encode($formatted_labdata);

    header('Content-Type: application/json');
    echo $labjson;