<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

$id = intval($_GET['id'] ?? 0);
$isEdit = $id > 0;

$data = [
    'title' => '',
    'slug' => '',
    'description' => '',
    'image' => '',
    'meta_title' => '',
    'meta_description' => '',
    'meta_keywords' => '',
    'author_name' => '',
    'author_image' => '',
    'status' => 1
];

if ($isEdit) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM blogs WHERE id = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $data = $row;
    } else {
        header('Location: blog-list.php');
        exit;
    }
}
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

                        <div class="card-header d-flex justify-content-between">
                            <h2><?= $isEdit ? 'Edit Blog' : 'Add Blog'; ?></h2>
                            <a href="blog-list.php" class="btn btn-secondary">All Blogs</a>
                        </div>

                        <div class="card-body">

                            <form class="ajaxForm" method="POST" action="action/api.php" enctype="multipart/form-data">

                                <input type="hidden" name="action" value="save_blog">
                                <?php if ($isEdit): ?>
                                    <input type="hidden" name="id" value="<?= $id; ?>">
                                <?php endif; ?>

                                <div class="row">

                                    <!-- Title -->
                                    <div class="col-md-6">
                                        <label>Blog Title</label>
                                        <input type="text" name="title" class="form-control required"
                                            placeholder="Enter blog title (e.g. Galaxy S26 Ultra Review)"
                                            value="<?= htmlspecialchars($data['title']); ?>">
                                    </div>

                                    <!-- Slug -->
                                    <div class="col-md-6">
                                        <label>Slug</label>
                                        <input type="text" name="slug" class="form-control"
                                            placeholder="auto-generated-url (leave empty to auto create)"
                                            value="<?= htmlspecialchars($data['slug']); ?>">
                                    </div>

                                </div>

                                <div class="row mt-3">

                                    <!-- Image -->
                                    <div class="col-md-4">
                                        <label>Blog Image</label>
                                        <input type="file" name="image" class="form-control" accept="image/*">
                                        <small class="text-muted">Upload blog featured image</small>

                                        <?php if ($isEdit && $data['image']): ?>
                                            <img src="../uploads/blogs/<?= $data['image']; ?>" width="80"
                                                class="mt-2 rounded">
                                        <?php endif; ?>
                                    </div>

                                    <!-- Author Name -->
                                    <div class="col-md-4">
                                        <label>Author Name</label>
                                        <input type="text" name="author_name" class="form-control"
                                            placeholder="Enter author name"
                                            value="<?= htmlspecialchars($data['author_name']); ?>">
                                    </div>

                                    <!-- Author Image -->
                                    <div class="col-md-4">
                                        <label>Author Image</label>
                                        <input type="file" name="author_image" class="form-control" accept="image/*">
                                        <small class="text-muted">Upload author profile image</small>

                                        <?php if ($isEdit && $data['author_image']): ?>
                                            <img src="../uploads/authors/<?= $data['author_image']; ?>" width="50"
                                                class="mt-2 rounded-circle">
                                        <?php endif; ?>
                                    </div>

                                </div>

                                <!-- Description -->
                                <!-- Summary -->
                                <div class="mt-3">
                                    <label>Blog Summary</label>
                                    <textarea name="description" class="form-control" rows="3"
                                        id="summernote" placeholder="Write short summary (150-200 characters for SEO & preview)..."><?= htmlspecialchars($data['description']); ?></textarea>
                                    <small class="text-muted">
                                        Used for blog listing, SEO preview, and social sharing
                                    </small>
                                </div>

                                <!-- SEO Section -->
                                <h5 class="mt-4">SEO Settings</h5>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label>Meta Title</label>
                                        <input type="text" name="meta_title" class="form-control"
                                            placeholder="SEO title (60 characters recommended)"
                                            value="<?= htmlspecialchars($data['meta_title']); ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Meta Keywords</label>
                                        <input type="text" name="meta_keywords" class="form-control"
                                            placeholder="keyword1, keyword2, keyword3"
                                            value="<?= htmlspecialchars($data['meta_keywords']); ?>">
                                    </div>

                                    <div class="col-md-4">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option value="published" <?= $data['status'] == 'published' ? 'selected' : ''; ?>>Published
                                            </option>
                                            <option value="draft" <?= $data['status'] == 'draft' ? 'selected' : ''; ?>>Draft</option>
                                        </select>
                                    </div>

                                </div>

                                <div class="mt-3">
                                    <label>Meta Description</label>
                                    <textarea name="meta_description" class="form-control" rows="3"
                                        placeholder="Write SEO description (150-160 characters)..."><?= htmlspecialchars($data['meta_description']); ?></textarea>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <?= $isEdit ? 'Update Blog' : 'Save Blog'; ?>
                                    </button>
                                </div>

                            </form>

                        </div>
                    </div>

                </div>
            </div>

            <?php include 'inc/footer.php'; ?>
            <script>
                $(document).ready(function () {
                    $('#summernote').summernote({
                        height: 200,
                        placeholder: 'Write your blog content here...',
                        toolbar: [
                            ['style', ['style']],
                            ['font', ['bold', 'italic', 'underline']],
                            ['para', ['ul', 'ol', 'paragraph']],
                            ['insert', ['link', 'picture']],
                            ['view', ['fullscreen', 'codeview']]
                        ]
                    });
                });
            </script>
        </div>
    </div>

</body>

</html>