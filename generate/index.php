<?php
    session_start();
    require_once '../config/dbconn.php';

    if (!($_SESSION["role"] === 'admin' || $_SESSION["role"] === 'staff'))
        header('Location: ../errors/unauthorized.php');

        $purpose = $_GET["purpose"] ?? "";
        $laboratory = $_GET["laboratory"] ?? "";

        $selectedDate = $_GET["date"] ?? null; //date("Y-m-d")
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        if (isset($_GET["date"])){
            if($_GET["date"] == "01/01/1970"){
                $selectedDate = "";
            }else{
                $selectedDate = date("Y-m-d", strtotime($_GET["date"]));
            }

        }
    
        $limit = 10;
        $offset = ($current_page - 1) * $limit;
    
        $sitin_records = array();
    
        $query = "SELECT s.id, u.idno, u.firstname, u.lastname, s.purpose, s.laboratory, s.time_started as started, s.time_ended as ended 
            FROM users u INNER JOIN sitinrecord s ON u.idno = s.idno 
            WHERE u.role = 'student'   
        ";
    
        if($selectedDate !== null && !empty($selectedDate)){
            $query .= "AND DATE(s.time_started) = '$selectedDate'";
        }
    
        if (!empty($purpose) || !empty($laboratory)) {
            $query .= " AND (";
    
            if (!empty($purpose)) {
                $query .= " s.purpose LIKE '%$purpose%'";
            }
    
            if (!empty($laboratory)) {
                if (!empty($purpose)) {
                    $query .= " AND";
                }
                $query .= " s.laboratory LIKE '%$laboratory%'";
            }
    
            $query .= ")";
        }
    
        $query .= " AND s.time_ended IS NOT NULL ORDER BY s.time_started DESC LIMIT $limit OFFSET $offset";
    
        $query_run = mysqli_query($conn,$query);
    
        if ($query_run) {
            while ($row = mysqli_fetch_assoc($query_run)) {
                $sitin_records[] = $row;
            }
        }
    
        $query = "SELECT COUNT(*) as totalRows 
            FROM users u INNER JOIN sitinrecord s ON u.idno = s.idno 
            WHERE u.role = 'student'
            AND s.time_ended IS NOT NULL
        ";
        
        if($selectedDate !== null && !empty($selectedDate)){
            $query .= " AND DATE(s.time_started) = '$selectedDate'";
        }
    
        if (!empty($purpose) || !empty($laboratory)) {
            $query .= " AND (";
    
            if (!empty($purpose)) {
                $query .= " s.purpose LIKE '%$purpose%'";
            }
    
            if (!empty($laboratory)) {
                if (!empty($purpose)) {
                    $query .= " AND";
                }
                $query .= " s.laboratory LIKE '%$laboratory%'";
            }
    
            $query .= ")";
        }
        $result = mysqli_query($conn, $query);
    
        $totalRows = 0;
        if ($result) {
            // Fetch total number of rows
            $row = mysqli_fetch_assoc($result);
            $totalRows = $row['totalRows'];
        } 
        $totalPages = ceil($totalRows / 10);
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
    <script src="../assets//js/datepicker.min.js"></script>
</head>

