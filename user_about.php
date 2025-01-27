<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_logged_in']) || $_SESSION['user_logged_in'] !== true) {
    header("Location: login.php");
    exit();
}

// Handle logout
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - HM Kitchen Tools</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="landingstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
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
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item"><a href="user_home.php" class="nav-link text-dark">Home</a></li>
                            <li class="nav-item"><a href="user_about.php" class="nav-link text-dark fw-bold">About Us</a></li>
                            <li class="nav-item"><a href="index.php" class="nav-link text-dark">Borrow Tools</a></li>
                            <li class="nav-item"><a href="user_contact.php" class="nav-link text-dark">Contact</a></li>
                        </ul>
                        <a href="?logout=true" class="btn btn-primary rounded-pill px-4">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="text-center">
        <img src="images/about.jpg" class="img-fluid full-width-img shadow-sm" alt="Kitchen Tools">
    </div>

    <!-- About Us Section -->
    <div class="container my-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold">Our Team</h2>
            <p class="text-muted">Meet the talented individuals behind HM Kitchen Tools.</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 text-center">
                <div class="team-card shadow-sm p-3 mb-4">
                    <img src="images/avatar.jpg" alt="Raebv Lielmo Inocentes" class="img-fluid rounded-circle team-photo mb-3">
                    <h5>Raebv Lielmo Inocentes</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="team-card shadow-sm p-3 mb-4">
                    <img src="images/avatar.jpg" alt="Ma. Criselle Trinidad" class="img-fluid rounded-circle team-photo mb-3">
                    <h5>Ma. Criselle Trinidad</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="team-card shadow-sm p-3 mb-4">
                    <img src="images/avatar.jpg" alt="Paula Aliyah Cama" class="img-fluid rounded-circle team-photo mb-3">
                    <h5>Paula Aliyah Cama</h5>
                </div>
            </div>
            <div class="col-md-3 text-center">
                <div class="team-card shadow-sm p-3 mb-4">
                    <img src="images/avatar.jpg" alt="Mark Reinier Garcia" class="img-fluid rounded-circle team-photo mb-3">
                    <h5>Mark Reinier Garcia</h5>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
