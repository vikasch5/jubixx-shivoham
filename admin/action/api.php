<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
session_start();
require_once '../inc/config.php';

header('Content-Type: application/json');

// Allow only POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    response('error', 'Invalid request method');
}

$action = $_POST['action'] ?? null;

switch ($action) {

    case 'admin_login':
        adminLogin();
        break;

    case 'admin_logout':
        adminLogout();
        break;

    case 'save_blog':
        saveBlog();
        break;

    case 'delete_blog':
        deleteBlog();
        break;

    case 'save_settings':
        saveSettings();
        break;

    case 'save_gallery':
        saveGallery();
        break;

    case 'delete_gallery':
        deleteGallery();
        break;

    case 'save_contact':
        saveContact();
        break;

    case 'save_appointment':
        saveAppointment();
        break;

    case 'update_profile':
        updateProfile();
        break;
    
    case 'save_banner':
        saveBanner();
        break;

    case 'delete_banner':
        deleteBanner();
        break;
    default:
        response('error', 'Invalid API action');
}

/* ==============================
   FUNCTIONS
================================ */

function adminLogin()
{
    global $conn;

    $email = trim($_POST['email'] ?? null);
    $password = trim($_POST['password'] ?? null);

    if ($email === '' || $password === '') {
        response('error', 'All fields are required');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        response('error', 'Invalid email address');
    }

    $sql = "SELECT id, name, password, image 
            FROM admin 
            WHERE email = ? AND status = 1 
            LIMIT 1";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($result)) {

        if (password_verify($password, $row['password'])) {

            session_regenerate_id(true);

            $_SESSION['admin_id'] = $row['id'];
            $_SESSION['admin_name'] = $row['name'];
            $_SESSION['image'] = $row['image'] ?? null;

            response('success', 'Login successful');
        }
    }

    response('error', 'Invalid email or password');
}

function adminLogout()
{
    session_destroy();
    response('success', 'Logged out successfully');
}

function response($status, $message, $data = [])
{
    echo json_encode([
        'status' => $status,
        'message' => $message,
        'data' => $data
    ]);
    exit;
}
function saveBlog()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized access');
    }

    $id = intval($_POST['id'] ?? 0);

    $title = trim($_POST['title'] ?? '');
    $slug = trim($_POST['slug'] ?? '');
    $status = $_POST['status'] ?? '';

    $description = $_POST['description'] ?? ''; // Summernote HTML
    $meta_title = trim($_POST['meta_title'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $meta_keywords = trim($_POST['meta_keywords'] ?? '');

    $author_name = trim($_POST['author_name'] ?? '');

    /* =============================
       VALIDATION
    ============================== */
    if ($title === '') {
        response('error', 'Blog title is required');
    }

    /* =============================
       AUTO SLUG
    ============================== */
    if ($slug === '') {
        $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '-', $title));
        $slug = trim($slug, '-');
    }

    /* =============================
       BLOG IMAGE UPLOAD
    ============================== */
    $imageName = null;

    if (!empty($_FILES['image']['name'])) {

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            response('error', 'Invalid blog image format');
        }

        $uploadDir = '../../uploads/blogs/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $imageName = uniqid('blog_') . '.' . $ext;
        $imagePath = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $imagePath)) {
            response('error', 'Blog image upload failed');
        }
    }

    /* =============================
       AUTHOR IMAGE UPLOAD
    ============================== */
    $authorImage = null;

    if (!empty($_FILES['author_image']['name'])) {

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($_FILES['author_image']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            response('error', 'Invalid author image format');
        }

        $uploadDir = '../../uploads/authors/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $authorImage = uniqid('author_') . '.' . $ext;
        $imagePath = $uploadDir . $authorImage;

        if (!move_uploaded_file($_FILES['author_image']['tmp_name'], $imagePath)) {
            response('error', 'Author image upload failed');
        }
    }

    /* =============================
       INSERT BLOG
    ============================== */
    if ($id === 0) {

        $sql = "INSERT INTO blogs 
        (title, slug, description, image, meta_title, meta_description, meta_keywords, author_name, author_image, status, created_at)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            'sssssssssi',
            $title,
            $slug,
            $description,
            $imageName,
            $meta_title,
            $meta_description,
            $meta_keywords,
            $author_name,
            $authorImage,
            $status
        );

        if (mysqli_stmt_execute($stmt)) {
            response('success', 'Blog added successfully');
        }

        response('error', 'Failed to add blog');
    }

    /* =============================
       UPDATE BLOG
    ============================== */ else {

        // Get old images if not updated
        $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image, author_image FROM blogs WHERE id = $id"));

        if ($imageName === null) {
            $imageName = $old['image'] ?? null;
        }

        if ($authorImage === null) {
            $authorImage = $old['author_image'] ?? null;
        }

        $sql = "UPDATE blogs SET
                    title = ?,
                    slug = ?,
                    description = ?,
                    image = ?,
                    meta_title = ?,
                    meta_description = ?,
                    meta_keywords = ?,
                    author_name = ?,
                    author_image = ?,
                    status = ?,
                    updated_at = NOW()
                WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param(
            $stmt,
            'ssssssssssi',
            $title,
            $slug,
            $description,
            $imageName,
            $meta_title,
            $meta_description,
            $meta_keywords,
            $author_name,
            $authorImage,
            $status,
            $id
        );

        if (mysqli_stmt_execute($stmt)) {
            response('success', 'Blog updated successfully');
        }

        response('error', 'Failed to update blog');
    }
}

