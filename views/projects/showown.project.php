<?php
require_once "model/project_model.php";
require_once "model/proposal_model.php";


//session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}

if($_SESSION['role'] == 'customer'){
    $freelancerID = $_SESSION['ID'];

    $allProject = getownPR($freelancerID);

    //$proposals = getNumberOfProposals();
   // echo  $allProject['title'];
}


// require_once 'model/project_model.php';
// $allProject = getAllPR();

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
    require_once "./views/includes/" . $role . ".sidebar.php"
    ?>

    <main class="mt-14 p-12 ml-0 smXl:ml-64 dark:border-gray-700">
        <a href="?action=createproject" data-modal-target="authentication-modal" data-modal-toggle="authentication-modal" class="block mb-7 font-inter text-white w-fit bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            + Add New Project
        </a>

        <div class="flex flex-col justify-center items-center">

            <?php if(!empty($allProject)): ?>
            <?php  foreach ($allProject as $project) : ?>
                <div class="flex flex-col max-w-4xl gap-8 p-10 border rounded-xl mb-14 bg-white dark:bg-gray-800 dark:border-gray-700">


                    <div class="flex justify-between">
                        <a href="projects.php?action=showindividualproject&id=<?= $project['ID'] ?>"  class="text-2xl mb-3 text-orange-600"><?= $project['title'] ?></a>
                        <p class="flex gap-6">
                            <a href="?action=updateproject&project=<?= $project['ID'] ?>" class="font-medium font-inter text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <a href="?action=deleteproject&project=<?= $project['ID'] ?>" class="font-medium font-inter text-red-600 dark:text-red-500 hover:underline">Delete</a>
                        </p>
                    </div>

                    <p class="text-orange-900 dark:text-orange-600">
                        Hourly: <strong>$<?= $project['minprice'] ?> - $<?= $project['maxprice'] ?></strong> - Posted 4 hours ago
                    </p>

                    <div class="flex gap-14 flex-wrap">
                        <p class="flex flex-col font-inter font-semibold text-primary-950 dark:text-primary-700">
                            Less than <?= $project['hours'] ?> hrs/week
                            <span class="font-medium font-inter text-gray-500 dark:text-gray-400">Hours Needed</span>
                        </p>
                        <p class="flex flex-col font-inter font-semibold text-primary-950 dark:text-primary-700">
                            <?= $project['duration'] ?> Days
                            <span class="font-medium font-inter text-gray-500 dark:text-gray-400">Duration</span>
                        </p>
                        <p class="flex flex-col font-inter font-semibold text-primary-950 dark:text-primary-700">
                            <?= $project['experince'] ?>
                            <span class="font-medium font-inter text-gray-500 dark:text-gray-400">Experince Level</span>
                        </p>
                    </div>

                    <p class="dark:text-orange-50 font-inter">
                        <?= $project['Description'] ?>
                    </p>

                    <?php $arraytags = explode(', ', $project['tags']); ?>

                    <p class="flex gap-3">
                        <?php foreach ($arraytags as $tag) : ?>
                            <a href="?action=searchprojectbytags&tag=<?php echo $tag ?>" class="bg-orange-200 dark:bg-orange-300 font-inter py-2 px-3 rounded-2xl"><?php echo $tag ?></a>
                        <?php endforeach; ?>
                    </p>
                    <p class="font-medium text-gray-500 dark:text-gray-400">
                        <?php $number = getNumberOfProposals($project['ID']) ?>
                        Proposals: <span class="font-semibold text-primary-950 dark:text-primary-700"><?php echo $number['propsals'] ?></span>
                    </p>
                    <p class="flex gap-16">
                        <span class="font-medium text-gray-500 dark:text-gray-400">Posted By:
                            <span class="font-semibold text-primary-950 dark:text-primary-700"><?= $project['firstname'] ?> <?= $project['lastname'] ?></span> </span>
                    </p>
                    <p class="font-semibold text-primary-950 dark:text-primary-700"><?= $project['country'] ?></p>
                </div>
            <?php  endforeach; ?>
            <?php else: ?>
                 <h1>YOU HAVE NO PROJECTS! </h1>
            <?php endif; ?>

        </div>

    </main>

    <script src="public/js/dashboard.js"></script>
    <script src="public/js/theme.js"></script>
</body>

</html>