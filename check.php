<?php  
session_start();

    $email = $_SESSION['email'];
    $lastname = $_SESSION['lastname'];
    $firstname = $_SESSION['firstname'];
    $role = $_SESSION['role'];
    
    echo $email;
    echo '<br>';
    echo $lastname;
    echo '<br>';
    echo $firstname;
    echo '<br>';
    echo $role;

?>