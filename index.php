<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Crystal Horizon Hotel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Merienda:wght@500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <link rel="stylesheet" href="homepage.css">
 
 
</head>
<body>

<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold h-font" href="#">Crystal Horizon Hotel</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link me-2" href="#">Home</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#Highlights-section">Rooms</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#Facilities-section">Facilities</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#Contact-us">Contact</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#about-us">About</a></li>
      </ul>
      <div>
        <button class="btn btn-outline-dark shadow-none me-2" data-bs-toggle="modal" data-bs-target="#loginModal">Login</button>
        <button class="btn btn-primary shadow-none" data-bs-toggle="modal" data-bs-target="#registerModal">Register</button>
      </div>
    </div>
  </div>
</nav>


<!-- Hero Section with Fade Carousel -->
<div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="1000">
  <!-- Static text overlay -->
  <div class="hero-overlay">
    <h1>Welcome to <br> Crystal Horizon Hotel</h1>
    <p>Experience luxury, comfort, and unforgettable memories</p>
    <a href="availability.php" class="btn btn-primary btn-lg shadow">Book Your Stay</a>
  </div>

  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="image1.jpg" class="d-block w-100" alt="Cover 1">
    </div>
    <div class="carousel-item">
      <img src="https://specials-images.forbesimg.com/imageserve/6437c9964e3db1ffe0117b7c/960x0.jpg?fit=scale" class="d-block w-100" alt="Cover 2">
    </div>
    <div class="carousel-item">
      <img src="https://gt-website.transforms.svdcdn.com/production/cloud/Projects1/Pier-66/Pier66_PIER66_gtwebland.jpg?w=800&h=418&q=82&fit=crop&dm=1668597314&s=56899d65e2d8cd22aa5b1c151b81727c" class="d-block w-100" alt="Cover 3">
    </div>
    <div class="carousel-item">
      <img src="https://www.dotwnews.com/uploads/posts_photos/conrad-rabat-arzana-exterior-dh4u21.jpg" alt="Cover 4">
    </div>
    <div class="carousel-item">
      <img src="https://www.cvent.com/sites/default/files/image/2018-07/luxury-hotel.jpg" class="d-block w-100" alt="Cover 5">
    </div>
    
  </div>
</div>

<!-- Highlights -->
<section class="container py-5" id="Highlights-section">
 <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Highlights</h2>
  <div class="row g-4">
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <img src="https://images.unsplash.com/photo-1590490360182-c33d57733427?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Luxury Rooms">
        <div class="card-body">
          <h5 class="card-title">Luxury Rooms</h5>
          <p class="card-text">Elegant rooms with modern amenities and breathtaking views for your comfort.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Pool">
        <div class="card-body">
          <h5 class="card-title">Infinity Pool</h5>
          <p class="card-text">Relax and unwind in our rooftop infinity pool overlooking the horizon.</p>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card shadow-sm border-0">
        <img src="https://images.unsplash.com/photo-1552566626-52f8b828add9?auto=format&fit=crop&w=800&q=80" class="card-img-top" alt="Dining">
        <div class="card-body">
          <h5 class="card-title">Fine Dining</h5>
          <p class="card-text">Enjoy world-class cuisine crafted by our expert chefs in an elegant setting.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- About Us -->
<section class="container py-5" id="about-us">
  <div class="row align-items-center">
    <div class="col-md-6">
      <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">About Us</h2>
      <p>Crystal Horizon Hotel offers an unparalleled blend of luxury, comfort, and hospitality. 
         Nestled in a serene location, our hotel is the perfect escape for travelers seeking a memorable stay. 
         From our lavish rooms to gourmet dining and modern facilities, every detail is crafted to delight you.</p>
        <a href="aboutus.php"><button style>See more</button></a>

    </div>
    <div class="col-md-6">
      <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?auto=format&fit=crop&w=800&q=80" class="img-fluid about-img" alt="About Hotel">
    </div>
  </div>
</section>

<!-- Facilities -->
<section class="bg-light py-5" id="Facilities-section">
  <div class="container">
    <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Facilities</h2>
    <div class="row text-center g-4">
      <div class="col-md-3">
        <i class="bi bi-wifi facility-icon"></i>
        <p>Free Wi-Fi</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-car-front facility-icon"></i>
        <p>Free Parking</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-cup-hot facility-icon"></i>
        <p>24/7 Room Service</p>
      </div>
      <div class="col-md-3">
        <i class="bi bi-umbrella facility-icon"></i>
        <p>Beach Access</p>
      </div>
    </div>
  </div>
  <br>
  <center>
      <a href="Facilities.php"><button style>See more</button></a>
  </center>
</section>

