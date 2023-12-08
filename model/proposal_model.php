<?php


require_once "config/dbConnect.php";


function createproposal()
{
    extract($_POST);
    $conn = dbConnect();

    $sql = "INSERT INTO `proposals`(`message`, `freelancer_id`, `project_id`) 
    VALUES ('$message','$freelancerId','$projectID')";

    $result = $conn->query($sql);
    $conn->close();
    return  $result;
};


function getProposalByProject($id, $freelancerId)
{
    $conn = dbConnect();
    
    $stmt = $conn->prepare("SELECT * FROM `proposals` WHERE `project_id` = ? AND `freelancer_id` = ?");
    $stmt->bind_param("ii", $id, $freelancerId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        $conn->close();
        return false;
    }
    $row = $result->fetch_assoc();
    $conn->close();
    return $row;
}
