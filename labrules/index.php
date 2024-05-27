<?php
session_start();

if (!(isset($_SESSION['email']))) {
    header('Location: ../login/');
}

$labs = ["526", "524", "542", "535"];

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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Lab Rules</h2>


        <div class="block mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="max-width: 80rem;">
            <h5 class=" text-center mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">General Lab Rule</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400">
                "Respectful and responsible computer use is expected at all times. This includes refraining from 
                accessing inappropriate content, adhering to software licensing agreements, and treating equipment 
                with care. Noise levels should be kept to a minimum to maintain a conducive working environment for all users."
            </p>
        </div>


        <div class="mt-5 w-full mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4" style="max-width: 80rem;">

            <?php foreach ($labs as $lab) : ?>
                <div class="max-w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
                    <div>
                        <img class="rounded-t-lg" src="/sitin//assets//images//computer-lab.jpeg" alt="" />
                    </div>
                    <div class="p-5">
                        <div>
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lab <?= $lab ?></h5>
                        </div>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">See Lab Rules.</p>
                        <a href="./lab.php?lab=<?= $lab?>" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            View Rules
                            <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                            </svg>
                        </a>
                    </div>
                </div>
            <?php endforeach ?>

        </div>
    </div>

</body>

</html>