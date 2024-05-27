<?php 
    session_start();
	require_once "../config/dbconn.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        /* print_r($_POST);
        echo "<br>"; */

        $purpose_val = empty($_POST["purpose-custom"]) ? $_POST['purpose'] : $_POST['purpose-custom'];

		// Get data and sanitize from the form
		try{
			$idno = mysqli_real_escape_string($conn,$_POST['idno']);
			$purpose = mysqli_real_escape_string($conn,$purpose_val);
			$laboratory = mysqli_real_escape_string($conn,$_POST['laboratory']);
		}catch(mysqli_sql_exception $e){
			$_SESSION['message'] = "Can't proceed. " . $e;
            header("Location: ./");
            exit(0);
		}
		
        $fields = "(idno,purpose,laboratory)";
		$vals = "('$idno','$purpose','$laboratory')";
        $query = "INSERT INTO sitinrecord {$fields} VALUES {$vals}";

        try{
            $query_run = mysqli_query($conn,$query);
            $_SESSION['message'] = "Successfully recorded";
            $_SESSION['messagestatus'] = "success";
            header("Location: ../records/");
            exit(0);
        }catch(mysqli_sql_exception $e){
            $_SESSION['message'] = "Record unsuccessfully. " . $e;
            $_SESSION['messagestatus'] = "danger";
            header("Location: ./");
            exit(0);
        }

        //print_r(array("idno" => $idno, "purpose" => $purpose_val, "laboratory" => $laboratory));

	}else{	
        header("Location: ./");
        exit(0);
    }
