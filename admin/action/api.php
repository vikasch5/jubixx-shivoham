<?php
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

    $sql = "SELECT id, name, password 
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
