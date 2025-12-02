<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../question.css">
        <title><?= $title?></title>
    </head>
    <body>
        <header id="admin">
            <h1>Student Forum Database - Registered User Area</h1>
        </header>
        <nav>
            <ul>
                <li><a href="../questions.php">Back to Public page</a></li>
                
                <li><a href="questions.php">My Questions</a></li>
                <li><a href="addquestion.php">Add a new question</a></li>
                
                <li><a href="../admin/login/Logout.php">Logout</a></li>
            </ul>
        </nav>
        <main>
            <?= $output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>