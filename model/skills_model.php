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


function getAllskill()
{
    $conn = dbConnect();
    $sql = "SELECT * FROM `skills`";
    $result = $conn->query($sql);
    $conn->close();
    return $result;
}

function getOneSkillById($id)
{
    $conn = dbConnect();
    $sql = "SELECT * FROM `skills` WHERE `ID` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
    $conn->close();
    return $row;
}

function updateSkillById($id, $name)
{
    $mysqli = dbConnect();
    $sql = "UPDATE `skills` SET `name`= ? WHERE `ID`= ?";

    $stmt = $mysqli->prepare($sql);

    if ($stmt === false) {
        die("Error in prepare statement: " . $mysqli->error);
    }

    $stmt->bind_param("si", $name, $id);

    $result = $stmt->execute();

    $stmt->close();
    $mysqli->close();

    return $result;
}

function deleteskill($id) {
    $conn = dbConnect();

    $sql = "DELETE FROM `skills` WHERE `ID` = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error in prepare statement: " . $conn->error);
    }

    $stmt->bind_param("i", $id);  

    $result = $stmt->execute();

    $stmt->close();
    $conn->close();

    return $result;
}
