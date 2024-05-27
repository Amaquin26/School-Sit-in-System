<?php

if(!(isset($_SESSION['email']))){
    header('Location: ../login/');
}

if (!($_SESSION["role"] === 'admin' || $_SESSION["role"] === 'staff')){
    header('Location: ../errors/unauthorized.php');
}else{
    header('Location: /sitin/');
}
    

header('Location: password.php');