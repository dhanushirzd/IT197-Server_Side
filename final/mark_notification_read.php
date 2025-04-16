<?php
// Start session to get user ID
session_start();

// Get JSON data from request
$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

if (!isset($data['notification_id'])) {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'message' => 'Notification ID is required']);
    exit;
}

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
$notificationId = $data['notification_id'];

// Update the notification to read status
$query = "UPDATE notifications SET read_status = 1 WHERE id = ? AND user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $notificationId, $userId);
$result = $stmt->execute();

$conn->close();

// Return response as JSON
header('Content-Type: application/json');
echo json_encode([
    'success' => $result
]);
?>