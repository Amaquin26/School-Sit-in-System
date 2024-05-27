<?php
session_start();

    if (!(isset($_SESSION['email']))) {
        header('Location: ../login/');
    }

    if (!($_SESSION["role"] === 'admin' || $_SESSION["role"] === 'staff'))
        header('Location: ../errors/unauthorized.php');

    require_once '../config/dbconn.php';

    $selectedDate = $_GET["date"] ?? date("Y-m-d");
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
    <script src="../assets//js/apexcharts.js"></script>
    <script src="../assets//js/datepicker.min.js"></script>
</head>

<body class="dark bg-gray-900">
    <?php include '../includes/header.php' ?>

    <div class="px-4 mt-5 mb-5">
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Analytics</h2>

        <div class="max-w-full m-auto p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-800 dark:border-gray-700" style="max-width:70rem;margin: auto;">
                
            <form>
                <div class="flex items-center gap-3 justify-center m-auto">
                    <button type="button" onclick="decreaseDate()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center me-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10" style="transform: scaleX(-1);">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </button>
                    
                    <div class="relative max-w-sm">
                        <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                            </svg>
                        </div>
                        <input datepicker type="text" name="date" id="datepicker" value="<?= $selectedDate != null ? date("m/d/Y", strtotime($selectedDate)) : date("m/d/Y", strtotime(date("Y-m-d H:i:s"))) ?>" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                        <input type="date" id="dateInput" value="<?= $selectedDate ?>" hidden>
                    </div>

                    <button type="button" onclick="increaseDate()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center ms-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                        </svg>
                        <span class="sr-only">Icon description</span>
                    </button>                                
                </div> 
                <!-- <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm p-2.5 text-center inline-flex items-center ms-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Filter
                </button> -->
            </form>


            <div >
                <div class="flex md:flex-row flex-col justify-between items-center">
                    <!-- Purpose Chart -->
                    <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                        <div class="flex justify-between items-start w-full">
                            <div class="flex-col items-center">
                                <h5 class="text-xl font-bold leading-none md:text-start text-center text-gray-900 dark:text-white me-1">Purpose</h5>
                                <div id="dateRangeDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                                    <div class="p-3" aria-labelledby="dateRangeButton">
                                        <div date-rangepicker datepicker-autohide class="flex items-center">
                                            <div class="relative">
                                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                </div>
                                                <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Start date">
                                            </div>
                                            <span class="mx-2 text-gray-500 dark:text-gray-400">to</span>
                                            <div class="relative">
                                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                                    </svg>
                                                </div>
                                                <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="End date">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <!-- Line Chart -->
                        <div class="py-6" id="pie-chart"></div>
                    </div>

                <!-- Lab Chart -->
                <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                    <div class="flex justify-between items-start w-full">
                        <div class="flex-col items-center">
                        <div class="flex md:items-start items-center mb-1">
                            <h5 class="text-xl font-bold leading-none text-gray-900 dark:text-white me-1">Laboratory</h5>
                        </div>
                        <div id="dateRangeDropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-80 lg:w-96 dark:bg-gray-700 dark:divide-gray-600">
                            <div class="p-3" aria-labelledby="dateRangeButton">
                            <div date-rangepicker datepicker-autohide class="flex items-center">
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input name="start" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Start date">
                                </div>
                                <span class="mx-2 text-gray-500 dark:text-gray-400">to</span>
                                <div class="relative">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input name="end" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="End date">
                                </div>
                            </div>
                            </div>
                        </div>
                    </div>    
                </div>
                <!-- Line Chart -->
                <div class="py-6" id="lab-chart"></div>
            </div>    

        </div>
        <form id="dataFormLab" style="display: none;"> <input type="hidden" name="formattedLabData" value="<?= json_encode($formatted_labdata) ?>">
    </div>
</body>
</html>

