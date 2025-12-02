<?php
if (isset($_POST['name'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunctions.php';
        
        // Gọi hàm insertUser (đã thêm ở Bước 1)
        insertUser($pdo, $_POST['name'], $_POST['email'], $_POST['password']);
        
        header('location: users.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
        include '../templates/admin_layout.html.php';
    }
} else {
    $title = 'Add a new user';
    ob_start();
    include '../templates/adduser.html.php';
    $output = ob_get_clean();
    include '../templates/admin_layout.html.php';
}
?>