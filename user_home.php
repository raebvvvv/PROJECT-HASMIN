<?php 
session_start();

// Check if the user is logged in
$isLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);

// Logout logic
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user_id']); // Ensure session is fully cleared
    header("Location: index.php"); // Redirect to homepage after logout
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HM Kitchen Tool</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="landingstyle.css">
    
    <!-- FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar -->
<header class="bg-light border-bottom py-3 shadow-sm">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="images/puplogo.png" alt="Logo" class="center-img" style="height: 30px; margin-right: 10px;">
                    <span class="fw-bold">HM Kitchen Tools</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a href="user_home.php" class="nav-link text-dark fw-bold">Home</a></li>
                        <li class="nav-item"><a href="user_about.php" class="nav-link text-dark">About Us</a></li>
                        <li class="nav-item"><a href="index.php" class="nav-link text-dark">Borrow Tools</a></li>
                        <li class="nav-item"><a href="user_contact.php" class="nav-link text-dark">Contact</a></li>
                    </ul>
                         <?php if ($isLoggedIn): ?>
                        <a href="?logout=true" class="btn btn-primary rounded-pill px-4">Logout</a>
                    <?php else: ?>
                        <a href="login.php" class="btn btn-outline-primary rounded-pill px-4">Login</a>
                    <?php endif; ?>
                    
                </div>
            </div>
        </nav>
    </div>
</header>

<!-- Hero Section -->
<section class="hero text-center py-5 bg-light">
    <div class="container">
        <h1 class="display-5 fw-bold text-primary">Welcome to HM Kitchen Tools</h1>
        <p class="lead text-muted">Easily borrow and return kitchen tools with our user-friendly platform.</p>
    </div>
</section>

<!-- Hero Image -->
<div class="text-center">
    <img src="images/tools.png" class="img-fluid full-width-img shadow-lg rounded" alt="Kitchen Tools">
</div>

<!-- Announcements Section -->
<section class="announcements-section bg-white py-5">
    <div class="container">
        <h2 class="fw-bold text-center mb-4">Latest Announcements</h2>
        <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action">
                <h5 class="mb-1">New Kitchen Tools Added to Inventory</h5>
                <p class="mb-1">Discover the latest kitchen tools available for borrowing now!</p>
                <small>Posted on January 15, 2025</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <h5 class="mb-1">Scheduled Maintenance</h5>
                <p class="mb-1">Our platform will undergo maintenance on January 20, 2025.</p>
                <small>Posted on January 5, 2025</small>
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                <h5 class="mb-1">Tool Safety Guidelines Updated</h5>
                <p class="mb-1">We’ve updated our tool safety guidelines for all users.</p>
                <small>Posted on December 20, 2024</small>
            </a>
        </div>  
    </div>
</section>

<!-- Borrowing Section -->
<section class="borrowing-section bg-light py-5 text-center">
    <div class="container">
        <h2 class="fw-bold mb-4">Start Borrowing Kitchen Tools Today</h2>
        <p class="text-muted mb-4">Explore our kitchen tools and make your cooking hassle-free.</p>
        <a href="index.php" class="btn btn-primary px-4 py-2 rounded-pill">Browse Inventory</a>
    </div>
</section>

<!-- Contact Section -->
<section class="contact-section bg-white py-5">
    <div class="container text-center">
        <h2 class="fw-bold mb-4">Contact Us</h2>
        <p class="text-muted mb-5">Feel free to reach out to us for any inquiries.</p>
        <div class="row g-4">
            <div class="col-12 col-md-4">
                <div class="contact-item border p-4 rounded shadow-sm">
                    <i class="fas fa-envelope mb-3 text-primary" style="font-size: 40px;"></i>
                    <h3>Email</h3>
                    <p class="text-muted">We value your feedback and suggestions.</p>
                    <p class="fw-bold">info@hmkitchen.com</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="contact-item border p-4 rounded shadow-sm">
                    <i class="fas fa-phone mb-3 text-primary" style="font-size: 40px;"></i>
                    <h3>Phone</h3>
                    <p class="text-muted">For technical support, contact our support team.</p>
                    <p class="fw-bold">+639171859842</p>
                </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="contact-item border p-4 rounded shadow-sm">
                    <i class="fas fa-map-marker-alt mb-3 text-primary" style="font-size: 40px;"></i>
                    <h3>Office</h3>
                    <p class="text-muted">Visit us at our office for assistance.</p>
                    <p class="fw-bold">372 Valencia PUP Hasmin Building, Sta. Mesa, Manila</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