function deleteBlog()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized access');
    }

    $id = intval($_POST['id'] ?? 0);

    if ($id <= 0) {
        response('error', 'Invalid blog ID');
    }

    $stmt = mysqli_prepare($conn, "SELECT image, author_image FROM blogs WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$row = mysqli_fetch_assoc($result)) {
        response('error', 'Blog not found');
    }

    $delStmt = mysqli_prepare($conn, "DELETE FROM blogs WHERE id = ?");
    mysqli_stmt_bind_param($delStmt, 'i', $id);

    if (mysqli_stmt_execute($delStmt)) {

        if (!empty($row['image'])) {
            $path = '../../uploads/blogs/' . $row['image'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        if (!empty($row['author_image'])) {
            $path = '../../uploads/authors/' . $row['author_image'];
            if (file_exists($path)) {
                unlink($path);
            }
        }

        response('success', 'Blog deleted successfully');
    }

    response('error', 'Failed to delete blog');
}

function saveSettings()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized');
    }

    $meta_title = trim($_POST['meta_title'] ?? '');
    $meta_keywords = trim($_POST['meta_keywords'] ?? '');
    $meta_description = trim($_POST['meta_description'] ?? '');
    $youtube = trim($_POST['youtube'] ?? '');
    $facebook = trim($_POST['facebook'] ?? '');
    $instagram = trim($_POST['instagram'] ?? '');
    $linkedin = trim($_POST['linkedin'] ?? '');
    $twitter = trim($_POST['twitter'] ?? '');
    $whatsapp = trim($_POST['whatsapp'] ?? '');
    $address = trim($_POST['address'] ?? '');
    $header_address = trim($_POST['header_address'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $alt_phone_number = trim($_POST['alt_phone_number'] ?? '');
    $email = trim($_POST['email'] ?? '');


    $uploadDir = dirname(__DIR__, 2) . '/uploads/settings/';
    if (!is_dir($uploadDir))
        mkdir($uploadDir, 0755, true);

    $logoSql = $faviconSql = '';

    /* LOGO */
    if (!empty($_FILES['site_logo']['name'])) {
        $ext = pathinfo($_FILES['site_logo']['name'], PATHINFO_EXTENSION);
        $logo = 'logo_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['site_logo']['tmp_name'], $uploadDir . $logo);
        $logoSql = ", site_logo='$logo'";
    }

    /* FAVICON */
    if (!empty($_FILES['favicon']['name'])) {
        $ext = pathinfo($_FILES['favicon']['name'], PATHINFO_EXTENSION);
        $favicon = 'favicon_' . time() . '.' . $ext;
        move_uploaded_file($_FILES['favicon']['tmp_name'], $uploadDir . $favicon);
        $faviconSql = ", favicon='$favicon'";
    }

    $sql = "
        UPDATE settings SET
        meta_title=?,
        meta_keywords=?,
        meta_description=?
        $logoSql
        $faviconSql,
        youtube = ?,
        facebook = ?,
        instagram = ?,
        linkedin = ?,
        twitter = ?,
        whatsapp = ?,
        address = ?,
        header_address = ?,
        phone_number = ?,
        alt_phone_number = ?,
        email = ?
        WHERE id=1
    ";

    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'ssssssssssssss', $meta_title, $meta_keywords, $meta_description, $youtube, $facebook, $instagram, $linkedin, $twitter, $whatsapp, $address, $header_address, $phone, $alt_phone_number, $email);
    mysqli_stmt_execute($stmt)
        ? response('success', 'Settings updated successfully')
        : response('error', 'Failed to save settings');
}

