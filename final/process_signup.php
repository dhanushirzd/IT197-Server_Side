<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = ""; // Default XAMPP password is empty
$dbname = "horizon_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize inputs
    $email = filter_var($_POST["emailAddress"], FILTER_SANITIZE_EMAIL);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password
    $fullName = htmlspecialchars($_POST["fullName"]);
    $username = htmlspecialchars($_POST["username"]);
    $marketingConsent = isset($_POST["marketingConsent"]) ? 1 : 0;
    
    // Current date and time
    $created_at = date("Y-m-d H:i:s");
    
    // Check if email or username already exists
    $check_existing = $conn->prepare("SELECT * FROM users WHERE email = ? OR username = ?");
    $check_existing->bind_param("ss", $email, $username);
    $check_existing->execute();
    $result = $check_existing->get_result();
    
    if ($result->num_rows > 0) {
        // User already exists
        $row = $result->fetch_assoc();
        if ($row['email'] == $email) {
            header("Location: signup_error.php?error=" . urlencode("Email address already in use."));
        } else {
            header("Location: signup_error.php?error=" . urlencode("Username already taken."));
        }
        exit();
    }
    
    // Prepare and execute SQL statement for new user
    $stmt = $conn->prepare("INSERT INTO users (email, password, full_name, username, marketing_consent, created_at) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssis", $email, $password, $fullName, $username, $marketingConsent, $created_at);
    
    if ($stmt->execute()) {
        // Redirect to success page with email (could be used for email confirmation notice)
        header("Location: signup_success.php?email=" . urlencode($email));
        exit();
    } else {
        // Redirect to error page with specific error
        header("Location: signup_error.php?error=" . urlencode($stmt->error));
        exit();
    }
    
    $stmt->close();
}

$conn->close();
?>
