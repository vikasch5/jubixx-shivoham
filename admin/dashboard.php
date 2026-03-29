<?php
session_start()
  ?>
<html lang="en" dir="ltr">

<?php include 'inc/head.php'; ?>

<body class="navbar-fixed sidebar-fixed" id="body">

  <div id="toaster"></div>


  <!-- ====================================
    ——— WRAPPER
    ===================================== -->
  <div class="wrapper">


    <!-- ====================================
          ——— LEFT SIDEBAR WITH OUT FOOTER
        ===================================== -->
    <?php include 'inc/sidebar.php'; ?>



    <!-- ====================================
      ——— PAGE WRAPPER
      ===================================== -->
    <div class="page-wrapper">

      <?php include 'inc/header.php'; ?>

      <!-- ====================================
        ——— CONTENT WRAPPER
        ===================================== -->
      <?php
      $galleryCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM gallery WHERE status='active'"));
      $contactCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM contact_leads"));
      $appointmentCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM appointments"));
      $blogCount = mysqli_num_rows(mysqli_query($conn, "SELECT id FROM blogs WHERE status='published'"));
      ?>
      <style>
        .dashboard-card {
          border-radius: 14px;
          padding: 22px;
          color: #fff;
          transition: 0.3s;
          position: relative;
          overflow: hidden;
        }

        .dashboard-card:hover {
          transform: translateY(-6px);
        }

        /* PREMIUM SOFT GRADIENTS */
        .bg-1 {
          background: linear-gradient(135deg, #6366f1, #8b5cf6);
        }

        .bg-2 {
          background: linear-gradient(135deg, #f43f5e, #fb7185);
        }

        .bg-3 {
          background: linear-gradient(135deg, #0ea5e9, #22d3ee);
        }

        .bg-4 {
          background: linear-gradient(135deg, #10b981, #34d399);
        }

        /* subtle glass effect */
        .dashboard-card::after {
          content: "";
          position: absolute;
          top: 0;
          right: -40px;
          width: 120px;
          height: 120px;
          background: rgba(255, 255, 255, 0.15);
          border-radius: 50%;
        }

        /* text */
        .card-title {
          font-size: 13px;
          opacity: 0.9;
          letter-spacing: 0.5px;
        }

        .card-value {
          font-size: 30px;
          font-weight: 700;
          margin-top: 5px;
        }

        .card-icon {
          font-size: 26px;
          opacity: 0.4;
        }

        /* responsive */
        @media (max-width:768px) {
          .card-value {
            font-size: 24px;
          }
        }
      </style>

      <div class="container-fluid mt-3">
        <div class="row">

          <!-- Total Gallery -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-1 d-flex justify-content-between align-items-center">
              <div>
                <div class="card-title">Total Gallery</div>
                <div class="card-value"><?php echo $galleryCount; ?></div>
              </div>
              <div class="card-icon">
                <i class="fas fa-images"></i>
              </div>
            </div>
          </div>

          <!-- Total Contact Leads -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-2 d-flex justify-content-between align-items-center">
              <div>
                <div class="card-title">Total Contact Leads</div>
               <div class="card-value"><?php echo $contactCount; ?></div>
              </div>
              <div class="card-icon">
                <i class="fas fa-envelope"></i>
              </div>
            </div>
          </div>

          <!-- Total Appointments -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-3 d-flex justify-content-between align-items-center">
              <div>
                <div class="card-title">Total Appointments</div>
                <div class="card-value"><?php echo $appointmentCount; ?></div>
              </div>
              <div class="card-icon">
                <i class="fas fa-calendar-check"></i>
              </div>
            </div>
          </div>

          <!-- Total Blogs -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="dashboard-card bg-4 d-flex justify-content-between align-items-center">
              <div>
                <div class="card-title">Total Blogs</div>
                <div class="card-value"><?php echo $blogCount; ?></div>
              </div>
              <div class="card-icon">
                <i class="fas fa-blog"></i>
              </div>
            </div>
          </div>

        </div>
      </div>

      <?php include('inc/footer.php'); ?>

    </div>
  </div>

  <!-- Card Offcanvas -->
  <style>
    /* Dashboard Cards Styling */
    .dashboard-card {
      border-radius: 15px;
      overflow: hidden;
      transition: all 0.3s ease;
      position: relative;
    }

    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    .dashboard-card .card-body {
      padding: 1.5rem;
      position: relative;
      z-index: 1;
    }

    .dashboard-card .card-footer {
      padding: 0.75rem 1.5rem;
    }

    .dashboard-card .card-title {
      font-size: 0.875rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.5px;
      opacity: 0.95;
    }

    .dashboard-card .card-value {
      font-size: 2rem;
      line-height: 1.2;
    }

    .dashboard-card .card-icon {
      opacity: 0.3;
      position: absolute;
      right: 1rem;
      top: 50%;
      transform: translateY(-50%);
    }

    /* Gradient Backgrounds - Optimized for visibility */
    .gradient-1 {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    .gradient-2 {
      background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
    }

    .gradient-3 {
      background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
    }

    .gradient-4 {
      background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
    }

    .gradient-5 {
      background: linear-gradient(135deg, #fc6076 0%, #ff9a44 100%);
    }

    .gradient-6 {
      background: linear-gradient(135deg, #1fa2ff 0%, #12d8fa 100%);
    }

    .gradient-7 {
      background: linear-gradient(135deg, #f857a6 0%, #ff5858 100%);
    }

    /* Badge Styling */
    .badge-light-white {
      background-color: rgba(255, 255, 255, 0.25);
      color: white;
      padding: 0.375rem 0.75rem;
      border-radius: 20px;
      font-size: 0.75rem;
      font-weight: 500;
    }

    /* Dropdown Button */
    .dashboard-card .btn-light {
      background-color: rgba(255, 255, 255, 0.95);
      border: none;
      font-weight: 500;
      font-size: 0.875rem;
    }

    .dashboard-card .btn-light:hover {
      background-color: white;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
      .dashboard-card .card-value {
        font-size: 1.5rem;
      }

      .dashboard-card .card-icon i {
        font-size: 2rem !important;
      }
    }

    /* Animation */
    @keyframes fadeInUp {
      from {
        opacity: 0;
        transform: translateY(20px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .dashboard-card {
      animation: fadeInUp 0.5s ease;
    }

    .col-xl-3:nth-child(2) .dashboard-card {
      animation-delay: 0.1s;
    }

    .col-xl-3:nth-child(3) .dashboard-card {
      animation-delay: 0.2s;
    }

    .col-xl-3:nth-child(4) .dashboard-card {
      animation-delay: 0.3s;
    }

    .col-xl-3:nth-child(5) .dashboard-card {
      animation-delay: 0.4s;
    }

    .col-xl-3:nth-child(6) .dashboard-card {
      animation-delay: 0.5s;
    }

    .col-xl-3:nth-child(7) .dashboard-card {
      animation-delay: 0.6s;
    }

    .col-xl-3:nth-child(8) .dashboard-card {
      animation-delay: 0.7s;
    }
  </style>


</body>

</html>