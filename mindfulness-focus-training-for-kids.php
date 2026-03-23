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
              
              <h2 class="title text-white">Mindfulness & Focus Training for Kids</h2>
    
              <p class="text-white">
                At Shivoham Shiv, our Mindfulness & EQ Program for Kids helps children build focus, emotional balance, and self-awareness through gentle, age-appropriate practices—supporting calm minds and healthy emotional growth in a natural, holistic way.
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
              <h3 class="text-theme-colored line-bottom text-theme-colored">Mindfulness & EQ Training for Kids</h3>
              <!--<h4 class="mt-0"><span class="text-theme-colored2">Price :</span> $25</h4>-->
              <h5><em>Mindfulness & Emotional Intelligence (EQ) Training for Kids is a gentle, structured approach that helps children understand their thoughts, emotions, and reactions in a healthy way. Rooted in mindful awareness and emotional learning, this program supports a child’s mental focus, emotional balance, and self-awareness during their key developmental years.</em></h5>
              <p>Through simple mindfulness exercises, breathing practices, and age-appropriate EQ activities, children learn how to calm their minds, recognize emotions, improve concentration, and respond positively to everyday situations at home, school, and social environments.</p>
               <p class="text-bold">Mindfulness & EQ Training works by:</p>
                <ul class=" mt-20">
                    <li><i class="fa fa-check-circle text-success"></i> Teaching children to become aware of their thoughts and emotions</li>
                    <li><i class="fa fa-check-circle text-success"></i> Improving focus, attention, and listening skills</li>
                    <li><i class="fa fa-check-circle text-success"></i> Helping manage stress, anxiety, and emotional overwhelm</li>
                    <li><i class="fa fa-check-circle text-success"></i> Building self-confidence, empathy, and emotional regulation</li>
                </ul>
              <p class="mt-20">Mindfulness & EQ Training is safe, non-invasive, and suitable for children of all ages. It can be easily integrated into daily routines and supports emotional stability, better behavior, improved learning ability, and overall mental well-being—naturally and holistically.</p>
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

    <h2 class="text-center">Benefits of Our Acupressure Therapy Services</h2>
    <p class="subtitle text-center">
      Experience traditional acupressure practices adapted for modern, stress-free living.
    </p>

    <div class="row">

  <!-- CARD 1 -->
  <div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card pb-0 mb-3">
      <div class="card-inner">

        <div class="front">
          <div class="icon"><i class="fa fa-bullseye"></i></div>
          <h3>Building Strong Concentration Skills</h3>
          <p>
            Helps children strengthen focus, listening ability, and mental clarity to support better learning and daily activities.
          </p>
        </div>

        <div class="hover">
          <p>
            Improved Focus & Attention
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
          <div class="icon"><i class="fa fa-balance-scale"></i></div>
          <h3>Understanding & Managing Emotions</h3>
          <p>
            Supports children in recognizing their emotions and responding calmly, helping develop emotional stability and self-control.
          </p>
        </div>

        <div class="hover">
          <p>
            Emotional Awareness & Balance
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
          <div class="icon"><i class="fa fa-smile-o"></i></div>
          <h3>Encouraging Calm & Positive Responses</h3>
          <p>
            Teaches simple mindfulness and breathing practices that reduce restlessness and promote calm, balanced behavior.
          </p>
        </div>

        <div class="hover">
          <p>
            Calm Behavior & Stress Management
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
          <div class="icon"><i class="fa fa-users"></i></div>
          <h3>Developing Healthy Social Interaction</h3>
          <p>
            Builds self-confidence, empathy, and positive communication skills, helping children connect better with others.
          </p>
        </div>

        <div class="hover">
          <p>
            Confidence & Social Skills
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