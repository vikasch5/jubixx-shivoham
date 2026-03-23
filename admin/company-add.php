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
    'company_name' => '',
    'company_website' => '',
    'description' => '',
    'logo' => '',
    'status' => ''
];

// If edit → fetch company
if ($isEdit) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT * FROM companies WHERE id = ? LIMIT 1"
    );
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $data = $row;
    } else {
        header('Location: company-list.php');
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
                                <h2><?= $isEdit ? 'Edit Company' : 'Add Company'; ?></h2>
                                <a href="company-list.php" class="btn btn-secondary px-4">
                                    All Companies
                                </a>
                            </div>

                            <div class="card-body">

                                <form class="ajaxForm"
                                      method="POST"
                                      action="action/api.php"
                                      enctype="multipart/form-data">

                                    <input type="hidden" name="action" value="save_company">

                                    <?php if ($isEdit): ?>
                                        <input type="hidden" name="id" value="<?= $id; ?>">
                                    <?php endif; ?>

                                    <div class="row">

                                        <!-- Company Name -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company Name</label>
                                                <input type="text"
                                                       name="company_name"
                                                       class="form-control rounded-pill required"
                                                       value="<?= htmlspecialchars($data['company_name']); ?>"
                                                       placeholder="Enter company name">
                                            </div>
                                        </div>

                                        <!-- Company Website -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company Website</label>
                                                <input type="url"
                                                       name="company_website"
                                                       class="form-control rounded-pill"
                                                       value="<?= htmlspecialchars($data['company_website']); ?>"
                                                       placeholder="https://example.com">
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

                                        <!-- Logo -->
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Company Logo</label>
                                                <input type="file"
                                                       name="logo"
                                                       class="form-control rounded-pill"
                                                       accept="image/*">

                                                <?php if ($isEdit && $data['logo']): ?>
                                                    <small class="d-block mt-2">
                                                        <img src="../uploads/companies/<?= $data['logo']; ?>"
                                                             width="60" class="rounded">
                                                    </small>
                                                <?php endif; ?>
                                            </div>
                                        </div>

                                        <!-- Description -->
                                        <!-- <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description"
                                                          class="form-control rounded-3"
                                                          rows="3"
                                                          placeholder="Company description"><?= htmlspecialchars($data['description']); ?></textarea>
                                            </div>
                                        </div> -->

                                    </div>

                                    <div class="form-footer mt-4 text-end">
                                        <button type="submit"
                                                class="btn btn-primary btn-pill px-4">
                                            <?= $isEdit ? 'Update Company' : 'Save Company'; ?>
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
