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
    'name' => '',
    'slug' => '',
    'status' => '',
    'description' => '',
    'image' => ''
];

// If edit → fetch category
if ($isEdit) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM categories WHERE id = ? LIMIT 1"
    );
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $data = $row;
    } else {
        header('Location: category-list.php');
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
                                <h2><?= $isEdit ? 'Edit Category' : 'Add Category'; ?></h2>
                                <a href="category-list.php" class="btn btn-secondary px-4">
                                    All Categories
                                </a>
                            </div>

                            <div class="card-body">

                                <form class="ajaxForm"
                                      method="POST"
                                      action="action/api.php"
                                      enctype="multipart/form-data">

                                    <input type="hidden" name="action" value="save_category">

                                    <?php if ($isEdit): ?>
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                    <?php endif; ?>

                                    <div class="row">

                                        <!-- Category Name -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Category Name</label>
                                                <input type="text"
                                                       name="name"
                                                       class="form-control rounded-pill required"
                                                       value="<?= htmlspecialchars($data['name']); ?>"
                                                       placeholder="Enter category name">
                                            </div>
                                        </div>

                                        <!-- Slug -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input type="text"
                                                       name="slug"
                                                       class="form-control rounded-pill"
                                                       value="<?= htmlspecialchars($data['slug']); ?>"
                                                       placeholder="Auto generated">
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <select name="status"
                                                        class="form-control rounded-pill required">
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

                                    </div>

                                    <div class="row mt-3">

                                        <!-- Image -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Category Image</label>
                                                <input type="file"
                                                       name="image"
                                                       class="form-control rounded-pill"
                                                       accept="image/*">

                                                <?php if ($isEdit && $data['image']): ?>
                                                    <small class="d-block mt-2">
                                                        <img src="../uploads/categories/<?= $data['image']; ?>"
                                                             width="60" class="rounded">
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description"
                                                          class="form-control rounded-3"
                                                          rows="3"
                                                          placeholder="Category description"><?= htmlspecialchars($data['description']); ?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="form-footer mt-4 text-end">
                                        <button type="submit"
                                                class="btn btn-primary btn-pill px-4">
                                            <?= $isEdit ? 'Update Category' : 'Save Category'; ?>
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
