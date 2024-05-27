<?php
session_start();

if (!(isset($_SESSION['email']))) {
    header('Location: ../login/');
}

$labs = ["526", "524", "542", "535"];

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


    <div class="px-4  mb-5" style="margin-top: 4rem;">
        <div class="block mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="max-width: 80rem;">
            <h5 class=" text-start mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Lab Rules and Regulations</h5>
            <p class="font-normal text-gray-700 dark:text-gray-400 mb-4">
                To avoid embarrassment and maintain camaraderie with your friends and superior at our laboratories, please observe the following:
            </p>
            <ol class="w-full space-y-1 text-gray-500 list-decimal list-inside dark:text-gray-400">
                <li>
                    Maintain silence, proper decorum, and discipline inside the laboratory. Mobile phones, walkmans and other personal pieces of equipment must be switched off.
                </li>
                <li>
                    Games are not allowed inside the lab. This includes computer-related games, card games and other games that may disturb the operation of the lab.
                </li>
                <li>
                    Surfing the internet is allowed only with the permission of the instructor. Downloading and installing of software are strictly prohibited.
                </li>
                <li>
                    Getting access to other websites not related to the course (especially pornographic and illicit sites) is strictly prohibited.
                </li>
                <li>
                    Deleting computer files and changing the set-up of the computer is a major offense.
                </li>
                <li>
                    Observe computer time usage carefully. A fifteen-minute allowance is given for each use. Otherwise, the unit will be given to those who wish to sit-in.
                </li>
                <li>
                    Observe proper decorum while inside the laboratory.
                    <ul style="margin-left: 1.5rem;">
                        <li> a. Do not get inside the lab unless the instructor is present.</li>
                        <li> b. All bags, knapsacks, and the likes must be deposited at the counter.</li>
                        <li> c. Follow the seating arrangement of your instructor..</li>
                        <li> d. At the end of class, all software programs must be closed.</li>
                        <li> e. Return all chairs to their proper places after using.</li>                 
                    </ul>
                </li>
                <li>
                    Chewing gum, eating, drinking, smoking, and other forms of vandalism are prohibited inside the lab.
                </li>
                <li>
                    Anyone causing a continual disturbance will be asked to leave the lab. Acts or gestures offensive to the members of the community, including public display of physical intimacy, are not tolerated.
                </li>
                <li>
                    Persons exhibiting hostile or threatening behavior such as yelling, swearing, or disregarding requests made by lab personnel will be asked to leave the lab.
                </li>
                <li>
                    For serious offense, the lab personnel may call the Civil Security Office (CSU) for assistance.
                </li>
                <li>
                    Any technical problem or difficulty must be addressed to the laboratory supervisor, student assistant or instructor immediately.
                </li>
            </ol>
        </div>

        <div class="mt-5 block mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700" style="max-width: 80rem;">
            <h5 class=" text-start mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Disciplinary Action</h5>
            <ul class="w-full space-y-1 text-gray-500 list-disc list-inside dark:text-gray-400">
                <li>
                    <span class="font-semibold text-gray-900 dark:text-white">First Offense</span> - The Head or the Dean or OIC recommends to the Guidance Center for a suspension from classes for each offender.
                </li>
                <li>
                    <span class="font-semibold text-gray-900 dark:text-white">Second and Subsequent Offenses</span> - A recommendation for a heavier sanction will be endorsed to the Guidance Center.
                </li>
            </ul>
        </div>

    </div>

</body>

</html>