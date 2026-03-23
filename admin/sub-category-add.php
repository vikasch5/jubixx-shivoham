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
    'category_id' => '',
    'name' => '',
    'slug' => '',
    'status' => '',
    'description' => '',
    'image' => ''
];

// If edit → fetch sub-category
if ($isEdit) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM sub_categories WHERE id = ? LIMIT 1"
    );
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $data = $row;
    } else {
        header('Location: sub-category-list.php');
        exit;
    }
}

// Fetch categories
$catSql = "SELECT id, name FROM categories WHERE status = 1 ORDER BY name ASC";
$catResult = mysqli_query($conn, $catSql);
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
                                    <h2><?= $isEdit ? 'Edit Sub Category' : 'Add Sub Category'; ?></h2>
                                    <a href="sub-category-list.php" class="btn btn-secondary px-4">
                                        All Sub Categories
                                    </a>
                                </div>

                                <div class="card-body">

                                    <form class="ajaxForm" method="POST" action="action/api.php"
                                        enctype="multipart/form-data">

                                        <input type="hidden" name="action" value="save_sub_category">

                                        <?php if ($isEdit): ?>
                                            <input type="hidden" name="id" value="<?= $id; ?>">
                                        <?php endif; ?>

                                        <div class="row">

                                            <!-- Parent Category -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Parent Category</label>
                                                    <select name="category_id"
                                                        class="form-control rounded-pill required">
                                                        <option value="">Select Category</option>
                                                        <?php while ($cat = mysqli_fetch_assoc($catResult)): ?>
                                                            <option value="<?= $cat['id']; ?>"
                                                                <?= $cat['id'] == $data['category_id'] ? 'selected' : ''; ?>>
                                                                <?= htmlspecialchars($cat['name']); ?>
                                                            </option>
                                                        <?php endwhile; ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Name -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sub Category Name</label>
                                                    <input type="text" name="name"
                                                        class="form-control rounded-pill required"
                                                        value="<?= htmlspecialchars($data['name']); ?>"
                                                        placeholder="Enter sub category name">
                                                </div>
                                            </div>

                                            <!-- Slug -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Slug</label>
                                                    <input type="text" name="slug" class="form-control rounded-pill"
                                                        value="<?= htmlspecialchars($data['slug']); ?>"
                                                        placeholder="Auto generated">
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <!-- Status -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select name="status" class="form-control rounded-pill required">
                                                        <option value="">Select status</option>
                                                        <option value="1" <?= $data['status'] == 1 ? 'selected' : ''; ?>>
                                                            Active
                                                        </option>
                                                        <option value="0" <?= $data['status'] == 0 ? 'selected' : ''; ?>>
                                                            Inactive
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Image -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Sub Category Image</label>
                                                    <input type="file" name="image" class="form-control rounded-pill"
                                                        accept="image/*">

                                                    <?php if ($isEdit && $data['image']): ?>
                                                        <small class="d-block mt-1">
                                                            <img src="../uploads/sub_categories/<?= $data['image']; ?>"
                                                                width="50" class="rounded">
                                                        </small>
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <!-- Description -->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea name="description" class="form-control rounded-3"
                                                        rows="3"><?= htmlspecialchars($data['description']); ?></textarea>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="form-footer mt-4 text-end">
                                            <button type="submit" class="btn btn-primary btn-pill px-4">
                                                <?= $isEdit ? 'Update Sub Category' : 'Save Sub Category'; ?>
                                            </button>
                                            <button type="reset" class="btn btn-light btn-pill px-4">
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