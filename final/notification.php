<?php
// Start session
session_start();

// Database connection
function connectDB() {
    $servername = "localhost";
    $username = "root";
    $password = ""; // default XAMPP password is empty
    $dbname = "horizon_db";
    
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    return $conn;
}

// Helper function to convert timestamp to "time ago" format
function timeAgo($timestamp) {
    $time = strtotime($timestamp);
    $current = time();
    $diff = $current - $time;
    
    if ($diff < 60) {
        return 'just now';
    } elseif ($diff < 3600) {
        $minutes = floor($diff / 60);
        return $minutes . ' minute' . ($minutes > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 86400) {
        $hours = floor($diff / 3600);
        return $hours . ' hour' . ($hours > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 172800) {
        return 'Yesterday';
    } elseif ($diff < 604800) {
        $days = floor($diff / 86400);
        return $days . ' day' . ($days > 1 ? 's' : '') . ' ago';
    } elseif ($diff < 2592000) {
        $weeks = floor($diff / 604800);
        return $weeks . ' week' . ($weeks > 1 ? 's' : '') . ' ago';
    } else {
        return date('M d, Y', $time);
    }
}

// Get user ID (in a real app, this would come from your authentication system)
$userId = $_SESSION['user_id'] ?? 1; // Default to user ID 1 for demonstration

// Get notifications
$conn = connectDB();

// Query for unread notifications
$unreadQuery = "SELECT n.*, a.title as article_title, a.summary, a.image_url, a.slug 
               FROM notifications n
               JOIN articles a ON n.article_id = a.id
               WHERE n.user_id = ? AND n.read_status = 0
               ORDER BY n.created_at DESC";
               
// Query for read notifications
$readQuery = "SELECT n.*, a.title as article_title, a.summary, a.image_url, a.slug 
             FROM notifications n
             JOIN articles a ON n.article_id = a.id
             WHERE n.user_id = ? AND n.read_status = 1
             ORDER BY n.created_at DESC
             LIMIT 10"; // Limiting to 10 read notifications

// Prepare and execute unread notifications query
$unreadStmt = $conn->prepare($unreadQuery);
$unreadStmt->bind_param("i", $userId);
$unreadStmt->execute();
$unreadResult = $unreadStmt->get_result();

// Prepare and execute read notifications query
$readStmt = $conn->prepare($readQuery);
$readStmt->bind_param("i", $userId);
$readStmt->execute();
$readResult = $readStmt->get_result();

// Count unread notifications
$unreadCount = $unreadResult->num_rows;

// Get categories
$categoriesQuery = "SELECT * FROM categories ORDER BY name ASC";
$categoriesResult = $conn->query($categoriesQuery);
$categories = [];
while ($row = $categoriesResult->fetch_assoc()) {
    $categories[] = $row;
}
?>

<?php
// Set page title
$pageTitle = "Horizon";
$currentPage = "Home";

// Include header (navigation) file
// Assuming you've extracted the header part of the previous code into header.php
include_once('header.php');
?>

    <style>
        .notifications-container {
            background-color:rgba(200, 181, 202, 0.86);
            border-radius: 15px;
            padding: 20px;
            margin-top: 20px;
        }
        
        .section-title {
            font-weight: bold;
            margin-bottom: 15px;
            color: #333;
        }
        
        .notification-item {
            background-color: #f2f0e6;
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        .notification-item:hover {
            background-color: #e8e5d8;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .notification-img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            border-radius: 8px;
            margin-right: 15px;
        }
        
        .notification-content {
            flex-grow: 1;
        }
        
        .notification-title {
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .notification-text {
            color: #666;
            font-size: 14px;
        }
        
        .notification-time {
            color: #999;
            font-size: 12px;
        }
        
        .icon-container {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .date-display {
            color: #666;
            font-size: 14px;
        }
        
        .search-icon, .profile-icon, .bell-icon {
            font-size: 18px;
            color: #555;
            cursor: pointer;
        }
        
        .mark-all-read {
            color: #6c5ce7;
            font-size: 14px;
            text-decoration: none;
            cursor: pointer;
        }
        
        .mark-all-read:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .nav-pills .nav-link {
                margin: 5px 2px;
                font-size: 12px;
                padding: 5px 10px;
            }
            
            .notifications-container {
                padding: 15px;
            }
        }
    </style>


    <!-- Notifications -->
    <div class="container">
        <div class="notifications-container">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="section-title m-0">UPDATES</h2>
                <a class="mark-all-read">Mark all as read</a>
            </div>
            
            <!-- Unread Notifications -->
            <div class="notification-item">
                <img src="images/news1.jpg" class="notification-img" alt="News Image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'50\' height=\'50\'><rect width=\'50\' height=\'50\' fill=\'%23cccccc\' /><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' fill=\'%23666666\'>IMG</text></svg>'">
                <div class="notification-content">
                    <h5 class="notification-title">Major Economic Policy Shift Announced</h5>
                    <p class="notification-text">The government has unveiled a new economic strategy aimed at boosting growth in key sectors...</p>
                    <small class="notification-time">2 hours ago</small>
                </div>
            </div>
            
            <div class="notification-item">
                <img src="images/news2.jpg" class="notification-img" alt="News Image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'50\' height=\'50\'><rect width=\'50\' height=\'50\' fill=\'%23cccccc\' /><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' fill=\'%23666666\'>IMG</text></svg>'">
                <div class="notification-content">
                    <h5 class="notification-title">Breakthrough in Renewable Energy Technology</h5>
                    <p class="notification-text">Scientists have developed a new solar panel material that increases efficiency by 40%...</p>
                    <small class="notification-time">5 hours ago</small>
                </div>
            </div>
            
            <div class="notification-item">
                <img src="images/news3.jpg" class="notification-img" alt="News Image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'50\' height=\'50\'><rect width=\'50\' height=\'50\' fill=\'%23cccccc\' /><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' fill=\'%23666666\'>IMG</text></svg>'">
                <div class="notification-content">
                    <h5 class="notification-title">Global Summit on Climate Change Begins</h5>
                    <p class="notification-text">Leaders from 150 countries are meeting to discuss urgent action on climate change...</p>
                    <small class="notification-time">8 hours ago</small>
                </div>
            </div>
            
            <div class="notification-item">
                <img src="images/news4.jpg" class="notification-img" alt="News Image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'50\' height=\'50\'><rect width=\'50\' height=\'50\' fill=\'%23cccccc\' /><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' fill=\'%23666666\'>IMG</text></svg>'">
                <div class="notification-content">
                    <h5 class="notification-title">Major Sports League Announces Expansion</h5>
                    <p class="notification-text">Three new teams will join the league starting next season, marking the biggest expansion in decades...</p>
                    <small class="notification-time">12 hours ago</small>
                </div>
            </div>
            
            <h2 class="section-title mt-5 mb-3">SEEN</h2>
            
            <!-- Read Notifications -->
            <div class="notification-item" style="opacity: 0.7;">
                <img src="images/news5.jpg" class="notification-img" alt="News Image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'50\' height=\'50\'><rect width=\'50\' height=\'50\' fill=\'%23cccccc\' /><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' fill=\'%23666666\'>IMG</text></svg>'">
                <div class="notification-content">
                    <h5 class="notification-title">Tech Giant Unveils Revolutionary AI Platform</h5>
                    <p class="notification-text">The new system promises to transform how businesses handle data processing and analytics...</p>
                    <small class="notification-time">Yesterday</small>
                </div>
            </div>
            
            <div class="notification-item" style="opacity: 0.7;">
                <img src="images/news6.jpg" class="notification-img" alt="News Image" onerror="this.src='data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'50\' height=\'50\'><rect width=\'50\' height=\'50\' fill=\'%23cccccc\' /><text x=\'50%\' y=\'50%\' dominant-baseline=\'middle\' text-anchor=\'middle\' fill=\'%23666666\'>IMG</text></svg>'">
                <div class="notification-content">
                    <h5 class="notification-title">Historic Peace Agreement Signed</h5>
                    <p class="notification-text">After decades of conflict, the two nations have agreed to a comprehensive peace treaty...</p>
                    <small class="notification-time">2 days ago</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Mark all as read functionality
        document.querySelector('.mark-all-read')?.addEventListener('click', function() {
            fetch('mark_all_read.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    action: 'mark_all_read'
                }),
                credentials: 'same-origin'
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Update UI to show all notifications as read
                    const unreadNotifications = document.querySelectorAll('.notification-item:not([style*="opacity"])');
                    unreadNotifications.forEach(notification => {
                        notification.style.opacity = '0.7';
                    });
                    
                    // Remove the notification badge
                    const badge = document.querySelector('.badge');
                    if (badge) {
                        badge.style.display = 'none';
                    }
                    
                    // Hide the "Mark all as read" button
                    document.querySelector('.mark-all-read').style.display = 'none';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
        
        // Mark individual notification as read and navigate to article
        document.querySelectorAll('.notification-item').forEach(item => {
            item.addEventListener('click', function() {
                const notificationId = this.dataset.id;
                const articleSlug = this.dataset.articleSlug;
                
                // Mark as read if it's not already read
                if (!this.style.opacity) {
                    fetch('mark_notification_read.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            notification_id: notificationId
                        }),
                        credentials: 'same-origin'
                    });
                }
                
                // Navigate to the article page
                window.location.href = 'article.php?slug=' + articleSlug;
            });
        });
    </script>

<?php
    include_once('footer.php');
?>


<?php
// Close database connection
$conn->close();
?>