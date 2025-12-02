<?php
require 'check_login.php';
if (isset($_POST['questiontext'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunctions.php';
        include '../includes/uploadFile.php'; // Xử lý upload ảnh

        // Gọi hàm insertQuestion với User ID từ Session
        insertQuestion($pdo, $_POST['questiontext'], $_FILES['fileToUpload']['name'], $_SESSION['user_id'], $_POST['moduleid']);
        
        header('location: questions.php');
    } catch (PDOException $e) {
        // Handle error
    }
} else {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    $modules = allModules($pdo);
    $title = 'Add Question';
    ob_start();
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Question:</label>
        <textarea name="questiontext"></textarea>
        
        <label>Module:</label>
        <select name="moduleid">
            <?php foreach ($modules as $module):?>
                <option value="<?=$module['id']?>"><?=$module['moduleName']?></option>
            <?php endforeach;?>
        </select>
        
        <label>Image:</label>
        <input type="file" name="fileToUpload">
        
        <input type="submit" value="Post">
    </form>
    <?php
    $output = ob_get_clean();
    include '../templates/registered_users_layout.html.php';
}
?>