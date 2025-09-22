<?php
// database connection
$mysqli = new mysqli("localhost", "root", "", "chhoteldb");
if ($mysqli->connect_error) { 
    die("DB connection failed: " . $mysqli->connect_error); 
}

$availableRooms = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $checkin = $_POST['checkin'];
    $checkout = $_POST['checkout'];
    $roomType = $_POST['room_type'];

    // Fetch rooms of the selected type
    $stmtRooms = $mysqli->prepare("SELECT * FROM rooms WHERE type=? AND status='available'");
    $stmtRooms->bind_param("s", $roomType);
    $stmtRooms->execute();
    $roomsResult = $stmtRooms->get_result();

    while ($room = $roomsResult->fetch_assoc()) {
        $room_no = $room['room_no'];

        // Check if this room is free for the selected date range
        $stmtBooking = $mysqli->prepare("
            SELECT COUNT(*) AS count 
            FROM bookings 
            WHERE room_no=? 
            AND status='Booked'
            AND NOT (checkout <= ? OR checkin >= ?)
        ");
        $stmtBooking->bind_param("iss", $room_no, $checkin, $checkout);
        $stmtBooking->execute();
        $bookingResult = $stmtBooking->get_result()->fetch_assoc();

        if ($bookingResult['count'] == 0) {
            // room is available
            $availableRooms[] = $room;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Check Availability - Crystal Horizon Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Poppins', sans-serif; background-color: #f8f9fa; }
        .h-font { font-family: "Merienda", cursive; }
        .availability-card { background: white; border-radius: 15px; padding: 30px; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        label { font-weight: 500; }
        .room-card { border: none; border-radius: 15px; overflow: hidden; transition: transform 0.3s ease, box-shadow 0.3s ease; box-shadow: 0 4px 15px rgba(0,0,0,0.08); }
        .room-card:hover { transform: translateY(-5px); box-shadow: 0 6px 20px rgba(0,0,0,0.12); }
        .room-card img { height: 220px; object-fit: cover; }
        footer { background: #222; }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white px-lg-3 py-lg-2 shadow-sm sticky-top">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold h-font" href="index.php">Crystal Horizon Hotel</a>
    <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarSupportedContent">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link me-2" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#">Rooms</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#">Facilities</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#">Contact</a></li>
        <li class="nav-item"><a class="nav-link me-2" href="#">About</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Main Content -->
<div class="container my-5">
    <div class="availability-card">
        <h3 class="mb-4"><i class="bi bi-calendar-check me-2"></i> Check Booking Availability</h3>
        <form method="post">
            <div class="row g-3">
                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Check-in</label>
                    <input type="date" name="checkin" class="form-control shadow-none" required>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Check-out</label>
                    <input type="date" name="checkout" class="form-control shadow-none" required>
                </div>
                
                <div class="col-lg-3 col-md-6">
                    <label class="form-label">Room</label>
                    <select name="room_type" class="form-select shadow-none" required>
                        <option value="" selected disabled>Choose...</option>
                        <option value="Suite Room">Suite Room</option>
                        <option value="Deluxe Room">Deluxe Room</option>
                        <option value="Superior Room">Superior Room</option>
                    </select>
                </div>

                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="bi bi-search"></i> Check Availability
                    </button>
                </div>
            </div>
        </form>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="mt-4">
                <h5>Available Rooms:</h5>
                <?php if (count($availableRooms) > 0): ?>
                    <div class="row">
                        <?php foreach ($availableRooms as $room): ?>
                            <div class="col-lg-4 col-md-6 my-3">
                                <div class="card room-card p-2">
                                    <h5><?php echo htmlspecialchars($room['type']); ?> (Room <?php echo $room['room_no']; ?>)</h5>
                                    <p class="text-muted">Price: <?php echo number_format($room['price']); ?> BDT/night</p>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Book Now</a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else: ?>
                    <p class="text-danger">No rooms available for the selected dates and type.</p>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- Our Rooms Section (Static Cards as before) -->
<h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Our Room</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-md-6 my-3">
            <div class="card room-card">
                <img src="https://image-tc.galaxy.tf/wijpeg-88i7q2ui7l12b6wlzm0hk5ft7/premier-suite-100.jpg" class="card-img-top" alt="Room 1">
                <div class="card-body">
                    <h5>Deluxe Room</h5>
                    <p class="text-muted">Spacious room with a sea view, king-size bed, and premium amenities.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">1,00,000BDT/night</span>
                        <a href="" class="btn btn-sm btn-outline-primary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 my-3">
            <div class="card room-card">
                <img src="https://media-cdn.tripadvisor.com/media/photo-s/22/ac/7b/b8/the-amayaa.jpg" class="card-img-top" alt="Room 2">
                <div class="card-body">
                    <h5>Superior Room</h5>
                    <p class="text-muted">Modern design with balcony access and complimentary breakfast.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">50,000BDT/night</span>
                        <a href="" class="btn btn-sm btn-outline-primary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4 col-md-6 my-3">
            <div class="card room-card">
                <img src="https://image-tc.galaxy.tf/wijpeg-e65snvug5s2lzfi5sir7ipp1i/fullerton-06.jpg?width=1980&height=890" class="card-img-top" alt="Room 3">
                <div class="card-body">
                    <h5>Suite Room</h5>
                    <p class="text-muted">Luxury suite with private lounge, hot tub, and panoramic view.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="fw-bold text-primary">20,000BDT/night</span>
                        <a href="" class="btn btn-sm btn-outline-primary">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->
<footer class="text-white py-4 mt-5">
    <div class="container text-center">
        <p class="mb-1">&copy; <?php echo date("Y"); ?> Crystal Horizon Hotel. All Rights Reserved.</p>
        <p class="mb-0">
            <i class="bi bi-envelope"></i> info@crystalhorizon.com |
            <i class="bi bi-telephone"></i> +880 123 456 789
        </p>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
