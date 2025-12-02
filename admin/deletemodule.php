<?php
try {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    
    deleteModule($pdo, $_POST['id']);
    header('location: modules.php');
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Unable to connect to delete module: ' . $e->getMessage();
    include '../templates/admin_layout.html.php';
}
?>