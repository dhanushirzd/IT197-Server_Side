<?php
// login_process.php - Process the login form

// Start session
session_start();

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

// Get form data
$email = $_POST['email'];
$password = $_POST['password'];

// Validate input
if (empty($email) || empty($password)) {
    $_SESSION['error'] = "All fields are required";
    header("Location: sign_in.php");
    exit();
}

// Query to check if user exists
$sql = "SELECT id, email, username, password FROM users WHERE email = ? OR username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User found
    $user = $result->fetch_assoc();
    
    // Verify password (using password_verify for hashed passwords)
    if (password_verify($password, $user['password'])) {
        // Password is correct, create session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['username'] = $user['username'];
        
        // Redirect to dashboard
        header("Location: splash.php");
    } else {
        // Password is incorrect
        $_SESSION['error'] = "Invalid email/username or password";
        header("Location: forgot_password.php");
    }
} else {
    // User not found
    $_SESSION['error'] = "Invalid email/username or password";
    header("Location: signin_error.php");
}

$stmt->close();
$conn->close();
?>