<?php
require 'check_login.php'; // Bắt buộc đăng nhập
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

// Lấy câu hỏi dựa trên ID người đang đăng nhập
$questions = getQuestionsByUserId($pdo, $_SESSION['user_id']);
$title = 'My Questions';
$totalQuestions = count($questions);

ob_start();
// Dùng lại template questions.html.php nhưng lưu ý đường dẫn edit/delete sẽ cần chỉnh lại
// Để đơn giản, ta viết HTML trực tiếp ở đây hoặc tạo template riêng 'my_questions.html.php'
?>
<h2>Welcome, <?=htmlspecialchars($_SESSION['user_name'])?></h2>

<?php foreach($questions as $question): ?>
    <blockquote>
        <p><?=htmlspecialchars($question['questiontext'], ENT_QUOTES,'UTF-8')?></p>
        <?php if($question['image']): ?>
            <img height="100px" src="../images/<?=htmlspecialchars($question['image'], ENT_QUOTES,'UTF-8'); ?>" />
        <?php endif; ?>
        
        <a href="editquestion.php?id=<?= $question['id']?>">Edit</a>
        <form action="deletequestion.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?= $question['id']?>">
            <input type="submit" value="Delete">    
        </form>
    </blockquote>
<?php endforeach; ?>

<?php
$output = ob_get_clean();
include '../templates/registered_users_layout.html.php';
?>