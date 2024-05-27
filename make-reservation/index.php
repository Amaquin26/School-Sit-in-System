<?php 
    session_start();

    if(!(isset($_SESSION['email']))){
        header('Location: ../login/');
    }

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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Make Reservations</h2>     

        <div class="mt-5 w-full max-w-md mx-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">  
            <form class="space-y-6" action="postreservation.php" method="post">
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
                <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
            </form>     
        </div>

    </div>

    <div class="fixed bottom-2 right-5">
        <?php include '../includes/generalmessage.php'?> 
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