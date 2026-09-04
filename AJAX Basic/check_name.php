<?php
header('Content-Type: application/json');
require_once "config.php";

$name = isset($_GET['name']) ? trim($_GET['name']) : "";
$response = ["exists" => false];

if ($name !== "") {
    $stmt = $conn->prepare("SELECT id FROM people WHERE name = ?");
    $stmt->bind_param("s", $name);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $response["exists"] = true;
    }
    $stmt->close();
}

echo json_encode($response);
$conn->close();
?>
