<?php
require_once "model/skills_model.php";


$expectedFields = [
    'ID',
    'name',
];

// Validate presence of all expected fields
foreach ($expectedFields as $field) {
    if (!isset($_POST[$field]) || empty($_POST[$field])) {
        http_response_code(400);
        echo json_encode([
            "message" => "Missing required field: $field."
        ]);
        exit;
    }
}

$name = $_POST['name'];
$id = $_POST['ID'];

$result =  updateSkillById($id, $name);


if ($result) {
    $message = "Data received successfully!"; // Include relevant details in the message
    http_response_code(200);
    echo json_encode([
        "message" => $message
    ]);
}
