<?php
require_once 'db_setup.php';

header('Content-Type: application/json');

$stmt = $conn->prepare("SELECT * FROM Weather");
$stmt->execute();
$result = $stmt->get_result();
$weather = $result->fetch_all(MYSQLI_ASSOC);

if (empty($weather)) {
    echo json_encode(['error' => 'No data found.']);
} else {
    echo json_encode($weather);
}

$conn->close();
?>
