<?php
// Set page title
$pageTitle = "Watch - Horizon Videos";
$currentPage = "videos";

// Include header (navigation) file
// Assuming you've extracted the header part of the previous code into header.php
include_once('header.php');
?>

<div class="container mt-4">
    <h1 class="mb-4">Watch Horizon Videos</h1>
    
    <!-- Featured Video Section -->
    <div class="row mb-5">
        <div class="col-lg-8">
            <div class="ratio ratio-16x9 mb-3">
                <iframe src="https://www.youtube.com/embed/eQnRMHc0CnQ?si=XyX6VzNFoQZ1tWce" title="Featured Video" allowfullscreen></iframe>
            </div>
            <h3>Global Climate Summit 2025: Key Takeaways</h3>
            <p class="text-muted">Published April 7, 2025 · 15:42</p>
            <p>Our environmental correspondent breaks down the most important outcomes from this year's Global Climate Summit and what they mean for international climate policy moving forward.</p>
        </div>
        <div class="col-lg-4">
            <h4 class="mb-3">Trending Videos</h4>
            <div class="list-group">
                <a href="https://www.youtube.com/embed/NB9K4CoYSIM?si=P-6DwDSgJ_RsLjsy" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">Tech Review: New Quantum Computing Breakthrough</h6>
                        <small>8:24</small>
                    </div>
                    <small class="text-muted">3 days ago</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">Interview: Finance Minister on Economic Outlook</h6>
                        <small>12:05</small>
                    </div>
                    <small class="text-muted">1 week ago</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">Sports Analysis: Championship Series Preview</h6>
                        <small>5:38</small>
                    </div>
                    <small class="text-muted">2 days ago</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1">Health Focus: New Medical Research Findings</h6>
                        <small>10:47</small>
                    </div>
                    <small class="text-muted">5 days ago</small>
                </a>
            </div>
        </div>
    </div>
    
    <!-- Video Categories -->
    <div class="mb-4">
        <ul class="nav nav-pills mb-3" id="video-categories" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="latest-tab" data-bs-toggle="pill" data-bs-target="#latest" type="button" role="tab" aria-controls="latest" aria-selected="true">Latest</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="news-tab" data-bs-toggle="pill" data-bs-target="#news" type="button" role="tab" aria-controls="news" aria-selected="false">News</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="interviews-tab" data-bs-toggle="pill" data-bs-target="#interviews" type="button" role="tab" aria-controls="interviews" aria-selected="false">Interviews</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="documentaries-tab" data-bs-toggle="pill" data-bs-target="#documentaries" type="button" role="tab" aria-controls="documentaries" aria-selected="false">Documentaries</button>
            </li>
        </ul>
        
        <div class="tab-content" id="video-categoriesContent">
            <!-- Latest Videos Tab -->
            <div class="tab-pane fade show active" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                <div class="row">
                    <?php
                    // In a real application, you would fetch videos from a database
                    // This is a static example
                    $latestVideos = [
                        ['id' => 1, 'title' => 'Breaking: Major Policy Announcement', 'duration' => '8:35', 'thumbnail' => 'https://via.placeholder.com/300x169', 'date' => 'Today'],
                        ['id' => 2, 'title' => 'Tech Review: Latest Smartphone Comparison', 'duration' => '12:47', 'thumbnail' => 'https://via.placeholder.com/300x169', 'date' => 'Yesterday'],
                        ['id' => 3, 'title' => 'Financial Markets: Weekly Update', 'duration' => '10:15', 'thumbnail' => 'https://via.placeholder.com/300x169', 'date' => '2 days ago'],
                        ['id' => 4, 'title' => 'Science Breakthrough: New Energy Solution', 'duration' => '15:28', 'thumbnail' => 'https://via.placeholder.com/300x169', 'date' => '3 days ago'],
                        ['id' => 5, 'title' => 'Cultural Spotlight: Art Exhibition Opening', 'duration' => '7:19', 'thumbnail' => 'https://via.placeholder.com/300x169', 'date' => '4 days ago'],
                        ['id' => 6, 'title' => 'Sports Analysis: Weekend Results', 'duration' => '14:03', 'thumbnail' => 'https://via.placeholder.com/300x169', 'date' => '5 days ago'],
                    ];
                    
                    foreach ($latestVideos as $video) {

                        $articleUrl = "videos.php?id=1" . $video['id'];

                        echo '<div class="col-md-4 mb-4">
                        <div class="card h-100">
                            <a href="' . $articleUrl . '" class="text-decoration-none">
                                <div class="position-relative">
                                    <img src="' . $video['thumbnail'] . '" class="card-img-top" alt="' . $video['title'] . '">
                                    <span class="position-absolute bottom-0 end-0 bg-dark text-white px-2 py-1 m-2 rounded">' . $video['duration'] . '</span>
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title text-dark">' . $video['title'] . '</h5>
                                    <p class="card-text"><small class="text-muted">Published ' . $video['date'] . '</small></p>
                                </div>
                            </a>
                        </div>
                    </div>';
                    }
                    ?>
                </div>
            </div>
            
            <!-- Other tabs would be populated similarly with database content -->
            <div class="tab-pane fade" id="news" role="tabpanel" aria-labelledby="news-tab">
                <div class="alert alert-info">News videos would be displayed here.</div>
            </div>
            <div class="tab-pane fade" id="interviews" role="tabpanel" aria-labelledby="interviews-tab">
                <div class="alert alert-info">Interview videos would be displayed here.</div>
            </div>
            <div class="tab-pane fade" id="documentaries" role="tabpanel" aria-labelledby="documentaries-tab">
                <div class="alert alert-info">Documentary videos would be displayed here.</div>
            </div>
        </div>
    </div>
    
    <!-- Load More Button -->
    <div class="text-center mb-5">
        <button class="btn btn-outline-primary px-4 py-2">Load More Videos</button>
    </div>
</div>

<!-- Custom CSS for this page -->
<style>
    .video-item {
        transition: transform 0.3s ease;
    }
    
    .video-item:hover {
        transform: translateY(-5px);
    }
    
    .nav-pills .nav-link {
        color: #6c5b7b;
        border-radius: 50px;
        padding: 8px 20px;
        margin-right: 10px;
    }
    
    .nav-pills .nav-link.active {
        background-color: #6c5b7b;
    }
</style>

<?php
// Include footer file
// Assuming you've extracted the footer part into footer.php
include_once('footer.php');
?>