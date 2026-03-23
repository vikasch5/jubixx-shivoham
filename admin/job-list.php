<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

/* =======================
   FETCH JOBS
======================= */
$sql = "
SELECT 
    j.id,
    j.title,
    j.slug,
    j.company_name,
    j.job_type,
    j.salary_min,
    j.salary_max,
    j.salary_type,
    j.location,
    j.status,
    j.created_at,
    c.name AS category_name,
    sc.name AS sub_category_name
FROM jobs j
LEFT JOIN categories c ON c.id = j.category_id
LEFT JOIN sub_categories sc ON sc.id = j.sub_category_id
ORDER BY j.id DESC
";

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
                                    <h2>Job List</h2>
                                    <a href="job-add.php" class="btn btn-secondary px-4">
                                        Add Job
                                    </a>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Job Title</th>
                                                <th>Company</th>
                                                <th>Category</th>
                                                <th>Job Type</th>
                                                <th>Salary</th>
                                                <th>Location</th>
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

                                                        <td>
                                                            <strong><?= htmlspecialchars($row['title']); ?></strong><br>
                                                            <small
                                                                class="text-muted"><?= htmlspecialchars($row['slug']); ?></small>
                                                        </td>

                                                        <td><?= htmlspecialchars($row['company_name']); ?></td>

                                                        <td>
                                                            <?= htmlspecialchars($row['category_name']); ?>
                                                            <br>
                                                            <small
                                                                class="text-muted"><?= htmlspecialchars($row['sub_category_name']); ?></small>
                                                        </td>

                                                        <td><?= htmlspecialchars($row['job_type']); ?></td>

                                                        <td>
                                                            <?= number_format($row['salary_min']); ?> -
                                                            <?= number_format($row['salary_max']); ?>
                                                            <small><?= $row['salary_type']; ?></small>
                                                        </td>

                                                        <td><?= htmlspecialchars($row['location']); ?></td>

                                                        <td>
                                                            <?php if ($row['status'] == 1): ?>
                                                                <span class="badge bg-success">Active</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-danger">Inactive</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td class="text-center">
                                                            <a href="job-add.php?id=<?= $row['id']; ?>"
                                                                class="text-primary me-2" title="Edit">
                                                                <i class="mdi mdi-pencil"></i>
                                                            </a>

                                                            <input type="hidden" id="deleteIUrl" value="action/api.php">
                                                            <a href="javascript:void(0);" class="delete_record text-danger"
                                                                data-id="<?= $row['id']; ?>" data-action="delete_job">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile;
                                            else: ?>
                                                <tr>
                                                    <td colspan="9" class="text-center">
                                                        No jobs found
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