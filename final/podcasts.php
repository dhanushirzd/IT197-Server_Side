<?php
// Set page title
$pageTitle = "Listen - Horizon Podcasts";
$currentPage = "podcasts";

// Include header (navigation) file
include_once('header.php');
?>

<div class="container mt-4">
    <h1 class="mb-4">Listen to Horizon Podcasts</h1>
    
    <!-- Featured Podcast Section -->
    <div class="card mb-5 podcast-featured">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="Images/Podcastimg01.jpg" class="img-fluid rounded-start" alt="Featured Podcast">
            </div>
            <div class="col-md-8">
                <div class="card-body"><br>
                    <span class="podcast-category">Latest Episode</span>
                    <h3 class="card-title">The Global Perspective</h3>
                    <h5 class="text-muted mb-3">Episode 42: The Future of International Trade</h5>
                    <p class="card-text">In this week's episode, we explore how recent geopolitical shifts are reshaping global trade patterns, with expert insights from leading economists and trade negotiators.</p>
                    <div class="d-flex align-items-center mb-3">
                        <div class="audio-player">
                            <audio controls class="w-100">
                                <source src="Podcast/KPMGi_Davos_AI_Podcast_20250206_1_7wtb6.mp3" type="audio/mpeg">
                            </audio>
                        </div>
                    </div>
                    <p class="card-text"><small class="text-muted">Released: April 5, 2025 · 35:42</small></p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Podcast Series -->
    <h3 class="mb-3">Our Podcast Series</h3>
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        <?php
        // In a real application, these would come from a database
        $podcastSeries = [
            [
                'title' => 'The Global Perspective',
                'description' => 'Weekly analysis of international affairs and geopolitical trends',
                'episodes' => 42,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'title' => 'Tech Decoded',
                'description' => 'Breaking down complex technology topics with industry experts',
                'episodes' => 38,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'title' => 'Market Insights',
                'description' => 'Financial analysis and business strategy discussions',
                'episodes' => 52,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'title' => 'Science Today',
                'description' => 'Latest breakthroughs and discoveries in scientific research',
                'episodes' => 25,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'title' => 'Cultural Dialogues',
                'description' => 'Conversations about arts, literature, and social trends',
                'episodes' => 31,
                'image' => 'https://via.placeholder.com/300x300'
            ],
            [
                'title' => 'Health Matters',
                'description' => 'Medical research and healthcare policy discussions',
                'episodes' => 17,
                'image' => 'https://via.placeholder.com/300x300'
            ]
        ];
        
        foreach ($podcastSeries as $podcast) {
            echo '<div class="col">
                    <div class="card h-100 podcast-card">
                        <img src="' . $podcast['image'] . '" class="card-img-top" alt="' . $podcast['title'] . '">
                        <div class="card-body">
                            <h5 class="card-title">' . $podcast['title'] . '</h5>
                            <p class="card-text">' . $podcast['description'] . '</p>
                        </div>
                        <div class="card-footer bg-transparent">
                            <small class="text-muted">' . $podcast['episodes'] . ' Episodes</small>
                            <a href="#" class="btn btn-sm btn-outline-primary float-end">Listen</a>
                        </div>
                    </div>
                </div>';
        }
        ?>
    </div>
    
    <!-- Latest Episodes -->
    <h3 class="mb-3">Latest Episodes</h3>
    <div class="list-group mb-5">
        <?php
        // In a real application, these would come from a database
        $latestEpisodes = [
            [
                'series' => 'Tech Decoded',
                'title' => 'The Rise of Quantum Computing',
                'date' => 'April 3, 2025',
                'duration' => '42:18'
            ],
            [
                'series' => 'Market Insights',
                'title' => 'Q2 Economic Outlook',
                'date' => 'April 1, 2025',
                'duration' => '38:45'
            ],
            [
                'series' => 'Cultural Dialogues',
                'title' => 'Modern Literature Movements',
                'date' => 'March 30, 2025',
                'duration' => '51:22'
            ],
            [
                'series' => 'Science Today',
                'title' => 'Breakthroughs in Renewable Energy',
                'date' => 'March 28, 2025',
                'duration' => '35:09'
            ],
            [
                'series' => 'Health Matters',
                'title' => 'Advances in Preventive Medicine',
                'date' => 'March 25, 2025',
                'duration' => '44:56'
            ]
        ];
        
        foreach ($latestEpisodes as $episode) {
            echo '<a href="#" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between align-items-center">
                        <div>
                            <span class="badge bg-secondary me-2">' . $episode['series'] . '</span>
                            <h5 class="mb-1 d-inline">' . $episode['title'] . '</h5>
                        </div>
                        <div class="text-end">
                            <small class="text-muted">' . $episode['duration'] . '</small>
                            <br>
                            <small class="text-muted">' . $episode['date'] . '</small>
                        </div>
                    </div>
                </a>';
        }
        ?>
    </div>
    
    <!-- Subscribe Section -->
    <div class="card bg-light mb-5">
        <div class="card-body text-center p-4">
            <h4 class="mb-3">Never Miss an Episode</h4>
            <p>Subscribe to our podcast newsletter and get notified when new episodes are released.</p>
            <form class="row g-3 justify-content-center">
                <div class="col-md-6">
                    <input type="email" class="form-control" id="emailSubscribe" placeholder="Your email address">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Subscribe</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Custom CSS for this page -->
<style>
    .podcast-category {
            display: inline-block;
            padding: 4px 10px;
            background-color: var(--primary-very-light);
            color: var(--primary-dark);
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 10px;
        }

    .podcast-featured {
        border: none;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    
    .podcast-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: none;
        box-shadow: 0 2px 8px rgba(0,0,0,0.06);
    }
    
    .podcast-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0,0,0,0.1);
    }
    
    .audio-player {
        width: 100%;
    }
    
    audio {
        border-radius: 30px;
        height: 40px;
    }
    
    audio::-webkit-media-controls-panel {
        background-color: #f8f9fa;
    }
    
    .podcast-links {
        margin-top: 15px;
    }
</style>

<?php
// Include footer file
include_once('footer.php');
?>