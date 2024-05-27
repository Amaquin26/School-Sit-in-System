<?php
session_start();

    if (!(isset($_SESSION['email']))) {
        header('Location: ../login/');
    }

    if (!($_SESSION["role"] === 'admin' || $_SESSION["role"] === 'staff'))
        header('Location: ../errors/unauthorized.php');

    require_once '../config/dbconn.php';

    $reportings = array();
    $laboratory = isset($_GET["laboratory"])? $_GET["laboratory"] : "";

    $query = "SELECT a.id, a.datecreated, a.title, a.message, u.firstname, u.lastname,u.profilePath 
          FROM feedbacks a 
          JOIN users u ON a.user_ID = u.user_ID 
          WHERE a.title LIKE '%$laboratory%' 
          ORDER BY a.datecreated DESC";

    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $reportings[] = $row;
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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Feedback and Reportings</h2>

        <div class="max-w-full m-auto p-6" style="max-width:70rem;margin: auto;">
            <div class="mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mb-5">
                <form class="flex items-center justify-center">
                    <label for="laboratory" class="block w-full text-sm font-medium text-gray-900 dark:text-white">Filter By Laboratory</label>
                    <select id="laboratory" name="laboratory" class="mr-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="" <?php if ($laboratory == '') echo 'selected'; ?>>All</option> 
                        <option value="526" <?php if ($laboratory == '526') echo 'selected'; ?>>526</option>
                        <option value="524" <?php if ($laboratory == '524') echo 'selected'; ?>>524</option>
                        <option value="542" <?php if ($laboratory == '542') echo 'selected'; ?>>542</option>
                        <option value="535" <?php if ($laboratory == '535') echo 'selected'; ?>>535</option>
                    </select>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5  dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Filter</button>
                </form>
            </div>
            <ol class="relative border-gray-200 dark:border-gray-700">
                <?php foreach($reportings as $reporting): ?>              
                    <li class="mb-10 ms-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <img class="rounded-full shadow-lg" src="<?= $reporting['profilePath']?>" />
                            </span>
                            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                <div class="items-center justify-between mb-3 sm:flex">
                                    <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0"><?= date('M. d, Y h:ia', strtotime($reporting['datecreated']))?></time>
                                    <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300"><?= $reporting['lastname'] . ', ' . $reporting['firstname']?></div>
                                </div>
                                <p class="font-semibold text-lg text-gray-900 dark:text-white">Lab <?= $reporting['title']?></p>
                                <div class="p-3 text-sm italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                    <?= $reporting['message']?>
                                </div>
                            </div>
                        </li>
                <?php endforeach; ?>
            </ol>

            <?php if(count($reportings) <= 0): ?>
                <p class="text-gay-700 dark:text-gray-500 font-medium p-4 border rounded-lg dark:border-blue-500 border-blue-600">No Feedbacks and Reporting Found!</p>
            <?php endif; ?>
        </div>

    </div>

</body>

</html>