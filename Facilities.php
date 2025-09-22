<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crystal Horizon Hotel - Facilities</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Merienda:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <style>
    * {
      font-family: "Poppins", sans-serif;
    }
    .h-font {
      font-family: "Merienda", cursive;
    }

    /* Background */
    body {
      background: linear-gradient(to right, #74ebd5, #acb6e5);
      min-height: 100vh;
    }

    /* Navbar */
    .navbar-brand {
      color: #2b2b2b;
    }

    /* Section heading */
    h2 {
      font-weight: 600;
      margin-bottom: 40px;
      color: #fff;
      text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
      text-align: center;
    }

    /* Facility cards */
    .card {
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      transition: transform 0.3s, box-shadow 0.3s;
    }
    .card:hover {
      transform: translateY(-10px);
      box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    }
    .card i {
      font-size: 2.5rem;
      color: #0d6efd;
      transition: transform 0.3s;
    }
    .card:hover i {
      transform: scale(1.2);
    }
    .card-title {
      font-weight: 600;
      margin-top: 10px;
    }
    .card-text {
      font-size: 0.95rem;
      color: #333;
    }

    main {
      padding-bottom: 50px;
    }
  </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold h-font" href="index.php">Crystal Horizon Hotel</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
  </div>
</nav>

<!-- Facilities Section -->
<main class="container my-5">
  <h2>Our Facilities</h2>
  <div class="row g-4">
    <?php
    $mysqli = new mysqli("localhost", "root", "", "chhoteldb");
    if ($mysqli->connect_error) {
      die("DB connection failed: " . $mysqli->connect_error);
    }
    $fetch_Facilities = $mysqli->query("SELECT * FROM facilities");
    while ($fac = $fetch_Facilities->fetch_assoc()):
    ?>
      <div class="col-lg-3 col-md-6">
        <div class="card text-center shadow-sm h-100 p-3">
          <i class="<?php echo htmlspecialchars($fac['icon']); ?> facility-icon mb-3"></i>
          <h5 class="card-title"><?php echo htmlspecialchars($fac['feature_name']); ?></h5>
          <p class="card-text"><?php echo htmlspecialchars($fac['description']); ?></p>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>