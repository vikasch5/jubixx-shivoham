<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

/* =======================
   EDIT MODE
======================= */
$edit = false;
$banner = null;

if (!empty($_GET['id'])) {
    $id = (int) $_GET['id'];
    $q = mysqli_query($conn, "SELECT * FROM banners WHERE id = $id");
    $banner = mysqli_fetch_assoc($q);
    if ($banner) {
        $edit = true;
    }
}

/* =======================
   FETCH BANNERS
======================= */
$result = mysqli_query($conn, "
    SELECT * FROM banners ORDER BY id DESC
");
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'inc/head.php'; ?>

<body>

    <div class="wrapper">
        <?php include 'inc/sidebar.php'; ?>
        <div class="page-wrapper">
            <?php include 'inc/header.php'; ?>

            <div class="content-wrapper">
                <div class="content">

                    <!-- ================= FORM ================= -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-default">
                                <div class="card-header">
                                    <h2><?= $edit ? 'Edit Banner' : 'Upload Homepage Banner' ?></h2>
                                </div>

                                <div class="card-body">
                                    <form id="bannerForm" enctype="multipart/form-data">

                                        <input type="hidden" name="id" value="<?= $banner['id'] ?? '' ?>">

                                        <div class="row align-items-end">

                                            <!-- Image -->
                                            <div class="col-md-6 mb-3">
                                                <label class="form-label">Banner Image (1400x480px)</label>
                                                <input type="file" name="image" class="form-control"
                                                    accept=".jpg,.jpeg,.png,.webp">
                                                <?php if ($edit): ?>
                                                    <small class="text-muted">Leave blank to keep existing image</small>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Status -->
                                            <div class="col-md-3 mb-3">
                                                <label class="form-label">Status</label>
                                                <select name="status" class="form-control">
                                                    <option value="1" <?= ($banner['status'] ?? 1) == 1 ? 'selected' : '' ?>>Active</option>
                                                    <option value="0" <?= ($banner['status'] ?? 1) == 0 ? 'selected' : '' ?>>Inactive</option>
                                                </select>
                                            </div>

                                            <!-- Submit -->
                                            <div class="col-md-3 mb-3">
                                                <button type="submit" class="btn btn-primary w-100">
                                                    <?= $edit ? 'Update Banner' : 'Upload Banner' ?>
                                                </button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================= LIST ================= -->
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <div class="card card-default">

                                <div class="card-header">
                                    <h2>Homepage Banners</h2>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Preview</th>
                                                <th>Status</th>
                                                <th>Created</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)): ?>
                                                <tr id="row-<?= $row['id'] ?>">
                                                    <td><?= $i++ ?></td>
                                                    <td><img src="../uploads/banners/<?= $row['image'] ?>" height="60"></td>
                                                    <td><?= $row['status'] ? '<span class="badge bg-success">Active</span>' : '<span class="badge bg-danger">Inactive</span>' ?>
                                                    </td>
                                                    <td><?= date('d M Y', strtotime($row['created_at'])) ?></td>
                                                    <td class="text-center">

                                                        <a href="banners.php?id=<?= $row['id'] ?>"
                                                            class="text-primary me-2">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </a>

                                                        <input type="hidden" id="deleteIUrl" value="action/api.php">
                                                        <a href="javascript:void(0);" class="delete_record text-danger"
                                                            data-id="<?= $row['id']; ?>" data-action="delete_banner">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>

                                                    </td>
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>

                                    </table>
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
        $('#bannerForm').on('submit', function (e) {
            e.preventDefault();
            let fd = new FormData(this);
            fd.append('action', 'save_banner');

            $.ajax({
                url: 'action/api.php',
                type: 'POST',
                data: fd,
                contentType: false,
                processData: false,
                dataType: 'json',
                success: function (res) {
                    Swal.fire(res.status, res.message, res.status)
                        .then(() => {if (res.status === 'success') location.href = 'banners.php';});
                }
            });
        });

        $(document).on('click', '.deleteBanner', function () {

            let bannerId = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This banner will be permanently deleted!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it',
                cancelButtonText: 'Cancel'
            }).then((result) => {

                if (result.isConfirmed) {

                    $.ajax({
                        url: 'action/api.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'delete_banner',
                            id: bannerId
                        },
                        success: function (res) {

                            if (res.status === 'success') {
                                Swal.fire('Deleted!', res.message, 'success');

                                $('#row-' + bannerId).fadeOut(300, function () {
                                    $(this).remove();
                                });

                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        },
                        error: function () {
                            Swal.fire('Error', 'Server error occurred', 'error');
                        }
                    });
                }
            });
        });
    </script>

</body>

</html>