<?php

session_start();
$role = $_SESSION['role'];


if (!isset($_SESSION['role'])) {
  header('Location: login.php');
}

echo $role;


// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (isset($_GET['action'])) {
    $action = $_GET['action'];

    if ($role == "customer") {
      switch ($action) {
        case 'acceptproposal':
          require_once "scripts/accept.proposal.php";
          break;
      }
    }
    if ($role == "freelancer") {
      switch ($action) {
        case 'createproposal':
          require_once "scripts/create.proposal.php";
          break;
      }
    }
  }
//}
