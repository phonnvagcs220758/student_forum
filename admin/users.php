<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';

    // Gọi hàm lấy danh sách user (đã thêm ở Bước 1)
    $users = allUsers($pdo);
    
    $title = 'Manage Users';
    $totalUsers = count($users);

    ob_start();
    include '../templates/users.html.php';
    $output = ob_get_clean();
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>