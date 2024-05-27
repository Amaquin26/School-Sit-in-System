<?php 
    session_start();
	require_once "../config/dbconn.php";

    if(isset($_POST['submitbutton'])){
		// Get data and sanitize from the form
		try{
			$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
			$middlename = mysqli_real_escape_string($conn,$_POST['middlename']);
			$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
			$age = mysqli_real_escape_string($conn,$_POST['age']);
			$yearlevel = mysqli_real_escape_string($conn,$_POST['yearlevel']);
			$gender = mysqli_real_escape_string($conn,$_POST['gender']);
			$contact = mysqli_real_escape_string($conn,$_POST['contact']);
			$email = mysqli_real_escape_string($conn,$_POST['email']);
			$address = mysqli_real_escape_string($conn,$_POST['address']);
			$idno = mysqli_real_escape_string($conn,$_POST['idno']);
			$password = $_POST['password'];
			$confirmpassword = $_POST['confirmpass'];
		}catch(mysqli_sql_exception $e){
			$_SESSION['registermessage'] = "Student registered unsuccessfully. " . $e;
            header("Location: index.php");
            exit(0);
		}
		
		//Compare password
		$confirm = strcmp($password,$confirmpassword);

		if($confirm === 0){
			$hashedpassword = password_hash($password,PASSWORD_DEFAULT);

			$fields = "(firstname,middlename,lastname,age,yearlevel,gender,contact,email,address,password,idno)";
			$vals = "('$firstname','$middlename','$lastname','$age','$yearlevel','$gender','$contact','$email','$address','$hashedpassword','$idno')";

			$query = "INSERT INTO users {$fields} VALUES {$vals}";

			try{
				$query_run = mysqli_query($conn,$query);
			}catch(mysqli_sql_exception $e){
				$_SESSION['registermessage'] = "Student registered unsuccessfully. ";
				$_SESSION['registerstatus'] = "danger";
            	header("Location: index.php");
            	exit(0);
			}

			if($query_run){
				$_SESSION['registermessage'] = "Student registered successfully. Login with the credentials";
                $_SESSION['registerstatus'] = "success";
				header("Location: ../login/");
				exit(0);
			}else{
                $_SESSION['registermessage'] = "Student registered unsuccessfully.";
                $_SESSION['registerstatus'] = "danger";
                header("Location: index.php");
                exit(0);
			}
		}else{
			$_SESSION['registermessage'] = "Password and Confirm Password does not match.";
            $_SESSION['registerstatus'] = "danger";
            header("Location: index.php");
            exit(0);
		}
	}else{	
        header("Location: index.php");
        exit(0);
    }
