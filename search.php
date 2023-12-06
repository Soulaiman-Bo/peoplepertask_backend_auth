<?php

$data = json_decode(file_get_contents('php://input'), true);

if (!is_array($data) || !isset($data['message'])) {
    http_response_code(400);
    echo json_encode([
        "message" => "Invalid request format."
    ]);
    exit;
}

$message = $data['message'];

$response = [
    "message" => "Hello from PHP! I received your message: $message"
];

http_response_code(200);
echo json_encode($response);
