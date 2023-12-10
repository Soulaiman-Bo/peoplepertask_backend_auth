<?php

$expectedFields = [
    'proposalId',
    'customerId',
    'projectId',
];

// Validate presence of all expected fields
foreach ($expectedFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        http_response_code(400);
        echo json_encode([
            "message" => "Missing required field for accept: $field."
        ]);
        exit;
    }
}




$proposalId = $_POST['proposalId'];
$customerId = $_POST['customerId'];
$projectId = $_POST['projectId'];

// Validate data types and formats as needed (e.g., numeric values, email format)
// ...

require_once "model/proposal_model.php";

$result =  acceptproposal($proposalId);

if ($result) {

    $message = "Data received successfully!"; // Include relevant details in the message

    http_response_code(200);
    echo json_encode([
        "message" => $message
    ]);
}