<body class="dark bg-gray-900">
    <?php include '../includes/header.php' ?>


    <div class="px-4 mb-5 mt-5">
        <h2 class="mb-4 text-center text-2xl m-auto font-extrabold leading-none tracking-tight text-gray-900 md:text-4xl dark:text-white">Generate Reports</h2>

        <div class="mx-auto p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <form class="">
                <p class="text-gray-700 dark:text-gray-100 font-medium">Filter by:</p>
                <div class="flex items-center gap-x-4">
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="purpose" value="<?= $purpose?>" id="purpose" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="purpose" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Purpose</label>
                    </div>
                    <div class="relative z-0 w-full mb-5 group">
                        <input type="text" name="laboratory" value="<?= $laboratory?>" id="laboratory" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="laboratory" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Laboratory</label>
                    </div>
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5   py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Filter</button>
                </div>
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
                <div class="flex align-items gap-3 mt-3">
                    <?php if(count($sitin_records) > 0): ?>
                        <button type="button" onclick="downloadCSV()" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Download</button>
                    <?php else: ?>
                        <button type="button" disabled class="cursor-not-allowed focus:outline-none text-white bg-green-900 hover:bg-green-900 focus:ring-4 focus:ring-green-900 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-900 dark:hover:bg-green-900 dark:focus:ring-green-900">Download</button>
                    <?php endif; ?>
                    
                    <button type="button" onclick="clearFilter()" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">Clear Filter</button>
                </div>  
            </form>
        </div>


        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-5 mx-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            IDNO
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Student Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Laboratory
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Purpose
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time In
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time Out
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($sitin_records as $record): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $record['idno'] ?>
                            </td>
                            <td class="px-6 py-4"><?= $record['firstname'] ?> <?= $record['lastname'] ?></td>
                            <td class="px-6 py-4"><?= $record['laboratory'] ?></td>
                            <td class="px-6 py-4"><?= $record['purpose'] ?></td>
                            <td class="px-6 py-4"><?= date('M. d, Y h:ia', strtotime($record['started'])) . "" ?></td>
                            <td class="px-6 py-4"><?= date('M. d, Y h:ia', strtotime($record['ended'])) . "" ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>            
        </div>

        <nav aria-label="Page navigation example" class="flex justify-center mt-5">
            <ul class="inline-flex -space-x-px text-sm m-auto">
                <!--                 
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-e-0 border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                </li> 
                -->
                <?php for ($i = 1; $i <= $totalPages; $i++ )
                    {
                        $url = "/sitin/generate/?purpose=$purpose&laboratory=$laboratory&date=$selectedDate&page=$i";
                        if(($current_page != $i)){
                            echo '<li><a class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white" href="'.$url.'">'.$i.'</a></li>';
                        }else{
                            echo '<li><a aria-current="page" class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white" href="'.$url.'">'.$i.'</a></li>';
                        }
                        $activeClass = ($current_page == $i) ? " active" : "";
                        
                    } 
                ?>  
                
                <!-- 
                <li>
                    <a href="#" class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                </li> 
                -->
            </ul>
        </nav>
    </div>

    <script>

        document.getElementById("dateInput").addEventListener("change",(e) => {
            var purpose = "<?php echo isset($_GET['purpose']) ? $_GET['purpose'] : ''; ?>";
            var laboratory = "<?php echo isset($_GET['laboratory']) ? $_GET['laboratory'] : ''; ?>";

            // Construct the new URL with the decremented date
            var newUrl = "/sitin/generate?purpose=" + encodeURIComponent(purpose) + "&laboratory=" + encodeURIComponent(laboratory) + "&date=" + e.target.value;

            // Redirect to the new URL
            window.location.href = newUrl;
        } )

        function clearFilter(){
            window.location.href = "/sitin/generate";
        }

        function decreaseDate() {
            let purpose = "<?php echo isset($_GET['purpose']) ? $_GET['purpose'] : ''; ?>";
            let laboratory = "<?php echo isset($_GET['laboratory']) ? $_GET['laboratory'] : ''; ?>";

            let dateInput = document.getElementById("dateInput");
            let currentDate = new Date(dateInput.value);

            if (isNaN(currentDate)) {
                currentDate = new Date();
                currentDate.setDate(currentDate.getDate() - 1);
            }else{
                currentDate.setDate(currentDate.getDate() - 1);
            }

            dateInput.value = currentDate.toISOString().split('T')[0];

            // Construct the new URL with the decremented date
            let newUrl = "/sitin/generate?purpose=" + encodeURIComponent(purpose) + "&laboratory=" + encodeURIComponent(laboratory) + "&date=" + currentDate.toISOString().split('T')[0];

            // Redirect to the new URL
            window.location.href = newUrl;
        }

        function increaseDate() {
            let purpose = "<?php echo isset($_GET['purpose']) ? $_GET['purpose'] : ''; ?>";
            let laboratory = "<?php echo isset($_GET['laboratory']) ? $_GET['laboratory'] : ''; ?>";

            let dateInput = document.getElementById("dateInput");
            let currentDate = new Date(dateInput.value);

            if (isNaN(currentDate)) {
                currentDate = new Date();
                currentDate.setDate(currentDate.getDate() + 1);
            }else{
                currentDate.setDate(currentDate.getDate() + 1);
            }

            dateInput.value = currentDate.toISOString().split('T')[0];

            // Construct the new URL with the decremented date
            let newUrl = "/sitin/generate?purpose=" + encodeURIComponent(purpose) + "&laboratory=" + encodeURIComponent(laboratory) + "&date=" + currentDate.toISOString().split('T')[0];

            // Redirect to the new URL
            window.location.href = newUrl;
        }

        function downloadCSV(){
            let purpose = "<?php echo isset($_GET['purpose']) ? $_GET['purpose'] : ''; ?>";
            let laboratory = "<?php echo isset($_GET['laboratory']) ? $_GET['laboratory'] : ''; ?>";
            let newUrl = "/sitin/generate/downloadcsv.php?purpose=" + encodeURIComponent(purpose) + "&laboratory=" + encodeURIComponent(laboratory);

            let dateInput = document.getElementById("dateInput");
            let currentDate = new Date(dateInput.value);

            if (isNaN(currentDate)) {
                newUrl += "&date=";
            }else{
                currentDate.setDate(currentDate.getDate());
                dateInput.value = currentDate.toISOString().split('T')[0];
                newUrl += "&date=" + currentDate.toISOString().split('T')[0];
            }
    
            window.location.href = newUrl;
        }

        // download what was displayed using JS
        function downloadDisplayedCSV() {
            // Get table content
            var table = document.getElementById("dataTable");

            // Create CSV content
            var csv = [];
            var rows = table.querySelectorAll("tr");
            if (rows.length > 0) { // Check if there are rows in the table
                for (var i = 0; i < rows.length; i++) {
                    var row = [], cols = rows[i].querySelectorAll("td, th");
                    for (var j = 0; j < cols.length; j++) {
                        var cellText = cols[j].innerText;
                        // Enclose cell text in double quotes if it contains a comma
                        if (cellText.includes(",")) {
                            cellText = '"' + cellText + '"';
                        }
                        row.push(cellText);
                    }
                    csv.push(row.join(","));
                }
            } else {
                // If table is empty, create an empty row in the CSV
                csv.push("");
            }
            var csvContent = csv.join("\n");

            var dateInput = document.getElementById("dateInput");
            var currentDate = new Date(dateInput.value);

            // Create download link
            var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            var link = document.createElement("a");
            var url = URL.createObjectURL(blob);
            link.setAttribute("href", url);
            link.setAttribute("download", `sitin-report-as of-${currentDate.getMonth() + 1}/${currentDate.getDate()}/${currentDate.getFullYear()}.csv`);
            link.style.visibility = 'hidden';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }
    </script>

</body>

</html>

