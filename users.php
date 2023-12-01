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
            case 'createuser':
                require_once "views/users/create.user.php";
                break;
            case 'updateuser':
                require_once "views/users/update.user.php";
                break;
            case 'deleteuser':
                echo "delete user";
                break;
        }
    } else {
        require_once "views/users/show.user.php";
    }
} else {
    echo "<h1>you are not Allowed Here</h1>";
    echo "<a href='home.php'>Go Back Home</a>";
}
