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
              
              <h2 class="title text-white">Mudra Therapy Course</h2>
    
              <p class="text-white">
                At Shivoham Shiv, discover the science of ancient hand gestures (Mudras) that help restore balance, reduce stress, and support holistic well-being. Learn simple, natural practices designed for modern life and lasting inner harmony.
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
              <h3 class="text-theme-colored line-bottom text-theme-colored">Mudra Therapy</h3>
              <!--<h4 class="mt-0"><span class="text-theme-colored2">Price :</span> $25</h4>-->
              <h5><em>Mudra Therapy is an ancient Vedic healing practice that uses specific hand gestures, known as Mudras, to activate and balance the body’s natural energy channels. These hand positions help guide the flow of energy, supporting physical health, mental clarity, and emotional stability.</em></h5>
              <p>Each Mudra works by connecting different elements of the body, allowing energy to move more freely and restoring harmony within the system. When practiced regularly, Mudra Therapy supports the body’s natural ability to heal itself and maintain balance.</p>
                <p class="text-bold">Mudra Therapy helps by:</p>
                <ul class=" mt-20">
                    <li><i class="fa fa-check-circle text-success"></i> Activating specific energy pathways within the body</li>
                    <li><i class="fa fa-check-circle text-success"></i> Supporting physical, mental, and emotional balance</li>
                    <li><i class="fa fa-check-circle text-success"></i> Calming the nervous system and reducing stress</li>
                    <li><i class="fa fa-check-circle text-success"></i> Improving focus, awareness, and inner clarity</li>
                    <li><i class="fa fa-check-circle text-success"></i> Encouraging natural healing without external tools</li>
                </ul>
              <p class="mt-20">Mudra Therapy is gentle, non-invasive, and safe for all age groups. It requires no special equipment and can be practiced anywhere—at home, at work, or during meditation. Simple to learn and easy to integrate into daily life, Mudra Therapy offers a practical and natural approach to long-term well-being and inner harmony.</p>
              
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

    <h2 class="text-center">Benefits of Our Mudra Therapy Services</h2>
    <p class="subtitle text-center">
      Align your mind, body, and energy through authentic Mudra therapy.
    </p>

   <div class="row">

  <!-- CARD 1 -->
  <div class="col-12 col-md-6 col-lg-3 mb-4">
    <div class="card pb-0 mb-3">
      <div class="card-inner">

        <div class="front">
          <div class="icon"><i class="fa fa-sun-o"></i></div>
          <h3>Authentic Vedic Healing Approach</h3>
          <p>
            Our services are rooted in traditional Mudra knowledge, ensuring natural, time-tested practices that support holistic healing and inner balance.
          </p>
        </div>

        <div class="hover">
          <p>
            Rooted in ancient Mudra wisdom for natural, holistic balance.
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
          <div class="icon"><i class="fa fa-hand-paper-o"></i></div>
          <h3>Simple, Practical, and Effective</h3>
          <p>
            We focus on easy-to-follow Mudra techniques that can be practiced daily, making wellness accessible even with a busy lifestyle.
          </p>
        </div>

        <div class="hover">
          <p>
            Easy daily Mudras designed for modern lifestyles.
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
          <div class="icon"><i class="fa fa-balance-scale"></i></div>
          <h3>Supports Mind, Body, and Energy Balance</h3>
          <p>
            Our Mudra Therapy services help improve mental clarity, emotional stability, and physical well-being by aligning the body’s natural energy flow.
          </p>
        </div>

        <div class="hover">
          <p>
            Align energy flow to support clarity, calm, and well-being.
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
          <div class="icon"><i class="fa fa-user-circle"></i></div>
          <h3>Safe, Gentle, and Beginner-Friendly</h3>
          <p>
            Our approach is non-invasive, suitable for all age groups, and guided carefully to ensure correct and confident practice.
          </p>
        </div>

        <div class="hover">
          <p>
           Gentle, non-invasive practices suitable for everyone.
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