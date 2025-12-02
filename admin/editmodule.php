<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';

try {
    if (isset($_POST['moduleName'])) {
        updateModule($pdo, $_POST['id'], $_POST['moduleName']);
        header('location: modules.php');
    } else {
        $module = getModule($pdo, $_GET['id']);
        $title = 'Edit Module';
        
        ob_start();
        ?>
        <form action="" method="post">
            <input type="hidden" name="id" value="<?=$module['id']?>">
            <label for="moduleName">Edit Module Name:</label>
            <input type="text" name="moduleName" value="<?=$module['moduleName']?>">
            <input type="submit" value="Save">
        </form>
        <?php
        $output = ob_get_clean();
    }
} catch (PDOException $e) {
    $title = 'Error';
    $output = 'Error editing module: ' . $e->getMessage();
}
include '../templates/admin_layout.html.php';
?>