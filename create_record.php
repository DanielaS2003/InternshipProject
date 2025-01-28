<?php
require_once 'db_setup.php';

header('Content-Type: application/json');

if (isset($_GET['location'], $_GET['start_date'], $_GET['end_date'], $_GET['temperature'])) {
    $location = $_GET['location'];
    $start_date = $_GET['start_date'];
    $end_date = $_GET['end_date'];
    $temperature = $_GET['temperature'];

    // Debugging: Log received values
    error_log("Location: $location, Start Date: $start_date, End Date: $end_date, Temperature: $temperature");

    $sql = "INSERT INTO Weather (location, start_date, end_date, temperature) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssd", $location, $start_date, $end_date, $temperature);

    if ($stmt->execute()) {
        echo "Record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Required parameters are missing";
}
?>
