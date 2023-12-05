<?php
session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}


if ($role == 'admin' || $role == 'customer') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];

        switch ($action) {
            case 'createproject':
                require_once "views/projects/create.project.php";
                break;
            case 'updateproject':
                require_once "views/projects/update.project.php";
                break;
            case 'deleteproject':
                require_once "views/projects/delete.project.php";
                break;
        }
    } else {
        require_once "views/projects/show.project.php";
    }
} else {
    echo "<h1>you are not Allowed Here</h1>";
    echo "<a href='home.php'>Go Back Home</a>";
}
