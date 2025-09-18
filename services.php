<!DOCTYPE html>
<html lang="en">
<?php
// ===== DEBUG (remove in production) =====
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// =======================================
// Database connection
$host = "localhost";
$user = "smarsazo_root"; // replace with your DB username
$pass = "kigali@smartdealerltd";     // replace with your DB password
$dbname = "smarsazo_smartdealer";

$conn = new mysqli($host, $user, $pass, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch services
$sql = "SELECT id, name, image FROM services";
$result = $conn->query($sql);
?>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Services </title>
  <meta name="description" content="">
  <meta name="keywords" content="">

    <?php 
      include_once('header.php');
      include_once('connection.php');
      ?>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title dark-background" style="background-image: url(assets/img/page-title-bg.jpg);">
      <div class="container position-relative">
        <h1>Services</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Services</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

     <!-- Services Section -->
<section id="services" class="services section light-background">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Services</h2>
    <p></p>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="row gy-4">

      <?php if ($result->num_rows > 0): ?>
        <?php 
        $delay = 100; // animation delay
        while ($row = $result->fetch_assoc()): 
        ?>
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
            <div class="service-item position-relative">
              <div class="icon">
                <!-- if you store font-awesome class in DB use echo directly, if image path use <img> -->
                <img src="dealerAdmin/admin/uploads/<?= htmlspecialchars($row['image']) ?>" alt="<?= htmlspecialchars($row['name']) ?>" style="width:50px; height:50px;">
              </div>
              <h3><?= htmlspecialchars($row['name']) ?></h3>
              <p></p>
              <a href="service-details.php?id=<?= $row['id'] ?>" class="readmore stretched-link">
                Read more <i class="bi bi-arrow-right"></i>
              </a>
            </div>
          </div><!-- End Service Item -->

        <?php 
          $delay += 100; // increase delay for next item
        endwhile; 
        ?>
      <?php else: ?>
        <p>No services available.</p>
      <?php endif; ?>

    </div>
  </div>
</section><!-- /Services Section -->

<!----><?php $conn->close(); ?>

  </main>

  <?php                        
  include_once('footer.php');
    ?>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>