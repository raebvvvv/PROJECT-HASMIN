<?php
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style3.css">
    <title>Admin Dashboard</title>
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
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
                            <li class="nav-item"><a href="landing.html" class="nav-link">Home</a></li>
                            <li class="nav-item"><a href="about.html" class="nav-link">About Us</a></li>
                            <li class="nav-item"><a href="inventory.html" class="nav-link">Borrow Tools</a></li>
                            <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
                            <li class="nav-item"><a class="nav-link fw-bold" aria-current="page" href="#">Dashboard</a></li>
                            <li class="nav-item"><a class="nav-link" href="inventory.html">Inventory</a></li>
                            <li class="nav-item"><a class="nav-link" href="manageuser.html">Manage Users</a></li>
                            <li class="nav-item"><a class="nav-link" href="ticket.html">Tickets</a></li>
                            <a href="?logout=true" class="btn btn-primary rounded-pill px-4">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Main Dashboard -->
    <div class="container mt-5">
        <h1 class="mb-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-6">
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-md-6">
                <!-- Dashboard Content -->
                <div class="card mt-3">
                    <div class="card-body">
                        <h5 class="card-title">Total Users</h5>
                        <p class="card-text">There are <span id="totalUsers">X</span> registered users.</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Tickets</h5>
                        <p class="card-text">There are <span id="totalTickets">X</span> Total Tickets</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Total Inventory</h5>
                        <p class="card-text"><span id="borrowedTools">X</span> Borrowed, <span id="unborrowedTools">Y</span> Unborrowed</p>
                    </div>
                </div>
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">Recent Activities</h5>
                        <ul class="list-group" id="recentActivities">
                            <li class="list-group-item">Activity 1</li>
                            <li class="list-group-item">Activity 2</li>
                            <li class="list-group-item">Activity 3</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        var xValues = ["Borrowed Tools", "Remaining Tools"];
        var yValues = [1, 2];
        var barColors = [
          "#b91d47",
          "#00aba9"
        ];

        new Chart("myChart", {
          type: "pie",
          data: {
            labels: xValues,
            datasets: [{
              backgroundColor: barColors,
              data: yValues
            }]
          },
          options: {
            title: {
              display: true,
              text: "Tool Usage Overview"
            }
          }
        });

        // Sample data update for dynamic dashboard
        document.getElementById('totalUsers').textContent = 120;
        document.getElementById('totalTickets').textContent = 45;
        document.getElementById('borrowedTools').textContent = 35;
        document.getElementById('unborrowedTools').textContent = 15;

        const activities = ["User John borrowed a tool", "New user registered", "Tool #23 returned"];
        const activityList = document.getElementById('recentActivities');
        activities.forEach(activity => {
            const li = document.createElement('li');
            li.classList.add('list-group-item');
            li.textContent = activity;
            activityList.appendChild(li);
        });
    </script>
</body>
</html>
