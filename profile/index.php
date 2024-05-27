<?php
session_start();

    if (!(isset($_SESSION['email']))) {
        header('Location: ../login/');
    }

    require_once '../config/dbconn.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../style.css">
    </link>
    <link rel="stylesheet" href="../assets//css//flowbite.mini.css">
    </link>
    <script src="../assets//js/flowbite.min.js"></script>
</head>

<body class="dark bg-gray-900">
    <?php include '../includes/header.php' ?>

    <div class="px-4 mt-5 mb-5">
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Profile</h2>

        <div class="max-w-full m-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700" style="max-width:70rem;margin: auto;">
            <?php include('../includes/ondevelopment.php') ?>
        </div>
    </div>

</body>

</html>