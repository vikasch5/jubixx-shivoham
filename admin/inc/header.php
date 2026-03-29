<!-- Header -->
<header class="main-header" id="header">
    <nav class="navbar navbar-expand-lg navbar-light" id="navbar">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle">
            <span class="sr-only">Toggle navigation</span>
        </button>

        <span class="page-title">dashboard</span>

        <div class="navbar-right ">

            <ul class="nav navbar-nav">
                <!-- Offcanvas -->

                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link" data-toggle="dropdown">

                        <img src="<?= !empty($_SESSION['image'])
                            ? '../uploads/admin/' . $_SESSION['image']
                            : '../assets/images/user-default.png'; ?>" class="user-image rounded-circle"
                            alt="User Image" />
                        <span class="d-none d-lg-inline-block"><?php echo $_SESSION['admin_name'] ?? 'Admin'; ?></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right">
                        <li>
                            <a class="dropdown-link-item" href="profile.php">
                                <i class="mdi mdi-settings"></i>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-link-item" href="logout.php">
                                <i class="mdi mdi-logout"></i>
                                <span class="nav-text">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>


</header>