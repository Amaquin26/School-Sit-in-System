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
            $query = "SELECT idno,sessions FROM users WHERE idno = '$idno' AND role = 'student' LIMIT 1";
            $query_run = mysqli_query($conn,$query);

            if(mysqli_num_rows($query_run) > 0){
                
                foreach($query_run as $user){
                    $student_detail['idno'] = $user['idno'];
                    $student_detail['sessions'] = $user['sessions'];             
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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Search</h2>

        <form class="max-w-md mx-auto">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input name="search-input" type="search" id="default-search" value="<?= $_GET['search-input'] ?? "" ?>" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search by IDNO" required />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
            </div>
        </form>

        <div class="mt-5 w-full max-w-md mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <?php if(isset($student_detail['sessions']) && isset($student_detail['idno'])):?>  
                <form class="space-y-6" method="post" action="submit-purpose.php">
                    <div>
                        <label for="idno" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">ID Number</label>
                        <input type="number" disabled aria-describedby="helper-text-explanation" value="<?= $student_detail['idno']?>" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                        <input type="number" id="idno" name="idno" hidden value="<?= $student_detail['idno']?>"  />
                    </div>
                    <div>
                        <label for="purpose" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Purpose</label>
                        <select id="purpose" name="purpose" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="Python">Python</option>
                            <option value="C++">C++</option>
                            <option value="C#">C#</option>
                            <option value="C">C</option>
                            <option value="Java">Java</option>
                            <option value="Mobile Development">Mobile Development</option>
                            <option value="Javascript">Javascript</option>
                            <option value="PHP">PHP</option>
                            <option value="Others">Others</option>
                        </select>
                    </div>
                    <div id="custom" class="hidden">
                        <label for="purpose-custom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Custom Purpose</label>
                        <input id="custom-val" name="purpose-custom" aria-describedby="helper-text-explanation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"/>
                    </div>
                    <div>
                        <label for="laboratory" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Laboratory</label>
                        <select id="laboratory" name="laboratory" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="526">526</option>
                            <option value="524">524</option>
                            <option value="542">542</option>
                            <option value="535">535</option>
                        </select>
                    </div>
                    <div>
                        <label for="sessions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Remaining Session</label>
                        <input disabled aria-describedby="helper-text-explanation" value="<?= $student_detail['sessions'] ?>" class="cursor-not-allowed bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-800 dark:border-gray-900 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                    </div>
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>
            <?php else: ?>
                <p class="text-red-500 dark:text-red-700 font-medium">No Student Found!</p>
            <?php endif ?>  
        
        </div>
    </div>

    <script>
        document.getElementById("purpose").addEventListener("change", handleChange);

        function handleChange(e){
            const custom = document.getElementById("custom");
            const val = e.target.value;
            //console.log(val)
            
            if(val === "Others"){
                custom.classList.remove("hidden");
            }else{  
                document.getElementById("custom-val").value = "";
                custom.classList.add("hidden");
            }
        }

    </script>

</body>

</html>