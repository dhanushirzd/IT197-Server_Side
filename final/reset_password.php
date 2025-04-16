<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon - Reset Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color:rgba(237, 229, 250, 0.88);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .reset-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(147, 112, 219, 0.2);
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo img {
            max-width: 50px;
            margin-bottom: 10px;
        }
        
        .form-title {
            text-align: center;
            font-weight: bold;
            margin-bottom: 5px;
            color:rgb(0, 0, 0);
        }
        
        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
            border-color: #d0c0e8;
        }
        
        .btn-submit {
            background-color: #9370DB;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
        }
        
        .btn-submit:hover {
            background-color: #9370DB;
        }
        
        .alert {
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="reset-container">
        <div class="logo">
            <img src="Images/Untitled_design-removebg-preview.png" alt="Logo">
            <span style="font-weight: bold; font-size: 24px; color:rgb(0, 0, 0);">HORIZON</span>
        </div>
        
        <div class="form-title">RESET YOUR PASSWORD</div>
        
        <?php
        // Check if token is valid
        session_start();
        
        $token_valid = false;
        
        if(isset($_GET['token'])) {
            $token = $_GET['token'];
            
            // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "horizon_db";
            
            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            
            // Check if token exists and is not expired
            $sql = "SELECT user_id, expires_at FROM password_reset_tokens WHERE token = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $token);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                $token_data = $result->fetch_assoc();
                $current_time = date('Y-m-d H:i:s');
                
                if ($current_time < $token_data['expires_at']) {
                    $token_valid = true;
                    $_SESSION['reset_user_id'] = $token_data['user_id'];
                    $_SESSION['reset_token'] = $token;
                } else {
                    echo '<div class="alert alert-danger">Password reset link has expired. Please request a new one.</div>';
                }
            } else {
                echo '<div class="alert alert-danger">Invalid password reset link.</div>';
            }
            
            $stmt->close();
            $conn->close();
        } else {
            echo '<div class="alert alert-danger">Invalid password reset link.</div>';
        }
        
        // Display error or success messages
        if(isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>
        
        <?php if($token_valid): ?>
        <form action="reset_password_process.php" method="POST">
            <input type="password" class="form-control" name="password" placeholder="NEW PASSWORD" required minlength="8">
            <input type="password" class="form-control" name="confirm_password" placeholder="CONFIRM NEW PASSWORD" required minlength="8">
            <input type="hidden" name="token" value="<?php echo $token; ?>">
            <button type="submit" class="btn btn-submit">RESET PASSWORD</button>
        </form>
        <?php else: ?>
        <div class="text-center mt-3">
            <a href="forgot_password.php" class="btn btn-submit">REQUEST NEW RESET LINK</a>
        </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>