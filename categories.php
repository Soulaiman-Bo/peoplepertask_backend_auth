<?php

session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}

if ($role == 'admin') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'createcategory':
                require_once "views/categories/create.categories.php";
                break;
            case 'updatecategory':
                require_once "views/categories/update.categories.php";
                break;
            case 'deletecategory':
                require_once "views/categories/delete.categories.php";
                break;
        }
    } else {
        require_once "views/categories/show.categories.php";
    }
} else {
    echo "<h1>you are not Allowed Here</h1>";
    echo "<a href='home.php'>Go Back Home</a>";
}
