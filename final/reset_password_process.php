<?php
// reset_password_process.php - Process the reset password form

// Start session
session_start();

// Check if user is coming from reset password page
if (!isset($_POST['token']) || !isset($_SESSION['reset_user_id']) || !isset($_SESSION['reset_token'])) {
    header("Location: sign_in.php");
    exit();
}

// Check if token matches
if ($_POST['token'] !== $_SESSION['reset_token']) {
    $_SESSION['error'] = "Invalid request. Please try again.";
    header("Location: forgot_password.php");
    exit();
}

// Get form data
$new_password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$user_id = $_SESSION['reset_user_id'];
$token = $_POST['token'];

// Validate passwords
if (empty($new_password) || empty($confirm_password)) {
    $_SESSION['error'] = "Both password fields are required";
    header("Location: reset_password.php?token=" . $token);
    exit();
}

if ($new_password !== $confirm_password) {
    $_SESSION['error'] = "Passwords do not match";
    header("Location: reset_password.php?token=" . $token);
    exit();
}

if (strlen($new_password) < 8) {
    $_SESSION['error'] = "Password must be at least 8 characters long";
    header("Location: reset_password.php?token=" . $token);
    exit();
}

// Database connection
$servername = "localhost";
$username = "root";  // Default XAMPP username
$password = "";      // Default XAMPP password
$dbname = "horizon_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verify token is still valid and not expired
$sql = "SELECT * FROM password_reset_tokens WHERE token = ? AND user_id = ? AND expires_at > NOW()";
$stmt = $conn->prepare($sql);
$stmt->bind_param("si", $token, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    $_SESSION['error'] = "Password reset link has expired. Please request a new one.";
    header("Location: forgot_password.php");
    $stmt->close();
    $conn->close();
    exit();
}

// Hash the new password
$hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

// Update user's password
$update_sql = "UPDATE users SET password = ? WHERE id = ?";
$update_stmt = $conn->prepare($update_sql);
$update_stmt->bind_param("si", $hashed_password, $user_id);

if ($update_stmt->execute()) {
    // Password updated successfully
    
    // Delete all reset tokens for this user
    $delete_sql = "DELETE FROM password_reset_tokens WHERE user_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $user_id);
    $delete_stmt->execute();
    $delete_stmt->close();
    
    // Clear session variables
    unset($_SESSION['reset_user_id']);
    unset($_SESSION['reset_token']);
    
    // Set success message
    $_SESSION['success'] = "Your password has been reset successfully. You can now login with your new password.";
    
    // Redirect to login page
    header("Location: sign_in.php");
} else {
    $_SESSION['error'] = "Error updating password. Please try again.";
    header("Location: reset_password.php?token=" . $token);
}

$update_stmt->close();
$stmt->close();
$conn->close();
exit();
?>