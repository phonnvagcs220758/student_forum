<?php
// week5/registered_users/editquestion.php
require 'check_login.php'; // Bắt buộc đăng nhập
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    if (isset($_POST['questiontext'])) {
        // 1. Lấy thông tin câu hỏi để kiểm tra quyền sở hữu TRƯỚC khi update
        $question = getQuestion($pdo, $_POST['questionid']);
        
        if ($question['userid'] == $_SESSION['user_id']) {
            // 2. Nếu đúng là chủ sở hữu thì mới cho update
            updateQuestion($pdo, $_POST['questionid'], $_POST['questiontext']);
            header('location: questions.php');
        } else {
            die("Access Denied: You do not own this question.");
        }
        
    } else {
        // Lấy thông tin câu hỏi để hiển thị ra form
        $question = getQuestion($pdo, $_GET['id']);
        
        // Kiểm tra xem người đang xem form có phải chủ bài viết không
        if ($question['userid'] == $_SESSION['user_id']) {
            $title = 'Edit question';
            
            // Tái sử dụng template editquestion.html.php
            ob_start();
            include '../templates/editquestion.html.php';
            $output = ob_get_clean();
        } else {
             die("Access Denied: You do not own this question.");
        }
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error editing question: ' . $e->getMessage();
}

include '../templates/registered_users_layout.html.php';
?>