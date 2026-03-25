<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Yoga | Health Beauty & Yoga Responsive HTML5 Template" />
<meta name="keywords" content="care, clinic, corporate, dental, dentist, doctor" />

<!-- Page Title -->
<title>Yoga | Health Beauty & Yoga Responsive HTML5 Template</title>
   
   <?php include ('inc/meta.php')?>
   <style>
        .blog-meta{
        display:flex;
        align-items:flex-start;
        gap:15px;
        }
        
        .blog-date{
        background:#2c7a6b;
        color:#fff;
        text-align:center;
        padding:8px 12px;
        border-radius:4px;
        min-width:55px;
        height:55px;
        }
        
        .blog-date .day{
        display:block;
        font-size:18px;
        font-weight:700;
        line-height:1;
        }
        
        .blog-date .month{
        font-size:12px;
        text-transform:uppercase;
        }
        
        .blog-title{
        flex:1;
        }
   </style>
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
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h2 class="title">Blog</h2>
              <ol class="breadcrumb text-center text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Pages</a></li>
                <li class="active text-theme-colored">Page Title</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
      <div class="container">
        <div class="row multi-row-clearfix">
          <div class="blog-posts">
            <?php
              $blogQuery = mysqli_query($conn, "SELECT * FROM blogs where status = 'published'");
              while($blogs = mysqli_fetch_array($blogQuery)){
            ?>
            <div class="col-md-4">
              <article class="post clearfix mb-30 bg-lighter blog-card">
            
                <div class="entry-header">
                  <div class="post-thumb thumb">
                    <img src="images/ChatGPT-Image-Mar-6-2026-03_19_10-PM-768x512.webp" alt="" class="img-responsive img-fullwidth">
                  </div>
                </div>
            
                <div class="entry-content border-1px p-20 pr-10">
            
                  <div class="blog-meta">
            
                    <div class="blog-date">
                      <span class="day">28</span>
                      <span class="month">Feb</span>
                    </div>
            
                    <div class="blog-title">
                      <h4 class="entry-title text-uppercase m-0">
                        <a href="blog-single-right-sidebar.html">
                          Guided Meditation for Better Sleep: A Natural Solution for Insomnia
                        </a>
                      </h4>
                    </div>
            
                  </div>
            
                  <p class="mt-10">
                    With the modern pace of life, sleep is often an expense; both in terms of quantity and quality. Stressful work, late-night screen time, changing schedules and constant mental stimulation have created...
                  </p>
            
                  <a href="blog-details.php" class="btn btn-theme-colored">Read more</a>
            
                </div>
            
              </article>
            </div>
            <?php } ?>
            
              </article>
            </div>
            
            <div class="col-md-12">
              <nav>
                <ul class="pagination theme-colored">
                  <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
                  <li class="active"><a href="#">1</a></li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
                  <li><a href="#">5</a></li>
                  <li><a href="#">...</a></li>
                  <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section> 
  </div>  
  <!-- end main-content -->
  
  <!-- Footer -->
    <?php include ('inc/footer.php')?>
</div>
  <!-- end wrapper -->

<!-- Footer Scripts --> 
<!-- JS | Custom script for all pages --> 
<script src="js/custom.js"></script>

</body>

</html>