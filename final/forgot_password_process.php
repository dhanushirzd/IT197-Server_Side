<?php
// forgot_password_process.php - Process the forgot password form

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

// Get email from form
$email = $_POST['email'];

// Validate input
if (empty($email)) {
    $_SESSION['error'] = "Email address is required";
    header("Location: forgot_password.php");
    exit();
}

// Check if email exists in database
$sql = "SELECT id, email, username FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // User found, generate token
    $user = $result->fetch_assoc();
    $user_id = $user['id'];
    $token = bin2hex(random_bytes(32)); // Generate a secure random token
    
    // Set token expiration time (1 hour from now)
    $expires = date('Y-m-d H:i:s', strtotime('+1 hour'));
    
    // First, delete any existing tokens for this user
    $delete_sql = "DELETE FROM password_reset_tokens WHERE user_id = ?";
    $delete_stmt = $conn->prepare($delete_sql);
    $delete_stmt->bind_param("i", $user_id);
    $delete_stmt->execute();
    $delete_stmt->close();
    
    // Insert new token into database
    $insert_sql = "INSERT INTO password_reset_tokens (user_id, token, expires_at) VALUES (?, ?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("iss", $user_id, $token, $expires);
    
    if ($insert_stmt->execute()) {
        // Token saved, now send email
        $reset_link = "http://" . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . "/reset_password.php?token=" . $token;
        
        // Email details
        $to = $email;
        $subject = "Password Reset Request for Horizon";
        $message = "Hello {$user['username']},\n\n";
        $message .= "You have requested to reset your password for your Horizon account.\n\n";
        $message .= "Please click the following link to reset your password:\n";
        $message .= $reset_link . "\n\n";
        $message .= "This link will expire in 1 hour.\n\n";
        $message .= "If you did not request this password reset, please ignore this email.\n\n";
        $message .= "Regards,\nThe Horizon Team";
        $headers = "From: noreply@horizon.com";
        
        // Send email
        if (mail($to, $subject, $message, $headers)) {
            $_SESSION['success'] = "A password reset link has been sent to your email address.";
        } else {
            $_SESSION['error'] = "Could not send reset email. Please try again later.";
        }
    } else {
        $_SESSION['error'] = "Error generating reset token. Please try again.";
    }
    
    $insert_stmt->close();
} else {
    // We don't want to reveal whether an email exists in our database for security reasons
    // So we show the same success message regardless
    $_SESSION['success'] = "If your email exists in our system, you will receive a password reset link.";
}

$stmt->close();
$conn->close();

// Redirect back to forgot password page
header("Location: forgot_password.php");
exit();
?>