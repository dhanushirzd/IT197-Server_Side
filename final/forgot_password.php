<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon - Forgot Password</title>
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
        
        .password-recovery-container {
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

        .form-description {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            color:rgb(41, 41, 41);
        }
        
        .form-control {
            border-radius: 5px;
            margin-bottom: 15px;
            padding: 10px;
            font-size: 13px;
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
            background-color:#9370DB;
        }
        
        .back-to-login {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
        }
        
        a {
            color: #9370DB;
            text-decoration: none;
            font-weight: bold;
        }
        
        a:hover {
            color: #7A56C1;
        }
        
        .alert {
            margin-bottom: 15px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="password-recovery-container">
        <div class="logo">
            <img src="Images/Untitled_design-removebg-preview.png" alt="Logo">
            <span style="font-weight: bold; font-size: 24px; color:rgb(0, 0, 0);">HORIZON</span>
        </div>
        
        <div class="form-title">FORGOT YOUR PASSWORD?</div>
        <div class="form-description">Enter your email address and we'll send you a link to reset your password.</div>
        
        <?php
        // Display error or success messages
        session_start();
        if(isset($_SESSION['error'])) {
            echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['success'])) {
            echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
            unset($_SESSION['success']);
        }
        ?>
        
        <form action="forgot_password_process.php" method="POST">
            <input type="email" class="form-control" name="email" placeholder="YOUR EMAIL ADDRESS" required>
            <button type="submit" class="btn btn-submit">SEND RESET LINK</button>
        </form>
        
        <div class="back-to-login">
            <a href="sign_in.php">BACK TO LOGIN</a>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>