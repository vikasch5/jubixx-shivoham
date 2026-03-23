<?php
session_start();
require_once 'inc/config.php';

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
    'sub_category_id' => '',
    'title' => '',
    'slug' => '',
    'company_name' => '',
    'job_type' => '',
    'career_level' => '',
    'gender' => 'Any',
    'experience_min' => '',
    'experience_max' => '',
    'salary_min' => '',
    'salary_max' => '',
    'salary_type' => 'Yearly',
    'location' => '',
    'description' => '',
    'qualification' => '',
    'company_website' => '',
    'company_phone' => '',
    'company_email' => '',
    'company_logo' => '',
    'status' => 1

];

// Edit mode → fetch job
if ($isEdit) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM jobs WHERE id = ? LIMIT 1");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($res)) {
        $data = $row;
    } else {
        header('Location: job-list.php');
        exit;
    }
}

// Fetch categories
$categories = mysqli_query(
    $conn,
    "SELECT id, name FROM categories WHERE status = 1 ORDER BY name ASC"
);

// Fetch sub categories (for edit / initial load)
$subCategories = mysqli_query(
    $conn,
    "SELECT id, category_id, name FROM sub_categories WHERE status = 1 ORDER BY name ASC"
);
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
                                    <h2><?= $isEdit ? 'Edit Job' : 'Add Job'; ?></h2>
                                    <a href="job-list.php" class="btn btn-secondary px-4">All Jobs</a>
                                </div>

                                <div class="card-body">

                                    <form class="ajaxForm" method="POST" action="action/api.php">

                                        <input type="hidden" name="action" value="save_job">
                                        <?php if ($isEdit): ?>
                                            <input type="hidden" name="id" value="<?= $id; ?>">
                                        <?php endif; ?>

                                        <!-- ================= BASIC INFO ================= -->
                                        <div class="row">

                                            <div class="col-md-4">
                                                <label>Category</label>
                                                <select name="category_id" class="form-control rounded-pill required">
                                                    <option value="">Select Category</option>
                                                    <?php while ($cat = mysqli_fetch_assoc($categories)): ?>
                                                        <option value="<?= $cat['id']; ?>"
                                                            <?= $cat['id'] == $data['category_id'] ? 'selected' : ''; ?>>
                                                            <?= htmlspecialchars($cat['name']); ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Sub Category</label>
                                                <select name="sub_category_id"
                                                    class="form-control rounded-pill required">
                                                    <option value="">Select Sub Category</option>
                                                    <?php while ($sub = mysqli_fetch_assoc($subCategories)): ?>
                                                        <option value="<?= $sub['id']; ?>"
                                                            <?= $sub['id'] == $data['sub_category_id'] ? 'selected' : ''; ?>>
                                                            <?= htmlspecialchars($sub['name']); ?>
                                                        </option>
                                                    <?php endwhile; ?>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Job Title</label>
                                                <input type="text" name="title"
                                                    class="form-control rounded-pill required"
                                                    placeholder="e.g. Senior PHP Developer"
                                                    value="<?= htmlspecialchars($data['title']); ?>">
                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-md-4">
                                                <label>Slug</label>
                                                <input type="text" name="slug" class="form-control rounded-pill"
                                                    placeholder="auto-generated-job-slug"
                                                    value="<?= htmlspecialchars($data['slug']); ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Company Name</label>
                                                <input type="text" name="company_name"
                                                    class="form-control rounded-pill required"
                                                    placeholder="Company name"
                                                    value="<?= htmlspecialchars($data['company_name']); ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Company / Job Logo</label>

                                                <?php if (!empty($data['company_logo'])): ?>
                                                    <div class="mb-2">
                                                        <img src="../uploads/company/<?= htmlspecialchars($data['company_logo']); ?>"
                                                            alt="Company Logo"
                                                            style="height:60px;border:1px solid #ddd;padding:5px;border-radius:6px;">
                                                    </div>
                                                <?php endif; ?>

                                                <input type="file" name="company_logo" class="form-control rounded-pill"
                                                    accept="image/*">

                                            </div>


                                            <div class="col-md-4">
                                                <label>Company Website</label>
                                                <input type="text" name="company_website"
                                                    class="form-control rounded-pill" placeholder="Company website"
                                                    value="<?= htmlspecialchars($data['company_website']); ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Company Email</label>
                                                <input type="text" name="company_email"
                                                    class="form-control rounded-pill" placeholder="Company email"
                                                    value="<?= htmlspecialchars($data['company_email']); ?>">
                                            </div>
                                            <div class="col-md-4">
                                                <label>Company Phone</label>
                                                <input type="text" name="company_phone"
                                                    class="form-control rounded-pill required"
                                                    placeholder="Company phone"
                                                    value="<?= htmlspecialchars($data['company_phone']); ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Job Type</label>
                                                <select name="job_type" class="form-control rounded-pill required">
                                                    <option value="">Select job type</option>
                                                    <?php foreach (['Full Time', 'Part Time', 'Internship', 'Contract', 'Remote'] as $type): ?>
                                                        <option value="<?= $type; ?>" <?= $data['job_type'] == $type ? 'selected' : ''; ?>>
                                                            <?= $type; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>

                                        </div>

                                        <!-- ================= DETAILS ================= -->
                                        <div class="row mt-3">

                                            <div class="col-md-3">
                                                <label>Min Experience (Years)</label>
                                                <input type="number" name="experience_min"
                                                    class="form-control rounded-pill" placeholder="0"
                                                    value="<?= $data['experience_min']; ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label>Max Experience (Years)</label>
                                                <input type="number" name="experience_max"
                                                    class="form-control rounded-pill" placeholder="5"
                                                    value="<?= $data['experience_max']; ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label>Min Salary</label>
                                                <input type="number" name="salary_min" class="form-control rounded-pill"
                                                    placeholder="15000" value="<?= $data['salary_min']; ?>">
                                            </div>

                                            <div class="col-md-3">
                                                <label>Max Salary</label>
                                                <input type="number" name="salary_max" class="form-control rounded-pill"
                                                    placeholder="30000" value="<?= $data['salary_max']; ?>">
                                            </div>

                                        </div>

                                        <div class="row mt-3">

                                            <div class="col-md-4">
                                                <label>Salary Type</label>
                                                <select name="salary_type" class="form-control rounded-pill">
                                                    <option value="Monthly" <?= $data['salary_type'] == 'Monthly' ? 'selected' : ''; ?>>Monthly</option>
                                                    <option value="Yearly" <?= $data['salary_type'] == 'Yearly' ? 'selected' : ''; ?>>Yearly</option>
                                                    <option value="Hourly" <?= $data['salary_type'] == 'Hourly' ? 'selected' : ''; ?>>Hourly</option>
                                                </select>
                                            </div>

                                            <div class="col-md-4">
                                                <label>Location</label>
                                                <input type="text" name="location"
                                                    class="form-control rounded-pill required"
                                                    placeholder="e.g. Bangalore, India"
                                                    value="<?= htmlspecialchars($data['location']); ?>">
                                            </div>

                                            <div class="col-md-4">
                                                <label>Status</label>
                                                <select name="status" class="form-control rounded-pill required">
                                                    <option value="1" <?= $data['status'] == 1 ? 'selected' : ''; ?>>Active
                                                    </option>
                                                    <option value="0" <?= $data['status'] == 0 ? 'selected' : ''; ?>>
                                                        Inactive</option>
                                                </select>
                                            </div>

                                        </div>

                                        <!-- ================= LARGE DESCRIPTION (SUMMERNOTE) ================= -->
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <label>Job Short Description</label>
                                                <textarea name="short_description" class="form-control"
                                                    rows="5"><?= htmlspecialchars($data['short_description']); ?></textarea>
                                            </div>
                                        </div>
                                        <div class="row mt-4">
                                            <div class="col-md-12">
                                                <label>Job Description</label>
                                                <textarea name="description" class="form-control summernote" rows="10"
                                                    placeholder="Write full job description, responsibilities, requirements..."><?= htmlspecialchars($data['description']); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="row mt-3">
                                            <div class="col-md-6">
                                                <label>Qualification</label>
                                                <input type="text" name="qualification"
                                                    class="form-control rounded-pill" placeholder="e.g. Bachelor Degree"
                                                    value="<?= htmlspecialchars($data['qualification']); ?>">
                                            </div>
                                        </div>

                                        <div class="form-footer mt-4 text-end">
                                            <button type="submit" class="btn btn-primary btn-pill px-4">
                                                <?= $isEdit ? 'Update Job' : 'Save Job'; ?>
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

    <!-- AUTO SLUG -->
    <script>
        $('input[name="title"]').on('keyup', function () {
            let slug = $(this).val()
                .toLowerCase()
                .replace(/[^a-z0-9]+/g, '-')
                .replace(/(^-|-$)/g, '');
            $('input[name="slug"]').val(slug);
        });
    </script>

    <!-- SUMMERNOTE INIT -->
    <script>
        $('.summernote').summernote({
            height: 250
        });
    </script>

</body>

</html>