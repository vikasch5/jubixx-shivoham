<style>
    /* Mobile Header Fix */
@media (max-width: 767px) {

  /* Hide middle info section */
  .header-middle .col-xs-12.col-sm-4.col-md-3 {
    display: none;
  }

  /* Show only appointment button */
  .header-middle .col-xs-12.col-sm-12.col-md-3 {
    display: none;
    text-align: center;
  }
  .header-middle .container {
      padding-top: 0px!important;
       padding-bottom: 0px!important;
  }

  .header-middle {
    padding-top: 10px;
    padding-bottom: 10px;
  }

}
/* Mobile appointment button */
.mobile-appointment-btn{
display:none;
}

@media (max-width:767px){

.mobile-appointment-btn{
display:flex;
background:#2e7d32;
color:#fff;
padding:6px 10px;
/*font-size:11px;*/
border-radius:3px;
/*margin-left:10px;*/
margin-top:10px;
justify-content: center;
}

.mobile-appointment-btn:hover{
color:#fff;
text-decoration:none;
}

}
</style>
<header id="header" class="header">
    <div class="header-top bg-theme-colored sm-text-center">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="widget text-white">
              <i class="fa fa-clock-o text-white"></i> Opening Hours:  Mon - Tues : 10.00 am - 6.00 pm, Sunday Closed
            </div>
          </div>
          <div class="col-md-6">
            <div class="widget">
              <ul class="list-inline pull-right flip sm-pull-none sm-text-center">
                <li><i class="fa fa-phone text-white"></i> <a class="text-white" href="#"><?= $settings['phone_number'] ?></a></li>
                <li><i class="fa fa-envelope-o text-white"></i> <a class="text-white" href="#"><?= $settings['email'] ?></a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-middle p-0 bg-lightest xs-text-center">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
              <i class="fa fa-envelope text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
              <a href="#" class="font-12 text-gray text-uppercase">Mail Us Today</a>
              <h5 class="font-13 text-black m-0"> <?= $settings['email'] ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
              <i class="fa fa-phone-square text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
              <a href="#" class="font-12 text-gray text-uppercase">Call us for more details</a>
              <h5 class="font-13 text-black m-0"> <?= $settings['phone_number'] ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-4 col-md-3">
            <div class="widget no-border sm-text-center mt-10 mb-10 m-0">
              <i class="fa fa-building-o text-theme-colored font-32 mt-5 mr-sm-0 sm-display-block pull-left flip sm-pull-none"></i>
              <a href="#" class="font-12 text-gray text-uppercase">Company Location</a>
              <h5 class="font-13 text-black m-0"> <?= $settings['header_address'] ?></h5>
            </div>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-3">
            <div class="widget no-border text-right flip sm-text-center mb-10 m-0">
              <a class="btn btn-colored btn-flat btn-theme-colored mt-15 pt-10 pb-10 ajaxload-popup" href="ajax-load/form-appointment.html">Request an appointment</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="header-nav">
  <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
    <div class="container">

      <nav id="menuzord-right" class="menuzord pink no-bg">

        <!-- Logo -->
        <a class="menuzord-brand pull-left flip mb-15" href="index.php">
          <img src="<?= 'uploads/settings/' . $settings['site_logo'] ?>" alt="">
        </a>

        <!-- Mobile Appointment Button -->
        <a href="ajax-load/form-appointment.html" 
           class="mobile-appointment-btn ajaxload-popup">
           Book Appointment
        </a>

        <ul class="menuzord-menu">
          <li><a href="index.php">Home</a></li>
          <li><a href="about.php">About Us</a></li>

          <li>
            <a href="#">Courses</a>
            <ul class="dropdown">
              <li><a href="wellness.php">Corporate & Adult Wellness</a></li>
              <li><a href="mudra-therapy.php">Mudra Therapy</a></li>
              <li><a href="acupressure-therapy.php">Acupressure Therapy</a></li>
              <li><a href="mindfulness-focus-training-for-kids.php">Mindfulness & Focus Training for Kids</a></li>
            </ul>
          </li>

          <li><a href="gallery.php">Gallery</a></li>
          <li><a href="contact.php">Contact Us</a></li>
          <li><a href="blog.php">Blog</a></li>
        </ul>

      </nav>

    </div>
  </div>
</div>
  </header>