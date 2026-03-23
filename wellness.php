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

</head>
<body class="">
<div id="wrapper" class="clearfix">
  
  <!-- Header -->
  <?php include ('inc/header.php')?>
  
  
  <!-- Start main-content -->
  <div class="main-content">
    <!-- Section: inner-header -->
      <section class="inner-header divider parallax layer-overlay overlay-dark-7" data-bg-img="images/bg/bg8.jpg">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              
              <h2 class="title text-white">Corporate & Adult Wellness: Well-Being at Work</h2>
    
              <p class="text-white">
                At Shivoham Shiv, we help organizations improve employee well-being through holistic, science-backed wellness programs rooted in ancient wisdom and adapted for modern workplaces.
              </p>
    
              <!-- Button -->
              <a href="#book-session" class="btn btn-theme-colored btn-lg mt-20">
                Book a Session
              </a>
    
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Section: Blog -->
    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-8 blog-pull-right">
            <div class="single-service">
              <img src="images/bg/bg13.jpg" alt="">
              <h3 class="text-theme-colored line-bottom text-theme-colored">Corporate & Adult Wellness</h3>
              <!--<h4 class="mt-0"><span class="text-theme-colored2">Price :</span> $25</h4>-->
              <h5><em>Corporate & Adult Wellness is a holistic approach focused on improving the physical, mental, and emotional well-being of employees within the workplace. It aims to create a healthier, more balanced, and productive work environment by addressing stress, burnout, lifestyle-related issues, and overall employee health.</em></h5>
              <p>In today’s fast-paced corporate culture, long working hours, screen exposure, and constant pressure often lead to fatigue, reduced focus, and health concerns. Corporate Wellness programs are designed to support employees through natural, preventive, and sustainable wellness practices that enhance both individual well-being and organizational performance.</p>
              
              <p class="text-bold">Corporate & Adult Wellness works by:</p>
                <ul class=" mt-20">
                <li><i class="fa fa-check-circle text-success"></i> Promoting physical health through stress-relief and body-care practices</li>
                <li><i class="fa fa-check-circle text-success"></i> Supporting mental clarity, focus, and emotional balance at work</li>
                <li><i class="fa fa-check-circle text-success"></i> Reducing workplace stress, burnout, and fatigue</li>
                <li><i class="fa fa-check-circle text-success"></i> Encouraging healthier habits and mindful routines</li>
                <li><i class="fa fa-check-circle text-success"></i> Creating a positive, energized, and engaged workforce</li>
            </ul>
              
              <p class="mt-20">Our Corporate & Adult Wellness approach focuses on simple, practical solutions that can be easily integrated into daily work life—whether on-site or online—without disrupting productivity.</p>
              <p>Corporate & Adult Wellness programs are safe, inclusive, and suitable for employees across all roles and age groups. Regular wellness initiatives help improve morale, reduce absenteeism, enhance focus, and build a healthier workplace culture that benefits both employees and organizations.</p>
             
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="sidebar sidebar-left mt-sm-30 ml-40">
              <div class="widget">
                <h4 class="widget-title line-bottom">Courses <span class="text-theme-colored2">List</span></h4>
                <div class="services-list">
                  <ul class="list list-border angle-double-right">
                    <li class="active"><a href="wellness.php">Corporate & Adult Wellness</a></li>
                    <li><a href="mudra-therapy.php">Mudra Therapy</a></li>
                    <li><a href="acupressure-therapy.php">Acupressure Therapy</a></li>
                    <li><a href="mindfulness-focus-training-for-kids.php">Mindfulness & Focus Training for Kids</a></li>
                   </ul>
                </div>
              </div>
              <div class="widget">
                <h4 class="widget-title line-bottom">Opening <span class="text-theme-colored2">Hours</span></h4>
                <div class="opening-hours">
                  <ul class="list-border">
                    <li class="clearfix"> <span> Mon - Tues :  </span>
                      <div class="value pull-right"> 6.00 am - 10.00 pm </div>
                    </li>
                    <li class="clearfix"> <span> Wednes - Thurs :</span>
                      <div class="value pull-right"> 8.00 am - 6.00 pm </div>
                    </li>
                    <li class="clearfix"> <span> Fri : </span>
                      <div class="value pull-right"> 3.00 pm - 8.00 pm </div>
                    </li>
                    <li class="clearfix"> <span> Sun : </span>
                      <div class="value pull-right"> Colosed </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="widget">
                <h4 class="widget-title line-bottom">Quick <span class="text-theme-colored2">Contact</span></h4>
                <form id="quick_contact_form_sidebar" name="footer_quick_contact_form" class="quick-contact-form" action="https://html.kodesolution.com/2017/health-yoga-html/demo/includes/quickcontact.php" method="post">
                  <div class="form-group">
                    <input name="form_email" class="form-control" type="text" required="" placeholder="Enter Email">
                  </div>
                  <div class="form-group">
                    <textarea name="form_message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
                  </div>
                  <div class="form-group">
                    <input name="form_botcheck" class="form-control" type="hidden" value="" />
                    <button type="submit" class="btn btn-theme-colored btn-flat btn-xs btn-quick-contact text-white pt-5 pb-5" data-loading-text="Please wait...">Send Message</button>
                  </div>
                </form>

                <!-- Quick Contact Form Validation-->
                <script type="text/javascript">
                  $("#quick_contact_form_sidebar").validate({
                    submitHandler: function(form) {
                      var form_btn = $(form).find('button[type="submit"]');
                      var form_result_div = '#form-result';
                      $(form_result_div).remove();
                      form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                      var form_btn_old_msg = form_btn.html();
                      form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                      $(form).ajaxSubmit({
                        dataType:  'json',
                        success: function(data) {
                          if( data.status == 'true' ) {
                            $(form).find('.form-control').val('');
                          }
                          form_btn.prop('disabled', false).html(form_btn_old_msg);
                          $(form_result_div).html(data.message).fadeIn('slow');
                          setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                        }
                      });
                    }
                  });
                </script>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
  <section class="benefits">
  <div class="container">

    <h2 class="text-center">Benefits of Our Corporate & Adult Wellness Services</h2>
    <p class="subtitle text-center">
      Experience practical wellness programs created to support employee health and balance.
    </p>

    <div class="row">

  <!-- CARD 1 -->
  <div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card pb-0 mb-3">
      <div class="card-inner">

        <div class="front">
          <div class="icon"><i class="fa fa-heartbeat"></i></div>
          <h3>Reduces Workplace Stress & Burnout</h3>
          <p>
            Helps employees manage work pressure, relax the mind, and prevent burnout through simple office-friendly practices.
          </p>
        </div>

        <div class="hover">
          <p>
            Helps reduce workplace stress and burnout
          </p>
        </div>

      </div>
    </div>
  </div>

  <!-- CARD 2 -->
  <div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card pb-0 mb-3">
      <div class="card-inner">

        <div class="front">
          <div class="icon"><i class="fa fa-line-chart"></i></div>
          <h3>Improves Focus, Energy & Productivity</h3>
          <p>
            Supports mental clarity and physical relaxation, helping teams stay energized and productive throughout the day.
          </p>
        </div>

        <div class="hover">
          <p>
            Improves focus, energy, and daily productivity
          </p>
        </div>

      </div>
    </div>
  </div>

  <!-- CARD 3 -->
  <div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card pb-0 mb-3">
      <div class="card-inner">

        <div class="front">
          <div class="icon"><i class="fa fa-medkit"></i></div>
          <h3>Relieves neck, shoulder, and back discomfort</h3>
          <p>
            Relieves common office discomfort like neck, shoulder, and back strain caused by long sitting hours and screen fatigue.
          </p>
        </div>

        <div class="hover">
          <p>
            Gentle therapy without medicines or equipment.
          </p>
        </div>

      </div>
    </div>
  </div>

  <!-- CARD 4 -->
  <div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card pb-0 mb-3">
      <div class="card-inner">

        <div class="front">
          <div class="icon"><i class="fa fa-briefcase"></i></div>
          <h3>Easy to Practice in Office Environment</h3>
          <p>
            Relieves common office discomfort like neck, shoulder, and back strain caused by long sitting hours and poor posture habits.
          </p>
        </div>

        <div class="hover">
          <p>
            Easy practices suitable for office settings
          </p>
        </div>

      </div>
    </div>
  </div>

</div>
  </div>
</section>
  
  <!-- Footer -->
  <?php include ('inc/footer.php')?>
  
</div>
<!-- end wrapper -->
<!-- Footer Scripts --> 
<!-- JS | Custom script for all pages --> 
<script src="js/custom.js"></script>

</body>

</html>