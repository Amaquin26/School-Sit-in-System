<?php
session_start();
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

    <main class="flex justify-center items-center px-4" style="margin-top: 50px;margin-bottom: 50px;">
        <div class="max-w-xl p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <a href="#">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-red-700 dark:text-red-500">Page Not Found</h5>
            </a>
            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">We could not see the page you requested</p>
            <a href="/sitin/" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg style="transform: scaleX(-1);" class="rtl:rotate-180 w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>    
                Back to Home                
            </a>
        </div>
    </main>
</body>

</html>