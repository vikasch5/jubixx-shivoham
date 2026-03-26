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
        <i class="mdi mdi-view-dashboard"></i>
        <span class="nav-text">Dashboard</span>
    </a>
</li>

<!-- Blogs -->
<li class="<?= in_array($currentPage,['blog-list.php','blog-add.php']) ? 'active' : '' ?>">
    <a class="sidenav-item-link" href="blog-list.php">
        <i class="mdi mdi-file-document"></i>
        <span class="nav-text">Blogs</span>
    </a>
</li>

<!-- Gallery -->
<li class="<?= in_array($currentPage,['gallery-list.php','gallery-add.php','gallery-form.php']) ? 'active' : '' ?>">
    <a class="sidenav-item-link" href="gallery-list.php">
        <i class="mdi mdi-image"></i>
        <span class="nav-text">Gallery</span>
    </a>
</li>

<!-- Settings -->
<li class="<?= $currentPage == 'settings.php' ? 'active' : '' ?>">
    <a class="sidenav-item-link" href="settings.php">
        <i class="mdi mdi-settings"></i>
        <span class="nav-text">Settings</span>
    </a>
</li>

<!-- Contact Leads -->
<li class="<?= in_array($currentPage, ['contact-leads.php']) ? 'active' : '' ?>">
    <a class="sidenav-item-link" href="contact-leads.php">
        <i class="mdi mdi-email"></i>
        <span class="nav-text">Contact Us Leads</span>
    </a>
</li>
            </ul>
        </div>
    </div>
</aside>