function saveGallery()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized');
    }

    $id = intval($_POST['id'] ?? 0);
    $title = trim($_POST['title'] ?? '');
    $status = $_POST['status'] ?? '';

    if (empty($title)) {
        response('error', 'Title is required');
    }

    // ✅ UNIVERSAL PATH (WORKS EVERYWHERE)
    $basePath = realpath(__DIR__ . '/../../');
    $uploadDir = $basePath . '/uploads/gallery/';

    // Ensure folder exists
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageSql = '';
    $imageName = '';

    /* ================= IMAGE UPLOAD ================= */
    if (!empty($_FILES['image']['name'])) {

        // Check upload error
        if ($_FILES['image']['error'] !== 0) {
            response('error', 'Upload error code: ' . $_FILES['image']['error']);
        }

        // Check temp file
        if (!file_exists($_FILES['image']['tmp_name'])) {
            response('error', 'Temp file missing');
        }

        // Validate extension
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png', 'webp'];

        if (!in_array($ext, $allowed)) {
            response('error', 'Invalid image format');
        }

        // Generate unique name
        $imageName = 'gallery_' . time() . '_' . rand(1000, 9999) . '.' . $ext;

        $fullPath = $uploadDir . $imageName;

        // Move file
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $fullPath)) {
            response('error', 'Upload failed → ' . $fullPath);
        }

        $imageSql = ", image='$imageName'";
    }

    /* ================= UPDATE ================= */
    if ($id > 0) {

        // Delete old image if new uploaded
        if ($imageName) {
            $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM gallery WHERE id=$id"));

            if (!empty($old['image'])) {
                $oldPath = $uploadDir . $old['image'];
                if (file_exists($oldPath)) {
                    unlink($oldPath);
                }
            }
        }

        $sql = "
            UPDATE gallery SET
            title = ?,
            status = ?
            $imageSql
            WHERE id = ?
        ";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'ssi', $title, $status, $id);

        if (mysqli_stmt_execute($stmt)) {
            response('success', 'Gallery updated successfully');
        } else {
            response('error', 'Update failed');
        }

    } else {

        /* ================= INSERT ================= */

        if (empty($imageName)) {
            response('error', 'Image is required');
        }

        $sql = "INSERT INTO gallery (title, image, status) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sss', $title, $imageName, $status);

        if (mysqli_stmt_execute($stmt)) {
            response('success', 'Gallery added successfully');
        } else {
            response('error', 'Insert failed');
        }
    }
}
function deleteGallery()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized');
    }

    $id = intval($_POST['id']);

    $data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM gallery WHERE id=$id"));

    if ($data) {
        $path = realpath(__DIR__ . '/../../') . '/uploads/gallery/' . $data['image'];

        if (!empty($data['image']) && file_exists($path)) {
            unlink($path);
        }

        mysqli_query($conn, "DELETE FROM gallery WHERE id=$id");

        response('success', 'Gallery deleted successfully');
    } else {
        response('error', 'Record not found');
    }
}

function saveContact()
{
    global $conn;

    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $phone = trim($_POST['phone'] ?? '');
    $message = trim($_POST['message'] ?? '');

    /* ================= VALIDATION ================= */
    if ($name === '' || $email === '' || $phone === '' || $message === '') {
        response('error', 'All fields are required');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        response('error', 'Invalid email address');
    }

    /* ================= INSERT ================= */
    $sql = "INSERT INTO contact_leads (name, email, phone, message, created_at) 
            VALUES (?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        response('error', 'Prepare failed');
    }

    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $phone, $message);

    if (mysqli_stmt_execute($stmt)) {
        response('success', 'Thank you! We will contact you soon.');
    } else {
        response('error', 'Failed to save contact');
    }
}

function saveAppointment()
{
    global $conn;

    $name = trim($_POST['form_name'] ?? '');
    $email = trim($_POST['form_email'] ?? '');
    $date = trim($_POST['form_appontment_date'] ?? '');
    $message = trim($_POST['form_message'] ?? '');

    /* ================= VALIDATION ================= */
    if ($name === '' || $email === '' || $date === '' || $message === '') {
        response('error', 'All fields are required');
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        response('error', 'Invalid email address');
    }

    /* ================= INSERT ================= */
    $sql = "INSERT INTO appointments 
            (name, email, appointment_datetime, message, created_at) 
            VALUES (?, ?, ?, ?, NOW())";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt) {
        response('error', 'Prepare failed');
    }

    mysqli_stmt_bind_param($stmt, 'ssss', $name, $email, $date, $message);

    if (mysqli_stmt_execute($stmt)) {
        response('success', 'Appointment booked successfully!');
    } else {
        response('error', 'Failed to save appointment');
    }
}

