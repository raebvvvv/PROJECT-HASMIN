<?php
session_start();
include 'conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $student_number = $_POST['student_number'];
    $password = $_POST['password'];

    // Check if the credentials are for admin
    if ($student_number === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php");
        exit();
    }

    // Prepare the SQL statement
    $sql = "SELECT * FROM users WHERE student_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $student_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variable for user
            $_SESSION['user_logged_in'] = true;
            // Redirect to the user's home page
            header("Location: user_home.php");
            exit();
        } else {
            $error = "Invalid student number or password";
        }
    } else {
        $error = "Invalid student number or password";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="login.css" rel="stylesheet">
  
  <title>Hasmin</title>
</head>
<body>
  <div class="container">
    <h1>Login</h1>
    <form id="login-form" action="" method="POST">
      <label for="student_number">STUDENT NUMBER</label>
      <input type="text" id="student_number" name="student_number" class="form-control" required>
      
      <label for="password">PASSWORD</label>
      <input type="password" id="password" name="password" class="form-control" required>
      <!--if invalid-->
        <?php
        if (isset($error)) {
            echo "<p style='color:red;'>$error</p>";
        }
        ?>
      <button type="submit" class="btn btn-primary mt-3">Log In</button>
    </form>
    <br>
    <a href="register.php"><button class="btn btn-secondary mt-3">Register</button></a>
    
  
  </div>
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>