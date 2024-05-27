<header>

    <!-- drawer init and show -->
    <div class="fixed top-3 left-5" style="z-index: 39;">
        <button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" type="button" data-drawer-target="drawer-navigation" data-drawer-show="drawer-navigation" aria-controls="drawer-navigation">
        <svg class="w-5 h-5" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path d="M4 18L20 18" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 12L20 12" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
            <path d="M4 6L20 6" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
        </button>
    </div>

    <!-- drawer component -->
    <div id="drawer-navigation" class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-96 dark:bg-gray-800" tabindex="-1" aria-labelledby="drawer-navigation-label">
        <h5 id="drawer-navigation-label" class="text-base font-semibold text-gray-500 uppercase dark:text-gray-400">Menu</h5>
        <button type="button" data-drawer-hide="drawer-navigation" aria-controls="drawer-navigation" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 inline-flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close menu</span>
        </button>
        <div class="py-4 overflow-y-auto">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="/sitin/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 64 64">
                            <path d="M32,0C14.355,0,0,14.355,0,32s14.355,32,32,32s32-14.355,32-32S49.645,0,32,0z M15.023,15.023
                            c1.57-1.57,4.102-1.559,5.66,0c1.566,1.57,1.582,4.105,0.012,5.664c-1.559,1.566-4.078,1.582-5.633,0.023l-0.035-0.031
                            C13.469,19.121,13.469,16.586,15.023,15.023z M8.102,32c0-2.211,1.77-4,3.977-4h0.043c2.207,0,4,1.789,4,4s-1.793,4-4,4
                            C9.91,36,8.102,34.211,8.102,32z M20.711,48.93l-0.027,0.039c-1.566,1.555-4.094,1.559-5.66,0.008
                            c-1.57-1.574-1.555-4.105,0.004-5.664c1.566-1.562,4.105-1.578,5.66-0.012C22.258,44.859,22.266,47.375,20.711,48.93z M36,32
                            c0,2.211-1.789,4-4,4s-4-1.789-4-4V12c0-2.211,1.789-4,4-4s4,1.789,4,4V32z M43.285,15.059l0.031-0.031
                            c1.559-1.559,4.094-1.562,5.656,0c1.566,1.566,1.559,4.098,0,5.656c-1.566,1.566-4.105,1.578-5.668,0.012
                            C41.742,19.133,41.727,16.617,43.285,15.059z M48.977,48.977c-1.574,1.566-4.102,1.551-5.66-0.008
                            c-1.566-1.562-1.582-4.109-0.02-5.664c1.566-1.566,4.078-1.578,5.637-0.02l0.039,0.027C50.523,44.875,50.531,47.406,48.977,48.977z
                            M52,36c-2.211,0-4.02-1.789-4.02-4s1.77-4,3.977-4H52c2.207,0,4,1.789,4,4S54.207,36,52,36z"/>                
                        </svg>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/profile/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 18">
                            <path id="vector (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M6.75 6.5C6.75 3.6005 9.1005 1.25 12 1.25C14.8995 1.25 17.25 3.6005 17.25 6.5C17.25 9.3995 14.8995 11.75 12 11.75C9.1005 11.75 6.75 9.3995 6.75 6.5Z"/>
                            <path id="rec (Stroke)" fill-rule="evenodd" clip-rule="evenodd" d="M4.25 18.5714C4.25 15.6325 6.63249 13.25 9.57143 13.25H14.4286C17.3675 13.25 19.75 15.6325 19.75 18.5714C19.75 20.8792 17.8792 22.75 15.5714 22.75H8.42857C6.12081 22.75 4.25 20.8792 4.25 18.5714Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Profile</span>
                    </a>
                </li>

                <!-- Admin / Staff -->
                <?php if($_SESSION["role"] === "admin" || $_SESSION["role"] === "staff"):?>
                <li>
                    <a href="/sitin/search/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 16">
                            <path d="M12.027 9.92L16 13.95 14 16l-4.075-3.976A6.465 6.465 0 0 1 6.5 13C2.91 13 0 10.083 0 6.5 0 2.91 2.917 0 6.5 0 10.09 0 13 2.917 13 6.5a6.463 6.463 0 0 1-.973 3.42zM1.997 6.452c0 2.48 2.014 4.5 4.5 4.5 2.48 0 4.5-2.015 4.5-4.5 0-2.48-2.015-4.5-4.5-4.5-2.48 0-4.5 2.014-4.5 4.5z" fill-rule="evenodd"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Search</span>
                        <!-- <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> -->
                    </a>
                </li>
                <li>
                    <a href="/sitin/delete" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M5.755,20.283,4,8H20L18.245,20.283A2,2,0,0,1,16.265,22H7.735A2,2,0,0,1,5.755,20.283ZM21,4H16V3a1,1,0,0,0-1-1H9A1,1,0,0,0,8,3V4H3A1,1,0,0,0,3,6H21a1,1,0,0,0,0-2Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Delete</span>
                        <!-- <span class="inline-flex items-center justify-center px-2 ms-3 text-sm font-medium text-gray-800 bg-gray-100 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> -->
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 1920 1920">
                        <path d="M960 0v213.333c411.627 0 746.667 334.934 746.667 746.667S1371.627 1706.667 960 1706.667 213.333 1371.733 213.333 960c0-197.013 78.4-382.507 213.334-520.747v254.08H640V106.667H53.333V320h191.04C88.64 494.08 0 720.96 0 960c0 529.28 430.613 960 960 960s960-430.72 960-960S1489.387 0 960 0" fill-rule="evenodd"/>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Reset</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/sitin/reset/password.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Password</a>
                        </li>
                        <li>
                            <a href="/sitin/reset/session.php" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Sessions</a>
                        </li>
                    </ul>
                </li>               
                <li>
                    <a href="/sitin/records" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="-3.5 0 32 32">
                            <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">View Sitin Records</span>
                        <!-- <span class="inline-flex items-center justify-center w-3 h-3 p-3 ms-3 text-sm font-medium text-blue-800 bg-blue-100 rounded-full dark:bg-blue-900 dark:text-blue-300">3</span> -->
                    </a>
                </li>
                <li>
                    <a href="/sitin/generate/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32">
                        <path d="M6 11h4v17h-4v-17zM22 16v12h4v-12h-4zM14 28h4v-24h-4v24z"></path>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Generate Reports</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/analytics/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 21">
                            <path d="M16.975 11H10V4.025a1 1 0 0 0-1.066-.998 8.5 8.5 0 1 0 9.039 9.039.999.999 0 0 0-1-1.066h.002Z" />
                            <path d="M12.5 0c-.157 0-.311.01-.565.027A1 1 0 0 0 11 1.02V10h8.975a1 1 0 0 0 1-.935c.013-.188.028-.374.028-.565A8.51 8.51 0 0 0 12.5 0Z" />
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Analytics</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/postannouncements/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M30,5.954v18.092c0,1.415-1.429,2.382-2.743,1.857L15,21v3c0,0.552-0.448,1-1,1H6c-0.552,0-1-0.448-1-1
                            v-4c-0.552,0-1-0.448-1-1v-8c0-0.552,0.448-1,1-1h5c0.552,0,1,0.448,1,1v8c0,0.552-0.448,1-1,1H7h0v3h6v-2.8l0,0l-1-0.399v-9.599
                            l15.257-6.105C28.571,3.572,30,4.539,30,5.954z M3,11c-1.105,0-2,0.895-2,2v4c0,1.105,0.895,2,2,2V11z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Post Annoucements</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/booking_request/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21.9707 18V19C21.9707 20.65 21.9707 22 18.9707 22H4.9707C1.9707 22 1.9707 20.65 1.9707 19V18C1.9707 17.45 2.4207 17 2.9707 17H20.9707C21.5207 17 21.9707 17.45 21.9707 18Z"/>
                            <path d="M14.4095 5.17977C14.4595 4.97977 14.4895 4.78977 14.4995 4.57977C14.5295 3.41977 13.8195 2.39977 12.6995 2.09977C11.0195 1.63977 9.49953 2.89977 9.49953 4.49977C9.49953 4.73977 9.52953 4.95977 9.58953 5.17977C5.97953 5.94977 3.26953 9.15977 3.26953 12.9998V14.4998C3.26953 15.0498 3.71953 15.4998 4.26953 15.4998H19.7195C20.2695 15.4998 20.7195 15.0498 20.7195 14.4998V12.9998C20.7195 9.15977 18.0195 5.95977 14.4095 5.17977ZM14.9995 11.7498H8.99953C8.58953 11.7498 8.24953 11.4098 8.24953 10.9998C8.24953 10.5898 8.58953 10.2498 8.99953 10.2498H14.9995C15.4095 10.2498 15.7495 10.5898 15.7495 10.9998C15.7495 11.4098 15.4095 11.7498 14.9995 11.7498Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Booking Requests and Approval</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/view_feedback_reporting/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.24999 18L5.24999 20.25V15.75H2.25C1.85217 15.75 1.47064 15.5919 1.18934 15.3106C0.908034 15.0293 0.749999 14.6478 0.749999 14.25V2.25C0.749999 1.85217 0.908034 1.47064 1.18934 1.18934C1.47064 0.908034 1.85217 0.749999 2.25 0.749999H18.75C19.1478 0.749999 19.5293 0.908034 19.8106 1.18934C20.0919 1.47064 20.25 1.85217 20.25 2.25V6.71484" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.24999 5.24999H15.75" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.24999 9.74999H8.24999" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.25 18.75H20.25V23.25L15.75 18.75H11.25V9.74999H23.25V18.75Z" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.5 15H15" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">View Feedbacks/Reports</span>
                    </a>
                </li>
                <?php else: ?>
                <!-- Students -->
                <li>
                    <a href="/sitin/sessions/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="-3.5 0 32 32">
                            <path d="M12.406 13.844c1.188 0 2.156 0.969 2.156 2.156s-0.969 2.125-2.156 2.125-2.125-0.938-2.125-2.125 0.938-2.156 2.125-2.156zM12.406 8.531c7.063 0 12.156 6.625 12.156 6.625 0.344 0.438 0.344 1.219 0 1.656 0 0-5.094 6.625-12.156 6.625s-12.156-6.625-12.156-6.625c-0.344-0.438-0.344-1.219 0-1.656 0 0 5.094-6.625 12.156-6.625zM12.406 21.344c2.938 0 5.344-2.406 5.344-5.344s-2.406-5.344-5.344-5.344-5.344 2.406-5.344 5.344 2.406 5.344 5.344 5.344z"></path>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">View Remaining Sessions</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/sitin-history/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.25 2C11.25 1.58579 11.5858 1.25 12 1.25C17.9371 1.25 22.75 6.06294 22.75 12C22.75 17.9371 17.9371 22.75 12 22.75C6.06294 22.75 1.25 17.9371 1.25 12C1.25 11.5858 1.58579 11.25 2 11.25C2.41421 11.25 2.75 11.5858 2.75 12C2.75 17.1086 6.89137 21.25 12 21.25C17.1086 21.25 21.25 17.1086 21.25 12C21.25 6.89137 17.1086 2.75 12 2.75C11.5858 2.75 11.25 2.41421 11.25 2Z"/>
                            <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M9.10012 2.39808C9.24928 2.7845 9.05695 3.21868 8.67053 3.36785C8.52909 3.42245 8.38933 3.48042 8.25134 3.54168C7.87275 3.70975 7.4296 3.5391 7.26154 3.16051C7.09347 2.78193 7.26412 2.33878 7.64271 2.17071C7.80321 2.09946 7.9658 2.03201 8.13034 1.96849C8.51677 1.81932 8.95095 2.01166 9.10012 2.39808ZM5.64824 4.2408C5.93391 4.54075 5.92232 5.01549 5.62237 5.30115C5.5127 5.40559 5.40559 5.5127 5.30115 5.62237C5.01549 5.92232 4.54075 5.93391 4.2408 5.64824C3.94085 5.36258 3.92927 4.88785 4.21493 4.5879C4.3362 4.46056 4.46056 4.3362 4.5879 4.21493C4.88785 3.92927 5.36258 3.94085 5.64824 4.2408ZM3.16051 7.26154C3.5391 7.42961 3.70975 7.87276 3.54168 8.25134C3.48042 8.38933 3.42245 8.52909 3.36785 8.67053C3.21868 9.05695 2.7845 9.24928 2.39808 9.10012C2.01166 8.95095 1.81932 8.51677 1.96849 8.13035C2.03201 7.9658 2.09946 7.80321 2.17071 7.64271C2.33878 7.26412 2.78193 7.09347 3.16051 7.26154Z"/>
                            <path opacity="0.5" d="M12 8.25C12.4142 8.25 12.75 8.58579 12.75 9V12.25H16C16.4142 12.25 16.75 12.5858 16.75 13C16.75 13.4142 16.4142 13.75 16 13.75H12C11.5858 13.75 11.25 13.4142 11.25 13V9C11.25 8.58579 11.5858 8.25 12 8.25Z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">View Sitin History</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/feedback_reporting/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M8.24999 18L5.24999 20.25V15.75H2.25C1.85217 15.75 1.47064 15.5919 1.18934 15.3106C0.908034 15.0293 0.749999 14.6478 0.749999 14.25V2.25C0.749999 1.85217 0.908034 1.47064 1.18934 1.18934C1.47064 0.908034 1.85217 0.749999 2.25 0.749999H18.75C19.1478 0.749999 19.5293 0.908034 19.8106 1.18934C20.0919 1.47064 20.25 1.85217 20.25 2.25V6.71484" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.24999 5.24999H15.75" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M5.24999 9.74999H8.24999" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M23.25 18.75H20.25V23.25L15.75 18.75H11.25V9.74999H23.25V18.75Z" stroke="#71717A" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M19.5 15H15" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Feedback and Reporting</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/announcements/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 32 32">
                            <path d="M30,5.954v18.092c0,1.415-1.429,2.382-2.743,1.857L15,21v3c0,0.552-0.448,1-1,1H6c-0.552,0-1-0.448-1-1
                            v-4c-0.552,0-1-0.448-1-1v-8c0-0.552,0.448-1,1-1h5c0.552,0,1,0.448,1,1v8c0,0.552-0.448,1-1,1H7h0v3h6v-2.8l0,0l-1-0.399v-9.599
                            l15.257-6.105C28.571,3.572,30,4.539,30,5.954z M3,11c-1.105,0-2,0.895-2,2v4c0,1.105,0.895,2,2,2V11z"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">View Annoucements</span>
                    </a>
                </li>
                <li>
                    <a href="/sitin/safety_monitoring/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 48 48">
                            <g id="Layer_2" data-name="Layer 2">
                            <g id="invisible_box" data-name="invisible box">
                                <rect width="48" height="48" fill="none"/>
                            </g>
                            <g id="Health_Icons" data-name="Health Icons">
                            <g>
                                <path d="M43,4H5A2.9,2.9,0,0,0,2,7V35a2.9,2.9,0,0,0,3,3H43a2.9,2.9,0,0,0,3-3V7A2.9,2.9,0,0,0,43,4ZM42,34H6V22.9H8.6a2,2,0,0,0,1.8-1.2l.5-.9,2.9,6.1A1.9,1.9,0,0,0,15.6,28a2.1,2.1,0,0,0,1.8-1.1l4.8-10.2,2.4,5a2.2,2.2,0,0,0,1.8,1.2H30a2,2,0,0,0,0-4H27.7L24,11.1a2,2,0,0,0-3.6,0L15.6,21.3l-2.9-6.1a2.1,2.1,0,0,0-1.8-1.1,1.9,1.9,0,0,0-1.8,1.1L7.3,18.9H6V8H42Z"/>
                                <path d="M28,28H24a2,2,0,0,0,0,4h4a2,2,0,0,0,0-4Z"/>
                                <path d="M34,32h4a2,2,0,0,0,0-4H34a2,2,0,0,0,0,4Z"/>
                                <path d="M37,40H11a2,2,0,0,0,0,4H37a2,2,0,0,0,0-4Z"/>
                            </g>
                            </g>
                        </g>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Safety Monitoring</span>
                    </a>
                </li>
                <li>
                    <button type="button" class="flex items-center w-full p-2 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700" aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M21.9707 18V19C21.9707 20.65 21.9707 22 18.9707 22H4.9707C1.9707 22 1.9707 20.65 1.9707 19V18C1.9707 17.45 2.4207 17 2.9707 17H20.9707C21.5207 17 21.9707 17.45 21.9707 18Z"/>
                            <path d="M14.4095 5.17977C14.4595 4.97977 14.4895 4.78977 14.4995 4.57977C14.5295 3.41977 13.8195 2.39977 12.6995 2.09977C11.0195 1.63977 9.49953 2.89977 9.49953 4.49977C9.49953 4.73977 9.52953 4.95977 9.58953 5.17977C5.97953 5.94977 3.26953 9.15977 3.26953 12.9998V14.4998C3.26953 15.0498 3.71953 15.4998 4.26953 15.4998H19.7195C20.2695 15.4998 20.7195 15.0498 20.7195 14.4998V12.9998C20.7195 9.15977 18.0195 5.95977 14.4095 5.17977ZM14.9995 11.7498H8.99953C8.58953 11.7498 8.24953 11.4098 8.24953 10.9998C8.24953 10.5898 8.58953 10.2498 8.99953 10.2498H14.9995C15.4095 10.2498 15.7495 10.5898 15.7495 10.9998C15.7495 11.4098 15.4095 11.7498 14.9995 11.7498Z"/>
                        </svg>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">Booking and Reservation</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="/sitin/make-reservation/" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">Make Reservation</a>
                        </li>
                        <li>
                            <a href="/sitin/see-reservation/" class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">See Reservation</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="/sitin/labrules/" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 17 17">
                        <path d="M14.44,7.389 L9.662,2.61 L10.232,2.041 L9.315,1.122 L5.068,5.367 L5.988,6.285 L6.518,5.755 L8.473,7.709 L-0.062,16.244 L0.768,17.073 L9.301,8.539 L11.295,10.532 L10.766,11.063 L11.684,11.98 L15.938,7.727 L15.021,6.809 L14.44,7.389 Z">
                        </path>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Lab Sitin Rules</span>
                    </a>
                </li>
                <?php endif ?>

                <li>
                    <a href="/sitin/logout.php" class="flex items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                        <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <path d="M15 4H18C19.1046 4 20 4.89543 20 6V18C20 19.1046 19.1046 20 18 20H15M8 8L4 12M4 12L8 16M4 12L16 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        <span class="flex-1 ms-3 whitespace-nowrap">Log Out</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>