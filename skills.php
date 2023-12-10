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
            case 'createskill':
                require_once "views/skills/create.skills.php";
                break;
            case 'updateskill':
                require_once "views/skills/update.skills.php";
                break;
            case 'deleteskill':
                require_once "scripts/delete.skill_script.php";
                break;
            case 'createskillscript':
                require_once "scripts/create.skill_script.php";
                break;
            case 'updateskillscript':
                require_once "scripts/update.skill_script.php";
                break;
        }
    } else {
        require_once "views/skills/show.skills.php";
    }
} else {
    echo "<h1>you are not Allowed Here</h1>";
    echo "<a href='home.php'>Go Back Home</a>";
}
