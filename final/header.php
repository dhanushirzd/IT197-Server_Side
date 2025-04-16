<?php
// Initialize variables if not set
if (!isset($pageTitle)) {
    $pageTitle = "";
}
if (!isset($currentPage)) {
    $currentPage = "";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HORIZON</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Irish+Grover&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">
    <style>
        :root {
            --primary: #A888B5;
            --primary-dark: #8a6e95;
            --primary-light: #c2a6cc;
            --primary-very-light: #ded0e6;
            --primary-very-dark: #6d5775;
            --text-on-primary: #ffffff;
            --accent: #785580;
        }

        body {
            font-family: 'Poppins';
        }

        .main-content {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .horizon-title {
        font-family: 'Irish Grover';
        }   

        /* Splash Screen Styles */
        #splash-screen {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgb(240, 238, 241);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            transition: opacity 0.8s ease-out;
        }

        .splash-logo {
            width: 180px;
            height: 180px;
            margin-bottom: 20px;
            border-radius: 0%;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;

        }

        .splash-logo img {
            max-width: 85%;
            max-height: 85%;
            object-fit: contain;
        }

        .splash-title {
            color: rgb(155, 106, 172);
            font-size: 2.5rem;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .splash-subtitle {
            color: rgb(171, 137, 182);
            font-size: 1.2rem;
            margin-bottom: 30px;
        }

        .loading-bar {
            width: 300px;
            height: 10px;
            background-color: rgba(255, 255, 255, 0.31);
            border-radius: 5px;
            overflow: hidden;
            position: relative;
        }

        .progress {
            width: 0%;
            height: 100%;
            background-color: rgb(155, 106, 172);
            border-radius: 5px;
            transition: width 0.5s ease;
        }

        /* Navigation Bar Styles */
        .navbar-brand img {
            height: 40px;
            margin-right: 10px;
        }
        
        .navbar-light .navbar-nav .nav-link.active {
            color: var(--primary);
            font-weight: 500;
        }
        
        .navbar-light .navbar-nav .nav-link:hover {
            color: var(--primary);
        }

        .btn-primary {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-outline-primary {
            color: var(--primary);
            border-color: var(--primary);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }
        
        /* Category Pills */
        .category-pills {
            display: flex;
            flex-wrap: nowrap;
            overflow-x: auto;
            gap: 10px;
            padding: 10px 0;
            margin-bottom: 20px;
            justify-content: center;
        }
        
        .category-pill {
            padding: 8px 20px;
            background-color: var(--primary-very-light);
            border-radius: 30px;
            color: var(--primary-dark);
            font-weight: 500;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.3s ease;
        }
        
        .category-pill:hover, .category-pill.active {
            background-color: var(--primary);
            color: white;
        }

        .pill {
            padding: 8px 20px;
            border: 2px solid var(--primary-very-light);
            border-radius: 30px;
            color: var(--primary-dark);
            font-weight: 500;
            text-decoration: none;
            white-space: nowrap;
            transition: all 0.3s ease;
        }
        
        .pill:hover, .pill.active {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }
    </style>
</head>
<body>
    <!-- Splash Screen -->
    <div id="splash-screen">
        <div class="splash-logo">
            <img src="Images/Untitled_design-removebg-preview.png" alt="Company Logo">
        </div>
        <h1 class="splash-title">Welcome to <span class="horizon-title"> HORIZON </span></h1>
        <p class="splash-subtitle">Loading amazing content for you...</p>
        <div class="loading-bar">
            <div class="progress" id="progress-bar"></div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Navigation Bar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top">
            <div class="container">
                <!-- Date -->
                <div class="navbar-text me-auto">
                    <span id="currentDate"></span>
                </div>
                
                <!--logo and text -->
                <a class="navbar-brand mx-auto" href="Splash.php">
                    <img src="Images/Untitled_design-removebg-preview.png" alt="Logo">
                    <span class="horizon-title"> HORIZON </span>
                </a>

            <!-- Search Bar, User and notification icons -->
                <div class="navbar-nav ms-auto">
                    <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#searchModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </a>
                    <a class="nav-link" href="Sign_up.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                    </a>
                    <a class="nav-link" href="notification.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell">
                            <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path>
                            <path d="M13.73 21a2 2 0 0 1-3.46 0"></path>
                        </svg>
                    </a>
                </div>       
            </div>
        </nav> 
    
    <!-- Main Container -->
    <!-- Category Pills -->
        <div class="category-pills">
            <a href="Splash.php" class="category-pill">All</a>
            <a href="World.php" class="category-pill">World</a>
            <a href="Politics.php" class="category-pill">Politics</a>
            <a href="#" class="category-pill">Technology</a>
            <a href="#" class="category-pill">Business</a>
            <a href="#" class="category-pill">Sports</a>
            <a href="#" class="category-pill">Science</a>
            <a href="#" class="category-pill">Health</a>
            <a href="#" class="category-pill">Entertainment</a>
            <a href="videos.php" class="pill"> Watch</a>
            <a href="podcasts.php" class="pill"> Listen</a>
        </div>

        <!-- Search Modal -->
        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="searchModalLabel">Search</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="input-group">
                                <input class="form-control" type="search" placeholder="Search..." aria-label="Search">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        
        <!-- Custom JavaScript for Splash Screen -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const splashScreen = document.getElementById('splash-screen');
                const progressBar = document.getElementById('progress-bar');
                let progress = 0;
                
                // Simulate loading progress
                const interval = setInterval(function() {
                    progress += 5;
                    progressBar.style.width = progress + '%';
                    
                    if (progress >= 100) {
                        clearInterval(interval);
                        
                        // Hide splash screen after 100% progress
                        setTimeout(function() {
                            splashScreen.style.opacity = '0';
                            setTimeout(function() {
                                splashScreen.style.display = 'none';
                            }, 800);
                        }, 500);
                    }
                }, 100);
            });

            //JavaScript to display current date

        document.addEventListener('DOMContentLoaded', function() {
            const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date();
            document.getElementById('currentDate').textContent = today.toLocaleDateString('en-US', options);
        });

        document.addEventListener('DOMContentLoaded', function() {
            // Get current page URL
            const currentUrl = window.location.href;
            
            // Get all category pills
            const pills = document.querySelectorAll('.category-pill, .pill');
            
            // Loop through each pill and check if its href matches current URL
            pills.forEach(pill => {
                if (currentUrl.includes(pill.getAttribute('href'))) {
                    pill.classList.add('active');
                }
            });
        });
        </script>
    </script>   