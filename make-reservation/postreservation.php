<?php

    session_start();

    require_once '../config/dbconn.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $purpose_val = empty($_POST["purpose-custom"]) ? $_POST['purpose'] : $_POST['purpose-custom'];
        
        if(($purpose_val != null || $purpose_val != "") && ($_POST['laboratory'] != null || $_POST['laboratory'] != "")){
            // Get data and sanitize from the form
            try{
                $userId = $_SESSION['id'] ?? "";
                $purpose = mysqli_real_escape_string($conn,$purpose_val);
                $laboratory = mysqli_real_escape_string($conn,$_POST['laboratory']);
            }catch(mysqli_sql_exception $e){
                $_SESSION['message'] = "Can't proceed. " . $e;
                header("Location: ./");
                exit(0);
            }
            
            $fields = "(user_id,purpose,lab)";
            $vals = "('$userId','$purpose','$laboratory')";
            $query = "INSERT INTO reservation {$fields} VALUES {$vals}";

            /*
                status
                0 = pending,
                1 = approved,
                2 = cancelled,
                3 = disapproved
            */

            try{
                $query_run = mysqli_query($conn,$query);
                $_SESSION['message'] = "Success, waiting for approval";
                $_SESSION['messagestatus'] = "success";
                header("Location: /sitin/see-reservation/");
                exit(0);
            }catch(mysqli_sql_exception $e){
                $_SESSION['message'] = "Reservation unsuccessful. " . $e;
                $_SESSION['messagestatus'] = "danger";
                header("Location: ./");
                exit(0);
            }
        }	

        //print_r(array("idno" => $idno, "purpose" => $purpose_val, "laboratory" => $laboratory));

	}else{	
        header("Location: ./");
        exit(0);
    }
