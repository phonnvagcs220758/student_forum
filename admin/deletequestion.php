<?php
try{
    include '../includes/DatabaseConnection.php';
    include '../includes/DatabaseFunctions.php';

    // $sql = 'DELETE FROM question WHERE id = :id';
    // $stmt = $pdo->prepare($sql);
    // $stmt->bindValue(':id', $_POST['id']);
    // $stmt->execute();
    $row = getQuestion($pdo,$_POST['id']);
    unlink('../image/'.$row['image']);
    deleteQuestion($pdo, $_POST['id']);
    header('location: questions.php');
}catch(PDOException $e){
$title = 'An error has occured';
$output = 'Unable to connect to delete joke: ' .$e->getMessage();
}
include '../templates/admin_layout.html.php';
