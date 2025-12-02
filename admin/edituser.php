<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    if (isset($_POST['name'])) {
        // Kiểm tra xem admin có nhập password mới không
        // Nếu để trống thì gửi null hoặc chuỗi rỗng để giữ nguyên pass cũ (tuỳ hàm updateUser xử lý)
        $password = !empty($_POST['password']) ? $_POST['password'] : null;

        updateUser($pdo, $_POST['id'], $_POST['name'], $_POST['email'], $password);
        
        header('location: users.php');
    } else {
        // Lấy thông tin user hiện tại để điền vào form
        $user = getUser($pdo, $_GET['id']);
        $title = 'Edit User';
        
        ob_start();
        include '../templates/edituser.html.php';
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error editing user: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>