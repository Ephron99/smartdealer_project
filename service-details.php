<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Service Details</title>
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
        <h1>Service Details</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Service Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Service Details Section -->
    <section id="service-details" class="service-details section">

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
            <div class="services-list">
            <?php 
                   $id = $_GET['id'];
                        $qry = $conn->query("SELECT * from `services` where id='$id'");
                        while($row = $qry->fetch_assoc()):
                    ?>
              <a href="#" class="active"><?php $img = $row['image']; echo $row['name'] ?></a>
              
            </div>

            </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
            <img src="dealerAdmin/admin/uploads/<?= htmlspecialchars($img) ?>" class="img-fluid" alt="<?= htmlspecialchars($p['name']) ?>">
            <h3><?php echo $row['name'] ?></h3>
            <p>
            <?php echo $row['description'] ?></p>
            
            <?php endwhile; ?>
          </div>

        </div>

      </div>

    </section><!-- /Service Details Section -->

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