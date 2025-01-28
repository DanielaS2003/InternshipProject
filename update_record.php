<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'db_setup.php';

if (isset($_GET['weather_id'],$_GET['start_date'], $_GET['end_date'], $_GET['location'], $_GET['temperature'])) {
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $location = $_GET['location'];
    $temperature = $_GET['temperature'];
    $weather_id = $_GET['weather_id'];


    $sql = "UPDATE `weather` SET `start_date`=?,`end_date`=?,`location`=?,`temperature`=? WHERE `weather_id`=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdi", $start_date, $end_date, $location, $temperature, $weather_id);

    if (!$stmt->execute()) {
        echo "Error weather id {$weather_id}: " . $stmt->error;
        exit;
    }

    echo "Data updated successfully!";
} else {
    echo "Error: Please fill in all required fields.";
}

$conn->close();
?>