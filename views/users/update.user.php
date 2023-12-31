<?php


$firstname = $lastname = $email = $number  = $region = $city = $gender = $password =  $passwordConfirm = $role =   "";
$firstnameErr = $lastnameErr = $emailErr = $numberErr  = $regionErr = $cityErr = $genderErr = $passwordErr = $passwordConfirmErr =  $roleErr =  "";


require_once 'model/user_model.php';
require_once 'model/region_city_model.php';

$id = $_GET['user'];
$row = getOne($id);
$allregions = getAllRegions();
$allcities = getAllCities();


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $ID = $row["ID"];
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $email = $row["email"];
    $number = $row["number"];
    // $competences = $row["competences"];
    $region = $row["region"];
    $city = $row["city"];
    $gender = $row["gender"];
    $role = $row["role"];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate Firstname
    $ID = test_input($_POST["ID"]);

    if (empty($_POST["firstname"])) {
        $firstnameErr = "Firstname is required";
    } else {
        $firstname = test_input($_POST["firstname"]);
        // Check if firstname contains only letters and is within the specified length
        if (!preg_match("/^[a-zA-Z]{2,20}$/", $firstname)) {
            $firstnameErr = "Only letters allowed, not more than 20 characters, not less than 2 characters";
        }
    }

    // Validate Lastname
    if (empty($_POST["lastname"])) {
        $lastnameErr = "Lastname is required";
    } else {
        $lastname = test_input($_POST["lastname"]);
        // Check if lastname contains only letters and is within the specified length
        if (!preg_match("/^[a-zA-Z]{2,20}$/", $lastname)) {
            $lastnameErr = "Only letters allowed, not more than 20 characters, not less than 2 characters";
        }
    }

    // Validate Email
    if (empty($_POST["email"])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST["email"]);
        // Check if email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Invalid email format";
        }
    }

    // Validate Phone
    if (empty($_POST["number"])) {
        $numberErr = "Phone number is required";
    } else {
        $number = test_input($_POST["number"]);
        // Check if phone is a valid number
        if (!preg_match("/^[0-9]{10}$/", $number)) {
            $numberErr = "Invalid phone number";
        }
    }

    // Validate Competences
    // if (empty($_POST["competences"])) {
    //     $competencesErr = "Competences are required";
    // } else {
    //     $competences = test_input($_POST["competences"]);
    //     // Check if competences contain only letters and are within the specified length
    //     if (!preg_match("/^[a-zA-Z ,]{2,200}$/", $competences)) {
    //         $competencesErr = "Only letters allowed, not more than 200 characters, not less than 2 characters";
    //     }
    // }

    if (empty($_POST["role"])) {
        $roleErr = "role is required";
    } else {
        $role = test_input($_POST["role"]);
        
        if ($role != 'admin' && $role != 'customer' && $role != 'freelancer') {
            $roleErr = "Invalid role";
        }
    }

    // Validate Region
    if (empty($_POST["region"])) {
        $regionErr = "Region is required";
    } else {
        $region = test_input($_POST["region"]);
        // Check if region is a number between 1 and 12
        if (!filter_var($region, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 12)))) {
            $regionErr = "Invalid region number";
        }
    }

    // Validate City
    if (empty($_POST["city"])) {
        $cityErr = "City is required";
    } else {
        $city = test_input($_POST["city"]);
        // Check if city is a number between 1 and 404
        if (!filter_var($city, FILTER_VALIDATE_INT, array("options" => array("min_range" => 1, "max_range" => 404)))) {
            $cityErr = "Invalid city number";
        }
    }

    // Validate Gender
    if (empty($_POST["gender"])) {
        $genderErr = "Gender is required";
    } else {
        $gender = test_input($_POST["gender"]);
        // Check if gender is either 'Male' or 'Female'
        if ($gender != 'Male' && $gender != 'Female') {
            $genderErr = "Invalid gender";
        }
    }


    if (
        empty($firstnameErr) && empty($lastnameErr) && empty($emailErr) && empty($numberErr)
        && empty($roleErr)&& empty($regionErr) && empty($cityErr) && empty($genderErr)
    ) {
        update($ID, $firstname, $lastname, $email, $number, $role, $region, $city, $gender);
        header('location:users.php');
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>
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

            <form action="?action=updateuser" method="POST" class="w-3/4 mx-auto bg-white border p-8 rounded-2xl border-b dark:bg-gray-800 dark:border-gray-700">

                <input type="hidden" value="<?php echo $ID   ?>" name="ID" id="ID" required>

                <div class="flex flex-col xl:flex-row gap-7 mb-4 ">
                    <div class="mb-5 w-full">
                        <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Firstname</label>
                        <input type="text" name="firstname" value="<?php echo $firstname; ?>" id="firstname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Jhon doe" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $firstnameErr; ?></span>
                    </div>

                    <div class="mb-5 w-full">
                        <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Lastname</label>
                        <input type="text" name="lastname" value="<?php echo $lastname; ?>" id="lastname" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Jhon doe" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $lastnameErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4">
                    <div class="mb-5 w-full">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" value="<?php echo $email; ?>" id="email" placeholder="Jhon_doe@gmail.com" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $emailErr; ?></span>

                    </div>

                    <div class="mb-5 w-full">
                        <label for="number" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone Number</label>
                        <input type="tel" name="number" value="<?php echo $number; ?>" id="number" placeholder="0615301530" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $numberErr; ?></span>
                    </div>
                </div>


                <div class="flex flex-col xl:flex-row gap-7 mb-4">
                    <div class="mb-5 w-full">
                        <label for="region" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your region</label>
                        <select name="region" value="<?php echo $region; ?>" id="region" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach ($allregions as $region) : ?>
                                <?php if ($region['id'] == $row["region"]) : ?>
                                    <option selected value="<?= $region['id'] ?>"> <?= $region['region'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $region['id'] ?>"> <?= $region['region'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $regionErr; ?></span>
                    </div>

                    <div class="mb-5 w-full">
                        <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your city</label>
                        <select name="city" value="<?php echo $city; ?>" id="city" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php foreach ($allcities as $city) : ?>
                                <option value="<?= $city['id'] ?>"> <?= $city['ville'] ?></option>
                            <?php endforeach; ?>

                            <?php foreach ($allcities as $city) : ?>
                                <?php if ($city['id'] == $row["city"]) : ?>
                                    <option selected value="<?= $city['id'] ?>"> <?= $city['ville'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $city['id'] ?>"> <?= $city['ville'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $cityErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4">
                    <div class="mb-5 w-full">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gender</label>
                        <select id="gender" value="<?php echo $gender; ?>" name="gender" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option  <?php if($gender == 'Male') echo "selected"; ?> value="Male">Male</option>
                            <option  <?php if($gender == 'Female') echo "selected"; ?> value="Female">Female</option>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $genderErr; ?></span>
                    </div>

                    <div class="mb-5 w-full">
                        <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select id="role" value="<?php echo $role; ?>" name="role" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                           
                            <option  <?php if($role == 'admin') echo "selected"; ?> value="admin">Admin</option>
                            <option  <?php if($role == 'freelancer') echo "selected"; ?> value="freelancer">Freelancer</option>
                            <option  <?php if($role == 'customer') echo "selected"; ?> value="customer">Customer</option>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $genderErr; ?></span>
                    </div>
                </div>

                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Update User
                </button>
            </form>
        </div>
    </main>

    <script src="public/js/dashboard.js"></script>
    <script src="public/js/theme.js"></script>
</body>

</html>