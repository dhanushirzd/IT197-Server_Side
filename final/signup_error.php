<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon - Registration Error</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #8e6dba;
            --secondary: #6a478f;
            --light: #f3effa;
            --dark: #42275a;
            --error: #d8549d;
            --error-light: #ffecf6;
        }
        
        body {
            background-color:rgba(237, 229, 250, 0.88);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .error-container {
            background-color: white;
            border-radius: 15px;
            padding: 30px;
            max-width: 450px;
            width: 100%;
            box-shadow: 0 4px 8px rgba(147, 112, 219, 0.2);
            text-align: center;
        }
        
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .logo img {
            max-width: 50px;
            margin-bottom: 10px;
        }
        
        .error-icon {
            font-size: 60px;
            color: var(--error);
            margin-bottom: 20px;
        }
        
        h1 {
            color: var(--dark);
            font-weight: bold;
            margin-bottom: 15px;
        }
        
        p {
            color: #555;
            margin-bottom: 25px;
            font-size: 16px;
            line-height: 1.6;
        }
        
        .error-details {
            background-color: var(--error-light);
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 25px;
            text-align: left;
            color: var(--error);
            font-size: 14px;
            border-left: 5px solid var(--error);
        }
        
        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: var(--secondary);
            border-color: var(--secondary);
            transform: translateY(-2px);
        }

        .status-bar {
            height: 8px;
            width: 100%;
            background-color: var(--error);
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 0 0 4px 4px;
        }
    </style>
</head>
<body>
    <div class="status-bar"></div>
    <div class="error-container">
        <div class="logo">
            <img src="Images/Untitled_design-removebg-preview.png" alt="Logo">
            <span style="font-weight: bold; font-size: 24px; color:rgb(0, 0, 0);">HORIZON</span>
        </div>
        
        <div class="error-icon">
            <i class="bi bi-exclamation-triangle-fill"></i>⚠
        </div>
        
        <h1>Registration Failed</h1>
        
        <p>We encountered an error while processing your registration. Please review the error details below and try again.</p>
        
        <div class="error-details">
            <?php
            if (isset($_GET['error'])) {
                $error = htmlspecialchars($_GET['error']);
                echo "<strong>Error:</strong> " . $error;
            } else {
                echo "<strong>Error:</strong> An unknown error occurred during registration.";
            }
            ?>
        </div>
        
        <div class="d-grid gap-2 d-md-block">
            <a href="Sign_up.php." class="btn btn-primary me-md-2">Try Again</a>
            <a href="#" class="btn btn-outline-secondary">Contact Support</a>
        </div>
        
        <p class="mt-4 text-muted small">If the problem persists, please contact our support team for assistance.</p>
    </div>

    <!-- Bootstrap JS and icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</body>
</html>