<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon - Registration Successful</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #8e6dba;
            --secondary: #6a478f;
            --light: #f3effa;
            --dark: #42275a;
            --accent: #9d7fd6;
        }
        
        body {
            background-color:rgba(237, 229, 250, 0.88);
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        
        .success-container {
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
        
        .success-icon {
            font-size: 60px;
            color: #28a745;
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
        
        .btn-primary {
            background-color: #9370DB;
            border-color: #9370DB;
            padding: 10px 25px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            background-color: #9370DB;
            border-color: #9370DB;
            transform: translateY(-2px);
        }

        .status-bar {
            height: 8px;
            width: 100%;
            background-color: var(--accent);
            position: absolute;
            top: 0;
            left: 0;
            border-radius: 0 0 4px 4px;
        }
    </style>
</head>
<body>
    <div class="status-bar"></div>
    <div class="success-container">
        <div class="logo">
            <img src="Images/Untitled_design-removebg-preview.png" alt="Logo">
            <span style="font-weight: bold; font-size: 24px; color:rgb(0, 0, 0);">HORIZON</span>
        </div>
        
        <div class="success-icon">
            <i class="bi bi-check-circle-fill"></i>✓
        </div>
        
        <h1>Registration Successful!</h1>
        
        <p>Thank you for creating your Horizon account. Your registration has been completed successfully. You can now sign in with your credentials and start using our services.</p>
        
        <div class="d-grid gap-2 d-md-block">
            <a href="sign_in.php" class="btn btn-primary me-md-2">Sign In Now</a>
            <a href="Splash.php" class="btn btn-outline-secondary">Explore Horizon</a>
        </div>
        
        <?php
        // You can include PHP code here if needed
        // For example, to display the user's email:
        if (isset($_GET['email'])) {
            $email = htmlspecialchars($_GET['email']);
            echo "<p class='mt-4 text-muted'>A confirmation email has been sent to: " . $email . "</p>";
        }
        ?>
    </div>

    <!-- Bootstrap JS and icons -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</body>
</html>