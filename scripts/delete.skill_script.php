<?php
require_once "model/skills_model.php";


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['ID'])) {
        $id = $_POST['ID'];

        $result =  deleteskill($id);

    } else {
        http_response_code(400);
        die("bad request");
    }
}


if ($result) {
    $message = "Data received successfully!"; // Include relevant details in the message
    http_response_code(200);
    echo json_encode([
        "message" => $message
    ]);
}
