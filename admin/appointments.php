<?php
session_start();
require_once 'inc/config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit;
}

// FETCH APPOINTMENTS
$sql = "SELECT id, name, email, appointment_datetime, message, created_at 
        FROM appointments 
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
                                    <h2>Appointments</h2>
                                </div>

                                <div class="card-body">

                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Appointment Date</th>
                                                <th>Message</th>
                                                <th>Created</th>
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

                                                        <td><?= htmlspecialchars($row['appointment_datetime']); ?></td>

                                                        <td>
                                                            <?= nl2br(htmlspecialchars(substr($row['message'], 0, 50))); ?>...
                                                        </td>

                                                        <td><?= date("d M Y, h:i A", strtotime($row['created_at'])); ?></td>

                                                        <!-- <td class="text-center">

        <a href="javascript:void(0);" 
           class="delete_appointment text-danger"
           data-id="<?= $row['id']; ?>" 
           title="Delete">
            <i class="mdi mdi-delete"></i>
        </a>

    </td> -->

                                                    </tr>

                                                <?php endwhile; else: ?>

                                                <tr>
                                                    <td colspan="7" class="text-center">No appointments found</td>
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
        $(document).on("click", ".delete_appointment", function () {

            if (!confirm("Delete this appointment?")) return;

            let id = $(this).data("id");

            $.ajax({
                url: "action/api.php",
                type: "POST",
                dataType: "json",
                data: {
                    action: "delete_appointment",
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
                    alert("Error deleting record");
                }
            });

        });
    </script>

</body>

</html>