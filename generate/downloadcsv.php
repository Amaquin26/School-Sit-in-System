<?php 
    session_start();
    require_once '../config/dbconn.php';

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $purpose = $_GET["purpose"] ?? "";
        $laboratory = $_GET["laboratory"] ?? "";
        $selectedDate = $_GET["date"] ?? null; //date("Y-m-d")

        $sitin_records = array();

        $query = "SELECT s.id, u.idno, u.firstname, u.lastname, s.purpose, s.laboratory, s.time_started as started, s.time_ended as ended 
            FROM users u INNER JOIN sitinrecord s ON u.idno = s.idno 
            WHERE u.role = 'student'  
        ";

        if($selectedDate !== null && !empty($selectedDate)){
            $query .= "AND DATE(s.time_started) = '$selectedDate'";
        }

        if (!empty($purpose) || !empty($laboratory)) {
            $query .= " AND (";

            if (!empty($purpose)) {
                $query .= " s.purpose LIKE '%$purpose%'";
            }

            if (!empty($laboratory)) {
                if (!empty($purpose)) {
                    $query .= " AND";
                }
                $query .= " s.laboratory LIKE '%$laboratory%'";
            }

            $query .= ")";
        }

        $query .= " AND s.time_ended IS NOT NULL ORDER BY s.time_started DESC";

        $query_run = mysqli_query($conn,$query);

        if ($query_run) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $sitin_records[] = $row;
            }
    
            if(count($sitin_records) > 0){
                // Generate CSV content
                $csvContent = "IDNO,Student Name,Laboratory,Purpose,Session Started,Session Ended\n";
                foreach ($sitin_records as $record) {
                    $csvContent .= "{$record['idno']},{$record['firstname']} {$record['lastname']},{$record['laboratory']},{$record['purpose']},{$record['started']},{$record['ended']}\n";
                }
        
                header('Content-Type: text/csv');
                $filename = ($selectedDate !== null && !empty($selectedDate)) ? "sitin-report-as-of-" . str_replace('-', '_', $selectedDate) . ".csv" : "sitin-all-report.csv";
                header('Content-Disposition: attachment; filename="' . $filename . '"');
                header('Cache-Control: must-revalidate');
                header('Pragma: public');
                header('Content-Length: ' . strlen($csvContent));

                // Output CSV content
                echo $csvContent;
                exit;
            }else{
                $_SESSION['message'] = "No records to donwload.";
                $_SESSION['messagestatus'] = "danger";
                header("Location: ./?purpose=$purpose&laboratory=$laboratory&date=$selectedDate");
                exit;
            }     
        }else{
            $_SESSION['message'] = "Report download unsuccesful. " . $e;
            $_SESSION['messagestatus'] = "danger";
            header("Location: ./");
            exit;
        }
    }
?>

    

    