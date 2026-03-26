<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// ✅ Fetch gallery
$sql = "SELECT id, title, image, status 
        FROM gallery 
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
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
                                <h2>Gallery List</h2>
                                <a href="gallery-add.php" class="btn btn-secondary px-4">
                                    Add Gallery
                                </a>
                            </div>

                            <div class="card-body">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>Status</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php if (mysqli_num_rows($result) > 0):
                                            $i = 1;
                                            while ($row = mysqli_fetch_assoc($result)): ?>
                                                <tr id="row-<?= $row['id']; ?>">
                                                    <td><?= $i++; ?></td>

                                                    <!-- Image -->
                                                    <td>
                                                        <?php if ($row['image']): ?>
                                                            <img src="../uploads/gallery/<?= $row['image']; ?>" 
                                                                 width="60" class="rounded">
                                                        <?php else: ?>
                                                            —
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Title -->
                                                    <td><?= htmlspecialchars($row['title']); ?></td>

                                                    <!-- Status -->
                                                    <td>
                                                        <?php if ($row['status'] == 'active'): ?>
                                                            <span class="badge bg-success">Active</span>
                                                        <?php else: ?>
                                                            <span class="badge bg-danger">Inactive</span>
                                                        <?php endif; ?>
                                                    </td>

                                                    <!-- Actions -->
                                                    <td class="text-center">
                                                        <a href="gallery-add.php?id=<?= $row['id']; ?>"
                                                           class="text-primary me-2" title="Edit">
                                                            <i class="mdi mdi-pencil"></i>
                                                        </a>

                                                        <input type="hidden" id="deleteIUrl" value="action/api.php">

                                                        <a href="javascript:void(0);" 
                                                           class="delete_record text-danger"
                                                           data-id="<?= $row['id']; ?>"
                                                           data-action="delete_gallery">
                                                            <i class="mdi mdi-delete"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endwhile; else: ?>
                                            <tr>
                                                <td colspan="5" class="text-center">
                                                    No gallery found
                                                </td>
                                            </tr>
                                        <?php endif; ?>

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

</body>
</html>