<?php
include 'admin/inc/config.php';

$galleryQuery = mysqli_query($conn, "SELECT * FROM gallery WHERE status='active' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Yoga | Health Beauty & Yoga Responsive HTML5 Template" />
  <meta name="keywords" content="care, clinic, corporate, dental, dentist, doctor" />

  <title>Yoga | Health Beauty & Yoga Responsive HTML5 Template</title>

  <?php include('inc/meta.php') ?>

  <!-- ✅ Nivo Lightbox CSS -->
  <!--<link rel="stylesheet" href="css/nivo-lightbox.css">-->
  <!--<link rel="stylesheet" href="css/nivo-lightbox-default.css">-->

  <style>
    /* (YOUR SAME CSS — NO CHANGE) */
    .gallery-section {
      padding: 70px 0;
      background: #f7f7f7;
    }

    .gallery-title {
      font-weight: 700;
      color: #2c7a6b;
    }

    .gallery-line {
      width: 120px;
      height: 3px;
      background: #2c7a6b;
      margin: 15px auto 40px;
    }

    .gallery-box {
      border: 2px dotted #2c7a6b;
      padding: 12px;
      margin-bottom: 25px;
      background: #fff;
      transition: 0.3s;
    }

    .gallery-img {
      position: relative;
      overflow: hidden;
    }

    .gallery-img img {
      width: 100%;
      transition: 0.5s;
    }

    .gallery-box:hover img {
      transform: scale(1.1);
    }

    .gallery-overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(44, 122, 107, 0.7);
      opacity: 0;
      transition: 0.4s;
    }

    .gallery-icon {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%) scale(0.8);
      font-size: 28px;
      color: #fff;
      opacity: 0;
      transition: 0.4s;
    }

    .gallery-img:hover .gallery-overlay {
      opacity: 1;
    }

    .gallery-img:hover .gallery-icon {
      opacity: 1;
      transform: translate(-50%, -50%) scale(1);
    }

    .gallery-text {
      margin-top: 12px;
      font-size: 18px;
      font-weight: 600;
      color: #333;
    }

    .gallery-subtext {
      font-size: 14px;
      color: #777;
    }

    .gallery-box:hover {
      background: #2c7a6b;
    }

    .gallery-box:hover .gallery-text,
    .gallery-box:hover .gallery-subtext {
      color: #fff;
    }

    /* ✅ NIVO CUSTOM */
    .nivo-lightbox-close {
      right: 15px !important;
      left: auto !important;
    }

    .nivo-lightbox-prev,
    .nivo-lightbox-next {
      opacity: 1 !important;
    }
  </style>
</head>

<body>
  <div id="wrapper">

    <?php include('inc/header.php') ?>

    <div class="main-content">

      <section class="inner-header divider parallax layer-overlay overlay-dark-7" data-bg-img="images/bg/bg8.jpg">
        <div class="container pt-60 pb-60">
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white">Image Gallery</h2>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="gallery-section">
        <div class="container">

          <div class="text-center">
            <h2 class="gallery-title">Our Image Gallery</h2>
            <div class="gallery-line"></div>
          </div>

          <div class="row">

            <?php while ($row = mysqli_fetch_assoc($galleryQuery)) { ?>

              <div class="col-sm-6 col-md-4">
                <div class="gallery-box text-center">

                  <div class="gallery-img">
                    <a href="uploads/gallery/<?php echo $row['image']; ?>" data-lightbox-gallery="gallery1">

                      <img src="uploads/gallery/<?php echo $row['image']; ?>" class="img-responsive">

                      <div class="gallery-overlay"></div>

                      <div class="gallery-icon">
                        <span class="glyphicon glyphicon-zoom-in"></span>
                      </div>

                    </a>
                  </div>

                  <h4 class="gallery-text"><?php echo $row['title']; ?></h4>


                </div>
              </div>

            <?php } ?>

          </div>
        </div>
      </section>

    </div>

    <?php include('inc/footer.php') ?>

  </div>

  <!-- JS -->
  <script src="js/custom.js"></script>

  <!-- ✅ Nivo Lightbox JS -->
  <!--<script src="js/nivo-lightbox.min.js"></script>-->

  <!-- ✅ INIT -->
  <script>
    $(document).ready(function () {
      $('a[data-lightbox-gallery]').nivoLightbox({
        effect: 'fadeScale',
        keyboardNav: true,
        clickOverlayToClose: true
      });
    });
  </script>

</body>

</html>