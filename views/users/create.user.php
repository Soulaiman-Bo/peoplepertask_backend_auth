<?php require_once "scripts/create.user_script.php" ?>
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="keywords" content="HTML, CSS, Youcode, tailwindCSS, Youssoufia" />
    <meta name="author" content="Soulaiman Bouhlal" />
    <link rel="icon" type="image/x-icon" href="../images/logo.webp" />
    <meta name="description" content="this page is an html project was given in a bootcamp" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;700;800&display=swap" rel="stylesheet" />
    <link href="public/css/output.css" rel="stylesheet" />
    <title>Dashboard - peoplepertask</title>
</head>

<body class="dark:bg-gray-900">
    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" id="sidebar-toggle-button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg smXl:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>

                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                        </svg>
                    </button>

                    <a href="/" class="flex ml-2 md:mr-24 items-center">
                        <img src="public/images/logo.webp" class="h-8 mr-6" alt="peoplepertask Logo" />
                        <span class="font-inter font-semibold dark:text-white">PeaplePerTask</span>
                    </a>
                </div>

                <div class="flex items-center">
                    <div class="flex relative items-center ml-3">
                        <div>
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" id="dropdown-user-button" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full" src="public/images/avatar.jpg" alt="user photo" />
                            </button>
                        </div>

                        <div class="z-50 hidden absolute top-11 right-3 my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    Soulaiman Bouhlal
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    S.bouhlal@peoplepertask.com
                                </p>
                            </div>
                            <ul class="py-1" role="menu">
                                <li>
                                    <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="/" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>

                        <button aria-label="theme toggle" id="theme-toggle" type="button" class="text-gray-500 ml-5 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                            <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                            </svg>
                            <svg id="theme-toggle-light-icon" class="hidden w-5 h-5 dark:text-gray-200" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <?php require_once "views/includes/admin.sidebar.php" ?>

    <main class="mt-14 p-12 ml-0 smXl:ml-64 dark:border-gray-700">
        <div class="h-full">

            <form action="?action=createuser" method="POST" class="w-3/4 mx-auto bg-white border p-8 rounded-2xl border-b dark:bg-gray-800 dark:border-gray-700">

                <div class="flex flex-col xl:flex-row gap-7 mb-4 ">
                    <div class="mb-5 w-full">
                        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                        <input type="text" name="firstname" value="<?php echo $firstname; ?>" id="firstname" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jhon doe" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $firstnameErr; ?></span>
                    </div>

                    <div class="mb-5 w-full">
                        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                        <input type="text" name="lastname" value="<?php echo $lastname; ?>" id="lastname" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jhon doe" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $lastnameErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4">
                    <div class="mb-5 w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" id="email" placeholder="Jhon_doe@gmail.com" required class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $emailErr; ?></span>

                    </div>

                    <div class="mb-5 w-full">
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="tel" name="number" value="<?php echo $number; ?>" id="number" placeholder="0615301530" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $numberErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4">
                    <div class="mb-5 w-full">
                        <label for="region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your region</label>
                        <select name="region" value="<?php echo $region; ?>" id="region" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php foreach ($allregions as $region) : ?>
                                <option value="<?= $region['id'] ?>"> <?= $region['region'] ?></option>
                            <?php endforeach; ?>
                        </select>

                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $regionErr; ?></span>
                    </div>

                    <div class="mb-5 w-full">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your city</label>
                        <select name="city" id="city" value="<?php echo $city; ?>" id="city" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <?php foreach ($allcities as $city) : ?>
                                <option value="<?= $city['id'] ?>"> <?= $city['ville'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $cityErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4">
                    <div class="mb-5 w-full">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select id="gender" value="<?php echo $gender; ?>" name="gender" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Male</option>
                            <option>Female</option>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $genderErr; ?></span>
                    </div>

                    <div class="mb-5 w-full">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="role" value="<?php echo $role; ?>" name="role" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option value="admin">Admin</option>
                            <option value="freelancer">Freelancer</option>
                            <option value="customer">Customer</option>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $roleErr; ?></span>
                    </div>
                </div>


                <div class="flex flex-col xl:flex-row gap-7 mb-4">
                    <div class="mb-5 w-full">
                        <input type="password" id="password" name="password" class="block p-3 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="password">
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $passwordErr; ?></span>
                    </div>

                    <div class="mb-5 w-full">
                        <input id="passwordConfirm" name="passwordConfirm" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Confirm password">
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $passwordConfirmErr; ?></span>
                    </div>
                </div>


                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Create User
                </button>
            </form>
        </div>
    </main>

    <script src="public/js/dashboard.js"></script>
    <script src="public/js/theme.js"></script>
</body>

</html>