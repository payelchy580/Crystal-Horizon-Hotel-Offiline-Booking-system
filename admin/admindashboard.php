<?php

$mysqli = new mysqli("localhost", "root", "", "chhoteldb");
if ($mysqli->connect_error) { die("DB connection failed: " . $mysqli->connect_error); }

// Simple helpers
function post($k,$d=null){ return isset($_POST[$k]) ? trim($_POST[$k]) : $d; }
function get($k,$d=null){ return isset($_GET[$k]) ? trim($_GET[$k]) : $d; }
function esc($s){ return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8'); }

// Handle actions (CRUD)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = post('action','');


// -------- ROOMS  Starts--------

// Adding New Room (Code Starts)
  if ($action === 'add_room') {
    $room_no = $mysqli->real_escape_string(post('room_no'));
    $type    = $mysqli->real_escape_string(post('type'));
    $price   = floatval(post('price',0));
    $status  = $mysqli->real_escape_string(post('status','available'));
    $mysqli->query("INSERT INTO rooms (room_no,type,price,status) VALUES ('$room_no','$type',$price,'$status')");

    // $mysqli->query("INSERT INTO rooms (room_no,type,price,status) VALUES ('$room_no','$type',$price,'$status')");
    header("Location: ?page=rooms"); exit;
  }

// Adding New Room (Code ends)

// ---------------------------------------------------------------------------

// Delete existing room info (Code Starts)
  if ($action === 'delete_room') {
    $id = intval(post('id'));
    $mysqli->query("DELETE FROM rooms WHERE id=$id");
    header("Location: ?page=rooms"); exit;
  }
// Delete existing room info (Code Ends)

// -------- ROOMS  ends--------


// ---------------------------------------------------------------------------

// -------------- FACILITIES ----------------------

// Add new Facility (Code Starts)
  if ($action === 'add_facility') {
    $name = $mysqli->real_escape_string(post('feature_name'));
    $icon = $mysqli->real_escape_string(post('icon','bi-star'));
    $description = $mysqli->real_escape_string(post('description',''));
    $mysqli->query("INSERT INTO facilities (feature_name,icon,description) VALUES('$name','$icon','$description')");
    header("Location: ?page=facilities"); exit;
  }
// Add new Facility (Code Ends)

// ---------------------------------------------------------------------------

// Delete existing Facility (Code Starts)
  if ($action === 'delete_facility') {
    $id = intval(post('id'));
    $mysqli->query("DELETE FROM facilities WHERE id=$id");
    header("Location: ?page=facilities"); exit;
  }
// Delete existing Facility (Code Ends)

// ---------------------------------------------------------------------------

// -------- Bookings Starts--------

// ------------ Add new Booking --------------------
// Book New Guest (Code Starts)
  if ($action === 'add_booking') {
    $name     = $mysqli->real_escape_string(post('name'));
    $email    = $mysqli->real_escape_string(post('email'));
    $Phone    = $mysqli->real_escape_string(post('Phone'));
    $room_no  = $mysqli->real_escape_string(post('room_no')); // room_id dropdown value
    $checkin  = $mysqli->real_escape_string(post('checkin'));
    $checkout = $mysqli->real_escape_string(post('checkout'));
    $status   = $mysqli->real_escape_string(post('status','pending'));

    $mysqli->query("
        INSERT INTO bookings (name,email,Phone,room_no,checkin,checkout,status)
        VALUES ('$name','$email','$Phone','$room_no','$checkin','$checkout','$status')
    ") or die($mysqli->error);
    
    // 🔥 Update room status to occupied
    $mysqli->query("UPDATE rooms SET status='occupied' WHERE room_no='$room_no'");

    header("Location: ?page=bookings");
    exit;
}
// Book New Guest (Code ends)

// Delete Guest Info (Starts)
if ($action === 'delete_guest') 
  { $id = intval(post('id'));
     $mysqli->query("DELETE FROM bookings WHERE id=$id"); 
     header("Location: ?page=guests"); 
     exit; 
  }
// Delete Guest Info (Ends)
}

// -------- Bookings ends--------

$page = get('page','dashboard');
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Crystal Horizon Hotel | Admin Panel</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.0/css/all.min.css" integrity="sha512-DxV+EoADOkOygM4IR9yXP8Sb2qwgidEmeqAEmDKIOfPRQZOWbXCzLC6vjbZyy0vPisbH2SyW27+ddLVCN+OMzQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&family=Merienda:wght@600;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="admindashboardcommon.css">
</head>
<body>

<!-- Top Bar -->
<div class="topbar d-flex align-items-center justify-content-between">
  <div class="d-flex align-items-center">
    <button class="btn btn-link text-white d-lg-none me-2 p-0" data-bs-toggle="offcanvas" data-bs-target="#mobileMenu">
      <i class="bi bi-list" style="font-size:1.6rem"></i>
    </button>
    <span class="brand-badge h-font">Crystal Horizon Hotel</span>
  </div>
  <div>
    <a href="Log_Out.php" class="btn btn-light btn-sm"><i class="bi bi-box-arrow-right me-1"></i>LOG OUT</a>
  </div>
</div>

<div class="container-fluid">
  <div class="row">
    <!-- Sidebar (Desktop) -->
    <div class="col-lg-2 d-none d-lg-block sidebar p-3">
      <div class="mb-2 small text-uppercase opacity-75">Menu</div>
      <nav class="nav flex-column">
        <a class="nav-link <?= $page==='dashboard'?'active':'' ?>" href="?page=dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
        <a class="nav-link <?= $page==='settings'?'active':'' ?>" href="?page=settings"><i class="bi bi-gear me-2"></i>Settings</a>
        <a class="nav-link <?= $page==='bookings'?'active':'' ?>" href="?page=bookings"><i class="bi bi-calendar-check me-2"></i>Bookings</a>
        <a class="nav-link <?= $page==='rooms'?'active':'' ?>" href="?page=rooms"><i class="bi bi-building me-2"></i>Rooms</a>
        <a class="nav-link <?= $page==='guests'?'active':'' ?>" href="?page=guests"><i class="bi bi-person-lines-fill me-2"></i>Guests</a>
        <a class="nav-link <?= $page==='facilities'?'active':'' ?>" href="?page=facilities"><i class="bi bi-grid-3x3-gap me-2"></i>Features & Facilities</a>
      </nav>
    </div>

    <!-- Offcanvas (Mobile) -->
    <div class="offcanvas offcanvas-start offcanvas-dark" tabindex="-1" id="mobileMenu">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title">Menu</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
      </div>
      <div class="offcanvas-body">
        <nav class="nav flex-column">
          <a class="nav-link" href="?page=dashboard"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
          <a class="nav-link" href="?page=settings"><i class="bi bi-gear me-2"></i>Settings</a>
          <a class="nav-link" href="?page=bookings"><i class="bi bi-calendar-check me-2"></i>Bookings</a>
          <a class="nav-link" href="?page=rooms"><i class="bi bi-building me-2"></i>Rooms</a>
          <a class="nav-link" href="?page=guests"><i class="bi bi-person-lines-fill me-2"></i>Guests</a>
          <a class="nav-link" href="?page=facilities"><i class="bi bi-grid-3x3-gap me-2"></i>Features & Facilities</a>
        </nav>
      </div>
    </div>

    <!-- Main -->
    <div class="col-lg-10 p-3 p-lg-4">
      <?php 
      if ($page==='dashboard'): 

          $cntBookings = $mysqli->query("SELECT COUNT(*) c FROM bookings")->fetch_assoc()['c'] ?? 0;
          $cntRooms    = $mysqli->query("SELECT COUNT(*) c FROM rooms")->fetch_assoc()['c'] ?? 0;
          $cntAvail    = $mysqli->query("SELECT COUNT(*) c FROM rooms WHERE status='available'")->fetch_assoc()['c'] ?? 0;
        ?>
        <h4 class="section-title mb-3">Dashboard Overview</h4>
        <div class="row g-3">
          <div class="col-md-3">
            <div class="glass-card p-3 text-center stat-card">
              <i class="bi bi-calendar-check display-6 text-primary"></i>
              <div class="fw-semibold mt-2">Total Bookings</div>
              <div class="h4 m-0"><?= (int)$cntBookings ?></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="glass-card p-3 text-center stat-card">
              <i class="bi bi-building display-6 text-success"></i>
              <div class="fw-semibold mt-2">Rooms</div>
              <div class="h4 m-0"><?= (int)$cntRooms ?></div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="glass-card p-3 text-center stat-card">
              <i class="bi bi-door-open display-6 text-info"></i>
              <div class="fw-semibold mt-2">Available Rooms</div>
              <div class="h4 m-0"><?= (int)$cntAvail ?></div>
            </div>
          </div>
        </div>

        <div class="glass-card p-3 mt-4">
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="m-0">Quick Actions</h5>
            <div>
              <a href="?page=bookings" class="btn btn-sm btn-gradient w-100"><i class="bi bi-plus-lg me-1"></i>New Booking</a>
              <a href="?page=rooms" class="btn btn-sm btn-outline-secondary ms-2">Manage Rooms</a>
            </div>
          </div>
          <hr>
          <div class="small text-muted">Use the sidebar to navigate all admin operations.</div>
        </div>

<!-- Display of settings window (Starts) -->
      <?php elseif ($page==='settings'): ?>
        <h4 class="section-title mb-3">General Settings</h4>
        <div class="glass-card p-3">
          <form method="post">
            <input type="hidden" name="action" value="save_settings">
            <div class="mb-3">
              <label class="form-label fw-semibold">Site Title</label>
              <input type="text" name="site_title" class="form-control" value="" required>
            </div>
            <div class="mb-3">
              <label class="form-label fw-semibold">About Us</label>
              <textarea name="about" rows="5" class="form-control"></textarea>
            </div>
            <button class="btn btn-gradient w-100"><i class="bi bi-save me-1"></i>Save</button>
          </form>
        </div>
<!-- Display of settings window (Ends) -->

<!-- ********************************************************************************************** -->

<!-- Display of Rooms window (Starts) --> 
      <?php elseif ($page==='rooms'): ?>
        <h4 class="section-title mb-3">Rooms</h4>
        <div class="row g-3">
          <div class="col-lg-4">
            <div class="glass-card p-3">
              <h6 class="fw-semibold mb-2">Add Rooms</h6>
              <?php
                $editRoom = null;
                if ($rid = get('edit')) {
                  $rid = intval($rid);
                  $editRoom = $mysqli->query("SELECT * FROM rooms WHERE id=$rid")->fetch_assoc();
                }
              ?>

              <!-- room form -->
              <form method="post" class="mt-2">
                <input type="hidden" name="action" value="<?= $editRoom ? 'edit_room':'add_room' ?>">
                <?php if($editRoom): ?><input type="hidden" name="id" value="<?= (int)$editRoom['id'] ?>"><?php endif; ?>
                <div class="mb-2">
                  <label class="form-label">Room No</label>
                  <input name="room_no" class="form-control" required value="<?= esc($editRoom['room_no'] ?? '') ?>">
                </div>
                <div class="mb-2">
                  <label class="form-label">Type</label>

                  <select name="type" class="form-select">
                    <?php
                      $Roomtypes = ['Deluxe Room','Superior Room','Suite Room'];
                      $cur = $editRoom['status'] ?? 'Deluxe Room';
                      foreach($Roomtypes as $s){
                        $sel = $cur===$s?'selected':'';
                        echo "<option $sel value='$s'>".ucfirst($s)."</option>";
                      }
                    ?>
                  </select>

                </div>
                <div class="mb-2">
                  <label class="form-label">Price</label>
                  <input name="price" type="number" step="0.01" class="form-control" required value="<?= esc($editRoom['price'] ?? '') ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select name="status" class="form-select">
                    <?php
                      $statuses = ['available','occupied','maintenance'];
                      $cur = $editRoom['status'] ?? 'available';
                      foreach($statuses as $s){
                        $sel = $cur===$s?'selected':'';
                        echo "<option $sel value='$s'>".ucfirst($s)."</option>";
                      }
                    ?>
                  </select>
                </div>
                <button class="btn btn-gradient w-100"><?= $editRoom ? 'Update Room' : 'Add Room' ?></button>
              </form>

              <!-- room form -->

            </div>
          </div>

              <!-- All rooms -->

          <div class="col-lg-8">
            <div class="glass-card p-3">
              <div class="d-flex align-items-center justify-content-between mb-2">
                <h6 class="fw-semibold m-0">All Rooms</h6>
              </div>
              <div class="table-responsive">
                <table id="tblRooms" class="table table-striped align-middle">
                  <thead><tr><th>Room No</th><th>Type</th><th>Price</th><th>Status</th><th>Actions</th></tr></thead>
                  <tbody>
                    <?php
                      $rs = $mysqli->query("SELECT * FROM rooms ORDER BY id DESC");
                      while($r=$rs->fetch_assoc()):
                    ?>
                    <tr>
                      <td><?= esc($r['room_no']) ?></td>
                      <td><?= esc($r['type']) ?></td>
                      <td><?= esc($r['price']) ?></td>
                      <td><span class="badge bg-secondary"><?= ucfirst(esc($r['status'])) ?></span></td>
                      <td class="text-nowrap">
                        <a class="btn btn-sm btn-primary" href="?page=rooms&edit=<?= (int)$r['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                        <form method="post" class="d-inline" onsubmit="return confirm('Delete room?')">
                          <input type="hidden" name="action" value="delete_room">
                          <input type="hidden" name="id" value="<?= (int)$r['id'] ?>">
                          <button type="submit" class="btn #tblBookings .dlt-btn">
                          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </button>
                        </form>
                      </td>
                    </tr>
                    <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
              <!-- All rooms -->

            </div>
          </div>
        </div>
<!-- Display of Rooms window (Ends) -->

<!-- ********************************************************************************************** -->

<!-- Display of Guests window (Starts) -->
      <?php elseif ($page==='guests'): ?>
        <h4 class="section-title mb-3">Guests</h4>
        
          <div class="col-lg-15">
            <div class="glass-card p-3">
              <div class="table-responsive">
                <table id="tblGuests" class="table table-striped align-middle">
                  <thead><tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>Room</th><th>Check in</th><th>Check Out</th><th>Actions</th></tr></thead>
                  <tbody>
                  <?php
                    $gs = $mysqli->query("SELECT * FROM bookings ORDER BY id DESC");
                    while($g=$gs->fetch_assoc()):
                  ?>
                    <tr>
                      <td><?= (int)$g['id'] ?></td>
                      <td><?= esc($g['name']) ?></td>
                      <td><?= esc($g['email']) ?></td>
                      <td><?= esc($g['Phone']) ?></td>
                      <td><?= esc($g['room_no']) ?></td>
                      <td><?= esc($g['checkin']) ?></td>
                      <td><?= esc($g['checkout']) ?></td>
                      <td class="text-nowrap">
                        <a class="btn btn-sm btn-primary" href="?page=guests&edit=<?= (int)$g['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                        <form method="post" class="d-inline" onsubmit="return confirm('Delete guest?')">
                          <input type="hidden" name="action" value="delete_guest">
                          <input type="hidden" name="id" value="<?= (int)$g['id'] ?>">
                          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
<!-- Display of Guests window (ends) -->

<!-- Display of Facilities window (Starts) -->
      <?php elseif ($page==='facilities'): ?>
        <h4 class="section-title mb-3">Features & Facilities</h4>
        <div class="row g-3">
          <div class="col-lg-4">
            <div class="glass-card p-3">
              <h6 class="fw-semibold mb-2">Add Facility</h6>
              <?php
                $editFac=null;
                if ($fid=get('edit')) {
                  $fid=intval($fid);
                  $editFac=$mysqli->query("SELECT * FROM facilities WHERE id=$fid")->fetch_assoc();
                }
              ?>
              <form method="post">
                <input type="hidden" name="action" value="<?= $editFac?'edit_facility':'add_facility' ?>">
                <?php if($editFac): ?><input type="hidden" name="id" value="<?= (int)$editFac['id'] ?>"><?php endif; ?>
                <div class="mb-2"><label class="form-label">Name</label><input name="feature_name" class="form-control" required value="<?= esc($editFac['name'] ?? '') ?>"></div>
                <div class="mb-2"><label class="form-label">Icon</label><input name="icon" class="form-control" placeholder="font awesome/bootstrap icon" value="<?= esc($editFac['icon'] ?? '') ?>"></div>
                <div class="mb-3"><label class="form-label">Description</label><input name="description" class="form-control" value="<?= esc($editFac['description'] ?? '') ?>"></div>
                <button class="btn btn-gradient w-100"><?= $editFac?'Update':'Add' ?> Facility</button>
              </form>
            </div>
          </div>
          <div class="col-lg-8">
            <div class="glass-card p-3">
              <div class="table-responsive">
                <table id="tblFacilities" class="table table-striped align-middle">
                  <thead><tr><th>Name</th><th>icon</th><th>Description</th><th>Actions</th></tr></thead>
                  <tbody>
                  <?php
                    $fs = $mysqli->query("SELECT * FROM facilities ORDER BY id DESC");
                    while($f=$fs->fetch_assoc()):
                  ?>
                    <tr>
                      <td><?= esc($f['feature_name']) ?></td>
                      <td><i class="<?= $f['icon'] ?> fs-5 text-primary"></i></td>
                      <td><?= esc($f['description']) ?></td>
                      <td class="text-nowrap">
                        <a class="btn btn-sm btn-primary" href="?page=facilities&edit=<?= (int)$f['id'] ?>"><i class="bi bi-pencil-square"></i></a>
                        <form method="post" class="d-inline" onsubmit="return confirm('Delete facility?')">
                          <input type="hidden" name="action" value="delete_facility">
                          <input type="hidden" name="id" value="<?= (int)$f['id'] ?>">
                          <button class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                      </td>
                    </tr>
                  <?php endwhile; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>

<!-- Display of Facilities window (Ends) -->

<!-- Display of Bookings window (Starts) -->

<!-- testing from guests -->
      <?php elseif ($page==='bookings'): ?>
        <h4 class="section-title mb-3">Bookings</h4>
        <div class="row g-3 ">
          <div class="col-lg-5 ">
            
            <div class="glass-card p-3">
              <h6 class="fw-semibold mb-2">New Booking</h6>
              <?php
                $editBk=null;
                if ($bid=get('edit')) {
                  $bid=intval($bid);
                  $editBk=$mysqli->query("SELECT * FROM bookings WHERE id=$bid")->fetch_assoc();
                }
                $guestOpts = $mysqli->query("SELECT id,name FROM guests ORDER BY name ASC");
                $roomOpts  = $mysqli->query("SELECT id,room_no FROM rooms ORDER BY room_no ASC");
              ?>
              <form method="post">
                <input type="hidden" name="action" value="<?= $editBk?'edit_booking':'add_booking' ?>">
                <?php if($editBk): ?><input type="hidden" name="id" value="<?= (int)$editBk['id'] ?>"><?php endif; ?>
                <div class="mb-2">
                    <label class="form-label">Guest</label>
                    <input type="text" name="name" class="form-control" required>
                    
                    <label class="form-label">Gmail</label>
                    <input type="email" name="email" class="form-control" required>
                    
                    <label class="form-label">Phone</label>
                    <input type="tel" name="Phone" class="form-control" required>

                </div>
                
                <div class="mb-2">
                  <label class="form-label">Room</label>
                  <select name="room_no" class="form-select" required>
                    <?php
                      // Fetch available rooms
                      $fetchAvailablerooms = "SELECT * FROM rooms WHERE status = 'Available'";
                      $AvailableRooms = $mysqli->query($fetchAvailablerooms);

                      if (!$AvailableRooms) {
                          echo '<option value="">Error loading rooms</option>';
                      } else {
                          echo '<option value="" disabled>Select Room</option>';
                          while ($ro = $AvailableRooms->fetch_assoc()) {
                              // Check if this room is selected in edit mode
                              $sel = ($editBk && $editBk['room_no'] == $ro['room_no']) ? 'selected' : '';
                              ?>
                              <option <?= $sel ?> value="<?= htmlspecialchars($ro['room_no']) ?>">
                                <?= htmlspecialchars($ro['room_no']) ?>
                              </option>
                              <?php
                          }
                      }
                    ?>
                  </select>
                </div>
                <div class="mb-2">
                  <label class="form-label">Check-in</label>
                  <input type="date" name="checkin" class="form-control" required value="<?= esc($editBk['checkin'] ?? '') ?>">
                </div>
                <div class="mb-2">
                  <label class="form-label">Check-out</label>
                  <input type="date" name="checkout" class="form-control" required value="<?= esc($editBk['checkout'] ?? '') ?>">
                </div>
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <?php $cur = $editBk['status'] ?? 'pending'; ?>
                  <select name="status" class="form-select">
                    <?php foreach(['pending','confirmed','checked_in','checked_out','cancelled'] as $s):
                      $sel=$cur===$s?'selected':''; ?>
                      <option <?= $sel ?> value="<?= $s ?>"><?= ucwords(str_replace('_',' ',$s)) ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <button class="btn btn-gradient w-100"><?= $editBk?'Update Booking':'Create Booking' ?></button>
              </form>
            </div>
          </div>
        </div>
<!-- Display of Bookings window (Endss) -->

      <?php else: ?>
        <div class="alert alert-warning">Unknown section.</div>
      <?php endif; ?>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script>
  // DataTables init if tables exist
  $(function(){
    if($('#tblRooms').length) $('#tblRooms').DataTable();
    if($('#tblGuests').length) $('#tblGuests').DataTable();
    if($('#tblFacilities').length) $('#tblFacilities').DataTable();
    if($('#tblBookings').length) $('#tblBookings').DataTable();
  });
</script>
<?php
$mysqli->close();

?>
</body>
</html>