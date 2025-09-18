<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Publications </title>
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
        <h1>Publications</h1>
        <nav class="breadcrumbs">
          <ol>
            <li><a href="index.php">Home</a></li>
            <li class="current">Publications</li>
          </ol>
        </nav>
      </div>
    </div><!-- End Page Title -->

    <!-- Publications Section -->
<section id="blog-posts" class="blog-posts section">
  <div class="container">
    <div class="row gy-4">
      <?php
      // Fetch publications from DB
      $qry = $conn->query("SELECT * FROM pubulication ORDER BY 	created_date DESC");
      while($row = $qry->fetch_assoc()):
      ?>
        <div class="col-lg-4">
          <article class="position-relative h-100">

            <!-- If you have an image field in the table, use it -->
            <div class="post-img position-relative overflow-hidden">
              <img src="<?php echo !empty($row['image']) ? $row['image'] : 'assets/img/blog/default.jpg'; ?>" class="img-fluid" alt="">
              <span class="post-date">
                <?php echo date("F d, Y", strtotime($row['	created_date'])); ?>
              </span>
            </div>

            <div class="post-content d-flex flex-column">
              <h3 class="post-title"><?php echo $row['title']; ?></h3>

              <div class="meta d-flex align-items-center">
                <div class="d-flex align-items-center">
                  <i class="bi bi-person"></i> 
                  <span class="ps-2"><?php echo !empty($row['author']) ? $row['author'] : 'Admin'; ?></span>
                </div>
                <span class="px-3 text-black-50">/</span>
                <div class="d-flex align-items-center">
                  <i class="bi bi-folder2"></i> 
                  <span class="ps-2"><?php echo !empty($row['description']) ? $row['description'] : 'General'; ?></span>
                </div>
              </div>

              <p>
                <?php echo substr(strip_tags($row['description']), 0, 120) . '...'; ?>
              </p>

              <hr>

              <a href="" class="readmore stretched-link">
                <span>Read More</span><i class="bi bi-arrow-right"></i>
              </a>
            </div>

          </article>
        </div><!-- End Publication item -->
      <?php endwhile; ?>
    </div>
  </div>
</section><!-- /Publications Section -->


    
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