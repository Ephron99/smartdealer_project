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
  <title>SmartDealer</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <!-- <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: UpConstruction
  * Template URL: https://bootstrapmade.com/upconstruction-bootstrap-construction-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.php" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename">SmartDealer Ltd</h1> <span>.</span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="index.php" class="active">Home</a></li>
          <li><a href="about.php">About</a></li>
          <li><a href="services.php">Services</a></li>
          <li><a href="projects.php">Projects</a></li>
          <li><a href="publication.php">Publications</a></li>
          
          <li><a href="contact.php">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">

      <div class="info d-flex align-items-center">
        <div class="container">
          <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-6 text-center">
              <h2>Welcome to SmartDealer Ltd</h2>
              <p>SMART DEALER Ltd, a reputable entity under Rwandan law, specializes in a diverse array of public works,
                 with a primary focus on Construction & Civil Engineering. Our comprehensive services encompass meticulous project studies, 
                 rigorous supervision of works, and specialized Telecommunication services tailored to the building sector.</p>
              <a href="#get-started" class="btn-get-started">Get Started</a>
            </div>
          </div>
        </div>
      </div>

      <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

        <!-- <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-5.jpg" alt="">
        </div> -->
        <div class="carousel-item active">
          <img src="assets/img/hero-carousel/hero-carousel-1.jpg" alt="">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/banner1.jpg" alt="">
        </div>

        <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-3.jpg" alt="">
        </div>

        <!-- <div class="carousel-item">
          <img src="assets/img/hero-carousel/hero-carousel-4.jpg" alt="">
        </div> -->

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
          <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
          <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

      </div>

    </section><!-- /Hero Section -->

    <!-- Get Started Section -->
    <section id="get-started" class="get-started section">

      <div class="container">

        <div class="row justify-content-between gy-4">

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
            <div class="content">
              <h3>Welcome to SmartDealer Ltd</h3>
              <p>SMART DEALER Ltd, a reputable entity under Rwandan law, specializes in a diverse array of public works,
                with a primary focus on Construction & Civil Engineering. Our comprehensive services encompass meticulous project studies, 
                rigorous supervision of works, and specialized Telecommunication services tailored to the building sector.</p></br>
              <p>Since our official registration with the National Registrar's Office (RDB) in September 2017,
                 SMART DEALER Ltd has consistently upheld a commitment to excellence and innovation in every project we undertake.
                  Whether you're embarking on a new construction venture or seeking reliable project oversight, 
                  our dedicated team stands ready to meet your needs with professionalism and expertise.</p>
            </div>
          </div>

          <div class="col-lg-5" data-aos="zoom-out" data-aos-delay="200">
            <form action="forms/quote.php" method="post" class="php-email-form">
              <h3>Contact Us</h3>
              <p></p>
              <div class="row gy-3">

                <div class="col-12">
                  <input type="text" name="name" class="form-control" placeholder="Name" required="">
                </div>

                <div class="col-12 ">
                  <input type="email" class="form-control" name="email" placeholder="Email" required="">
                </div>

                <div class="col-12">
                  <input type="text" class="form-control" name="phone" placeholder="Phone" required="">
                </div>

                <div class="col-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent successfully. Thank you!</div>

                  <button type="submit">Submit</button>
                </div>

              </div>
            </form>
          </div><!-- End Quote Form -->

        </div>

      </div>

    </section><!-- /Get Started Section -->


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

   <?php
   // ===== DEBUG (remove in production) =====
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
// =======================================
// DB connection
$host = "localhost";
$user = "smarsazo_root"; // replace with your DB username
$pass = "kigali@smartdealerltd";     // replace with your DB password
$db = "smarsazo_smartdealer";

$cn = new mysqli($host, $user, $pass, $db);
$cn->set_charset('utf8mb4');

// Helper: slugify service name to a CSS class
function filter_class_from_name($name) {
  $slug = strtolower($name);
  $slug = preg_replace('/[^a-z0-9]+/i', '-', $slug);
  $slug = trim($slug, '-');
  return 'filter-' . $slug;
}

/* 1) Fetch services for filters */
$services = [];
$classByServiceId = [];

$res = $cn->query("SELECT id, name FROM services ORDER BY name");
while ($row = $res->fetch_assoc()) {
  $cls = filter_class_from_name($row['name']);
  $services[] = ['id' => (int)$row['id'], 'name' => $row['name'], 'class' => $cls];
  $classByServiceId[(int)$row['id']] = $cls;
}

/* 2) Fetch projects */
$projects = [];
$res = $cn->query("SELECT *  FROM project_list where status='Published' ORDER BY p_id DESC");
while ($row = $res->fetch_assoc()) {
  $projects[] = $row;
}
?>

<!-- Projects Section -->
<section id="projects" class="projects section">

  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Projects</h2>
  </div><!-- End Section Title -->

  <div class="container">
    <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

      <!-- Filters -->
      <ul class="portfolio-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
        <li data-filter="*" class="filter-active">All</li>
        <?php foreach ($services as $s): ?>
          <li data-filter=".<?= htmlspecialchars($s['class']) ?>">
            <?= htmlspecialchars($s['name']) ?>
          </li>
        <?php endforeach; ?>
      </ul><!-- End Portfolio Filters -->

      <!-- Portfolio Items -->
      <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">
        <?php if (count($projects) > 0): ?>
          <?php foreach ($projects as $p):
            $cls = isset($classByServiceId[(int)$p['service']]) ? $classByServiceId[(int)$p['service']] : '';
            $img = $p['main_image']; // Use as-is (expects a full/relative path stored in DB)
          ?>
            <div class="col-lg-4 col-md-6 portfolio-item isotope-item <?= htmlspecialchars($cls) ?>">
              <div class="portfolio-content h-100">
                <img src="dealerAdmin/admin/uploads/<?= htmlspecialchars($img) ?>" class="img-fluid" alt="<?= htmlspecialchars($p['Project_name']) ?>">
                <div class="portfolio-info">
                  <h4><?= htmlspecialchars($p['Project_name']) ?></h4>
                  <p><?= nl2br(htmlspecialchars($p['Project_name'])) ?></p>
                  <a href="dealerAdmin/admin/uploads/<?= htmlspecialchars($img) ?>" 
                     title="<?= htmlspecialchars($p['Project_name']) ?>" 
                     data-gallery="portfolio-gallery" 
                     class="glightbox preview-link">
                    <i class="bi bi-zoom-in"></i>
                  </a>
                  <a href="project-details.php?id=<?= (int)$p['p_id'] ?>" title="More Details" class="details-link">
                    <i class="bi bi-link-45deg"></i>
                  </a>
                </div>
              </div>
            </div><!-- End Portfolio Item -->
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-warning">No projects found. Add some rows in the <code>projects</code> table.</div>
          </div>
        <?php endif; ?>
      </div><!-- End Portfolio Container -->

      <!-- Optional tiny debug hint (remove later) -->
      <div style="display:none">
        services_count=<?= count($services) ?>; projects_count=<?= count($projects) ?>;
      </div>

    </div>
  </div>
</section><!-- /Projects Section -->

<?php $cn->close(); ?>

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