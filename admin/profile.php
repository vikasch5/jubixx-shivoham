<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$admin_id = $_SESSION['admin_id'];

// GET ADMIN DATA
$query = mysqli_query($conn, "SELECT * FROM admin WHERE id = '$admin_id'");
$admin = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php'; ?>

<body>
<div class="wrapper">

<?php include 'inc/sidebar.php'; ?>

<div class="page-wrapper">
<?php include 'inc/header.php'; ?>

<div class="container-fluid mt-3">

<div class="row">

<!-- PROFILE CARD -->
<div class="col-md-4">
    <div class="card shadow-sm text-center p-4 align-items-center">

        <img src="../uploads/admin/<?= $admin['image'] ?? 'default.png'; ?>"
             class="rounded-circle mb-3"
             width="120" height="120" style="object-fit:contain;">

        <h5><?= $admin['name']; ?></h5>
        <p class="text-muted"><?= $admin['email']; ?></p>

    </div>
</div>

<!-- UPDATE FORM -->
<div class="col-md-8">
    <div class="card shadow-sm p-4">

        <h4 class="mb-3">Update Profile</h4>

        <form class="ajaxForm" method="POST" action="action/api.php" enctype="multipart/form-data">

            <input type="hidden" name="action" value="update_profile">

            <!-- IMAGE -->
            <div class="mb-3">
                <label>Profile Photo</label>
                <input type="file" name="image" class="form-control">
            </div>

            <!-- PASSWORD -->
            <div class="mb-3">
                <label>New Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter new password">
            </div>

            <div class="mb-3">
                <label>Confirm Password</label>
                <input type="password" name="confirm_password" class="form-control" placeholder="Enter confirm password">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>

        </form>

    </div>
</div>

</div>

</div>

<?php include 'inc/footer.php'; ?>
</div>
</div>

</body>
</html>