<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
<!-- Meta Tags -->
<!-- <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<meta name="description" content="Yoga | Health Beauty & Yoga Responsive HTML5 Template" />
<meta name="keywords" content="care, clinic, corporate, dental, dentist, doctor" /> -->


<!-- Page Title -->
<title>Shivoham Shiv</title>

<?php include ('inc/meta.php')?>
<title><?= $settings['meta_title'] ?></title>
<meta name="keywords" content="<?= $settings['meta_keywords'] ?>">
<meta name="description" content="<?= $settings['meta_description'] ?>"></style>
</head>
<style>
.stars{
    color:#f6a623;
    font-size:18px;
    margin-bottom:10px;
}
.course-fee{
    border:1px solid #ddd;
    padding:6px 10px;
    margin-bottom:10px;
    font-weight:600;
}
.event-card{
    background:#c8d8c9;tes
    padding:35px;
    border-radius:22px;
    box-shadow:0 10px 25px rgba(0,0,0,0.08);
    margin: 30px 0px 30px 0px;
}

.event-row{
    display:flex;
    align-items:center;
}

.event-img{
    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:18px;
}

.event-content-area{
    border-right:1px solid rgba(0,0,0,0.15);
    padding-left:25px;
}

.event-content-area h3{
    font-size:32px;
    font-weight:600;
    margin-bottom:10px;
}

.event-meta{
    list-style:none;
    padding:0;
    margin-bottom:12px;
}

.event-meta li{
    display:inline-block;
    margin-right:15px;
    color:#444;
}

.event-meta i{
    margin-right:5px;
    color:#2e6d65;
}

.event-btn-area{
    display:flex;
    align-items:center;
    justify-content:center;
}

.event-btn{
    background:#2e6d65;
    color:#fff;
    padding:12px 30px;
    border-radius:6px;
    text-decoration:none;
    font-weight:500;
}

.event-btn:hover{
    background:#1f4e47;
    color:#fff;
    text-decoration:none;
}
.flower-bg-section {
  position: relative;
  background-color: #caffd2;
  padding: 60px 0;
  overflow: hidden;
  z-index: 1;
}

.flower-bg-section::before {
  content: "";
  position: absolute;
  top: 0; left: 0;
  width: 100%;
  height: 100%;
  background: url('images/icon-flover.png.bv.webp');
  opacity: 0.4; 
}

.flower-bg-section .container {
  position: relative;
  z-index: 3;
}
.instructor-box{
background:#fff;
padding:40px;
border-radius:10px;
box-shadow:0 10px 30px rgba(0,0,0,0.08);
}

.instructor-img img{
border-radius:10px;
width:100%;
}

.instructor-content h3{
font-weight:700;
}

.instructor-info li{
margin-bottom:10px;
font-size:15px;
}

.instructor-info i{
color:#0d6efd;
margin-right:10px;
}

