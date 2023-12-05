<?php

session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}



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
<?php require_once "views/includes/nav.php" ?>
   
    <?php
    require_once "./views/includes/".$role.".sidebar.php"
    ?>

    <main class="mt-14 p-12 ml-0 smXl:ml-64 dark:border-gray-700">

        <div class="h-full ">
            <form action="?action=createproject" method="POST" class="w-3/4 mx-auto bg-white border p-8 rounded-2xl border-b dark:bg-gray-800 dark:border-gray-700">


                <div class="flex flex-col xl:flex-row gap-7 mb-4 ">
                    <div class="mb-5 w-full">
                        <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
                        <input type="text" value="<?php echo $title; ?>" name="title" id="title" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jhon doe" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $titleErr; ?></span>
                    </div>

                    <div class="mb-5  w-full">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <input type="text" name="description" value="<?php echo $description; ?>" id="description" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Jhon doe" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $descriptionErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4 ">
                    <div class="mb-5  w-full">
                        <label for="minprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Minimum Hour Price</label>
                        <input type="number" name="minprice" value="<?php echo $minprice; ?>" id="minprice" placeholder="30 hour" required class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $minpriceErr; ?></span>
                    </div>

                    <div class="mb-5  w-full">
                        <label for="maxprice" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Maximum Hour Price</label>
                        <input type="number" name="maxprice" id="maxprice" value="<?php echo $maxprice; ?>" placeholder="30 hour" required class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $maxpriceErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4 ">
                    <div class="mb-5  w-full">
                        <label for="tags" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tags</label>
                        <input type="text" name="tags" value="<?php echo $tags; ?>" id="tags" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="PHP, JAVASCRIPT, CSS, HTML" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $tagsErr; ?></span>
                    </div>

                    <div class="mb-5  w-full">
                        <label for="hours" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hours Per Week</label>
                        <input type="number" name="hours" value="<?php echo $hours; ?>" id="hours" placeholder="30 hour" required class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $hoursErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4 ">
                    <div class="mb-5  w-full">
                        <label for="duration" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duration</label>
                        <input type="number" name="duration" value="<?php echo $duration; ?>" id="duration" placeholder="30 days" required class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" required>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $durationErr; ?></span>
                    </div>

                    <div class="mb-5  w-full">
                        <label for="experince" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your Experince</label>
                        <select name="experince" id="experince" value="<?php echo $experince; ?>" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>Beginner</option>
                            <option>Intermediate</option>
                            <option>Advanced</option>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $experinceErr; ?></span>
                    </div>
                </div>

                <div class="flex flex-col xl:flex-row gap-7 mb-4 ">
                    <div class="mb-5  w-full">
                        <label for="country" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your Country</label>
                        <select name="country" value="<?php echo $country; ?>" id="country" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            <option>United States</option>
                            <option>Canada</option>
                            <option>France</option>
                            <option>Germany</option>
                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $countryErr; ?></span>
                    </div>

                    <div class="mb-5  w-full">
                        <label for="category_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select your Category</label>
                        <select name="category_id" value="<?php echo $category; ?>" id="category_name" class="block p-2.5 h-12 pl-5 w-full text-sm text-gray-900 bg-gray-50 rounded-3xl shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">

                            <?php foreach ($allCategories as $parent) : ?>
                                <?php if ($category == $parent['ID']) : ?>
                                    <option selected value="<?= $parent['ID'] ?>"><?= $parent['category_name'] ?></option>
                                <?php else : ?>
                                    <option value="<?= $parent['ID'] ?>"><?= $parent['category_name'] ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>

                        </select>
                        <span class="mt-4 block ml-4 text-xs text-red-600 dark:text-red-400 "> <?php echo $categoryErr; ?></span>
                    </div>
                </div>


                <Button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create User</Button>
            </form>
        </div>



    </main>

    <script src="public/js/dashboard.js"></script>
    <script src="public/js/theme.js"></script>
</body>

</html>