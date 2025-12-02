<?php
include '../includes/DatabaseConnection.php';
include '../includes/DataBaseFunctions.php';
try{
    if(isset($_POST['questiontext'])){

        // $sql = 'UPDATE question SET questiontext = :questiontext WHERE id = :id';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':questiontext', $_POST['questiontext']);
        // $stmt->bindValue(':id', $_POST['questionid']);
        // $stmt->execute();
        updateQuestion($pdo, $_POST['questionid'], $_POST['questiontext']);
        header('location: questions.php');
    }else{
        // $sql = 'SELECT * FROM question WHERE id = :id';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':id', $_GET['id']);
        // $stmt->execute();
        // $question = $stmt->fetch();
        $question = getQuestion($pdo, $_GET['id']);
        $title = 'Edit question';

        ob_start();
        include '../templates/editquestion.html.php';
        $output = ob_get_clean();
    }
}catch(PDOException $e){
    $title = 'error has occured';
    $output = 'Error editing question: ' . $e->getMessage();
}

include '../templates/admin_layout.html.php';
