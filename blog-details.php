<?php
include('admin/inc/config.php');

if(!isset($_GET['slug'])){
    die("Blog not found");
}

$slug = mysqli_real_escape_string($conn, $_GET['slug']);

$query = mysqli_query($conn, "SELECT * FROM blogs WHERE slug='$slug' AND status='published'");
$blog = mysqli_fetch_assoc($query);

if(!$blog){
    die("Blog not found");
}

// Increase views
mysqli_query($conn, "UPDATE blogs SET views = views + 1 WHERE id=".$blog['id']);

// Date format
$date = date("d", strtotime($blog['created_at']));
$month = date("M", strtotime($blog['created_at']));
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="<?php echo $blog['meta_description']; ?>" />
<meta name="keywords" content="<?php echo $blog['meta_keywords']; ?>" />

<!-- Page Title -->
<title><?php echo $blog['meta_title']; ?></title>

<?php include ('inc/meta.php')?>
</head>

<body class="">
<div id="wrapper">
    
<!-- Header -->
<?php include ('inc/header.php')?>

<!-- Start main-content -->
<div class="main-content">

<!-- Section: inner-header -->
<section class="inner-header divider parallax layer-overlay overlay-white-8" data-bg-img="images/bg/bg6.jpg">
  <div class="container pt-60 pb-60">
    <div class="section-content">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2 class="title">Blog Details</h2>
          <ol class="breadcrumb text-center text-black mt-10">
            <li><a href="index.php">Home</a></li>
            <li><a href="blog.php">Blog</a></li>
            <li class="active text-theme-colored">
              <?php echo htmlspecialchars($blog['title']); ?>
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Blog -->
<section>
  <div class="container mt-30 mb-30 pt-30 pb-30">
    <div class="row">

      <div class="col-md-9 pull-right flip sm-pull-none">
        <div class="blog-posts single-post">
          <article class="post clearfix mb-0">

            <!-- IMAGE (same design) -->
            <div class="entry-header">
              <div class="post-thumb thumb">
                <img src="uploads/blogs/<?php echo $blog['image']; ?>" 
                     alt="<?php echo htmlspecialchars($blog['title']); ?>" 
                     class="img-responsive img-fullwidth">
              </div>
            </div>

            <div class="entry-content">

              <!-- DATE + TITLE (same structure) -->
              <div class="entry-meta media no-bg no-border mt-15 pb-20">
                <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                  <ul>
                    <li class="font-16 text-white font-weight-600"><?php echo $date; ?></li>
                    <li class="font-12 text-white text-uppercase"><?php echo $month; ?></li>
                  </ul>
                </div>

                <div class="media-body pl-15">
                  <div class="event-content pull-left flip">
                    <h3 class="entry-title text-white text-uppercase pt-0 mt-0">
                      <a href="#">
                        <?php echo htmlspecialchars($blog['title']); ?>
                      </a>
                    </h3>
                  </div>
                </div>
              </div>

              <!-- DESCRIPTION (full dynamic HTML) -->
              <?php echo $blog['description']; ?>

              <!-- SHARE (same design) -->
             <div class="mt-30 mb-0">
                    <h5 class="pull-left flip mt-10 mr-20 text-theme-colored">Share:</h5>
                    <ul class="styled-icons icon-circled m-0">
                      <li><a href="#" data-bg-color="#3A5795"><i class="fa fa-facebook text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#55ACEE"><i class="fa fa-twitter text-white"></i></a></li>
                      <li><a href="#" data-bg-color="#A11312"><i class="fa fa-google-plus text-white"></i></a></li>
                    </ul>
                  </div>
            </div>
          </article>
        </div>
      </div>

      <!-- SIDEBAR (same design, now dynamic) -->
      <div class="col-md-3">
        <div class="sidebar sidebar-left mt-sm-30">
          <div class="widget">
            <h4 class="widget-title">Latest News</h4>
            <div class="latest-posts">

              <?php
              $latestQuery = mysqli_query($conn, "SELECT * FROM blogs WHERE status='published' ORDER BY created_at DESC LIMIT 5");

              while($latest = mysqli_fetch_assoc($latestQuery)){
              ?>
              <article class="post media-post clearfix pb-0 mb-10">
                <a class="post-thumb" href="blog-details.php?slug=<?php echo $latest['slug']; ?>">
                  <img src="uploads/blogs/<?php echo $latest['image']; ?>" alt="" width="75">
                </a>
                <div class="post-right">
                  <h5 class="post-title mt-0">
                    <a href="blog-details.php?slug=<?php echo $latest['slug']; ?>">
                      <?php echo htmlspecialchars($latest['title']); ?>
                    </a>
                  </h5>
                </div>
              </article>
              <?php } ?>

            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>

</div>

<!-- Footer -->
<?php include ('inc/footer.php')?>

</div>

<script src="js/custom.js"></script>

</body>
</html>