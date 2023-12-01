<?php

session_start();
$role = $_SESSION['role'];

if (!isset($_SESSION['role'])) {
    header('Location: login.php');
}

$role = $_SESSION['role'];


switch ($role) {
    case 'admin':
        require_once "views/dashboard/admin.dashboard.php";
        break;
    case 'customer':
        require_once "views/dashboard/client.dashboard.php";
        break;
    case 'freelancer':
        require_once "views/dashboard/freelancer.dashboard.php";
        break;
    default:
        echo '404';
        break;
}

