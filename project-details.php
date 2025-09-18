<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Project Details </title>
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
        <h1>Project Details</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.html">Home</a></li>
            <li class="current">Project Details</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Project Details Section -->
    <section id="project-details" class="project-details section">

      <div class="container" data-aos="fade-up">

        <div class="portfolio-details-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              },
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              }
            }
          </script>

          <div class="swiper-wrapper align-items-center">
          <?php 
                   $id = $_GET['id'];
                        $qry = $conn->query("SELECT * from `gallery` where Project_id='$id'");
                        while($row = $qry->fetch_assoc()):
                    ?>
            <div class="swiper-slide">
              <img src="assets/img/projects/<?php echo $row['photo'] ?>" alt="">
            </div>

            <!-- <div class="swiper-slide">
              <img src="assets/img/projects/remodeling-2.jpg" alt="">
            </div>

            <div class="swiper-slide">
              <img src="assets/img/projects/remodeling-3.jpg" alt="">
            </div> -->
            
            <?php endwhile; ?>
          </div>
          <div class="swiper-button-prev"></div>
          <div class="swiper-button-next"></div>
          <div class="swiper-pagination"></div>
          
        </div>

        <div class="row justify-content-between gy-4 mt-4">

          <div class="col-lg-8" data-aos="fade-up">
            <div class="portfolio-description">
            <?php 
                   $id = $_GET['id'];
                        $qry = $conn->query("SELECT * from `project_list` where p_id='$id'");
                        while($row = $qry->fetch_assoc()):
                    ?>
              <h2><?php echo $row['Project_name'] ?></h2>
              <p>
              <?php $img = $row['main_image'];  echo $row['description'] ?>
            </p>
              

              

            </div>
          </div>

          <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
            <div class="portfolio-info">
              <h3>Project information</h3>
              
              <img src="dealerAdmin/admin/uploads/<?= htmlspecialchars($img) ?>" class="img-fluid" alt="<?= htmlspecialchars($p['Project_name']) ?>">
              <ul>
                <li><strong>anager</strong><?php echo $row['manager'] ?></li>
                <li><strong>Client</strong> <?php echo $row['costomer'] ?></li>
                <li><strong>Project date</strong> <?php echo $row['s_date'] ?></li>
                
              </ul>
            </div>
          </div>

        </div>

      </div>
      <?php endwhile; ?>
    </section><!-- /Project Details Section -->

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