<?php 
    session_start();

    if(!(isset($_SESSION['email']))){
        header('Location: ../login/');
    }

    if (!($_SESSION["role"] === 'admin' || $_SESSION["role"] === 'staff'))
        header('Location: ../errors/unauthorized.php');

    require_once '../config/dbconn.php';
    
    $student_detail = array();

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        
        $idno = $_GET['search-input'] ?? "";

        if($idno != null || $idno != ""){
            $query = "SELECT idno,firstname,lastname,role,sessions,profilePath FROM users WHERE idno = '$idno' AND role = 'student' LIMIT 1";
            $query_run = mysqli_query($conn,$query);

            if(mysqli_num_rows($query_run) > 0){
                
                foreach($query_run as $user){
                    $student_detail['idno'] = $user['idno'];
                    $student_detail['firstname'] = $user['firstname'];
                    $student_detail['lastname'] = $user['lastname'];
                    $student_detail['role'] = $user['role'];             
                    $student_detail['sessions'] = $user['sessions'];   
                    $student_detail['profilePath'] = $user['profilePath'];            
                }
            }
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

    
    <div class="px-4 mb-5 mt-5">
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Reset Session</h2>

        <form class="max-w-md mx-auto">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input name="search-input" value="<?= $_GET['search-input'] ?? "" ?>" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by IDNO" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>
        
        <div class="mt-5 w-full mx-auto p-4 max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <?php if(isset($student_detail['idno'])):?>  
                <div class="flex justify-end px-4 pt-4">
                    <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                            <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdown" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                        <form method="post" action="resetsession.php">
                            <ul class="py-2" aria-labelledby="dropdownButton">
                                <li>
                                    <input hidden name="idno" value="<?= $student_detail['idno']?>" />
                                    <button type="submit" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Default Reset</button>
                                </li>
                            </ul>
                        </form>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-5">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-contain object-center" src="<?= $student_detail['profilePath'] ?>" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $student_detail['firstname'] . ' ' . $student_detail['lastname']?></h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400"><?= $student_detail['role'] ?></span>
                    <form class="flex justify-between items-center gap-3 mt-4 md:mt-6" action="resetsession.php" method="post">
                        <input hidden name="idno" value="<?= $student_detail['idno']?>" />    
                        <input type="number" id="small-input" name="sessions" value="<?= $student_detail['sessions'] ?>" class="block w-full p-2 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-xs focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Session" required>
                        <button type="submit" class="inline-flex items-center whitespace-no-wrap px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Set</button>
                    </form>
                </div>
                <div class="text-sm font-medium text-gray-700 dark:text-gray-500 text-center pb-5">
                    <p class="my-1">Set a specific number or Default Reset</p>
                    <p>Default Reset will reset sessions back to 30</p>
                </div>
            <?php else:?>  
                <p class="text-red-500 dark:text-red-700 font-medium">No Student Found!</p>
            <?php endif?>       
        </div>
    </div>

    <div class="fixed bottom-2 right-5">
        <?php include '../includes/generalmessage.php'?> 
    </div>

</body>

</html>