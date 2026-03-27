<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>

  <!-- Meta Tags -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
  <meta name="description" content="Yoga | Health Beauty & Yoga Responsive HTML5 Template" />
  <meta name="keywords" content="care, clinic, corporate, dental, dentist, doctor" />

  <!-- Page Title -->
  <title>Yoga | Health Beauty & Yoga Responsive HTML5 Template</title>

  <?php include('inc/meta.php') ?>
  <style>
    .faq-section {
      background: #f7f7f7;
      padding: 70px 0;
    }

    .faq-title {
      font-weight: 700;
      color: #2c7a6b;
    }

    .faq-line {
      width: 120px;
      height: 3px;
      background: #2c7a6b;
      margin: 15px auto 40px;
    }

    .faq-accordion .panel {
      border: 2px solid #7a8a77;
      border-radius: 4px;
      margin-bottom: 12px;
      box-shadow: none;
    }

    .faq-accordion .panel-heading {
      background: #fff;
    }

    .faq-accordion .panel-title a {
      display: block;
      font-size: 16px;
      font-weight: 600;
      color: #444;
      text-decoration: none;
    }

    .faq-accordion .panel-body {
      font-size: 15px;
      color: #555;
      line-height: 1.7;
    }

    .faq-img {
      max-height: 500px;
      margin: auto;
    }
  </style>
</head>