function updateProfile()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized');
    }

    $admin_id = $_SESSION['admin_id'];
    $password = trim($_POST['password'] ?? '');
    $confirm = trim($_POST['confirm_password'] ?? '');

    /* ================= PASSWORD UPDATE ================= */
    if (!empty($password)) {

        if ($password !== $confirm) {
            response('error', 'Password does not match');
        }

        if (strlen($password) < 6) {
            response('error', 'Password must be at least 6 characters');
        }

        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = mysqli_prepare($conn, "UPDATE admin SET password=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'si', $hashed, $admin_id);
        mysqli_stmt_execute($stmt);
    }

    /* ================= IMAGE UPLOAD ================= */
    if (!empty($_FILES['image']['name'])) {

        $allowed = ['jpg', 'jpeg', 'png', 'webp'];
        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));

        if (!in_array($ext, $allowed)) {
            response('error', 'Invalid image format');
        }

        // path (same style like gallery)
        $uploadDir = realpath(__DIR__ . '/../../') . '/uploads/admin/';

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // delete old image
        $old = mysqli_fetch_assoc(mysqli_query($conn, "SELECT image FROM admin WHERE id=$admin_id"));

        if (!empty($old['image'])) {
            $oldPath = $uploadDir . $old['image'];
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        $imageName = 'admin_' . time() . '.' . $ext;
        $fullPath = $uploadDir . $imageName;

        if (!move_uploaded_file($_FILES['image']['tmp_name'], $fullPath)) {
            response('error', 'Image upload failed');
        }

        $stmt = mysqli_prepare($conn, "UPDATE admin SET image=? WHERE id=?");
        mysqli_stmt_bind_param($stmt, 'si', $imageName, $admin_id);
        mysqli_stmt_execute($stmt);
    }

    $_SESSION['image'] = $imageName;

    response('success', 'Profile updated successfully');
}

function saveBanner()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized access');
    }

    $id = $_POST['id'] ?? null;
    $status = ($_POST['status'] == '1') ? 1 : 0;

    $uploadDir = dirname(__DIR__, 2) . '/uploads/banners/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    // IMAGE UPLOAD (OPTIONAL FOR EDIT)
    $imageSql = '';
    $imageName = null;

    if (!empty($_FILES['image']['name'])) {

        $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
        if (!in_array($ext, ['jpg', 'jpeg', 'png', 'webp'])) {
            response('error', 'Invalid image type');
        }

        $imageName = time() . '_' . uniqid() . '.' . $ext;
        if (!move_uploaded_file($_FILES['image']['tmp_name'], $uploadDir . $imageName)) {
            response('error', 'Image upload failed');
        }

        $imageSql = ', image=?';
    }

    /* ================= INSERT ================= */
    if (empty($id)) {

        if (!$imageName)
            response('error', 'Banner image required');

        $stmt = mysqli_prepare(
            $conn,
            "INSERT INTO banners (image,status) VALUES (?,?)"
        );
        mysqli_stmt_bind_param($stmt, 'si', $imageName, $status);

        mysqli_stmt_execute($stmt)
            ? response('success', 'Banner added')
            : response('error', 'Insert failed');
    }

    /* ================= UPDATE ================= */
    $sql = "UPDATE banners SET status=? $imageSql WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    if ($imageSql) {
        mysqli_stmt_bind_param($stmt, 'isi', $status, $imageName, $id);
    } else {
        mysqli_stmt_bind_param($stmt, 'ii', $status, $id);
    }

    mysqli_stmt_execute($stmt)
        ? response('success', 'Banner updated')
        : response('error', 'Update failed');
}

function deleteBanner()
{
    global $conn;

    if (!isset($_SESSION['admin_id'])) {
        response('error', 'Unauthorized access');
    }

    $id = intval($_POST['id'] ?? 0);
    if ($id <= 0) {
        response('error', 'Invalid banner ID');
    }

    // Fetch banner image
    $stmt = mysqli_prepare($conn, "SELECT image FROM banners WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$row = mysqli_fetch_assoc($result)) {
        response('error', 'Banner not found');
    }

    // Delete image file
    $imagePath = dirname(__DIR__, 2) . '/uploads/banners/' . $row['image'];
    if (file_exists($imagePath)) {
        unlink($imagePath);
    }

    // Delete database record
    $stmt = mysqli_prepare($conn, "DELETE FROM banners WHERE id = ?");
    mysqli_stmt_bind_param($stmt, 'i', $id);

    if (mysqli_stmt_execute($stmt)) {
        response('success', 'Banner deleted successfully');
    }

    response('error', 'Failed to delete banner');
}