<?php
require_once "scripts/signup_script.php"
?>
-->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Sign Up</title>
    <link rel="icon" type="image/x-icon" href="public/images/logo.webp">

    <link rel="stylesheet" href="public/css/output.css">

</head>

<body class="dark:bg-gray-900 ">


    <?php require_once "views/includes/header.php" ?>


    <section class="flex justify-center m-auto items-center max-w-screen-xl py-32 dark:bg-gray-900">
        <div class="py-8 lg:py-16 px-10 w-[70%] bg-white border rounded-3xl dark: dark:bg-gray-700  ">
            <h2 class=" mb-16 text-5xl tracking-tight  text-center text-gray-900 dark:text-white  font-semibold"> Sign <span class="text-orange-500 text-semibold">Up</span></h2>

            <form action="signup.php" method="POST" class="space-y-8 " id="form">
                <div>
                    <input type="text" id="firstname" name="firstname" class="shadow-sm h-12 pl-5 bg-gray-50 border border-gray-300  text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light " placeholder="Firstname">
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $firstnameErr; ?></span>
                </div>

                <div>
                    <input type="text" id="lastname" name="lastname" class="shadow-sm h-12 pl-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Lastname">
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $lastnameErr; ?></span>
                </div>

                <div>
                    <input type="email" id="email" name="email" class="shadow-sm h-12 pl-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Email">
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $emailErr; ?></span>

                </div>

                <div>
                    <input type="tel" id="number" name="number" class="shadow-sm h-12 pl-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="Number">
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $numberErr; ?></span>
                </div>

                <div>
                    <label for="region" class="block pl-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Region</label>
                    <select name="region" id="region" value="<?php echo $region; ?>" id="region" class="  shadow-sm h-12 pl-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">

                        <?php

                        require_once 'model/region_city_model.php';

                        $allregions = getAllRegions();
                        $allcities = getAllCities();

                        ?>

                        <?php foreach ($allregions as $region) : ?>
                            <option value="<?= $region['id'] ?>"> <?= $region['region'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $regionErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="city" class="block pl-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Select City</label>
                    <select name="city" id="city" value="<?php echo $city; ?>" id="city" class="  shadow-sm h-12 pl-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        <?php foreach ($allcities as $city) : ?>
                            <option value="<?= $city['id'] ?>"> <?= $city['ville'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $cityErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="gender" class="block pl-5 mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                    <select id="gender" value="<?php echo $gender; ?>" name="gender" class="  shadow-sm h-12 pl-5 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-3xl focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light">
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $genderErr; ?></span>
                </div>

                <div>
                    <input type="password" id="password" name="password" class="block p-3 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500 dark:shadow-sm-light" placeholder="password">
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $passwordErr; ?></span>
                </div>

                <div class="sm:col-span-2">
                    <input id="passwordConfirm" name="passwordConfirm" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Confirm password">
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $passwordConfirmErr; ?></span>
                </div>



                <fieldset id="bordered-radio">
                    <div class="flex items-center ps-4 border rounded-3xl  text-gray-900 bg-gray-50 border-gray-300   dark:border-gray-700">
                        <input id="bordered-radio-1" type="radio" value="freelancer" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-radio-1" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I'm a freelancer</label>
                    </div>
                    <div class="flex items-center ps-4 border rounded-3xl  text-gray-900 bg-gray-50 border-gray-300   dark:border-gray-700">
                        <input checked id="bordered-radio-2" type="radio" value="customer" name="bordered-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        <label for="bordered-radio-2" class="w-full py-4 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I'm a customer</label>
                    </div>
                </fieldset>

                <div class="flex justify-center">
                    <Button type="submit" class="py-3 text-sm font-medium text-center text-white rounded-3xl bg-orange-600 w-60 hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800 ">Start</Button>
                </div>

            </form>

            <div class=" flex justify-center">
                <div>
                    <h2 class="text-orange-500 font-semibold pt-4 mt-4 ">Forgot Password ?</h2>
                </div>
            </div>
            <div class="flex justify-center dark:text-white mt-4 ">
                <p>Don't have an account? <span class="text-blue-700">Log in</span></p>
            </div>
        </div>
    </section>


    <footer class="p-4 bg-white sm:p-6 dark:bg-gray-800">
        <div class="mx-auto max-w-screen-xl ">
            <div class="md:flex md:justify-between">
                <div class="mb-6 md:mb-0">
                    <a href="../src/index.html" class="flex items-center">
                        <img src="public/images/logo.webp" class="mr-3 h-6 sm:h-9" alt="peoplepertask Logo">
                        <span class="self-center lg:visible: lg:text-xl font-semibold whitespace-nowrap dark:text-white">PeoplePerTask</span>
                    </a>
                </div>
                <div class="grid grid-cols-2 gap-8 px-4 py-6 lg:py-8 md:grid-cols-4">
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                            Company
                        </h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="./about.html" class="hover:underline">About</a>
                            </li>
                            <li class="mb-4">
                                <a href="./about.html" class="hover:underline">Careers</a>
                            </li>
                            <li class="mb-4">
                                <a href="./about.html" class="hover:underline">Brand Center</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                            Help center
                        </h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">Discord Server</a>
                            </li>
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">Twitter</a>
                            </li>
                            <li class="mb-4">
                                <a href="./contact.html" class="hover:underline">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                            Legal
                        </h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">Privacy Policy</a>
                            </li>
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">Licensing</a>
                            </li>
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">Terms &amp; Conditions</a>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <h2 class="mb-6 text-sm font-semibold text-gray-900 uppercase dark:text-white">
                            Download
                        </h2>
                        <ul class="text-gray-500 dark:text-gray-400 font-medium">
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">iOS</a>
                            </li>
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">Android</a>
                            </li>
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">Windows</a>
                            </li>
                            <li class="mb-4">
                                <a href="../src/error404.html" class="hover:underline">MacOS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8">
            <div class="sm:flex sm:items-center sm:justify-between">
                <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2023 <a href="#" class="hover:underline">PeoplePerTask™</a>. All
                    Rights Reserved.
                </span>
                <div class="flex mt-4 space-x-6 sm:justify-center sm:mt-0">
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.477 2 2 6.484 2 12.017c0 4.425 2.865 8.18 6.839 9.504.5.092.682-.217.682-.483 0-.237-.008-.868-.013-1.703-2.782.605-3.369-1.343-3.369-1.343-.454-1.158-1.11-1.466-1.11-1.466-.908-.62.069-.608.069-.608 1.003.07 1.531 1.032 1.531 1.032.892 1.53 2.341 1.088 2.91.832.092-.647.35-1.088.636-1.338-2.22-.253-4.555-1.113-4.555-4.951 0-1.093.39-1.988 1.029-2.688-.103-.253-.446-1.272.098-2.65 0 0 .84-.27 2.75 1.026A9.564 9.564 0 0112 6.844c.85.004 1.705.115 2.504.337 1.909-1.296 2.747-1.027 2.747-1.027.546 1.379.202 2.398.1 2.651.64.7 1.028 1.595 1.028 2.688 0 3.848-2.339 4.695-4.566 4.943.359.309.678.92.678 1.855 0 1.338-.012 2.419-.012 2.747 0 .268.18.58.688.482A10.019 10.019 0 0022 12.017C22 6.484 17.522 2 12 2z" clip-rule="evenodd" />
                        </svg>
                    </a>
                    <a href="#" class="text-gray-500 hover:text-gray-900 dark:hover:text-white">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path fill-rule="evenodd" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10c5.51 0 10-4.48 10-10S17.51 2 12 2zm6.605 4.61a8.502 8.502 0 011.93 5.314c-.281-.054-3.101-.629-5.943-.271-.065-.141-.12-.293-.184-.445a25.416 25.416 0 00-.564-1.236c3.145-1.28 4.577-3.124 4.761-3.362zM12 3.475c2.17 0 4.154.813 5.662 2.148-.152.216-1.443 1.941-4.48 3.08-1.399-2.57-2.95-4.675-3.189-5A8.687 8.687 0 0112 3.475zm-3.633.803a53.896 53.896 0 013.167 4.935c-3.992 1.063-7.517 1.04-7.896 1.04a8.581 8.581 0 014.729-5.975zM3.453 12.01v-.26c.37.01 4.512.065 8.775-1.215.25.477.477.965.694 1.453-.109.033-.228.065-.336.098-4.404 1.42-6.747 5.303-6.942 5.629a8.522 8.522 0 01-2.19-5.705zM12 20.547a8.482 8.482 0 01-5.239-1.8c.152-.315 1.888-3.656 6.703-5.337.022-.01.033-.01.054-.022a35.318 35.318 0 011.823 6.475 8.4 8.4 0 01-3.341.684zm4.761-1.465c-.086-.52-.542-3.015-1.659-6.084 2.679-.423 5.022.271 5.314.369a8.468 8.468 0 01-3.655 5.715z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
<script src="public/js/theme.js"></script>
<script src="public/js/signup.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.0.0/flowbite.min.js"></script>

</html>