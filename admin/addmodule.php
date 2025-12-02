<?php
if (isset($_POST['moduleName'])) {
    try {
        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunctions.php';
        
        insertModule($pdo, $_POST['moduleName']);
        header('location: modules.php');
    } catch (PDOException $e) {
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
} else {
    $title = 'Add a new module';
    ob_start();
    include '../templates/addmodule.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';
?>