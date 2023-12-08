<?php
session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}


if ($role == 'admin' || $role == 'customer' || $role == 'freelancer') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {

            case 'createproject':
                require_once "views/projects/create.project.php";
                break;
            case 'showindividualproject':
                require_once "views/projects/showone.project.php";
                break;
            case 'updateproject':
                require_once "views/projects/update.project.php";
                break;
            case 'deleteproject':
                require_once "views/projects/delete.project.php";
                break;
        }
    } else {
        if($role == 'customer' ){
            require_once "views/projects/showown.project.php";
        }else {
            require_once "views/projects/show.project.php";
        }
       
    }
} else {
    echo "<h1>you are not Allowed Here</h1>";
    echo "<a href='home.php'>Go Back Home</a>";
}
