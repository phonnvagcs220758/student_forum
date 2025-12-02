<?php
if(isset($_POST['questiontext'])){
    try{

        include '../includes/DatabaseConnection.php';
        include '../includes/DataBaseFunctions.php';

        // $sql = 'INSERT INTO question SET
        // questiontext = :questiontext,
        // questiondate = CURDATE(),
        // userid = :userid,
        // moduleid = :moduleid';
        // $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':questiontext', $_POST['questiontext']);
        // $stmt->bindValue(':userid', $_POST['users']);
        // $stmt->bindValue(':moduleid', $_POST['modules']);
        // $stmt->execute();
        insertQuestion($pdo, $_POST['questiontext'],$_FILES['fileToUpload']['name'],
        $_POST['users'],$_POST['modules']);
        include '../includes/uploadFile.php';
        header('location: questions.php');
    }catch (PDOException $e){
        $title = 'An error has occurred';
        $output = 'Database error: ' . $e->getMessage();
    }
}else{
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    $title = 'Add a new question';
    // $sql_a = 'SELECT * FROM user';
    // $users = $pdo->query($sql_a);
    // $sql_c = 'SELECT * FROM module';
    // $modules = $pdo->query($sql_c);
    $users = allUsers($pdo);
    $modules = allModules($pdo);
    ob_start();
    include '../templates/addquestion.html.php';
    $output = ob_get_clean();
}
include '../templates/admin_layout.html.php';