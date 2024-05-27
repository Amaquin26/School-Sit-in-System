<?php 
    session_start();
    require_once '../config/dbconn.php';

    if(!(isset($_SESSION['idno']))){
        header('Location: ../login/');
    }

    $lab = $_GET["lab"] ?? "";

    $records = array();
    $idno = $_SESSION["idno"];

    $query = "SELECT id, purpose, laboratory, time_started as started, time_ended as ended 
    FROM sitinrecord
    WHERE idno = '$idno'";

    if($lab !== "All"){
        $query .= "AND laboratory = '$lab'";
    }

    $query .= "ORDER BY time_started desc";

    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $records[] = $row;
        }
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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Lab <?= $_GET["lab"] ?></h2>

        <div class="relative overflow-x-auto sm:rounded-lg mt-5 mx-auto" style="max-width: 80rem;">

            <a href="./" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg style="transform: scaleX(-1);" class="rtl:rotate-180 w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg>    
                Back               
            </a>

            <?php if(empty($records)): ?>
                <p class="mt-2 text-2xl text-red-500 dark:text-red-700 font-medium">No Records Found!</p>
            <?php endif ?>
        </div>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 mx-auto" style="max-width: 80rem;">
            <?php if(!empty($records)): ?>
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Sitin ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Purpose
                            </th>
                            <?php if($lab === "All"):?>
                                <th scope="col" class="px-6 py-3">
                                    Laboratory
                                </th>                          
                            <?php endif;?>
                            <th scope="col" class="px-6 py-3">
                                Session Started
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Session Ended
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($records as $record): ?>
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <?= $record['id'] ?>
                                </th>
                                <td class="px-6 py-4">
                                    <?= $record['purpose'] ?>
                                </td>
                                <?php if($lab === "All"):?>
                                    <td class="px-6 py-4">
                                        <?= $record['laboratory'] ?>
                                    </td>
                                <?php endif;?>
                                <td class="px-6 py-4">
                                    <?= date('M. d, Y h:ia', strtotime($record['started'])) ?>
                                </td>
                                <td class="px-6 py-4">
                                    <?= date('M. d, Y h:ia', strtotime($record['ended'])) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>                 
                    </tbody>
                </table>
            <?php endif ?>  
        </div>

        </div>
    </div>

</body>

</html>