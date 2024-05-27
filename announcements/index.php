<?php
session_start();

    if (!(isset($_SESSION['email']))) {
        header('Location: ../login/');
    }

    require_once '../config/dbconn.php';

    $announcements = array();

    $query = "SELECT a.id,a.datecreated,a.title,a.message,u.firstname,u.lastname,u.profilePath FROM announcements a JOIN users u ON a.userId = u.user_ID ORDER BY a.datecreated DESC"; 

    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $announcements[] = $row;
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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Announcements</h2>

        <div class="max-w-full m-auto p-6" style="max-width:70rem;margin: auto;">
            <ol class="relative border-gray-200 dark:border-gray-700">
                <?php foreach($announcements as $announcement): ?>              
                    <li class="mb-10 ms-6">
                            <span class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                <img class="rounded-full shadow-lg" src="<?= $announcement['profilePath'] ?>" />
                            </span>
                            <div class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                <div class="items-center justify-between mb-3 sm:flex">
                                    <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0"><?= date('M. d, Y h:ia', strtotime($announcement['datecreated']))?></time>
                                    <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300"><?= $announcement['lastname'] . ', ' . $announcement['firstname']?></div>
                                </div>
                                <p class="font-semibold text-lg text-gray-900 dark:text-white"><?= $announcement['title']?></p>
                                <div class="p-3 text-sm italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                    <?= $announcement['message']?>
                                </div>
                            </div>
                        </li>
                <?php endforeach; ?>
            </ol>
        </div>

        <?php if(count($announcements) <= 0): ?>
            <p class="text-gay-700 dark:text-gray-500 font-medium p-4 border rounded-lg dark:border-blue-500 border-blue-600">No Feedbacks and Reporting Found!</p>
        <?php endif; ?>
    </div>

</body>

</html>