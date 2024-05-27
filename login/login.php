<?php

    session_start();
    require_once '../config/dbconn.php';

    if(isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        $query = "SELECT * FROM users " . "WHERE email = '{$username}' LIMIT 1"; 

        $query_run = mysqli_query($conn,$query);

        if(mysqli_num_rows($query_run) > 0){
            foreach($query_run as $user){
                $pass = $user['password'];

                $correct = password_verify($password,$pass);
                if($correct){
                    $_SESSION['idno'] = $user['idno'];
                    $_SESSION['id'] = $user['user_ID'];
                    $_SESSION['firstname'] = $user['firstname'];
                    $_SESSION['middlename'] = $user['middlename'];
                    $_SESSION['lastname'] = $user['lastname'];
                    $_SESSION['age'] = $user['age'];
                    $_SESSION['yearlevel'] = $user['yearlevel'];
                    $_SESSION['gender'] = $user['gender'];
                    $_SESSION['contact'] = $user['contact'];
                    $_SESSION['email'] = $user['email'];
                    $_SESSION['address'] = $user['address'];
                    $_SESSION['role'] = $user['role'];

                    if($_SESSION["role"] === "student")
                        $_SESSION['sessions'] = $user['sessions'];

                    header("Location: /sitin/");
			        exit(0);
                }else{
                    $_POST = array();
                    $_SESSION['loginmessage'] = "Wrong username or password";
                    $_SESSION['loginstatus'] = "danger";
                    header("Location: index.php");
                    exit(0);
                }
            }
        }else{
            $_POST = array();
			$_SESSION['loginmessage'] = "Wrong username or password";
            $_SESSION['loginstatus'] = "danger";
			header("Location: index.php");
			exit(0);
        }
    }else{	
        header("Location: index.php");
        exit(0);
    }

