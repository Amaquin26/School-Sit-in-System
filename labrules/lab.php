<?php 
    session_start();
    require_once '../config/dbconn.php';

    if(!(isset($_SESSION['idno']))){
        header('Location: ../login/');
    }

    $lab = $_GET["lab"] ?? "";

    $labrules = [];

    switch ($lab) {
        case "526":
            // Handle lab 526
            $labrules = array(
                "No Food or Drink",
                "Quiet Zone",
                "Respect Equipment",
                "No Unauthorized Software Installation",
                "Log Out Properly"
            );  
            break;
        case "524":
            // Handle lab 524
            $labrules = array(
                "No Food or Drink",
                "Quiet Zone",
                "Respect Equipment",
                "No Unauthorized Software Installation",
                "Log Out Properly",
                "Do not use computers unless permitted"
            );
            break;
        case "535":
            // Handle lab 535
            $labrules = array(
                "No Food or Drink",
                "Quiet Zone",
                "Respect Equipment",
                "No Unauthorized Software Installation",
                "Log Out Properly",
                "No sharing of computers"
            );
            break;
        case "542":
            // Handle lab 542
            $labrules = array(
                "No Food or Drink",
                "Quiet Zone",
                "Respect Equipment",
                "No Unauthorized Software Installation",
                "Log Out Properly",
                "No using of personal mouse and keyboard"
            );
            break;
        default:
            $labrules = array(
                "No Food or Drink",
                "Quiet Zone",
                "Respect Equipment",
                "No Unauthorized Software Installation",
                "Log Out Properly"
            );
            break;
    }  
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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Lab <?= $_GET["lab"] ?> Rules</h2>

        <div class="relative overflow-x-auto sm:rounded-lg mt-5 mx-auto" style="max-width: 80rem;">
            <a href="./" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg style="transform: scaleX(-1);" class="rtl:rotate-180 w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>    
                Back              
            </a>
        </div>

        <div class="relative overflow-x-auto mt-5 sm:rounded-lg mt-5 mx-auto" style="max-width: 80rem;">
            <h2 class="mb-2 text-lg font-semibold text-gray-900 dark:text-white">Lab Rules:</h2>
            <ol class="max-w-md space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">                             
                <?php foreach($labrules as $index => $rule):?>
                    <li>
                        <?= $rule ?>
                    </li>
                <?php endforeach; ?>
            </ol>
        </div>

        </div>
    </div>

</body>

</html>