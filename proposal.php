<?php

$expectedFields = [
  'freelancerId',
  'name',
  'message',
  'projectID',
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

$freelancerId = $_POST['freelancerId'];
$name = $_POST['name'];
$message = $_POST['message'];
$projectID = $_POST['projectID'];

// Validate data types and formats as needed (e.g., numeric values, email format)
// ...

require_once "model/proposal_model.php";

$result =  createproposal();

if ($result) {

  $message = "Data received successfully!"; // Include relevant details in the message

  http_response_code(200);
  echo json_encode([
    "message" => $message
  ]);

}
