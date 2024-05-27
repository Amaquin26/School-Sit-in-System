<?php
    session_start();
    require_once '../config/dbconn.php';

    if(!(isset($_SESSION['email']))){
        header('Location: ../login/');
    }

    require_once '../config/dbconn.php';

    $param = $_GET["search"] ?? "";

    $reservation_records = array();
    $userId = $_SESSION['id'];


    $query = "SELECT s.id,s.purpose,s.lab,s.date_requested,s.status,s.message 
    FROM reservation s INNER JOIN users u ON u.user_ID = s.user_id 
    WHERE u.role = 'student' 
    AND s.user_id = '$userId'
    AND ( 
        s.purpose LIKE '%$param%' 
        OR s.lab LIKE '%$param%' 
    ) ORDER BY s.status,s.date_requested desc"; 

    $query_run = mysqli_query($conn,$query);

    if ($query_run) {
        while ($row = mysqli_fetch_assoc($query_run)) {
            $reservation_records[] = $row;
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
    <script src="../assets/js/jquery-3.7.1.js"></script>
</head>

<body class="dark bg-gray-900">
    <?php include '../includes/header.php' ?>


    <div class="px-4 mb-5 mt-5">
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">View Reservation</h2>

        <form class="mx-auto" style="max-width: 80rem;">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input name="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Filter Search" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 mx-auto" style="max-width: 80rem;">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Reservation ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Laboratory
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Purpose
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Requested
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Approvers Message
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($reservation_records as $record): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $record['id'] ?>
                            </th>
                            <td class="px-2 py-4">
                                <?= $record['lab'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $record['purpose'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= date('M. d, Y h:ia', strtotime($record['date_requested'])) ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($record['message'] == "" || $record['message'] == null): ?>
                                    <span class="opacity-20 italic">No message yet.</span>
                                <?php else: ?>
                                    <?= $record['message']  ?>
                                <?php endif ?>
                            </td>
                            <td class="px-6 py-4">
                                <?php if($record['status'] == 0): ?>
                                    <p class="text-blue-500" >Pending</p>
                                <?php elseif($record['status'] == 1): ?>
                                    <p class="text-green-500" >Approved</p>
                                <?php elseif($record['status'] == 2): ?>
                                    <p class="text-red-500">Cancelled</p>
                                <?php elseif($record['status'] == 3): ?>
                                    <p class="text-red-500">Dispproved</p>
                                <?php endif ?> 
                            </td>
                            <td class="px-2 py-4">
                                <?php if($record['status'] == 0):?>
                                    <button type="button" id="record-<?= $record['id']?>" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900 cancel-reservation-btn">Cancel Reservation</button>  
                                <?php else: ?>
                                    <p>Can't Cancel</p>
                                <?php endif ?>                         
                            </td>
                        </tr>
                    <?php endforeach; ?>                 
                </tbody>
            </table>
        </div>
    </div>

    <div class="fixed bottom-2 right-5">
        <?php include('../includes/generalmessage.php') ?>
    </div>

    <script>
        // jQuery code to handle button click event
        $(document).ready(function() {
            $('.cancel-reservation-btn').on('click', function() {
                var reservation = this.id.split('-')[1]; // Extracting record ID from button ID

                $.ajax({
                    url: 'cancel_reservation.php',
                    method: 'POST',
                    data: { id: reservation },
                    success: function(response) {
                        location.reload(); // Reload the page after successful update
                    },
                    error: function(){
                        console.log("Something went wrong.");
                    }
                });
            });
        });
    </script>
</body>

</html>