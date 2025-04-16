<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Horizon News</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        :root {
            --primary-color: #6c5ce7;
            --secondary-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .header {
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }
        
        .logo {
            font-weight: bold;
            font-size: 24px;
            color: #333;
        }
        
        .logo img {
            height: 30px;
            margin-right: 5px;
        }
        
        .nav-categories {
            padding: 10px 0;
            overflow-x: auto;
            white-space: nowrap;
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
        
        .nav-categories::-webkit-scrollbar {
            display: none;
        }
        
        .category-pill {
            padding: 6px 18px;
            border-radius: 20px;
            margin-right: 8px;
            display: inline-block;
            cursor: pointer;
            background-color: #f1f1f1;
            transition: all 0.3s ease;
        }
        
        .category-pill.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        .category-pill:hover {
            background-color: #e9e9e9;
        }
        
        .category-pill.active:hover {
            background-color: #5a4dcf;
        }
        
        .search-container {
            padding: 30px 0;
            background-color: var(--secondary-bg);
        }
        
        .search-header {
            margin-bottom: 25px;
            font-weight: 600;
        }
        
        .search-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        
        .search-item {
            background-color: #e8e8dc;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .search-item:hover {
            transform: translateY(-5px);
        }
        
        .search-item img {
            width: 100%;
            height: auto;
        }
        
        .search-bar-container {
            position: relative;
            max-width: 600px;
            margin: 20px auto;
        }
        
        .search-bar {
            width: 100%;
            padding: 12px 50px 12px 20px;
            border-radius: 25px;
            border: 1px solid #ddd;
            outline: none;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .search-bar:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 2px rgba(108, 92, 231, 0.2);
        }
        
        .search-btn {
            position: absolute;
            right: 5px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            cursor: pointer;
            padding: 10px;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
        }
        
        .header-icon {
            margin-left: 15px;
            font-size: 20px;
            color: #333;
            cursor: pointer;
        }
        
        @media (max-width: 768px) {
            .search-grid {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }
        }
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class="logo d-flex align-items-center">
                    <img src="horizon-logo.svg" alt="Horizon" onerror="this.src='data:image/svg+xml;charset=UTF-8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'30\' height=\'30\' viewBox=\'0 0 30 30\'><rect width=\'30\' height=\'30\' fill=\'%236c5ce7\'/><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' fill=\'white\' font-size=\'16\'>H</text></svg>'">
                    HORIZON
                </div>
                <div class="header-actions">
                    <div class="search-bar-container d-none d-md-block">
                        <input type="text" class="search-bar" placeholder="Search news..." id="desktopSearch">
                        <button class="search-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                            </svg>
                        </button>
                    </div>
                    <div class="header-icon" id="searchIcon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                        </svg>
                    </div>
                    <div class="header-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                        </svg>
                    </div>
                    <div class="header-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="mobile-search-container d-md-none" style="display: none;" id="mobileSearchContainer">
        <div class="container py-3">
            <div class="search-bar-container">
                <input type="text" class="search-bar" placeholder="Search news..." id="mobileSearch">
                <button class="search-btn">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <nav class="nav-categories">
        <div class="container">
            <div class="category-pill active">All</div>
            <div class="category-pill">World</div>
            <div class="category-pill">Politics</div>
            <div class="category-pill">Technology</div>
            <div class="category-pill">Business</div>
            <div class="category-pill">Sports</div>
            <div class="category-pill">Science</div>
            <div class="category-pill">Health</div>
            <div class="category-pill">Entertainment</div>
            <div class="category-pill">Watch</div>
            <div class="category-pill">Listen</div>
        </div>
    </nav>

    <div class="search-container">
        <div class="container">
            <h2 class="search-header">Top Search</h2>
            <div class="search-grid">
                <!-- Search result items -->
                <div class="search-item">
                    <div style="padding-top: 100%; position: relative;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="search-item">
                    <div style="padding-top: 100%; position: relative;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="search-item">
                    <div style="padding-top: 100%; position: relative;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="search-item">
                    <div style="padding-top: 100%; position: relative;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="search-item">
                    <div style="padding-top: 100%; position: relative;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="search-item">
                    <div style="padding-top: 100%; position: relative;">
                        <div style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; display: flex; align-items: center; justify-content: center;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                <path d="M1.5 2A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13zm13 1a.5.5 0 0 1 .5.5v6l-3.775-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12v.54A.505.505 0 0 1 1 12.5v-9a.5.5 0 0 1 .5-.5h13z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile search toggle
            const searchIcon = document.getElementById('searchIcon');
            const mobileSearchContainer = document.getElementById('mobileSearchContainer');
            
            searchIcon.addEventListener('click', function() {
                if (window.innerWidth < 768) {
                    if (mobileSearchContainer.style.display === 'none' || mobileSearchContainer.style.display === '') {
                        mobileSearchContainer.style.display = 'block';
                        document.getElementById('mobileSearch').focus();
                    } else {
                        mobileSearchContainer.style.display = 'none';
                    }
                } else {
                    document.getElementById('desktopSearch').focus();
                }
            });

            // Category navigation
            const categoryPills = document.querySelectorAll('.category-pill');
            categoryPills.forEach(pill => {
                pill.addEventListener('click', function() {
                    // Remove active class from all pills
                    categoryPills.forEach(p => p.classList.remove('active'));
                    // Add active class to clicked pill
                    this.classList.add('active');
                    
                    // Here you can add code to filter content based on selected category
                    const category = this.textContent;
                    console.log(`Category selected: ${category}`);
                    // Example: fetchCategoryContent(category);
                });
            });

            // Search functionality
            function handleSearch(searchTerm) {
                console.log(`Searching for: ${searchTerm}`);
                // Here you would typically make an AJAX call to your PHP backend
                // Example:
                // fetch('search.php?term=' + encodeURIComponent(searchTerm))
                //     .then(response => response.json())
                //     .then(data => {
                //         // Update your search results
                //         updateSearchResults(data);
                //     });
            }

            const desktopSearch = document.getElementById('desktopSearch');
            const mobileSearch = document.getElementById('mobileSearch');

            desktopSearch.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    handleSearch(this.value);
                }
            });

            mobileSearch.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    handleSearch(this.value);
                }
            });

            // Search button click event
            const searchButtons = document.querySelectorAll('.search-btn');
            searchButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const input = this.previousElementSibling;
                    handleSearch(input.value);
                });
            });
        });
    </script>
