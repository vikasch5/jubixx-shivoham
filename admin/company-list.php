<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch companies
$sql = "SELECT id, company_name, company_website, logo, status 
        FROM companies 
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
                                    <h2>Company List</h2>
                                    <a href="company-add.php" class="btn btn-secondary px-4">
                                        Add Company
                                    </a>
                                </div>

                                <div class="card-body">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Logo</th>
                                                <th>Company Name</th>
                                                <th>Website</th>
                                                <th>Status</th>
                                                <th class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            if (mysqli_num_rows($result) > 0):
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)):
                                                    ?>
                                                    <tr id="row-<?= $row['id']; ?>">
                                                        <td><?= $i++; ?></td>

                                                        <td>
                                                            <?php if ($row['logo']): ?>
                                                                <img src="../uploads/companies/<?= htmlspecialchars($row['logo']); ?>"
                                                                    width="50" class="rounded">
                                                            <?php else: ?>
                                                                —
                                                            <?php endif; ?>
                                                        </td>

                                                        <td><?= htmlspecialchars($row['company_name']); ?></td>

                                                        <td>
                                                            <?php if ($row['company_website']): ?>
                                                                <a href="<?= htmlspecialchars($row['company_website']); ?>"
                                                                    target="_blank">
                                                                    <?= htmlspecialchars($row['company_website']); ?>
                                                                </a>
                                                            <?php else: ?>
                                                                —
                                                            <?php endif; ?>
                                                        </td>

                                                        <td>
                                                            <?php if ($row['status'] == 1): ?>
                                                                <span class="badge bg-success">Active</span>
                                                            <?php else: ?>
                                                                <span class="badge bg-danger">Inactive</span>
                                                            <?php endif; ?>
                                                        </td>

                                                        <td class="text-center">
                                                            <a href="company-add.php?id=<?= $row['id']; ?>"
                                                                class="text-primary me-2" title="Edit">
                                                                <i class="mdi mdi-pencil"></i>
                                                            </a>

                                                            <input type="hidden" id="deleteIUrl" value="action/api.php">

                                                            <a href="javascript:void(0);" class="delete_record text-danger"
                                                                data-id="<?= $row['id']; ?>" data-action="delete_company">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                <?php endwhile; else: ?>
                                                <tr>
                                                    <td colspan="6" class="text-center">
                                                        No companies found
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