<body class="">
  <div id="wrapper">

    <!-- Header -->

    <?php include('inc/header.php') ?>


    <!-- Start main-content -->
    <div class="main-content">
      <!-- Section: inner-header -->
      <section class="inner-header divider parallax layer-overlay overlay-dark-7" data-bg-img="images/bg/bg8.jpg">
        <div class="container pt-60 pb-60">
          <!-- Section Content -->
          <div class="section-content">
            <div class="row">
              <div class="col-md-12 text-center">
                <h2 class="title text-white">Contact Us</h2>
                <p class="text-white">At Shivoham Shiv, we believe every connection is sacred. Whether you seek guidance
                  on our Vedic courses, wish to collaborate, or simply want to explore how ancient wisdom can transform
                  your modern life — we are here to listen, guide, and support you.
                </p>

                <p class="text-white">
                  Our team is always ready to help you begin or continue your journey of holistic well-being.</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section>
        <div class="container">
          <div class="row align-items-center">

            <!-- LEFT FORM -->
            <div class="col-md-6">
              <h2 class="text-uppercase line-bottom mb-20">
                Contact <span class="text-theme-colored">Us</span>
              </h2>
              <form id="contactForm">
                <input type="hidden" name="action" value="save_contact">

                <div class="form-group">
                  <label>Full Name <span style="color:red">*</span></label>
                  <input type="text" class="form-control" name="name" required placeholder="Enter your full name">
                </div>

                <div class="form-group">
                  <label>Email <span style="color:red">*</span></label>
                  <input type="email" class="form-control" name="email" required placeholder="Enter your email">
                </div>

                <div class="form-group">
                  <label>Contact Number <span style="color:red">*</span></label>
                  <input type="tel" class="form-control" name="phone" required placeholder="Enter your contact number">
                </div>

                <div class="form-group">
                  <label>Message <span style="color:red">*</span></label>
                  <textarea class="form-control" name="message" rows="4" required
                    placeholder="Write your message"></textarea>
                </div>

                <button type="button" id="submitBtn" class="btn btn-theme-colored btn-lg">
                  Send Message
                </button>
                <div id="formMessage" style="margin-top:15px;"></div>
              </form>
            </div>


            <!-- RIGHT IMAGE -->
            <div class="col-md-6 text-center">
              <img src="images/Blog-6.webp" class="img-responsive" alt="Shivoham Shiv">
            </div>

          </div>
        </div>
      </section>

      <section class="faq-section">
        <div class="container">

          <div class="text-center mb-40">
            <h2 class="faq-title">Find Out Answers Here</h2>
            <div class="faq-line"></div>
          </div>

          <div class="row">

            <!-- FAQ LEFT -->
            <div class="col-md-6">

              <div class="panel-group faq-accordion" id="faqAccordion">

                <!-- FAQ 1 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#faqAccordion" href="#faq1">
                        What is Mudra Therapy and how can it benefit me?
                      </a>
                    </h4>
                  </div>
                  <div id="faq1" class="panel-collapse collapse in">
                    <div class="panel-body">
                      Mudra Therapy is a holistic healing practice based on ancient Indian science. It uses specific
                      hand gestures (mudras) to balance energy flow in the body, helping improve physical health,
                      emotional stability, and mental clarity.
                    </div>
                  </div>
                </div>

                <!-- FAQ 2 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#faqAccordion" href="#faq2">
                        Are these courses suitable for beginners?
                      </a>
                    </h4>
                  </div>
                  <div id="faq2" class="panel-collapse collapse">
                    <div class="panel-body">
                      Absolutely! Both our Mudra Therapy and Vedic Maths courses are designed for all levels — from
                      beginners to advanced learners. Our instructors provide personalized guidance for every student’s
                      pace.
                    </div>
                  </div>
                </div>

                <!-- FAQ 3 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#faqAccordion" href="#faq3">
                        What is included in the 1-month trial module?
                      </a>
                    </h4>
                  </div>
                  <div id="faq3" class="panel-collapse collapse">
                    <div class="panel-body">
                      Our 1-month trial module gives you foundational knowledge of Mudra Therapy along with daily
                      practice challenges to help you feel the real benefits — from improved focus and relaxation to
                      better energy flow.
                    </div>
                  </div>
                </div>

                <!-- FAQ 4 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#faqAccordion" href="#faq4">
                        Are the classes live or recorded?
                      </a>
                    </h4>
                  </div>
                  <div id="faq4" class="panel-collapse collapse">
                    <div class="panel-body">
                      All Mudra Therapy sessions are conducted live, so you can interact directly with our expert
                      instructors. The Vedic Maths course is recorded, allowing flexible learning at your own pace.
                    </div>
                  </div>
                </div>

                <!-- FAQ 5 -->
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#faqAccordion" href="#faq5">
                        Do I need any prior experience to join?
                      </a>
                    </h4>
                  </div>
                  <div id="faq5" class="panel-collapse collapse">
                    <div class="panel-body">
                      No experience is needed. The trial module and full course are designed for beginners as well as
                      those already practicing yoga or holistic healing.
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <!-- IMAGE RIGHT -->
            <div class="col-md-6 text-center">
              <img src="images/Untitled-design-2025-11-06T165740.344-674x1024.webp" class="img-responsive faq-img"
                alt="Mudra Meditation">
            </div>

          </div>
        </div>
      </section>



    </div>
    <!-- end main-content -->

    <!-- Footer -->
    <?php include('inc/footer.php') ?>
  </div>
  <!-- end wrapper -->

  <!-- Footer Scripts -->
  <!-- JS | Custom script for all pages -->
  <script src="js/custom.js"></script>
  <script>
    $('#submitBtn').click(function () {

      var formData = new FormData($('#contactForm')[0]);

      $.ajax({
        url: 'admin/action/api.php',
        type: 'POST',
        data: formData,
        processData: false,
        contentType: false,
        success: function (res) {

          if (res.status === 'success') {

            $('#formMessage').html(
              '<div style="color:#155724; background:#d4edda; padding:10px; border-radius:5px;">'
              + res.message +
              '</div>'
            );

            $('#contactForm')[0].reset();

          } else {

            $('#formMessage').html(
              '<div style="color:#721c24; background:#f8d7da; padding:10px; border-radius:5px;">'
              + res.message +
              '</div>'
            );

          }

        },
        error: function () {
          $('#formMessage').html(
            '<div style="color:#721c24; background:#f8d7da; padding:10px; border-radius:5px;">Server error</div>'
          );
        }
      });

    });
  </script>
</body>

</html>