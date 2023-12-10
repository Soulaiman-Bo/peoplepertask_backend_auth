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

function getProposalByProjectID($id)
{
    $conn = dbConnect();


    $stmt = $conn->prepare("SELECT P.ID, P.message, P.state, P.freelancer_id, U.firstname, U.lastname, U.email 
                            FROM `proposals` P 
                            JOIN `users` U 
                            ON P.freelancer_id = U.ID 
                            WHERE P.project_id = ? ");

    


    $stmt->bind_param("i", $id);
    $stmt->execute();


    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        $conn->close();
        return false;
    }

    //$row = $result->fetch_assoc();

    $conn->close();
    return $result;
}

function getNumberOfProposals($id)
{
    $conn = dbConnect();

    $stmt = $conn->prepare("SELECT  COUNT(1) AS propsals FROM `proposals` WHERE `project_id` = ? ");

    $stmt->bind_param("i", $id);

    $stmt->execute();

    $result = $stmt->get_result();

    $row = $result->fetch_assoc();
    $conn->close();
    return $row;
}


// function acceptproposal($id){


    
//     $conn = dbConnect();

//     $stmt = $conn->prepare("UPDATE `proposals` SET `state`='approved' WHERE `ID` = ?");
//     $stmt->bind_param("i", $id);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     $stmt1 = $conn->prepare("UPDATE `proposals` SET `state`='rejected' WHERE `ID` != ?");
//     $stmt1->bind_param("i", $id);
//     $stmt1->execute();
//     $result1 = $stmt1->get_result();




//     // $row = $result->fetch_assoc();

//     $conn->close();
//     return $result;
// }


function acceptProposal($id) {
    $conn = dbConnect();

    $stmt = $conn->prepare("UPDATE `proposals` SET `state` = CASE WHEN `ID` = ? THEN 'approved' ELSE 'rejected' END");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    $conn->close();
    return $result;
}

