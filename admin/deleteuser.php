<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    
    // Gọi hàm deleteUser (đã thêm ở Bước 1)
    deleteUser($pdo, $_POST['id']);
    
    header('location: users.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to delete user: ' . $e->getMessage();
    include '../templates/admin_layout.html.php';
}
?>