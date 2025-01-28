<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_setup.php';

header('Content-Type: application/json');


if (isset($_GET['weather_id'])) {
    $weather_id=$_GET['weather_id'];
    $stmt = $conn->prepare("DELETE FROM `Weather` WHERE weather_id=?");

    echo $weather_id;
    $stmt->bind_param("i", $weather_id);

    if (!$stmt->execute()) {
        echo "Error weather id {$weather_id}: " . $stmt->error;
        exit;
    }

    echo "Data deleted successfully!";
   
} else {
    echo "Error: Please select at least one meeting.";
}

$conn->close();
?>
