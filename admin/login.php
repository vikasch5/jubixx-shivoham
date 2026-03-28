<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header('Location: dashboard.php');
    exit();
}
include 'inc/config.php';
$q = mysqli_query($conn, "SELECT * FROM settings WHERE id = 1");
$settings = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login - FgcIndia</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700|Roboto" rel="stylesheet">

    <!-- Icons & CSS -->
    <link href="plugins/material/css/materialdesignicons.min.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet" />
    <link rel="icon" href="../uploads/settings/<?= $settings['favicon'] ?>">


    <!-- Modern Custom CSS -->
    <style>
        body {
            background: linear-gradient(135deg, #6366f1, #4f46e5);
            font-family: 'Roboto', sans-serif;
        }

        .login-card {
            border-radius: 18px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
            overflow: hidden;
        }

        .brand {
            font-weight: 700;
            letter-spacing: 1px;
        }

        .form-control {
            border-radius: 12px;
            padding: 14px 16px;
            border: 1px solid #e5e7eb;
            transition: all .25s ease;
        }

        .form-control:focus {
            border-color: #6366f1;
            box-shadow: 0 0 0 4px rgba(99, 102, 241, .15);
        }

        .form-control.error {
            border-color: #ef4444;
            background: #fff5f5;
        }

        .form-control.success {
            border-color: #10b981;
        }

        .btn-login {
            border-radius: 999px;
            padding: 12px;
            font-weight: 600;
            background: #6366f1;
            border: none;
        }

        .btn-login:disabled {
            opacity: .75;
        }

        .alert {
            border-radius: 12px;
            font-size: 14px;
            padding: 14px;
        }

        .alert-danger {
            background: #fff1f2;
            color: #b91c1c;
            border: 1px solid #fecaca;
        }

        .alert-success {
            background: #ecfdf5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
    </style>
</head>

<body>

    <div class="container d-flex align-items-center justify-content-center" style="min-height:100vh">
        <div class="col-lg-5 col-md-7">

            <div class="card login-card">
                <div class="card-body px-5 py-5">

                    <div class="text-center mb-4">
                        <img src="<?= '../uploads/settings/' . $settings['site_logo'] ?>" width="150" class="mb-2">
                        <h4 class="brand">ADMIN PANEL</h4>
                        <small class="text-muted">Sign in to continue</small>
                    </div>

                    <!-- Alert -->
                    <div id="alertBox" class="alert d-none text-center mb-4"></div>

                    <!-- Login Form -->
                    <form id="loginForm" autocomplete="off">

                        <div class="form-group mb-4">
                            <input type="email" id="email" class="form-control" placeholder="Email address">
                        </div>

                        <div class="form-group mb-4">
                            <input type="password" id="password" class="form-control" placeholder="Password">
                        </div>

                        <button type="submit" id="loginBtn" class="btn btn-login btn-block text-white">
                            Sign In
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <!-- Login Script -->
    <script>
        $(function () {

            $('#loginForm').on('submit', function (e) {
                e.preventDefault();
                resetUI();

                let email = $('#email').val().trim();
                let password = $('#password').val().trim();
                let valid = true;

                if (email === '' || !isEmail(email)) {
                    showError('Please enter a valid email address');
                    markError('#email');
                    valid = false;
                }

                if (password.length < 6) {
                    showError('Password must be at least 6 characters');
                    markError('#password');
                    valid = false;
                }

                if (!valid) return;

                $('#loginBtn').prop('disabled', true).text('Signing in...');

                $.ajax({
                    url: 'action/api.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        action: 'admin_login',
                        email: email,
                        password: password
                    },
                    success: function (res) {
                        if (res.status === 'success') {
                            showSuccess(res.message);
                            $('#email, #password').addClass('success');
                            setTimeout(() => window.location.href = 'dashboard.php', 900);
                        } else {
                            showError(res.message);
                            markError('#email, #password');
                            $('#loginBtn').prop('disabled', false).text('Sign In');
                        }
                    },
                    error: function () {
                        showError('Server error. Please try again.');
                        $('#loginBtn').prop('disabled', false).text('Sign In');
                    }
                });
            });

            function showError(msg) {
                $('#alertBox').removeClass('d-none alert-success')
                    .addClass('alert-danger').html(msg);
            }

            function showSuccess(msg) {
                $('#alertBox').removeClass('d-none alert-danger')
                    .addClass('alert-success').html(msg);
            }

            function markError(selector) {
                $(selector).addClass('error');
            }

            function resetUI() {
                $('#alertBox').addClass('d-none').removeClass('alert-danger alert-success').html('');
                $('.form-control').removeClass('error success');
                $('#loginBtn').prop('disabled', false).text('Sign In');
            }

            function isEmail(email) {
                return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
            }

        });
    </script>

</body>

</html>