<script>
    document.getElementById("datepicker").addEventListener("change",(e) => {
        if(e.target.value == null || e.target.value == "") return
        let dateSplit = e.target.value.split("/");
        if(dateSplit.length != 3) return
        let newUrl = "/sitin/analytics/?date=" + `${dateSplit[2]}-${dateSplit[0]}-${dateSplit[1]}`;
        // Redirect to the new URL
        window.location.href = newUrl;
    } )

    if (document.getElementById("pie-chart") && typeof ApexCharts !== 'undefined') {
        const getLabOptions = async () => {
            const selectedDate = "<?php echo isset($_GET['date']) ? $_GET['date'] : ""; ?>"; 
            const url = `getpurposestat.php?date=${selectedDate}`;
            const response = await fetch(url);
            const data = await response.json();

            const labOptions = {
                series:  data.length > 0 ? data.map(row => row.sitins) : [0],
                colors: ["#1C64F2", "#16BDCA", "#9061F9"],
                chart: {
                height: 420,
                width: "100%",
                type: "pie",
                },
                stroke: {
                colors: ["white"],
                lineCap: "",
                },
                plotOptions: {
                pie: {
                    labels: {
                    show: true,
                    },
                    size: "100%",
                    dataLabels: {
                    offset: -25
                    }
                },
                },
                labels: data.length > 0 ? data.map(row => row.purpose) : ["No Data"],
                dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
                },
                legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                labels: {
                    formatter: function (value) {
                    return value
                    },
                },
                },
                xaxis: {
                labels: {
                    formatter: function (value) {
                    return value  + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                },
            }
            const chart = new ApexCharts(document.getElementById("pie-chart"), labOptions);
            chart.render();
        }    
        
        getLabOptions();
    }


    if (document.getElementById("lab-chart") && typeof ApexCharts !== 'undefined') {
        const getLabOptions = async () => {
            const selectedDate = "<?php echo isset($_GET['date']) ? $_GET['date'] : ""; ?>"; 
            const url = `getlabstat.php?date=${selectedDate}`;
            const response = await fetch(url);
            const data = await response.json();

            const labOptions = {
                series:  data.length > 0 ? data.map(row => row.sitins) : [0],
                colors: ["#1C64F2", "#16BDCA", "#9061F9"],
                chart: {
                height: 420,
                width: "100%",
                type: "pie",
                },
                stroke: {
                colors: ["white"],
                lineCap: "",
                },
                plotOptions: {
                pie: {
                    labels: {
                    show: true,
                    },
                    size: "100%",
                    dataLabels: {
                    offset: -25
                    }
                },
                },
                labels: data.length > 0 ? data.map(row => row.laboratory) : ["No Data"],
                dataLabels: {
                enabled: true,
                style: {
                    fontFamily: "Inter, sans-serif",
                },
                },
                legend: {
                position: "bottom",
                fontFamily: "Inter, sans-serif",
                },
                yaxis: {
                labels: {
                    formatter: function (value) {
                    return value
                    },
                },
                },
                xaxis: {
                labels: {
                    formatter: function (value) {
                    return value  + "%"
                    },
                },
                axisTicks: {
                    show: false,
                },
                axisBorder: {
                    show: false,
                },
                },
            }
            const chart = new ApexCharts(document.getElementById("lab-chart"), labOptions);
            chart.render();
        }    
        
        getLabOptions();
    }

    function increaseDate() {

        let dateInput = document.getElementById("dateInput");
        let currentDate = new Date(dateInput.value);

        if (isNaN(currentDate)) {
            currentDate = new Date();
            currentDate.setDate(currentDate.getDate() + 1);
        }else{
            currentDate.setDate(currentDate.getDate() + 1);
        }

        dateInput.value = currentDate.toISOString().split('T')[0];

        let newUrl = "/sitin/analytics/?date=" + currentDate.toISOString().split('T')[0];

        // Redirect to the new URL
        window.location.href = newUrl;
    }

    function decreaseDate() {

        let dateInput = document.getElementById("dateInput");
        let currentDate = new Date(dateInput.value);

        if (isNaN(currentDate)) {
            currentDate = new Date();
            currentDate.setDate(currentDate.getDate() - 1);
        }else{
            currentDate.setDate(currentDate.getDate() - 1);
        }

        dateInput.value = currentDate.toISOString().split('T')[0];

        let newUrl = "/sitin/analytics/?date=" + currentDate.toISOString().split('T')[0];

        // Redirect to the new URL
        window.location.href = newUrl;
    }
</script>