<!-- Testimonials -->
<section class="py-5 bg-light">

  <div class="container">
   <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimonials</h2>
    <div class="row g-4">
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body text-center">
            <div class="mb-3 text-warning">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <h6 class="fw-bold">Random User 1</h6>
            <p class="text-muted">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Id nemo excepturi, incidunt qui libero at omnis iure magni tempora ea.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body text-center">
            <div class="mb-3 text-warning">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
              <i class="far fa-star"></i>
            </div>
            <h6 class="fw-bold">Random User 2</h6>
            <p class="text-muted">
              Sed ut perspiciatis unde omnis iste natus error sit voluptatem
              accusantium doloremque laudantium, totam rem aperiam.
            </p>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card shadow-sm border-0 h-100">
          <div class="card-body text-center">
            <div class="mb-3 text-warning">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="far fa-star"></i>
              <i class="far fa-star"></i>
            </div>
            <h6 class="fw-bold">Random User 3</h6>
            <p class="text-muted">
              At vero eos et accusamus et iusto odio dignissimos ducimus qui
              blanditiis praesentium voluptatum deleniti atque.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Reach us -->
<div id="Contact-us">
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">REACH US</h2>
<div class="container">
<div class="row">
<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-2 bg-white rounded">

</div>
<div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-1 bg-white rounded">
  <iframe class="w-100 rounded"height="320px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7823295.340014736!2d86.9252014160156!3d16.778246319224028!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ec821fde0e89%3A0x4098cf54a9b73a03!2sPan%20Pacific%20Yangon!5e0!3m2!1sen!2sbd!4v1755068860931!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>
<div class="col-lg-4 col-md-4">
<div class="bg-white p-4 rounded mb-4">
<h5>Call us</h5>
<a href="tel: +917778889991" class="d-inline-block mb-2 text-decoration-none text-dark">
<i class="bi bi-telephone-fill"></i> +917778889991
</a>
<br>
<a href="tel: +917778889991" class="d-inline-block text-decoration-none text-dark">
<i class="bi bi-telephone-fill"></i> +917778889991
</a>
</div>
<h5>Follow us</h5>
<a href="#" class="d-inline-block mb-3">
<span class="badge bg-light text-dark fs-6 p-2">
<i class="bi bi-twitter me-1"></i> Twitter
</span>
</a>
<br>
<a href="#" class="d-inline-block mb-3">
<span class="badge bg-light text-dark fs-6 p-2">
<i class="bi bi-facebook me-1"></i> Facebook
</span>
</a>
<br>
<a href="#" class="d-inline-block">
<span class="badge bg-light text-dark fs-6 p-2">
<i class="bi bi-instagram me-1"></i> Instagram
</span>
</a>
  </div>
</div>
</div>
</div>



<!-- Footer -->
<footer class="text-center p-4">
  <p>© 2025 Crystal Horizon Hotel | All Rights Reserved</p>
  <p>
    <a href="#"><i class="bi bi-facebook me-2"></i></a>
    <a href="#"><i class="bi bi-instagram me-2"></i></a>
    <a href="#"><i class="bi bi-twitter"></i></a>
  </p>
</footer>

<!-- Login Modal -->
 
<div class="modal fade login-modal" id="loginModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form>
        <div class="modal-header justify-content-center">
          <h5 class="modal-title"><i class="bi bi-person-circle me-2"></i> Guest Login</h5>
        </div>
        <div class="modal-body">
          <div class="mb-3 position-relative">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" class="form-control" placeholder="Email address" required>
          </div>
          <div class="mb-3 position-relative">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" placeholder="Password" required>
          </div>
          <div class="mb-3 d-flex justify-content-between align-items-center">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="rememberMe">
              <label class="form-check-label" for="rememberMe">Remember me</label>
            </div>
            <a href="#" class="text-decoration-none">Forgot password?</a>
          </div>
          <button type="submit" class="btn btn-primary w-100">Login</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Registration Modal -->
<div class="modal fade login-modal" id="registerModal" tabindex="-1" aria-labelledby="registerModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
    <div class="modal-content">
      <form>
        <div class="modal-header justify-content-center border-0 pb-0">
          <h5 class="modal-title text-white fw-bold" id="registerModalLabel">
            <i class="bi bi-person-lines-fill me-2"></i> User Registration
          </h5>
          <button type="button" class="btn-close btn-close-white shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pt-0">
          <div class="mb-3 position-relative">
            <i class="bi bi-envelope input-icon"></i>
            <input type="email" class="form-control" id="registerEmail" placeholder="Email address" required>
          </div>
          <div class="mb-3 position-relative">
            <i class="bi bi-lock input-icon"></i>
            <input type="password" class="form-control" id="registerPassword" placeholder="Password" required>
            <button type="button" class="btn btn-sm btn-outline-light position-absolute top-50 end-0 translate-middle-y me-2 show-pass-btn" tabindex="-1" aria-label="Toggle password visibility">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          <div class="mb-4 position-relative">
            <i class="bi bi-lock-fill input-icon"></i>
            <input type="password" class="form-control" id="registerConfirmPassword" placeholder="Confirm Password" required>
            <button type="button" class="btn btn-sm btn-outline-light position-absolute top-50 end-0 translate-middle-y me-2 show-pass-btn" tabindex="-1" aria-label="Toggle password visibility">
              <i class="bi bi-eye"></i>
            </button>
          </div>
          <button type="submit" class="btn btn-primary w-100 fw-bold">Register</button>
        </div>
      </form>
    </div>
  </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
