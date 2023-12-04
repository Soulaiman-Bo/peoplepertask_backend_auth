<?php
require_once "model/category_model.php";
require_once "model/project_model.php";

$allCategories =  getAllCat();

$ID = $title = $description = $minprice = $maxprice = $hours = $duration = $experince = $country = $category = $tags = "";
$titleErr = $descriptionErr = $minpriceErr = $maxpriceErr = $hoursErr = $durationErr = $experinceErr = $countryErr = $categoryErr = $tagsErr = "";


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Validate Title
    if (empty($_POST["title"])) {
        $titleErr = "Title is required";
    } else {
        $title = test_input($_POST["title"]);
        // Check if title is within the specified length
        if (strlen($title) < 10 || strlen($title) > 200) {
            $titleErr = "Title should be between 10 and 200 characters";
        }
    }

    // Validate Description
    if (empty($_POST["description"])) {
        $descriptionErr = "Description is required";
    } else {
        $description = test_input($_POST["description"]);
        // Check if description is within the specified length
        if (strlen($description) < 10 || strlen($description) > 600) {
            $descriptionErr = "Description should be between 10 and 600 characters";
        }
    }

    if (empty($_POST["tags"])) {
        $tagsErr = "Tags are required";
    } else {
        $tags = test_input($_POST["tags"]);
        // Check if description is within the specified length
        if (strlen($tags) < 5 || strlen($tags) > 600) {
            $tagsErr = "Description should be between 5 and 600 characters";
        }
    }

    // Validate Min Price
    if (empty($_POST["minprice"])) {
        $minpriceErr = "Min Price is required";
    } else {
        $minprice = test_input($_POST["minprice"]);
        // Check if min price is a valid number
        if (!is_numeric($minprice)) {
            $minpriceErr = "Min Price should be a valid number";
        }
    }

    // Validate Max Price
    if (empty($_POST["maxprice"])) {
        $maxpriceErr = "Max Price is required";
    } else {
        $maxprice = test_input($_POST["maxprice"]);
        // Check if max price is a valid number and not less than min price
        if (!is_numeric($maxprice) || $maxprice < $minprice) {
            $maxpriceErr = "Max Price should be a valid number and not less than Min Price";
        }
    }

    // Validate Hours
    if (empty($_POST["hours"])) {
        $hoursErr = "Hours is required";
    } else {
        $hours = test_input($_POST["hours"]);
        // Check if hours is a valid number
        if (!is_numeric($hours)) {
            $hoursErr = "Hours should be a valid number";
        }
    }

    // Validate Duration
    if (empty($_POST["duration"])) {
        $durationErr = "Duration is required";
    } else {
        $duration = test_input($_POST["duration"]);
        // Check if duration is a valid number
        if (!is_numeric($duration)) {
            $durationErr = "Duration should be a valid number";
        }
    }

    // Validate Experience
    if (empty($_POST["experince"])) {
        $experinceErr = "Experience is required";
    } else {
        $experince = test_input($_POST["experince"]);
        // Check if experience is one of the specified values
        $validExperiences = array('beginner', 'intermediate', 'advanced');
        if (!in_array($experince, $validExperiences)) {
            $experienceErr = "Invalid experience level";
        }
    }

    // Validate Country
    if (empty($_POST["country"])) {
        $countryErr = "Country is required";
    } else {
        $country = test_input($_POST["country"]);
        // Check if country is within the specified length
        if (strlen($country) < 4 || strlen($country) > 20) {
            $countryErr = "Country should be between 4 and 20 characters";
        }
    }

    // Validate Category
    if (empty($_POST["category_id"])) {
        $categoryErr = "Category is required";
    } else {
        $category = test_input($_POST["category_id"]);
        // Add additional validation for category if needed
    }


    if (

        empty($titleErr) &&
        empty($descriptionErr) &&
        empty($minpriceErr) &&
        empty($maxpriceErr) &&
        empty($hoursErr) &&
        empty($durationErr) &&
        empty($experinceErr) &&
        empty($countryErr) &&
        empty($categoryErr) &&
        empty($tagsErr)

    ) {
        createPR();
        header('location:projects.php');
    }
}

// Function to sanitize input data
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

        <div class="h-fit ">
            <form action="?action=createproject" method="POST" class="max-w-xl mx-auto bg-white border p-8 rounded-2xl ">

                <div class="mb-5">
                    <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                    <input type="text" value="<?php echo $title; ?>" name="title" id="title" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Jhon doe" required>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $titleErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                    <input type="text" name="description" value="<?php echo $description; ?>" id="description" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Jhon doe" required>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $descriptionErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="minprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minimum Hour Price</label>
                    <input type="number" name="minprice" value="<?php echo $minprice; ?>" id="minprice" placeholder="30 hour" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $minpriceErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="maxprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maximum Hour Price</label>
                    <input type="number" name="maxprice" id="maxprice" value="<?php echo $maxprice; ?>" placeholder="30 hour" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $maxpriceErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                    <input type="text" name="tags" value="<?php echo $rags; ?>" id="tags" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="PHP, JAVASCRIPT, CSS, HTML" required>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $tagsErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hours Per Week</label>
                    <input type="number" name="hours" value="<?php echo $hours; ?>" id="hours" placeholder="30 hour" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $hoursErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration</label>
                    <input type="number" name="duration" value="<?php echo $duration; ?>" id="duration" placeholder="30 days" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $durationErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="experince" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your Experince</label>
                    <select name="experince" id="experince" value="<?php echo $experince; ?>" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>Beginner</option>
                        <option>Intermediate</option>
                        <option>Advanced</option>
                    </select>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $experinceErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your Country</label>
                    <select name="country" value="<?php echo $country; ?>" id="country" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option>United States</option>
                        <option>Canada</option>
                        <option>France</option>
                        <option>Germany</option>
                    </select>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $countryErr; ?></span>
                </div>

                <div class="mb-5">
                    <label for="category_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your Category</label>
                    <select name="category_id" value="<?php echo $category_name; ?>" id="category_name" class="  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">

                        <?php foreach ($allCategories as $parent) : ?>
                            <option value="<?= $parent['ID'] ?>"><?= $parent['category_name'] ?></option>
                        <?php endforeach; ?>

                    </select>
                    <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $categoryErr; ?></span>
                </div>

                <Button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create User</Button>
            </form>
        </div>



    </main>

    <script src="public/js/dashboard.js"></script>
    <script src="public/js/theme.js"></script>
</body>

</html>