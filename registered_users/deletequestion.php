<?php
require 'check_login.php';
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

$question = getQuestion($pdo, $_POST['id']);

// Kiểm tra quyền sở hữu
if ($question['userid'] == $_SESSION['user_id']) {
    // Nếu có ảnh thì xóa ảnh (optional)
    if (!empty($question['image'])) {
        @unlink('../images/'.$question['image']);
    }
    deleteQuestion($pdo, $_POST['id']);
} else {
    // User đang cố xóa bài không phải của mình
    die("Access denied");
}

header('location: questions.php');