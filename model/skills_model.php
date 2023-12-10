<?php 

require_once "config/dbConnect.php";


function createAskill()
{
    extract($_POST);
    $conn = dbConnect();

    $sql = "INSERT INTO skills (name) VALUES (?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("s", $name);

    $result = $stmt->execute();

    $conn->close();
    $stmt->close();

    return $result;
}


function getAllskill(){
    $conn = dbConnect();
    $sql = "SELECT * FROM `skills`";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}
