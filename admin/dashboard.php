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
      <div class="content-wrapper">
        <div class="content">
          <!-- Top Statistics -->
          <!-- <div class="row">
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2>$18,699</h2>
                  <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                  <div class="sub-title">
                    <span class="mr-1">Sales of this year</span> |
                    <span class="mx-1">45%</span>
                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <div>
                      <div id="spline-area-1"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2>$14,500</h2>
                  <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                  <div class="sub-title">
                    <span class="mr-1">Expense of this year</span> |
                    <span class="mx-1">50%</span>
                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <div>
                      <div id="spline-area-2"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2>$4199</h2>
                  <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                  <div class="sub-title">
                    <span class="mr-1">Profit of this year</span> |
                    <span class="mx-1">20%</span>
                    <i class="mdi mdi-arrow-down-bold text-danger"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <div>
                      <div id="spline-area-3"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6">
              <div class="card card-default card-mini">
                <div class="card-header">
                  <h2>$20,199</h2>
                  <div class="dropdown">
                    <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdownMenuLink"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                  <div class="sub-title">
                    <span class="mr-1">Revenue of this year</span> |
                    <span class="mx-1">35%</span>
                    <i class="mdi mdi-arrow-up-bold text-success"></i>
                  </div>
                </div>
                <div class="card-body">
                  <div class="chart-wrapper">
                    <div>
                      <div id="spline-area-4"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div> -->
        </div>

      </div>

      <?php include('inc/footer.php'); ?>

    </div>
  </div>

  <!-- Card Offcanvas -->
  <div class="card card-offcanvas" id="contact-off">
    <div class="card-header">
      <h2>Contacts</h2>
      <a href="#" class="btn btn-primary btn-pill px-4">Add New</a>
    </div>
    <div class="card-body">

      <div class="mb-4">
        <input type="text" class="form-control form-control-lg form-control-secondary rounded-0"
          placeholder="Search contacts...">
      </div>

      <div class="media media-sm">
        <div class="media-sm-wrapper">
          <a href="user-profile.html">
            <img src="images/user/user-sm-01.jpg" alt="User Image">
            <span class="active bg-primary"></span>
          </a>
        </div>
        <div class="media-body">
          <a href="user-profile.html">
            <span class="title">Selena Wagner</span>
            <span class="discribe">Designer</span>
          </a>
        </div>
      </div>

      <div class="media media-sm">
        <div class="media-sm-wrapper">
          <a href="user-profile.html">
            <img src="images/user/user-sm-02.jpg" alt="User Image">
            <span class="active bg-primary"></span>
          </a>
        </div>
        <div class="media-body">
          <a href="user-profile.html">
            <span class="title">Walter Reuter</span>
            <span>Developer</span>
          </a>
        </div>
      </div>

      <div class="media media-sm">
        <div class="media-sm-wrapper">
          <a href="user-profile.html">
            <img src="images/user/user-sm-03.jpg" alt="User Image">
          </a>
        </div>
        <div class="media-body">
          <a href="user-profile.html">
            <span class="title">Larissa Gebhardt</span>
            <span>Cyber Punk</span>
          </a>
        </div>
      </div>

      <div class="media media-sm">
        <div class="media-sm-wrapper">
          <a href="user-profile.html">
            <img src="images/user/user-sm-04.jpg" alt="User Image">
          </a>

        </div>
        <div class="media-body">
          <a href="user-profile.html">
            <span class="title">Albrecht Straub</span>
            <span>Photographer</span>
          </a>
        </div>
      </div>

      <div class="media media-sm">
        <div class="media-sm-wrapper">
          <a href="user-profile.html">
            <img src="images/user/user-sm-05.jpg" alt="User Image">
            <span class="active bg-danger"></span>
          </a>
        </div>
        <div class="media-body">
          <a href="user-profile.html">
            <span class="title">Leopold Ebert</span>
            <span>Fashion Designer</span>
          </a>
        </div>
      </div>

      <div class="media media-sm">
        <div class="media-sm-wrapper">
          <a href="user-profile.html">
            <img src="images/user/user-sm-06.jpg" alt="User Image">
            <span class="active bg-primary"></span>
          </a>
        </div>
        <div class="media-body">
          <a href="user-profile.html">
            <span class="title">Selena Wagner</span>
            <span>Photographer</span>
          </a>
        </div>
      </div>

    </div>
  </div>




  <script src="plugins/jquery/jquery.min.js"></script>
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="plugins/simplebar/simplebar.min.js"></script>
  <script src="https://unpkg.com/hotkeys-js/dist/hotkeys.min.js"></script>



  <script src="plugins/apexcharts/apexcharts.js"></script>



  <script src="plugins/DataTables/DataTables-1.10.18/js/jquery.dataTables.min.js"></script>



  <script src="plugins/jvectormap/jquery-jvectormap-2.0.3.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-us-aea.js"></script>



  <script src="plugins/daterangepicker/moment.min.js"></script>
  <script src="plugins/daterangepicker/daterangepicker.js"></script>
  <script>
    jQuery(document).ready(function () {
      jQuery('input[name="dateRange"]').daterangepicker({
        autoUpdateInput: false,
        singleDatePicker: true,
        locale: {
          cancelLabel: 'Clear'
        }
      });
      jQuery('input[name="dateRange"]').on('apply.daterangepicker', function (ev, picker) {
        jQuery(this).val(picker.startDate.format('MM/DD/YYYY'));
      });
      jQuery('input[name="dateRange"]').on('cancel.daterangepicker', function (ev, picker) {
        jQuery(this).val('');
      });
    });
  </script>



  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>



  <script src="plugins/toaster/toastr.min.js"></script>



  <script src="js/mono.js"></script>
  <script src="js/chart.js"></script>
  <script src="js/map.js"></script>
  <script src="js/custom.js"></script>




  <!--  -->


</body>

</html>