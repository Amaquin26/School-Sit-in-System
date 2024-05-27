<?php 
    session_start();

    if(!(isset($_SESSION['email']))){
        header('Location: ../login/');
    }

    if (!($_SESSION["role"] === 'admin' || $_SESSION["role"] === 'staff'))
        header('Location: ../errors/unauthorized.php');

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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Post Announcements</h2>     

        <div class="max-w-md m-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="margin: auto;">
            <form class="space-y-6" action="postannounce.php" method="post">
                <div>
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" name="title" id="title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Announcement Title" required />
                </div>
                <div>
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Message</label>
                    <textarea id="message" name="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Announcement Message" required></textarea>
                </div>
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post Announcment</button>
            </form>
        </div>

    </div>

    <div class="fixed bottom-2 right-5">
        <?php include '../includes/generalmessage.php'?> 
    </div>
</body>

</html>