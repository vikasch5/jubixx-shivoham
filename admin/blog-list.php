<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch blogs
$sql = "SELECT id, title, slug, image, author_name, status, created_at 
        FROM blogs 
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
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

                    <div class="card">

                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h2>Blog List</h2>
                            <a href="blog-add.php" class="btn btn-primary">Add Blog</a>
                        </div>

                        <div class="card-body">

                            <table class="table table-bordered table-striped align-middle">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Author</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php if (mysqli_num_rows($result) > 0):
                                        $i = 1;
                                        while ($row = mysqli_fetch_assoc($result)): ?>

                                            <tr id="row-<?= $row['id']; ?>">

                                                <td><?= $i++; ?></td>

                                                <td>
                                                    <?php if ($row['image']): ?>
                                                        <img src="../uploads/blogs/<?= $row['image']; ?>" width="60"
                                                            class="rounded">
                                                    <?php else: ?>
                                                        —
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <strong><?= htmlspecialchars($row['title']); ?></strong><br>
                                                    <small class="text-muted"><?= htmlspecialchars($row['slug']); ?></small>
                                                </td>

                                                <td><?= htmlspecialchars($row['author_name'] ?: 'Admin'); ?></td>

                                                <td>
                                                    <?php if ($row['status'] == 'published'): ?>
                                                        <span class="badge bg-success">Published</span>
                                                    <?php else: ?>
                                                        <span class="badge bg-warning">Draft</span>
                                                    <?php endif; ?>
                                                </td>

                                                <td>
                                                    <?= date('d M Y', strtotime($row['created_at'])); ?>
                                                </td>

                                                <td class="text-center">

                                                    <a href="blog-add.php?id=<?= $row['id']; ?>" class="text-primary me-2"
                                                        title="Edit">
                                                        <i class="mdi mdi-pencil"></i>
                                                    </a>

                                                    <input type="hidden" id="deleteIUrl" value="action/api.php">

                                                    <a href="javascript:void(0);" class="delete_record text-danger"
                                                        data-id="<?= $row['id']; ?>" data-action="delete_blog">
                                                        <i class="mdi mdi-delete"></i>
                                                    </a>

                                                </td>

                                            </tr>

                                        <?php endwhile; else: ?>

                                        <tr>
                                            <td colspan="7" class="text-center">
                                                No blogs found
                                            </td>
                                        </tr>

                                    <?php endif; ?>

                                </tbody>
                            </table>

                        </div>
                    </div>

                </div>
            </div>

            <?php include 'inc/footer.php'; ?>

        </div>
    </div>

</body>

</html>