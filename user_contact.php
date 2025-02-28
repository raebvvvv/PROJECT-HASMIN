
<?php 
session_start();
$isLoggedIn = isset($_SESSION['user_id']); // Check if user is logged in

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Database connection
    $servername = "localhost";
    $username = "root"; // Replace with your database username
    $password = ""; // Replace with your database password
    $dbname = "hasmin_users";

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert the contact message into the database
        $stmt = $pdo->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([$name, $email, $subject, $message]);

        // Optionally, you can send an email confirmation or notify the admin here
        $messageSent = "Thank you for reaching out! Your message has been sent.";
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="landingstyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap" rel="stylesheet">
    <title>Contact Us - PUP Hasmin</title>
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
                            <li class="nav-item"><a href="user_about.php" class="nav-link  text-dark">About Us</a></li>
                            <li class="nav-item"><a href="index.php" class="nav-link text-dark">Borrow Tools</a></li>
                            <li class="nav-item"><a href="user_contact.php" class="nav-link active text-dark fw-bold">Contact</a></li>
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
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero-section bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Get in Touch with Us</h1>
            <p class="lead">Have questions or need assistance? We're here to help!</p>
        </div>
    </section>

    <!-- Contact Form Section -->
    <<div class="container my-5">
    <div class="row">
        <!-- Contact Form -->
        <div class="col-md-6">
            <h2 class="fw-bold mb-4">Send Us a Message</h2>

            <?php if (isset($messageSent)): ?>
                <div class="alert alert-success"><?php echo $messageSent; ?></div>
            <?php elseif (isset($error)): ?>
                <div class="alert alert-danger"><?php echo $error; ?></div>
            <?php endif; ?>

            <form method="POST" action="user_contact.php">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Full Name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email Address" required>
                </div>
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your Message" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary px-4">Send Message</button>
            </form>
        </div>
            <!-- Contact Details -->
            <div class="col-md-6">
                <h2 class="fw-bold mb-4">Contact Details</h2>
                <ul class="list-unstyled">
                    <li class="mb-3">
                        <i class="fas fa-map-marker-alt text-primary me-2"></i>
                        <strong>Address:</strong> 372 Valencia PUP Hasmin Building, Sta. Mesa, Manila
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-phone text-primary me-2"></i>
                        <strong>Phone:</strong> +639171859842
                    </li>
                    <li class="mb-3">
                        <i class="fas fa-envelope text-primary me-2"></i>
                        <strong>Email:</strong> info@hmkitchen.com
                    </li>
                </ul>
                <h3 class="fw-bold mt-4">Follow Us</h3>
                <div class="d-flex mt-3">
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-primary"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <section class="map-section bg-light py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-4">Find Us Here</h2>
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.590926504423!2d121.0444851!3d14.5873598!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c9c8244e65e3%3A0x1dd6f616e8a2a3d3!2sPUP%20Main%20Building%2C%20Sta.%20Mesa%2C%20Manila!5e0!3m2!1sen!2sph!4v1619060201507!5m2!1sen!2sph" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</body>
</html>
