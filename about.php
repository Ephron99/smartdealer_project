<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>About </title>
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
        <h1>About</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">About</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container">

        <div class="row position-relative">

          <div class="col-lg-7 about-img" data-aos="zoom-out" data-aos-delay="200"><img src="assets/img/DSC_2124.JPG"></div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
            <h2 class="inner-title">SmartDealer Ltd</h2>
            <div class="our-story">
              
              <h3>About Us</h3>
              <p>SMART DEALER Ltd, a reputable entity under Rwandan law, specializes in a diverse array of public works,
              with a primary focus on Construction & Civil Engineering.</p>
              <h3>What we do!</h3>
              <ul>
                <li><i class="bi bi-check-circle"></i> <span>Civil Work</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Telecommunication</span></li>
                <li><i class="bi bi-check-circle"></i> <span>Projects Study</span></li>
              </ul>
              <p>Our comprehensive services encompass meticulous project studies, 
              rigorous supervision of works, and specialized Telecommunication services tailored to the building sector.</p>

              
            </div>
          </div>

        </div>

      </div>

    </section><!-- /About Section -->

    
<!-- Testimonials Section -->
    <?php
// --- Database Connection ---
$host = "localhost";   // change if different
$user = "smarsazo_root";        // your DB username
$pass = "kigali@smartdealerltd";            // your DB password
$db   = "smarsazo_smartdealer";  // your DB name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// --- Fetch team members ---
$qry = $conn->query("SELECT * FROM team ORDER BY id ASC") or die($conn->error);
?>
    <section id="testimonials" class="testimonials section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Team</h2>
    <p>Team working is foundation</p>
  </div><!-- End Section Title -->

  <div class="container" data-aos="fade-up" data-aos-delay="100">

    <div class="swiper init-swiper">
      <script type="application/json" class="swiper-config">
        {
          "loop": true,
          "speed": 600,
          "autoplay": {
            "delay": 5000
          },
          "slidesPerView": "auto",
          "pagination": {
            "el": ".swiper-pagination",
            "type": "bullets",
            "clickable": true
          },
          "breakpoints": {
            "320": {
              "slidesPerView": 1,
              "spaceBetween": 40
            },
            "1200": {
              "slidesPerView": 2,
              "spaceBetween": 20
            }
          }
        }
      </script>
      <div class="swiper-wrapper">

       <?php if ($qry->num_rows > 0): ?>
            <?php while($row = $qry->fetch_assoc()): ?>
          <div class="swiper-slide">
            <div class="testimonial-wrap">
              <div class="testimonial-item">
                <img src="dealerAdmin/admin/uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="<?php echo $row['name']; ?>" style="height:250px;object-fit:cover;">
                        <h3><?php echo $row['name']; ?></h3>
                <h4><?php echo $row['position']; ?></h4>
                <div class="stars">
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                  <i class="bi bi-star-fill"></i>
                </div>
              </div>
            </div>
          </div><!-- End testimonial item -->
       <?php endwhile; ?>
        <?php else: ?>
            <p>No team members found in the database.</p>
        <?php endif; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>

  </div>

</section>
<!-- /Testimonials Section -->

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