<?php
// Include the database connection file
include 'conn.php';

$error = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $student_number = trim($_POST['student_number']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);
    $full_name = trim($_POST['full_name']);
    $email = trim($_POST['email']);

    // Validate the form data
    if (empty($student_number) || empty($password) || empty($confirm_password) || empty($full_name) || empty($email)) {
        $error = "All fields are required!";
    } elseif ($password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check for duplicate student number
        $sql = "SELECT * FROM users WHERE student_number = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $student_number);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $error = "This student number already exists!";
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Prepare the SQL statement
            $sql = "INSERT INTO users (student_number, username, email, password, created_at) VALUES (?, ?, ?, ?, NOW())";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $student_number, $full_name, $email, $hashed_password);

            // Execute the statement
            if ($stmt->execute()) {
                echo "<script>alert('Registration successful!'); window.location.href='login.php';</script>";
            } else {
                $error = "Error: " . $stmt->error;
            }
        }

        // Close the statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
    <script>
    function validateForm() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirm_password").value;
        if (password !== confirmPassword) {
            alert("Passwords do not match!");
            return false;
        }

        // Validate password length
        if (password.length < 8) {
            alert("Password must be at least 8 characters long!");
            return false;
        }

        // Validate student number format
        var studentNumber = document.getElementById("student_number").value;
        var studentNumberPattern = /^20\d{2}-\d{5}-MN-0$/;
        if (!studentNumberPattern.test(studentNumber)) {
            alert("Invalid student number format! The correct format is 20XX-XXXXX-MN-0.");
            return false;
        }

        return true;
    }
    </script>
</head>
<body>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8"> <!-- Adjusted column width to make inputs wider -->
            <h5 class="text-center">Register</h5>
            <form method="post" action="" onsubmit="return validateForm()">
                <?php
                if (!empty($error)) {
                    echo "<div class='alert alert-danger'>$error</div>";
                }
                ?>
                <div class="mb-3">
                    <label for="student_number" class="form-label">Student Number:</label>
                    <input type="text" id="student_number" name="student_number" class="form-control mt-3" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="full_name" class="form-label">Full Name:</label>
                    <input type="text" id="full_name" name="full_name" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" id="email" name="email" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
                <a href="login.php" class="btn btn-secondary w-100 mt-3">Back to Login</a>
            </form>
        </div>
    </div>
</div>
</body>
</html>