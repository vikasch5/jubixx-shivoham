<?php
session_start();
require_once 'inc/config.php';

// Admin check
if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Detect edit mode
$id = intval($_GET['id'] ?? 0);
$isEdit = $id > 0;

// Default values
$data = [
    'title' => '',
    'status' => '1',
    'image' => ''
];

// Fetch data if edit
if ($isEdit) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM gallery WHERE id = ? LIMIT 1"
    );
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $data = $row;
    } else {
        header('Location: gallery-list.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include 'inc/head.php'; ?>

<body class="navbar-fixed sidebar-fixed" id="body">

<div class="wrapper">

    <?php include 'inc/sidebar.php'; ?>

    <div class="page-wrapper">

        <?php include 'inc/header.php'; ?>

        <div class="content-wrapper">
            <div class="content">

                <div class="row">
                    <div class="col-xl-12">
                        <div class="card card-default">

                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h2><?= $isEdit ? 'Edit Gallery' : 'Add Gallery'; ?></h2>
                                <a href="gallery-list.php" class="btn btn-secondary px-4">
                                    All Gallery
                                </a>
                            </div>

                            <div class="card-body">

                                <form class="ajaxForm"
                                      method="POST"
                                      action="action/api.php"
                                      enctype="multipart/form-data">

                                    <input type="hidden" name="action" value="save_gallery">

                                    <?php if ($isEdit): ?>
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                    <?php endif; ?>

                                    <div class="row">

                                        <!-- Title -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Image Title</label>
                                                <input type="text"
                                                       name="title"
                                                       class="form-control rounded-pill required"
                                                       value="<?= htmlspecialchars($data['title']); ?>"
                                                       placeholder="Enter image title">
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status"
                                                        class="form-control rounded-pill required">
                                                    <option value="active" <?= $data['status'] == 'active' ? 'selected' : ''; ?>>
                                                        Active
                                                    </option>
                                                    <option value="inactive" <?= $data['status'] == 'inactive' ? 'selected' : ''; ?>>
                                                        Inactive
                                                    </option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row mt-3">

                                        <!-- Image Upload -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Gallery Image</label>
                                                <input type="file"
                                                       name="image"
                                                       class="form-control rounded-pill"
                                                       accept="image/*">

                                                <?php if ($isEdit && $data['image']): ?>
                                                    <small class="d-block mt-2">
                                                        <img src="../uploads/gallery/<?= $data['image']; ?>"
                                                             width="80" class="rounded">
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-footer mt-4 text-end">
                                        <button type="submit"
                                                class="btn btn-primary btn-pill px-4">
                                            <?= $isEdit ? 'Update Gallery' : 'Save Gallery'; ?>
                                        </button>

                                        <button type="reset"
                                                class="btn btn-light btn-pill px-4">
                                            Reset
                                        </button>
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

</body>
</html>