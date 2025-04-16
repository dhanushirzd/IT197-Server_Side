<?php
// Start session to get user ID
session_start();

// Connect to database
$servername = "localhost";
$username = "root";
$password = ""; // default XAMPP password is empty
$dbname = "horizon_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

// Get user ID from session (or use a default for testing)
$userId = $_SESSION['user_id'] ?? 1; // Default to user ID 1 for demonstration

// Update all unread notifications to read
$query = "UPDATE notifications SET read_status = 1 WHERE user_id = ? AND read_status = 0";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $userId);
$result = $stmt->execute();

// Get the number of affected rows
$rowsUpdated = $stmt->affected_rows;

$conn->close();

// Return response as JSON
header('Content-Type: application/json');
echo json_encode([
    'success' => $result,
    'notifications_marked' => $rowsUpdated
]);
?>