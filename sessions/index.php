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
        <div class="max-w-full m-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700" style="max-width:70rem;margin: auto;">
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">View Sessions</h5>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Your Remaining Sessions: <?= $_SESSION["sessions"] ?></p>
            <a href="/sitin/" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg style="transform:scaleX(-1);" class="me-2 rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                </svg>
                Back Home
            </a>
        </div>
    </div>

</body>

</html>