<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// Fetch contact leads
$sql = "SELECT id, name, email, phone, message, created_at 
        FROM contact_leads 
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
                                    <h2>Contact Leads</h2>
                                </div>

                                <div class="card-body">

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                <th>Date</th>
                                                <!-- <th class="text-center">Action</th> -->
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php if (mysqli_num_rows($result) > 0):
                                                $i = 1;
                                                while ($row = mysqli_fetch_assoc($result)): ?>

                                                    <tr id="row-<?= $row['id']; ?>">

                                                        <td><?= $i++; ?></td>

                                                        <td><?= htmlspecialchars($row['name']); ?></td>

                                                        <td>
                                                            <a href="mailto:<?= htmlspecialchars($row['email']); ?>">
                                                                <?= htmlspecialchars($row['email']); ?>
                                                            </a>
                                                        </td>

                                                        <td><?= htmlspecialchars($row['phone']); ?></td>


                                                        <td>
                                                            <?= nl2br(htmlspecialchars(substr($row['message'], 0, 50))); ?>...
                                                        </td>

                                                        <td><?= date("d M Y, h:i A", strtotime($row['created_at'])); ?></td>

                                                        <td class="text-center">

                                                            <input type="hidden" id="deleteUrl" value="action/api.php">

                                                            <!-- <a href="javascript:void(0);" class="delete_contact text-danger"
                                                                data-id="<?= $row['id']; ?>" title="Delete">
                                                                <i class="mdi mdi-delete"></i>
                                                            </a> -->

                                                        </td>

                                                    </tr>

                                                <?php endwhile; else: ?>

                                                <tr>
                                                    <td colspan="8" class="text-center">No contact leads found</td>
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

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).on("click", ".delete_contact", function () {

            if (!confirm("Are you sure you want to delete this lead?")) return;

            let id = $(this).data("id");
            let deleteUrl = $("#deleteUrl").val();

            $.ajax({
                url: deleteUrl,
                type: "POST",
                dataType: "json",
                data: {
                    action: "delete_contact",
                    id: id
                },
                success: function (res) {

                    if (res.status === "success") {
                        $("#row-" + id).fadeOut(500);
                    } else {
                        alert(res.message);
                    }
                },
                error: function () {
                    alert("Something went wrong.");
                }
            });

        });
    </script>

</body>

</html>