/* Responsive */
@media(max-width:768px){
.instructor-box{
    text-align:center;
    }
    .instructor-img{
    margin-bottom:25px;
    }
    .event-row{
        display:flex;
        align-items:center;
        flex-wrap: wrap;
    }

}
</style>
<body class="has-side-panel side-panel-right fullwidth-page">
<div id="wrapper">
   
	<!-- Header -->
	<?php include ('inc/header.php')?>
    
	  
  <!-- Start main-content -->
  <div class="main-content"> 
    <!-- Section: home -->
    <?php include ('inc/slider.php')?>
    
    <section class="shivoham-support">
        <div class="container">
            <div class="row align-items-center">
        
        <!-- LEFT IMAGE AREA -->
        <div class="col-md-6 image-area">
        
            <!-- left dotted bg -->
            <img class="bg-shape-left" src="images/dot.webp">
        
            <!-- main meditation image -->
            <img class="main-meditation-img" src="images/meditation.webp">
        
        </div>
        
        
        <!-- RIGHT CONTENT -->
        <div class="col-md-6 support-content">
        
        <h2>How Shivoham Shiv Supports Your Journey</h2>
        
        <p>
        At Shivoham Shiv, we are committed to guiding you on your path to personal
        growth, healing, and empowerment. We understand that the journey to
        holistic well-being is unique for each individual.
        </p>
        
       <div class="support-items">

        <div class="item">
        <div class="icon"><i class="fa fa-check"></i></div>
        <div>
        <h4 class="m-0">Mudra Therapy</h4>
        <p>Practice ancient hand gestures for better focus and healing.</p>
        </div>
        </div>
        
        <div class="item">
        <div class="icon"><i class="fa fa-check"></i></div>
        <div>
        <h4 class="m-0">Meditation</h4>
        <p>Experience guided techniques for peace and stress relief.</p>
        </div>
        </div>
        
        <div class="item">
        <div class="icon"><i class="fa fa-check"></i></div>
        <div>
        <h4 class="m-0">Mindfulness & EQ Training</h4>
        <p>Building calm minds and emotionally confident children.</p>
        </div>
        </div>
        
        <div class="item">
        <div class="icon"><i class="fa fa-check"></i></div>
        <div>
        <h4 class="m-0">Acupressure</h4>
        <p>Use key pressure points to relieve stress and pain.</p>
        </div>
        </div>
        
        <div class="item">
        <div class="icon"><i class="fa fa-check"></i></div>
        <div>
        <h4 class="m-0">Corporate & Adult Wellness</h4>
        <p>Simple techniques for stress relief and better workplace health.</p>
        </div>
        </div>
        
        </div>
        
        </div>
        </div>
        </div>
    </section>

    <!-- Section: About -->
    <section class="flower-bg-section">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class=" line-bottom-double-line-centered mt-0">Holistic Approach to  <span class="text-theme-colored">Personal</span>Growth</h2>
              <p>At Shivoham Shiv, we believe in a holistic approach that integrates Corporate Wellness, Mudra Therapy, Meditation, and Vedic Math. Each practice complements the others, creating a powerful system for healing, mental clarity, and personal empowerment.</p>
            </div>
          </div>
        </div>
        <div class="section-content text-center">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <img class="img-circle img-thumbnail mb-15" src="images/Untitled-design-2025-11-04T152646.108.png.bv.webp" alt="">
              <h3 class="mb-5">EQ Training for Kids</h3>
              <p><b>EQ Training for Kids</b> Nurturing emotional strength and mindful awareness in children.</p>
              <a href="mindfulness-focus-training-for-kids.php" class="btn btn-theme-colored">Read more</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
              <img class="img-circle img-thumbnail mb-15" src="images/ChatGPT-Image-Dec-31-2025-01_19_43-PM.png.bv.webp" alt="">
              <h3 class="mb-5">Meditation</h3>
              <p>Meditation deepens your connection to your inner self, helping you achieve peace, clarity, and mindfulness.</p>
              <a href="acupressure-therapy.php" class="btn btn-theme-colored">Read more</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.5s">
              <img class="img-circle img-thumbnail mb-15" src="images/ChatGPT-Image-Dec-31-2025-01_18_11-PM.png.bv.webp" alt="">
              <h3 class="mb-5">Mudra Therapy</h3>
              <p>Mudra Therapy enhances physical and emotional health by restoring energy balance in the body.</p>
              <a href="mudra-therapy.php" class="btn btn-theme-colored">Read more</a>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-sm-0 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.6s">
              <img class="img-circle img-thumbnail mb-15" src="images/ChatGPT-Image-Jan-2-2026-11_00_25-AM.png.bv.webp" alt="">
              <h3 class="mb-5">Corporate & Adult Wellness</h3>
              <p>Corporate & Adult wellness supports physical comfort and emotional health by improving overall balance. </p>
              <a href="wellness.php" class="btn btn-theme-colored">Read more</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Section: Events -->
    <section class="upcoming-event-section py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-3">
                  <h2 class="mt-0 text-black">Our <span class="text-theme-colored2"> Courses</span>
                  </h2>
                </div>
            </div>
            <div class="event-card">
                <div class="row event-row">
                    <!-- Image -->
                    <div class="col-md-4">
                    <img src="images/ChatGPT-Image-Dec-30-2025-02_11_42-PM.png.bv.webp" class="event-img">
                    </div>
            
                    <!-- Content -->
                    <div class="col-md-6 event-content-area">
                    
                    <h3>Corporate & Adult Wellness – Healthy Employees, Stronger Organizations</h3>
                    
                    <ul class="event-meta">
                     <li><i class="fa fa-clock-o"></i> 60 Minutes</li>
                    <li><i class="fa fa-video-camera"></i> Live Online Session</li>
                    <li><i class="fa fa-money"></i> Fees :- $2500*</li>
                    </ul>
                    
                    <p>
                   This corporate & Adult wellness initiative equips employees with simple techniques to manage stress, enhance clarity, and foster a healthier work environment.
                    </p>
                    
                    </div>
            
                    <!-- Button -->
                    <div class="col-md-2 event-btn-area">
                    <a href="wellness.php" class="event-btn">Read More</a>
                    </div>
                </div>
            </div>
            
            <div class="event-card">
                <div class="row event-row">
                    <!-- Image -->
                    <div class="col-md-4">
                    <img src="images/ChatGPT-Image-Dec-30-2025-02_10_56-PM.png.bv.webp" class="event-img">
                    </div>
            
                    <!-- Content -->
                    <div class="col-md-6 event-content-area">
                    
                    <h3>Mudra Therapy Course: A Path to Holistic Healing</h3>
                    
                    <ul class="event-meta">
                     <li><i class="fa fa-clock-o"></i> 60 Minutes</li>
                    <li><i class="fa fa-video-camera"></i> Live Online Session</li>
                    <li><i class="fa fa-money"></i> Fees :- $3500*</li>
                    </ul>
                    
                    <p>
                    Our Mudra Therapy Course introduces you to the science of ancient hand gestures (Mudras) that promote healing, balance, and well-being.
                    </p>
                    
                    </div>
            
                    <!-- Button -->
                    <div class="col-md-2 event-btn-area">
                    <a href="mudra-therapy.php" class="event-btn">Read More</a>
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    
    <section class="shivoham-hero">
        <div class="hero-shape-top" aria-hidden="true" data-negative="false">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 100" preserveAspectRatio="none">
        	<path class="hero-shape-fill" opacity="0.33" d="M473,67.3c-203.9,88.3-263.1-34-320.3,0C66,119.1,0,59.7,0,59.7V0h1000v59.7 c0,0-62.1,26.1-94.9,29.3c-32.8,3.3-62.8-12.3-75.8-22.1C806,49.6,745.3,8.7,694.9,4.7S492.4,59,473,67.3z">    
        	</path>
        	<path class="hero-shape-fill" opacity="0.66" d="M734,67.3c-45.5,0-77.2-23.2-129.1-39.1c-28.6-8.7-150.3-10.1-254,39.1 s-91.7-34.4-149.2,0C115.7,118.3,0,39.8,0,39.8V0h1000v36.5c0,0-28.2-18.5-92.1-18.5C810.2,18.1,775.7,67.3,734,67.3z"></path>
        	<path class="hero-shape-fill" d="M766.1,28.9c-200-57.5-266,65.5-395.1,19.5C242,1.8,242,5.4,184.8,20.6C128,35.8,132.3,44.9,89.9,52.5C28.6,63.7,0,0,0,0 h1000c0,0-9.9,40.9-83.6,48.1S829.6,47,766.1,28.9z">
        	</path>
            </svg>		
        </div>
        <div class="container">
            <div class="row align-items-center">
        
              <!-- LEFT CONTENT -->
              <div class="col-md-6 hero-content">
        
                <h5 class="small-title">Meditation Add-On Subscription</h5>
        
                <h1 class="main-title">
                  Meditation Subscription Plan: Inner Peace On Demand
                </h1>
        
                <p class="hero-text">
                  While Meditation is no longer a standalone course, you can now access
                  it through our <b>subscription-based plan</b> designed for all levels.
                  Enjoy guided meditations for <b>stress relief, emotional balance,
                  and mindfulness</b>, anytime and anywhere.
                </p>
        
                <h3 class="sub-heading">Subscription Includes:</h3>
        
                <ul class="feature-list">
                  <li>Access to new meditation recordings every week</li>
                  <li>Guided sessions for relaxation, focus, and energy balance</li>
                  <li>Ongoing access to support and community workshops</li>
                </ul>
        
                <a href="#" class="subscribe-btn">
                  <i class="fa fa-file-pdf-o"></i> Subscribe Plan
                </a>
        
              </div>
        
        
              <!-- RIGHT IMAGE -->
              <div class="col-md-6 hero-image">
        
                <img class="green-shape"
                src="images/bg3-1.png.bv_resized_desktop.png.bv.webp">
        
                <img class="dots-bg"
                src="images/bg3.png.bv_resized_desktop.png.bv.webp">
        
                <img class="yoga-girl"
                src="images/Untitled-design-2025-11-04T133712.561.png.bv.webp">
        
              </div>
        
            </div>
        </div>
    </section>

    <!-- SECTION: BENEFITS -->
    <section data-bg-color="#E3E3E1">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-10 col-md-offset-1">
              <h2 class="text-uppercase line-bottom-double-line-centered mt-0"> Why <span class="text-theme-colored">Choose Shivoham Shiv</span></h2>
              <p>At Shivoham Shiv, we offer authentic Vedic wisdom taught by experienced instructors in Corporate & Adult Wellness, Mudra Therapy, Meditation, and Mindfulness & Emotional Intelligence (EQ) Training for Kids. Our courses are easy to follow, practical, and suitable for every learner. With a holistic approach that nurtures mind, body, and inner growth, we help you build balance, clarity, and lasting well-being.</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-6">
              <div class="icon-box icon-theme-colored benefit-icon tmedia text-right p-0 mb-sm-10 mt-30">
                <a href="#" class="icon icon-circled icon-md border-1px border-theme-colored pull-right flip ml-30 pl-0">
                <i class="flaticon-spa-candles font-36 text-white"></i></a>
                <div class="media-body">
                  <h4 class="media-heading heading">Authentic Practices</h4>
                  <p>Our courses are based on ancient wisdom passed down through generations, rooted in Vedic traditions.</p>
                </div>
              </div>
              <div class="icon-box icon-theme-colored benefit-icon media text-right p-0 mb-sm-10 mt-30">
                <a href="#" class="icon icon-circled icon-md border-1px border-theme-colored pull-right flip ml-30 pl-0">
                <i class="flaticon-spa-face-mask font-36 text-white"></i></a>
                <div class="media-body">
                  <h4 class="media-heading heading">Experienced Instructors</h4>
                  <p>Learn from expert instructors with years of experience in Mudra Therapy, Meditation, and Vedic Math.</p>
                </div>
              </div>
              <div class="icon-box icon-theme-colored benefit-icon media text-right p-0 mb-sm-10 mt-30">
                <a href="#" class="icon icon-circled icon-md border-1px border-theme-colored pull-right flip ml-30 pl-0">
                <i class="flaticon-spa-flower-therapy font-36 text-white"></i></a>
                <div class="media-body">
                  <h4 class="media-heading heading">Holistic Approach</h4>
                  <p>We integrate Mudra Therapy, Meditation, and Vedic Math to offer a complete system for personal growth and healing.</p>
                </div>
              </div>
              <div class="icon-box icon-theme-colored benefit-icon media text-right p-0 mb-sm-10 mt-30">
                <a href="#" class="icon icon-circled icon-md border-1px border-theme-colored pull-right flip ml-30 pl-0">
                <i class="flaticon-spa-hot-stones font-36 text-white"></i></a>
                <div class="media-body">
                  <h4 class="media-heading heading">Comprehensive Learning </h4>
                  <p>Our courses are practical, engaging, and accessible to everyone, no matter your background.</p>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <img src="images/Untitled-design-2025-11-04T153230.108-1024x683.png.bv.webp" alt="">
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Instructor Section -->
    <section class="bg-lighter">
      <div class="container pt-70 pb-70">
    
        <div class="section-title text-center mb-50">
          <h2>Meet Our <span class="text-theme-colored">Instructor</span></h2>
          <p>Learn from an industry expert with real-world cybersecurity experience.</p>
        </div>
    
        <div class="row align-items-center instructor-box">
    
          <!-- Instructor Image -->
          <div class="col-md-5">
            <div class="instructor-img">
              <img src="images/6th-image-683x1024.webp" class="img-responsive" alt="Instructor">
            </div>
          </div>
    
          <!-- Instructor Details -->
          <div class="col-md-7">
            <div class="instructor-content">
    
              <h3 class="mt-0">Pooja Chaturvedi</h3>
              <h5 class="text-theme-colored mb-20">Certified Yoga Expert, Meditation Coach, and Holistic Wellness Practitioner </h5>
    
              <p>
               Pooja’s teaching style combines authentic ancient techniques with compassionate, practical guidance. She believes that healing is not just physical — it’s emotional, mental, and spiritual. Under her guidance, thousands of learners have found clarity, peace, and renewed confidence through courses like Corporate & Adult Wellness, Mudra Therapy, Meditation, and Mindfulness & Emotional Intelligence (EQ) Training for Kids.
              </p>
    
              <ul class="list-unstyled instructor-info mt-20">
                <li><i class="fa fa-briefcase"></i> 10+ Years Experience</li>
                <li><i class="fa fa-shield"></i> Certified Yoga Expert and Meditation Coach</li>
                <li><i class="fa fa-graduation-cap"></i> Holistic Wellness Practitioner</li>
              </ul>
    
              <ul class="styled-icons icon-dark icon-circled icon-sm mt-20">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              </ul>
    
            </div>
          </div>
    
        </div>
    
      </div>
    </section>

    <!--start funfact Section-->
    <section class="divider parallax layer-overlay overlay-theme-colored-8" data-bg-img="images/spa/bg/bg7.jpg">
      <div class="container pt-90 pb-90">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="mt-0 text-white">Some Funfacts</h2>
              <p class="text-white">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
              <div class="funfact text-center">
                <i class="flaticon-spa-aromatherapy-3 text-white"></i>
                <h2 data-animation-duration="2000" data-value="350" class="animate-number text-white font-38">0</h2>
                <h5 class="text-white text-uppercase mb-0">Aromatheraphy</h5>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
              <div class="funfact text-center">
                <i class="flaticon-spa-massage text-white"></i>
                <h2 data-animation-duration="2000" data-value="1250" class="animate-number text-white font-38">0</h2>
                <h5 class="text-white text-uppercase mb-0">Renewal Massages</h5>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-50">
              <div class="funfact text-center">
                <i class="flaticon-spa-candle-and-stone text-white"></i>
                <h2 data-animation-duration="2000" data-value="6227" class="animate-number text-white font-38">0</h2>
                <h5 class="text-white text-uppercase mb-0">Stone Use</h5>
              </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-3 mb-md-0">
              <div class="funfact text-center">
                <i class="flaticon-spa-woman-with-flower text-white"></i>
                <h2 data-animation-duration="2000" data-value="100%" class="animate-number text-white font-38">0</h2>
                <h5 class="text-white text-uppercase mb-0">Happy Clients</h5>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--start gallary Section-->
    <section>
      <div class="container-fluid pb-0">
        <div class="section-title text-center mt-0">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="mt-0 line-height-1">Our <span class="text-theme-colored2">Gallery</span></h2>
             <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rem autem<br> voluptatem obcaecati!</p>-->
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <!-- Portfolio Filter -->
             <!-- <div class="portfolio-filter text-center">
                <a href="#" class="active" data-filter="*">All</a>
                <a href="#branding" class="" data-filter=".branding">Branding</a>
                <a href="#design" class="" data-filter=".design">Design</a>
                <a href="#photography" class="" data-filter=".photography">Photography</a>
              </div>-->
              <!-- End Portfolio Filter -->
              
              <!-- Portfolio Gallery Grid -->
              <div class="gallery-isotope default-animation-effect grid-3 gutter-small clearfix" data-lightbox="gallery">
                <!-- Portfolio Item Start -->
                <div class="gallery-item design">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/1.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/1.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item branding photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/2.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/2.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item design">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/3.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/3.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item branding">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/4.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/4.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item design photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/5.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/5.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/6.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/6.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item branding">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/7.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/7.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item photography">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/8.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/8.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
                <!-- Portfolio Item Start -->
                <div class="gallery-item branding">
                  <div class="thumb">
                    <img class="img-fullwidth" src="images/spa/gallery/9.jpg" alt="project">
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center">Sample Title</div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="images/spa/gallery/full/9.jpg" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Portfolio Item End -->
              </div>
              <!-- End Portfolio Gallery Grid -->
            </div>
          </div>
        </div>
      </div>
    </section>
     
    

    <!--start testimonial Section-->
   
   <?php include ('inc/testimonials.php')?>
   
    <!--start blog Section-->
    
    
    <?php include ('inc/blogs.php')?>

  <!-- <?php include ('inc/recent-blogs.php')?> -->
   
  </div>

  <!-- Footer -->
  <?php include ('inc/footer.php')?>
  
  
</div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
      (Load Extensions only on Local File Systems ! 
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>

</html>