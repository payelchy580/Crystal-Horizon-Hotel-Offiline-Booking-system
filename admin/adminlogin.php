<?php
// Database connection
$host = "localhost";
$username = "root"; // change if needed
$password = ""; // change if needed
$dbname = "chhoteldb";

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection Failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_name = $_POST['admin_name'];
    $password = $_POST['password'];

    // Query to check admin login
    $sql = "SELECT * FROM admin WHERE admin_name='$admin_name' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<script>alert('Login Successful'); window.location='admindashboard.php';</script>";
    } else {
        echo "<script>alert('Invalid Username or Password');</script>";
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Poppins", sans-serif;
    }

    body {
        min-height: 100vh;
        display: flex;
        align-items: center;
        justify-content: center;
        background: url('https://media.licdn.com/dms/image/v2/D4E12AQHjosizf7GKbQ/article-cover_image-shrink_720_1280/B4EZWjHyuMHcAM-/0/1742198485316?e=2147483647&v=beta&t=V5Nu6fXtEOboNASvxiTcMP7PCTJfQIDeCEpyGwaPYlo') center/cover no-repeat;
        overflow: hidden;
    }

    /* Glass container */
    .login-card {
        position: relative;
        background: rgba(255, 255, 255, 0.12);
        backdrop-filter: blur(20px);
        -webkit-backdrop-filter: blur(20px);
        border-radius: 20px;
        border: 1.5px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 12px 48px rgba(0, 0, 0, 0.3);
        padding: 2rem 1.8rem;
        width: 350px;
        text-align: center;
        animation: fadeInScale 0.45s ease forwards;
    }

    @keyframes fadeInScale {
        0% { opacity: 0; transform: scale(0.85); }
        100% { opacity: 1; transform: scale(1); }
    }

    .login-card h4 {
        color: white;
        font-family: 'Merienda', cursive;
        font-weight: 700;
        font-size: 1.6rem;
        margin-bottom: 1.5rem;
    }

    .form-group {
        position: relative;
        margin-bottom: 1rem;
    }

    .form-group .input-icon {
        position: absolute;
        left: 14px;
        top: 50%;
        transform: translateY(-50%);
        color: rgba(255, 255, 255, 0.75);
        font-size: 1.2rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 0.75rem 0.75rem 42px;
        border-radius: 14px;
        border: 1.2px solid rgba(255, 255, 255, 0.4);
        background: rgba(255, 255, 255, 0.18);
        color: white;
        font-size: 1rem;
        transition: background 0.3s ease, border-color 0.3s ease;
    }

    .form-control::placeholder {
        color: rgba(255, 255, 255, 0.7);
        font-weight: 500;
    }

    .form-control:focus {
        background: rgba(255, 255, 255, 0.3);
        border-color: #0d6efd;
        box-shadow: 0 0 8px #0d6efd;
        outline: none;
    }

    .btn-primary {
        border-radius: 18px;
        font-size: 1.1rem;
        padding: 0.6rem;
        width: 100%;
        font-weight: 700;
        background: linear-gradient(135deg, #0d6efd, #003580);
        border: none;
        box-shadow: 0 8px 25px rgba(13, 110, 253, 0.6);
        color: white;
        transition: box-shadow 0.3s ease, background 0.3s ease;
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #003580, #0d6efd);
        box-shadow: 0 10px 40px rgba(13, 110, 253, 0.8);
    }

</style>
</head>
<body>

<div class="login-card">
    <form method="POST" action="">
        <h4><i class="bi bi-shield-lock-fill me-2"></i>Admin Login</h4>
        <div class="form-group">
            <i class="bi bi-person input-icon"></i>
            <input type="text" name="admin_name" class="form-control" placeholder="Admin Name" required>
        </div>
        <div class="form-group">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        <button type="submit" class="btn-primary">Login</button>
    </form>
</div>

</body>
</html>
