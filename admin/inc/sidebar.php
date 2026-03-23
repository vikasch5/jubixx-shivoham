<?php
$currentPage = basename($_SERVER['PHP_SELF']);

$categoryPages = [
    'category-list.php',
    'category-add.php',
    'category-form.php',
    'sub-category-list.php',
    'sub-category-add.php',
    'sub-category-form.php'
];

$isCategoryActive = in_array($currentPage, $categoryPages);
include 'config.php';
$q = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
$settings = mysqli_fetch_assoc($q);
?>

<aside class="left-sidebar sidebar-dark" id="left-sidebar">
    <div id="sidebar" class="sidebar sidebar-with-footer">

        <div class="app-brand">
            <a href="dashboard.php">
                <img src="<?= '../uploads/settings/' . $settings['site_logo'] ?>" alt="Mono">
                <!-- <span class="brand-name">FGC India</span> -->
            </a>
        </div>

        <div class="sidebar-left" data-simplebar style="height: 100%;">
            <ul class="nav sidebar-inner" id="sidebar-menu">

                <!-- Dashboard -->
                <li class="<?= $currentPage == 'dashboard.php' ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="dashboard.php">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <!-- Category -->
                <li class="has-sub <?= $isCategoryActive ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="javascript:void(0)" data-toggle="collapse"
                        data-target="#categoryMenu" aria-expanded="<?= $isCategoryActive ? 'true' : 'false' ?>">
                        <i class="mdi mdi-email"></i>
                        <span class="nav-text">Category</span>
                        <b class="caret"></b>
                    </a>

                    <ul class="collapse <?= $isCategoryActive ? 'show' : '' ?>" id="categoryMenu"
                        data-parent="#sidebar-menu">
                        <div class="sub-menu">

                            <li
                                class="<?= in_array($currentPage, ['category-list.php', 'category-add.php']) ? 'active' : '' ?>">
                                <a class="sidenav-item-link" href="category-list.php">
                                    <span class="nav-text">Category List</span>
                                </a>
                            </li>

                            <li
                                class="<?= in_array($currentPage, ['sub-category-list.php', 'sub-category-add.php']) ? 'active' : '' ?>">
                                <a class="sidenav-item-link" href="sub-category-list.php">
                                    <span class="nav-text">Sub Category List</span>
                                </a>
                            </li>

                        </div>
                    </ul>
                </li>

                <li class="<?= in_array($currentPage, ['job-list.php', 'job-add.php']) ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="job-list.php">
                        <i class="mdi mdi-briefcase-account-outline"></i>
                        <span class="nav-text">Job List</span>
                    </a>
                </li>
                <li class="<?= $currentPage == 'job-applications.php' ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="job-applications.php">
                        <i class="mdi mdi-briefcase"></i>
                        <span class="nav-text">Job Applications</span>
                    </a>
                </li>

                <li class="<?= $currentPage == 'banners.php' ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="banners.php">
                        <i class="mdi mdi-image"></i>
                        <span class="nav-text">Banners</span>
                    </a>
                </li>

                <li class="<?= $currentPage == 'settings.php' ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="settings.php">
                        <i class="mdi mdi-settings"></i>
                        <span class="nav-text">Settings</span>
                    </a>
                </li>
                <li class="<?= in_array($currentPage, ['company-list.php', 'company-add.php']) ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="company-list.php">
                        <i class="mdi mdi-domain"></i>

                        <span class="nav-text">Companies</span>
                    </a>
                </li>
                <li class="<?= in_array($currentPage, ['contact-leads.php']) ? 'active' : '' ?>">
                    <a class="sidenav-item-link" href="contact-leads.php">
                        <i class="mdi mdi-email-outline"></i>

                        <span class="nav-text">Contact Us Leads</span>
                    </a>
                </li>


            </ul>
        </div>
    </div>
</aside>