<?php
// aboutus.php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us - Crystal Horizon Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@600&family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  
  <style>
    * { 
      font-family: "Poppins", sans-serif;
    }
    .h-font {
      font-family: "Merienda", cursive;
    }
    .carousel-item {
      height: 90vh;
      min-height: 400px;
    }
    .carousel-item img {
      object-fit: cover;
      height: 100%;
      width: 100%;
    }
    .hero-overlay {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      color: white;
      text-align: center;
      text-shadow: 0px 3px 8px rgba(0,0,0,0.5);
      z-index: 10;
    }
    .hero-overlay h1 {
      font-size: 3rem;
      font-weight: 700;
    }
    .hero-overlay p {
      font-size: 1.2rem;
      margin-bottom: 20px;
    }
    .section-heading {
      font-weight: 600;
      margin-bottom: 30px;
    }
    .card img {
      height: 220px;
      object-fit: cover;
    }
    .about-img {
      border-radius: 10px;
      box-shadow: 0px 4px 15px rgba(0,0,0,0.1);
    }
    .facility-icon {
      font-size: 2rem;
      color: #0d6efd;
    }
    footer {
      background: #111;
      color: #aaa;
    }
    footer a {
      color: #aaa;
      text-decoration: none;
    }
    footer a:hover {
      color: white;
    }
  </style>
</head>
<body>

<!-- Hero Section -->
<div id="aboutCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image1.jpg" class="d-block w-100" alt="Hotel">
      <div class="hero-overlay">
        <h1 class="h-font">About Crystal Horizon</h1>
        <p>Luxury. Comfort. Elegance.</p>
      </div>
    </div>
  </div>
</div>

<!-- About Us Section -->
<div class="container my-5">
  <div class="row align-items-center">
    <div class="col-lg-6 mb-4">
      <img src="https://www.sbid.org/wp-content/uploads/2022/07/7d5574129618065.616eeb838676c.jpg" class="w-100 about-img" alt="Our Story">
    </div>
    <div class="col-lg-6">
      <h2 class="h-font section-heading">Our Story</h2>
      <p>Founded in 2005, Crystal Horizon Hotel has redefined hospitality by blending world-class luxury with personal warmth. We believe in creating memories for our guests that last a lifetime.</p>
      <p>From stunning city views to exquisite dining and premium suites, our hotel is a sanctuary for travelers seeking comfort and elegance.</p>
    </div>
  </div>

  <div class="row align-items-center flex-lg-row-reverse my-5">
    <div class="col-lg-6 mb-4">
      <img src="https://365financialanalyst.com/wp-content/uploads/2020/11/Defining-a-companys-Vision-Mission-Goals-and-Values-statements-thumb-1024x683.jpg" class="w-100 about-img" alt="Our Vision">
    </div>
    <div class="col-lg-6">
      <h2 class="h-font section-heading">Our Vision</h2>
      <p>We aim to be the ultimate choice for both leisure and business travelers. Every detail of our service is carefully designed to exceed expectations, making every stay extraordinary.</p>
      <p>With sustainable practices and a focus on innovation, we are shaping the future of luxury hospitality.</p>
    </div>
  </div>
</div>

<!-- Team Section -->
<div class="container my-5">
  <h2 class="h-font text-center section-heading">Meet Our Team</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card border-0 shadow">
        <img src="https://media.istockphoto.com/id/1413766112/photo/successful-mature-businessman-looking-at-camera-with-confidence.jpg?s=612x612&w=0&k=20&c=NJSugBzNuZqb7DJ8ZgLfYKb3qPr2EJMvKZ21Sj5Sfq4=" class="card-img-top" alt="Manager">
        <div class="card-body text-center">
          <h5 class="card-title">John Smith</h5>
          <p class="card-text">General Manager</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow">
        <img src="https://t4.ftcdn.net/jpg/09/69/34/27/360_F_969342778_BCPcWUTyPG7RsXUUPaJ2jDNiiCzrtyOd.jpg" class="card-img-top" alt="Guest Services">
        <div class="card-body text-center">
          <h5 class="card-title">Sophia Lee</h5>
          <p class="card-text">Head of Guest Services</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card border-0 shadow">
        <img src="https://www.upmenu.com/wp-content/uploads/2023/10/executive-chef-job-description-cover-photo.jpg" class="card-img-top" alt="Chef">
        <div class="card-body text-center">
          <h5 class="card-title">Michael Brown</h5>
          <p class="card-text">Executive Chef</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Footer -->
<footer class="py-4 text-center">
  <p>&copy; 2025 Crystal Horizon Hotel | Designed with ❤️</p>
  <p>
    <a href="#">Facebook</a> | 
    <a href="#">Instagram</a> | 
    <a href="#">LinkedIn</a>
  </p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
