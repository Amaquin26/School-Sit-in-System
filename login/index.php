<?php
    session_start();
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

<body class="dark h-screen bg-gray-900">
  
    <main class="flex min-h-screen justify-center items-center h-screen px-4">
        <div class="w-full max-w-sm p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700">
            <form class="space-y-6" action="login.php" method="post">
                <h5 class="text-xl font-medium text-gray-900 dark:text-white">Sign in to Sitin</h5>
                <div>
                    <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Email</label>
                    <input type="email" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@mail.com" required />
                </div>
                <div>
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your password</label>
                    <input type="password" name="password" id="password" placeholder="••••••••" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required />
                </div>
                <div >
                    <a href="#" class="ms-auto text-sm text-blue-700 hover:underline dark:text-blue-500">Forgot Password?</a>
                </div>
                <button type="submit" name="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login to your account</button>
                <div class="text-sm font-medium text-gray-500 dark:text-gray-300">
                    Not registered? <a href="../register/index.php" class="text-blue-700 hover:underline dark:text-blue-500">Create account</a>
                </div>
            </form>
        </div>
    </main>

    <div class="fixed bottom-2 right-5">
        <?php include '../includes/loginmessage.php'?>
        <?php include '../includes/registermessage.php'?> 
    </div>
</body>

</html>