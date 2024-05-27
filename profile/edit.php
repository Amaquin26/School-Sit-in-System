<?php
    session_start();

    if (!(isset($_SESSION['email']))) {
        header('Location: ../login/');
    }

    require_once '../config/dbconn.php';  
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Get the form data
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        
        // Handle the file upload
        if (isset($_FILES['profile']) && $_FILES['profile']['error'] == UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['profile']['tmp_name'];
            $fileName = $_FILES['profile']['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));
            $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
            $sessionId = $_SESSION['id'];
            $uploadFileDir = "../assets/images/profiles/$sessionId/";
            $dest_path = $uploadFileDir . $newFileName;
    
            // Ensure the directory exists
            if (!is_dir($uploadFileDir)) {
                mkdir($uploadFileDir, 0777, true);
            }
    
            // Move the file to the target directory
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                $profilePath = $dest_path;
            } else {
                $profilePath = null;;
                $_SESSION['message'] = "There was an error moving the file to the upload directory.";
                $_SESSION['messagestatus'] = "danger";
            }
        } else {
            $profilePath = null;
            $_SESSION['message'] = "No file was uploaded or there was an upload error.";
            $_SESSION['messagestatus'] = "danger";
        }
    
        // Assuming you have the user ID stored in a session or another source
        $userId = $_SESSION['id']; // Replace this with your actual user ID source
        $_SESSION['profile'] = $profilePath;
    
        // Update the user's information in the database
        $sql = "UPDATE users SET contact = ?, address = ?, profilePath = ? WHERE user_ID = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sssi', $contact, $address, $profilePath, $userId);
    
        // Execute the statement
        if ($stmt->execute()) {
            $_SESSION['message'] = "User information updated successfully.";
            $_SESSION['messagestatus'] = "success";
            header("Location: ./");
            exit(0);
        } else {
            $_SESSION['message'] = "Failed to update user information.";
            $_SESSION['messagestatus'] = "danger";
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
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Profile</h2>

        <div class="mt-5 w-full mx-auto p-4 max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <div class="flex flex-col items-center pb-5">
                <img class="w-24 h-24 mb-3 rounded-full shadow-lg object-contain object-center" src="<?= $_SESSION['profile']?>"/>
                <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white"><?= $_SESSION['firstname'] . ' ' . $_SESSION['lastname']?></h5>
                <span class="text-sm text-gray-500 dark:text-gray-400"><?= $_SESSION['role'] ?></span>
            </div>
            <form method="post" enctype="multipart/form-data">
                <div>
                    <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="file_input">Profile Image</label>
                    <input name="profile" accept="image/*" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="file_input" type="file">
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contact</label>
                    <input value="<?= $_SESSION['contact'] ?>" type="tel" name="contact" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Contact Details" />
                </div>
                <div>
                    <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Address</label>
                    <input value="<?= $_SESSION['address'] ?>" type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Address" />
                </div>
                <button type="submit" class="mt-5 w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Save</button>
            </form>
        </div>
    </div>

    <div class="fixed bottom-2 right-5">
        <?php include('../includes/generalmessage.php') ?>
    </div>
</body>

</html>