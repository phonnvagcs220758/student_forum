<?php
try{
    require "login/Check.php";
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';

    $sql = 'SELECT question.id, questiontext, `name`, email, moduleName, `image` FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id';

    $questions = $pdo->query($sql);
    $title = 'Question list';
    $totalQuestions = totalQuestions($pdo);

    ob_start();
    include '../templates/questions.html.php';
    $output = ob_get_clean();
}catch (PDOException $e){
    $title = 'An error has occured';
    $output = 'Database error: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
