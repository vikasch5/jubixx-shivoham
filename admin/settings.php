<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

/* =======================
   FETCH SETTINGS
======================= */
$q = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
$settings = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php'; ?>

<body class="navbar-fixed sidebar-fixed" id="body">

    <div class="wrapper">
        <?php include 'inc/sidebar.php'; ?>
        <div class="page-wrapper">
            <?php include 'inc/header.php'; ?>

            <div class="content-wrapper">
                <div class="content">

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">

                                <div class="card-header">
                                    <h2>Website Settings</h2>
                                </div>

                                <div class="card-body">
                                    <form id="settingsForm" enctype="multipart/form-data">

                                        <div class="row">

                                            <!-- Logo -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Website Logo</label>
                                                <input type="file" name="site_logo" class="form-control"
                                                    accept=".jpg,.jpeg,.png,.webp">
                                                <?php if (!empty($settings['site_logo'])): ?>
                                                    <img src="../uploads/settings/<?= $settings['site_logo']; ?>"
                                                        height="50" class="mt-2">
                                                <?php endif; ?>
                                            </div>

                                            <!-- Favicon -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Favicon</label>
                                                <input type="file" name="favicon" class="form-control"
                                                    accept=".ico,.png">
                                                <?php if (!empty($settings['favicon'])): ?>
                                                    <img src="../uploads/settings/<?= $settings['favicon']; ?>" height="30"
                                                        class="mt-2">
                                                <?php endif; ?>
                                            </div>

                                            <!-- Meta Title -->
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Meta Title</label>
                                                <input type="text" name="meta_title" class="form-control"
                                                    value="<?= htmlspecialchars($settings['meta_title'] ?? '') ?>">
                                            </div>

                                            <!-- Meta Keywords -->
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Meta Keywords</label>
                                                <textarea name="meta_keywords" class="form-control"
                                                    rows="2"><?= htmlspecialchars($settings['meta_keywords'] ?? '') ?></textarea>
                                            </div>

                                            <!-- Meta Description -->
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Meta Description</label>
                                                <textarea name="meta_description" class="form-control"
                                                    rows="3"><?= htmlspecialchars($settings['meta_description'] ?? '') ?></textarea>
                                            </div>

                                            <!-- Contact Information -->
                                            <div class="col-12 mt-4">
                                                <h5 class="mb-3">Contact Information</h5>
                                            </div>

                                            <!-- Address -->
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Header Address</label>
                                                <textarea name="header_address" class="form-control" rows="3"
                                                    placeholder="Enter full address"><?= htmlspecialchars($settings['header_address'] ?? '') ?></textarea>
                                            </div>
                                            <div class="col-md-12 mb-3">
                                                <label class="form-label">Footer Address</label>
                                                <textarea name="address" class="form-control" rows="3"
                                                    placeholder="Enter full address"><?= htmlspecialchars($settings['address'] ?? '') ?></textarea>
                                            </div>

                                            <!-- Email -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Email</label>
                                                <input type="email" name="email" class="form-control"
                                                    placeholder="example@gmail.com"
                                                    value="<?= htmlspecialchars($settings['email'] ?? '') ?>">
                                            </div>

                                            <!-- Phone -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Phone Number</label>
                                                <input type="text" name="phone" class="form-control"
                                                    placeholder="+91XXXXXXXXXX"
                                                    value="<?= htmlspecialchars($settings['phone_number'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Alternate Phone Number</label>
                                                <input type="text" name="alt_phone_number" class="form-control"
                                                    placeholder="+91XXXXXXXXXX"
                                                    value="<?= htmlspecialchars($settings['alt_phone_number'] ?? '') ?>">
                                            </div>

                                            <div class="col-12 mt-4">
                                                <h5 class="mb-3">Social Media Links</h5>
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">YouTube</label>
                                                <input type="url" name="youtube" class="form-control"
                                                    placeholder="https://youtube.com/..."
                                                    value="<?= htmlspecialchars($settings['youtube'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Facebook</label>
                                                <input type="url" name="facebook" class="form-control"
                                                    placeholder="https://facebook.com/..."
                                                    value="<?= htmlspecialchars($settings['facebook'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Instagram</label>
                                                <input type="url" name="instagram" class="form-control"
                                                    placeholder="https://instagram.com/..."
                                                    value="<?= htmlspecialchars($settings['instagram'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">LinkedIn</label>
                                                <input type="url" name="linkedin" class="form-control"
                                                    placeholder="https://linkedin.com/..."
                                                    value="<?= htmlspecialchars($settings['linkedin'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Twitter</label>
                                                <input type="url" name="twitter" class="form-control"
                                                    placeholder="https://twitter.com/..."
                                                    value="<?= htmlspecialchars($settings['twitter'] ?? '') ?>">
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">WhatsApp</label>
                                                <input type="text" name="whatsapp" class="form-control"
                                                    placeholder="https://wa.me/91XXXXXXXXXX"
                                                    value="<?= htmlspecialchars($settings['whatsapp'] ?? '') ?>">
                                            </div>
                                            <div class="col-12 mt-4">

                                                <div class="col-md-3">
                                                    <button type="submit" class="btn btn-primary w-100">
                                                        Save Settings
                                                    </button>
                                                </div>

                                            </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <?php include 'inc/footer.php'; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('#settingsForm').on('submit', function (e) {
            e.preventDefault();
            let fd = new FormData(this);
            fd.append('action', 'save_settings');

            $.ajax({
                url: 'action/api.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (res) {
                    Swal.fire(res.status, res.message, res.status)
                        .then(() => {if (res.status === 'success') location.reload();});
                }
            });
        });
    </script>

</body>

</html>