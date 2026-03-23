<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

/* =======================
   FETCH JOB APPLICATIONS
======================= */
$sql = "
SELECT 
    a.id,
    a.job_id,
    a.name,
    a.email,
    a.phone,
    a.city,
    a.education,
    a.experience,
    a.salary,
    a.resume,
    a.note,
    a.created_at,
    j.title AS job_title
FROM job_applications a
LEFT JOIN jobs j ON j.id = a.job_id
ORDER BY a.id DESC
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
                                    <h2>Job Applications</h2>
                                </div>

                                <div class="card-body table-responsive">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Applicant</th>
                                                <th>Job</th>
                                                <th>Contact</th>
                                                <th>Education</th>
                                                <th>Experience</th>
                                                <th>Expected Salary</th>
                                                <th>Resume</th>
                                                <th>Applied On</th>
                                                <!-- <th class="text-center">Action</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php if (mysqli_num_rows($result) > 0):
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)): ?>
                                                    <tr id="row-<?= $row['id']; ?>">
                                                        <td><?= $i++; ?></td>

                                                        <td>
                                                            <strong><?= htmlspecialchars($row['name']); ?></strong><br>
                                                            <small
                                                                class="text-muted"><?= htmlspecialchars($row['city']); ?></small>
                                                        </td>

                                                        <td>
                                                            <?= htmlspecialchars($row['job_title'] ?? 'N/A'); ?>
                                                        </td>

                                                        <td>
                                                            <?= htmlspecialchars($row['email']); ?><br>
                                                            <small><?= htmlspecialchars($row['phone']); ?></small>
                                                        </td>

                                                        <td><?= htmlspecialchars($row['education']); ?></td>

                                                        <td><?= htmlspecialchars($row['experience']); ?></td>

                                                        <td><?= htmlspecialchars($row['salary']); ?></td>

                                                        <td>
                                                            <?php if (!empty($row['resume'])): ?>
                                                                <a href="../uploads/resume/<?= $row['resume']; ?>" target="_blank"
                                                                    class="btn btn-sm btn-outline-primary">
                                                                    View
                                                                </a>
                                                            <?php else: ?>
                                                                <span class="text-muted">N/A</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <?= date('d M Y', strtotime($row['created_at'])); ?>
                                                        </td>

                                                        <!-- <td class="text-center">
                                                            <input type="hidden" id="deleteIUrl" value="action/api.php">

                                                            <a href="javascript:void(0);" class="delete_record text-danger"
                                                                data-id="<?= $row['id']; ?>" data-action="delete_application"
                                                                title="Delete">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a>
                                                        </td> -->
                                                    </tr>
                                                <?php endwhile;
                                            else: ?>
                                                <tr>
                                                    <td colspan="10" class="text-center">
                                                        No job applications found
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