</body>
</html>


<?php
// search.php - Backend search handler for news website

// Database connection
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "horizon_db";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if ($conn->connect_error) {
        return [
            'status' => 'error',
            'message' => 'Connection failed: ' . $conn->connect_error
        ];
    }
    
    return $conn;
}

// Search articles function
function searchArticles($searchTerm, $category = 'All') {
    $conn = connectDB();
    
    if (!is_object($conn)) {
        return $conn; // Return error if connection failed
    }
    
    // Sanitize inputs
    $search = $conn->real_escape_string($searchTerm);
    $cat = $conn->real_escape_string($category);
    
    // Build query
    $query = "SELECT id, title, summary, image_url, category, published_date FROM articles WHERE 1=1";
    
    if (!empty($search)) {
        $query .= " AND (title LIKE '%$search%' OR content LIKE '%$search%' OR summary LIKE '%$search%')";
    }
    
    if (!empty($cat) && $cat != 'All') {
        $query .= " AND category = '$cat'";
    }
    
    $query .= " ORDER BY published_date DESC LIMIT 20";
    
    // Execute query
    $result = $conn->query($query);
    
    $articles = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $articles[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'summary' => $row['summary'],
                'image_url' => $row['image_url'],
                'category' => $row['category'],
                'published_date' => $row['published_date']
            ];
        }
    }
    
    $conn->close();
    
    return [
        'status' => 'success',
        'count' => count($articles),
        'results' => $articles
    ];
}

// Top searches function (for "Top Search" section)
function getTopSearches() {
    $conn = connectDB();
    
    if (!is_object($conn)) {
        return $conn; // Return error if connection failed
    }
    
    // Get most viewed or trending articles
    $query = "SELECT id, title, image_url, category FROM articles 
              ORDER BY view_count DESC LIMIT 6";
    
    $result = $conn->query($query);
    
    $topArticles = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $topArticles[] = [
                'id' => $row['id'],
                'title' => $row['title'],
                'image_url' => $row['image_url'],
                'category' => $row['category']
            ];
        }
    }
    
    $conn->close();
    
    return [
        'status' => 'success',
        'count' => count($topArticles),
        'results' => $topArticles
    ];
}

// Handle AJAX request
header('Content-Type: application/json');

if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case 'search':
            $term = isset($_GET['term']) ? $_GET['term'] : '';
            $category = isset($_GET['category']) ? $_GET['category'] : 'All';
            echo json_encode(searchArticles($term, $category));
            break;
            
        case 'top_searches':
            echo json_encode(getTopSearches());
            break;
            
        default:
            echo json_encode([
                'status' => 'error',
                'message' => 'Invalid action specified'
            ]);
    }
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No action specified'
    ]);
}
?>