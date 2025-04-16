<?php
// Set page title
$pageTitle = "Horizon";
$currentPage = "Home";

include_once('header.php');
?>

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

        .content-wrapper {
            flex: 1;
        }

        .header {
            padding: 100px 0;
            color: white;
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            overflow: hidden; /* Ensures images don't overflow the header */
        }

        .header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            animation: backgroundCycle 30s infinite; /* Cycle through images */
            z-index: 0; /* Ensure it stays behind the content */
            opacity: 0.7p{}; /* Adjust transparency */
        }

        @keyframes backgroundCycle {
            0% {
                background-image: url('Images/newss.png'); 
            }
            33% {
                background-image: url('Images/neww2.png'); 
            }
            66% {
                background-image: url('Images/Purple color background image with news papers.jpg'); 
            }
            100% {
                background-image: url('Images/newss.png'); /* Loop back to first image */
            }
        }

        .header .container {
            position: relative;
            z-index: 1; /* Ensures content stays above the background images */
        }
        
        .card {
            border: none;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
            height: 100%;
        }
        
        .card:hover {
            transform: translateY(-5px);
        }
        
        .card-title {
            color: var(--primary-dark);
        }
        
        
        /* News Articles */
        .news-card {
            margin-bottom: 20px;
        }
        
        .news-image {
            height: 200px;
            object-fit: cover;
        }
        
        .news-category {
            display: inline-block;
            padding: 4px 10px;
            background-color: var(--primary-very-light);
            color: var(--primary-dark);
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 10px;
        }
        
        .news-date {
            font-size: 0.85rem;
            color: #777;
            margin-bottom: 10px;
            display: block;
        }
        
        .featured-news {
            padding: 20px;
            background-color: #f9f7fa;
            border-radius: 10px;
            margin-bottom: 30px;
        }
        
        .featured-news-image {
            height: 600px;
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        
        .section-heading {
            position: relative;
            padding-bottom: 10px;
            margin-bottom: 25px;
            color: var(--primary-dark);
        }
        
        .section-heading::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 80px;
            height: 3px;
            background-color: var(--primary);
        }

        .featured-news-image-medium {
            height: 300px;
            width: 100%;
            object-fit: cover;
            border-radius: 8px;
            margin-bottom: 20px;
        }

    /* Add these styles to your existing CSS */
    .article-actions {
        display: flex;
        align-items: center;
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }
    
    .article-action {
        display: flex;
        align-items: center;
        margin-right: 20px;
        color: #666;
        text-decoration: none;
        transition: color 0.2s;
        font-size: 0.9rem;
    }
    
    .article-action:hover {
        color: var(--primary);
    }
    
    .article-action i {
        margin-right: 5px;
        font-size: 1.1rem;
    }
    
    .comments-count {
        background-color: var(--primary-very-light);
        color: var(--primary-dark);
        border-radius: 20px;
        padding: 2px 8px;
        font-size: 0.8rem;
        margin-left: 5px;
    }
    
    /* Modal styles for share options */
    .share-modal-header {
        background-color: var(--primary);
        color: white;
    }
    
    .share-option {
        display: inline-block;
        text-align: center;
        margin: 10px;
        transition: transform 0.2s;
    }
    
    .share-option:hover {
        transform: scale(1.1);
    }
    
    .share-option i {
        font-size: 2rem;
        width: 50px;
        height: 50px;
        line-height: 50px;
        border-radius: 50%;
        color: white;
        margin-bottom: 5px;
    }
    
    .share-option span {
        display: block;
        font-size: 0.8rem;
    }
    
    .facebook-bg { background-color: #3b5998; }
    .twitter-bg { background-color: #1da1f2; }
    .linkedin-bg { background-color: #0077b5; }
    .whatsapp-bg { background-color: #25d366; }
    .email-bg { background-color: #7e7e7e; }
    .copy-bg { background-color: #333333; }
    </style>

        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Hero Header -->
            <header class="header">
                <div class="container">
                    <h1><span class="horizon-title"> HORIZON </span></h1>
                    <p class="lead">Stay informed with the latest news and updates</p>
                    <a href="#Newsletter Subscription"><button class="btn btn-light btn-lg mt-3">Subscribe Now</button></a>
                </div>
            </header>

            <!-- featured news-->
            <div class="container"><br>
            <h2 class="section-heading">Top Featured Stories</h2>    
            <div class="featured-news">
                <h3 class="section-heading">Featured Technology</h3>
                <img src="Images/Featured story img.jpg" alt="Featured News" class="featured-news-image">
                <span class="news-category">Technology</span>
                <h4 style="color: var(--primary-dark);">New Quantum Computing Breakthrough Could Revolutionize Data Processing</h4>
                <span class="news-date"><i class="bi bi-calendar3"></i> March 15, 2025</span>
                <p>Scientists have achieved a significant breakthrough in quantum computing technology, potentially enabling processing speeds hundreds of times faster than current supercomputers. The development could transform industries from healthcare to finance.</p>
                <p>The new quantum processor, developed by researchers at the Institute for Advanced Computing, successfully maintained quantum coherence for over 3 minutes - a dramatic improvement over previous records of just a few seconds.</p>
                <a href="#" class="btn btn-primary">Read Full Story</a>
                
                <div class="article-actions">
                    <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                        <i class="bi bi-headphones"></i> Listen
                    </a>
                    <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                        <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">42</span>
                    </a>
                    <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                        <i class="bi bi-share"></i> Share
                    </a>
                </div>
            </div>

            <!-- Additional Featured Stories - Row -->
            <div class="row mb-5">
                    <!-- Featured Story 2 -->
                    <div class="col-md-6">
                        <div class="featured-news">
                            <h3 class="section-heading">Featured Environment</h3>
                            <img src="Images/Featured climate.png" alt="Climate Summit" class="featured-news-image-medium">
                            <span class="news-category">Environment</span>
                            <h4 style="color: var(--primary-dark);">Historic Climate Summit Results in Landmark Global Agreement</h4>
                            <span class="news-date"><i class="bi bi-calendar3"></i> April 8, 2025</span>
                            <p>Over 190 nations have signed a groundbreaking climate accord that commits to carbon neutrality by 2040. The agreement includes unprecedented funding for renewable energy in developing nations and strict emission standards for industrialized countries.</p>
                            <a href="#" class="btn btn-primary">Read Full Story</a>
                            
                            <div class="article-actions">
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                    <i class="bi bi-headphones"></i> Listen
                                </a>
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                    <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">38</span>
                                </a>
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                    <i class="bi bi-share"></i> Share
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Featured Story 3 -->
                    <div class="col-md-6">
                        <div class="featured-news">
                            <h3 class="section-heading">Featured Health</h3>
                            <img src="Images/Medical.jpg" alt="Medical Breakthrough" class="featured-news-image-medium">
                            <span class="news-category">Health</span>
                            <h4 style="color: var(--primary-dark);">Revolutionary Gene Therapy Cures Rare Genetic Disease in Clinical Trial</h4>
                            <span class="news-date"><i class="bi bi-calendar3"></i> April 9, 2025</span>
                            <p>In a landmark medical achievement, researchers have successfully treated a previously incurable genetic disorder using a revolutionary CRISPR-based gene therapy. All 17 patients in the trial showed complete remission.</p>
                            <a href="#" class="btn btn-primary">Read Full Story</a>
                            
                            <div class="article-actions">
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                    <i class="bi bi-headphones"></i> Listen
                                </a>
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                    <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">29</span>
                                </a>
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                    <i class="bi bi-share"></i> Share
                                </a>
                            </div>
                        </div>
                    </div>
                </div>


            <!-- Latest News -->
            <h2 class="section-heading">Latest News</h2>
            <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card news-card">
                    <img src="Images/Latest news01.jpg" class="card-img-top news-image" alt="News Image">
                    <div class="card-body">
                        <span class="news-category">Business</span>
                        <h5 class="card-title">Global Markets Reach All-Time High As Tech Sector Surges</h5>
                        <span class="news-date"><i class="bi bi-calendar3"></i> March 14, 2025</span>
                        <p class="card-text">Stock markets worldwide recorded unprecedented gains this week as technology companies reported stronger than expected earnings.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                        
                        <div class="article-actions">
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                <i class="bi bi-headphones"></i> Listen
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="bi bi-share"></i> Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="Images/Latest news02(01).jpg" class="card-img-top news-image" alt="News Image">
                            <div class="card-body">
                                <span class="news-category">Health</span>
                                <h5 class="card-title">New Treatment Shows Promise in Fighting Antibiotic Resistance</h5>
                                <span class="news-date"><i class="bi bi-calendar3"></i> March 13, 2025</span>
                                <p class="card-text">Researchers have developed a novel approach to combat antibiotic-resistant bacteria, potentially saving millions of lives annually.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>

                            <div class="article-actions">
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                <i class="bi bi-headphones"></i> Listen
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="bi bi-share"></i> Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="Images/Latest news03(01).jpg" class="card-img-top news-image" alt="News Image">
                            <div class="card-body">
                                <span class="news-category">Science</span>
                                <h5 class="card-title">Mars Mission Discovers Evidence of Ancient Water Systems</h5>
                                <span class="news-date"><i class="bi bi-calendar3"></i> March 12, 2025</span>
                                <p class="card-text">The latest Mars rover has uncovered complex water channel systems, suggesting the red planet once had flowing water sustaining life.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>
                                
                                <div class="article-actions">
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                    <i class="bi bi-headphones"></i> Listen
                                </a>
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                    <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                                </a>
                                <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                    <i class="bi bi-share"></i> Share
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="Images/Latest news04.jpg" class="card-img-top news-image" alt="News Image">
                            <div class="card-body">
                                <span class="news-category">Sports</span>
                                <h5 class="card-title">Olympic Committee Announces New Events for 2028 Games</h5>
                                <span class="news-date"><i class="bi bi-calendar3"></i> March 11, 2025</span>
                                <p class="card-text">Three new competitive sports will be added to the 2028 Olympic Games, including esports as an official medal event.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>

                                <div class="article-actions">
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                <i class="bi bi-headphones"></i> Listen
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="bi bi-share"></i> Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="Images/Latest news05(01).jpg" class="card-img-top news-image" alt="News Image">
                            <div class="card-body">
                                <span class="news-category">Entertainment</span>
                                <h5 class="card-title">Virtual Reality Film Festival Draws Record Attendance</h5>
                                <span class="news-date"><i class="bi bi-calendar3"></i> March 10, 2025</span>
                                <p class="card-text">Film enthusiasts from around the world participated in the first fully immersive virtual reality film festival experience.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>

                                <div class="article-actions">
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                <i class="bi bi-headphones"></i> Listen
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="bi bi-share"></i> Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>

                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card news-card">
                            <img src="Images/Latest news06.jpg" class="card-img-top news-image" alt="News Image">
                            <div class="card-body">
                                <span class="news-category">Politics</span>
                                <h5 class="card-title">International Climate Agreement Reaches Major Milestone</h5>
                                <span class="news-date"><i class="bi bi-calendar3"></i> March 9, 2025</span>
                                <p class="card-text">Over 190 countries have reached consensus on ambitious carbon reduction targets scheduled to take effect next year.</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>

                                <div class="article-actions">
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                <i class="bi bi-headphones"></i> Listen
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                            </a>
                            <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                <i class="bi bi-share"></i> Share
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
                <!-- Editor's Picks -->
                <h2 class="section-heading mt-5">Editor's Picks</h2>
                <div class="row">
                    <div class="col-lg-6 mb-4">
                        <div class="card news-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="Images/solar.jpg" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="News Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <span class="news-category">World</span>
                                        <h5 class="card-title">Renewable Energy Now Primary Power Source in Five Countries</h5>
                                        <span class="news-date"><i class="bi bi-calendar3"></i> March 8, 2025</span>
                                        <p class="card-text">Five nations have now successfully transitioned to primarily renewable energy sources, setting new standards for sustainability.</p>
                                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>

                                        <div class="article-actions">
                                        <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                            <i class="bi bi-headphones"></i> Listen
                                        </a>
                                        <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                            <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                                        </a>
                                        <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                            <i class="bi bi-share"></i> Share
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <div class="card news-card">
                            <div class="row g-0">
                                <div class="col-md-4">
                                    <img src="Images/epic.jpg" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="News Image">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <span class="news-category">Technology</span>
                                        <h5 class="card-title">New AI System Can Translate Animal Communications</h5>
                                        <span class="news-date"><i class="bi bi-calendar3"></i> March 7, 2025</span>
                                        <p class="card-text">Researchers have developed an AI that can interpret and translate communications from several mammal species.</p>
                                        <a href="#" class="btn btn-sm btn-outline-primary">Read More</a>

                                        <div class="article-actions">
                                        <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#listenModal">
                                            <i class="bi bi-headphones"></i> Listen
                                        </a>
                                        <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#commentsModal">
                                            <i class="bi bi-chat-left-text"></i> Comments <span class="comments-count">16</span>
                                        </a>
                                        <a href="#" class="article-action" data-bs-toggle="modal" data-bs-target="#shareModal">
                                            <i class="bi bi-share"></i> Share
                                        </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <!-- Newsletter Subscription -->
            <div class="mt-5 p-4 bg-light rounded-3" id="Newsletter Subscription">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h3 style="color: var(--primary-dark);">Stay Updated</h3>
                            <p>Subscribe to our newsletter to receive the latest news updates directly in your inbox.</p>
                        </div>
                        <div class="col-md-6">
                            <div class="input-group">
                                <input type="email" class="form-control" placeholder="Enter your email address">
                                <button class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        include_once('footer.php');
        ?>

        <!-- Listen Modal -->
        <div class="modal fade" id="listenModal" tabindex="-1" aria-labelledby="listenModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: var(--primary); color: white;">
                        <h5 class="modal-title" id="listenModalLabel">Listen to Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <i class="bi bi-soundwave" style="font-size: 3rem; color: var(--primary);"></i>
                        <h5 class="mt-3">Audio Player</h5>
                        <div class="mt-3">
                            <div class="progress mb-3" style="height: 5px;">
                                <div class="progress-bar" role="progressbar" style="width: 25%; background-color: var(--primary);" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <small>0:53</small>
                                <small>3:45</small>
                            </div>
                        </div>
                        <div class="mt-4">
                            <button class="btn btn-sm btn-light mx-1"><i class="bi bi-skip-backward"></i></button>
                            <button class="btn btn-sm btn-light mx-1"><i class="bi bi-rewind"></i></button>
                            <button class="btn btn-primary mx-1"><i class="bi bi-pause"></i></button>
                            <button class="btn btn-sm btn-light mx-1"><i class="bi bi-fast-forward"></i></button>
                            <button class="btn btn-sm btn-light mx-1"><i class="bi bi-skip-forward"></i></button>
                        </div>
                        <div class="mt-4">
                            <span class="me-3">Speed:</span>
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-outline-secondary">0.5x</button>
                                <button type="button" class="btn btn-sm btn-primary">1x</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">1.5x</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">2x</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Download Audio</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Share Modal -->
        <div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header share-modal-header">
                        <h5 class="modal-title" id="shareModalLabel">Share This Article</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <div class="share-option">
                            <i class="bi bi-facebook facebook-bg"></i>
                            <span>Facebook</span>
                        </div>
                        <div class="share-option">
                            <i class="bi bi-twitter twitter-bg"></i>
                            <span>Twitter</span>
                        </div>
                        <div class="share-option">
                            <i class="bi bi-linkedin linkedin-bg"></i>
                            <span>LinkedIn</span>
                        </div>
                        <div class="share-option">
                            <i class="bi bi-whatsapp whatsapp-bg"></i>
                            <span>WhatsApp</span>
                        </div>
                        <div class="share-option">
                            <i class="bi bi-envelope email-bg"></i>
                            <span>Email</span>
                        </div>
                        <div class="share-option">
                            <i class="bi bi-link-45deg copy-bg"></i>
                            <span>Copy Link</span>
                        </div>
                        
                        <div class="mt-4">
                            <div class="input-group">
                                <input type="text" class="form-control" value="https://yournews.com/article/quantum-computing-breakthrough" readonly>
                                <button class="btn btn-outline-secondary" type="button">Copy</button>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Comments Modal -->
        <div class="modal fade" id="commentsModal" tabindex="-1" aria-labelledby="commentsModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                    <div class="modal-header" style="background-color: var(--primary); color: white;">
                        <h5 class="modal-title" id="commentsModalLabel">Comments</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-4">
                            <h6>Add a comment</h6>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="commentTextarea" style="height: 100px"></textarea>
                                <label for="commentTextarea">Your comment</label>
                            </div>
                            <button class="btn btn-primary">Post Comment</button>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex mb-4">
                            <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                            <div>
                                <h6>Sarah Johnson <small class="text-muted">2 hours ago</small></h6>
                                <p>This is a remarkable breakthrough! I wonder how long it will take for this technology to become commercially available.</p>
                                <div>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-up"></i> 12</a>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-down"></i> 2</a>
                                    <a href="#" class="text-decoration-none">Reply</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                            <div>
                                <h6>Michael Chen <small class="text-muted">5 hours ago</small></h6>
                                <p>As someone working in the field, I can say this is a genuine game-changer. The implications for cryptography and drug discovery alone are enormous.</p>
                                <div>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-up"></i> 28</a>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-down"></i> 0</a>
                                    <a href="#" class="text-decoration-none">Reply</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="ms-5 d-flex mb-4">
                            <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                            <div>
                                <h6>Emma Davis <small class="text-muted">3 hours ago</small></h6>
                                <p>@Michael Chen - Could you elaborate on how this might affect current encryption standards? I'm worried about data security implications.</p>
                                <div>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-up"></i> 7</a>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-down"></i> 1</a>
                                    <a href="#" class="text-decoration-none">Reply</a>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex mb-4">
                            <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                            <div>
                                <h6>Alex Thompson <small class="text-muted">1 day ago</small></h6>
                                <p>I'm skeptical about the practical applications at this stage. We've seen similar announcements in the past that didn't pan out commercially.</p>
                                <div>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-up"></i> 4</a>
                                    <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-down"></i> 9</a>
                                    <a href="#" class="text-decoration-none">Reply</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="loadMoreComments">Load More Comments</button>
                    </div>
                </div>
            </div>
        </div>

         <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js">
    </script>
         
    <script>
        //JavaScript to handle comment functionality
    document.addEventListener('DOMContentLoaded', function() {
        // Reference to the comment posting button
        const postCommentBtn = document.querySelector('.modal-body .btn-primary');
        const commentTextarea = document.getElementById('commentTextarea');
        
        // Event listener for posting a comment
        postCommentBtn.addEventListener('click', function() {
            const commentText = commentTextarea.value.trim();
            if (commentText) {
                // Create new comment element
                const newComment = createCommentElement('Current User', 'Just now', commentText);
                
                // Insert after the comment form
                const hr = document.querySelector('.modal-body hr');
                hr.parentNode.insertBefore(newComment, hr.nextSibling);
                
                // Clear the textarea
                commentTextarea.value = '';
            }
        });
        
        // Function to create a new comment element
        function createCommentElement(username, timeAgo, commentText) {
            const commentDiv = document.createElement('div');
            commentDiv.className = 'd-flex mb-4';
            commentDiv.innerHTML = `
                <img src="/api/placeholder/50/50" class="rounded-circle me-3" alt="User">
                <div>
                    <h6>${username} <small class="text-muted">${timeAgo}</small></h6>
                    <p>${commentText}</p>
                    <div>
                        <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-up"></i> 0</a>
                        <a href="#" class="me-3 text-decoration-none"><i class="bi bi-hand-thumbs-down"></i> 0</a>
                        <a href="#" class="text-decoration-none">Reply</a>
                    </div>
                </div>
            `;
            return commentDiv;
        }
        
        // Add event listeners for like/dislike buttons
        document.querySelectorAll('.modal-body a .bi-hand-thumbs-up, .modal-body a .bi-hand-thumbs-down').forEach(icon => {
            icon.parentElement.addEventListener('click', function(e) {
                e.preventDefault();
                const countElement = this.textContent;
                const currentCount = parseInt(countElement.trim());
                this.innerHTML = this.innerHTML.replace(currentCount, currentCount + 1);
            });
        });
        
        // Load more comments button
        document.getElementById('loadMoreComments').addEventListener('click', function() {
            // This would typically fetch more comments from a server
            alert('This would load more comments from the server in a real application.');
        });
    });
    </script>
