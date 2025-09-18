<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Projects</title>
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
        <h1>Projects</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Projects</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Projects Section -->
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
$res = $cn->query("SELECT *  FROM project_list ORDER BY p_id DESC");
while ($row = $res->fetch_assoc()) {
  $projects[] = $row;
}
?>
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