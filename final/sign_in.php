<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon - Login</title>
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

        .form-container {
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
        
        .subtitle {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
            color:rgb(41, 41, 41);
        }

        .btn-submit,
        .btn-signin {
            background-color: #9370DB;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px;
            width: 100%;
            font-weight: bold;
        }

        .btn-submit:hover,
        .btn-signin:hover {
            background-color: #9370DB; /* Blueviolet - darker shade for hover */
        }

        a {
            color: #9370DB;
            text-decoration: none;
            font-weight: bold;
        }
        
        a:hover {
            color: #7A56C1;
        }

        .password-container {
            position: relative;
        }

        .password-container input {
            width: 100%;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #D8BFD8; /* Thistle border */
            font-family: Arial, sans-serif;
        }

        .password-container input:focus {
            border-color: #9370DB;
            box-shadow: 0 0 0 0.2rem rgba(147, 112, 219, 0.25);
            outline: none;
        }

        .password-toggle {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #9370DB;
        }
        
        .password-toggle:hover {
            color: #7A56C1;
        }

        .terms-text {
            font-size: 14px;
            margin-bottom: 15px;
            color: #9370DB;
        }
    </style>

</head>
<body>
    <div class="form-container">
        <div class="logo">
                <img src="Images/Untitled_design-removebg-preview.png" alt="Logo">
                <span style="font-weight: bold; font-size: 24px; color:rgb(0, 0, 0);">HORIZON</span>
        </div>
            
        <div class="form-title">SIGN IN TO YOUR HORIZON ACCOUNT</div>
        <div class="subtitle">DON'T HAVE AN ACCOUNT? <a href="Sign_up.php">SIGN UP</a></div>
            
        <form action="login_process.php" method="POST">
            <div class="mb-3">
                <input type="text" class="form-control" name="email" placeholder="EMAIL ADDRESS OR USERNAME" required>
            </div>
                
            <div class="mb-3 password-container">
                <input type="password" class="form-control" id="password" name="password" placeholder="PASSWORD" required>
                <div class="password-toggle" onclick="togglePassword()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16" id="eye-icon">
                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                    </svg>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16" id="eye-slash-icon" style="display: none;">
                        <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                        <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                        <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                    </svg>
                </div>
            </div>

            <div class="terms-text">
                <a href="forgot_password.php" class="forgot-password">FORGOT PASSWORD?</a>
            </div>

            <button type="submit" class="btn btn-signin">SIGN IN</button>
        </form>
    </div>

<!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

<!-- Password Toggle Script -->
<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eye-icon');
        const eyeSlashIcon = document.getElementById('eye-slash-icon');
                
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.style.display = 'none';
            eyeSlashIcon.style.display = 'block';
        } else {
            passwordInput.type = 'password';
            eyeIcon.style.display = 'block';
            eyeSlashIcon.style.display = 'none';
        }
    }
</script>

</body>
</html>