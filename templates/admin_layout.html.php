<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../question.css">
        <title><?= $title?></title>
    </head>
    <body>
        <header id="admin">
        <h1>Student Forum Database Admin Area - Manage questions, modules and users</h1></header>
        <nav>
            <ul>
                <!-- <li><a href="index.php">Home</a></li> -->
                <li><a href="questions.php">Questions List</a></li>
                <li><a href="addquestion.php">Add a new question</a></li>
                <li><a href="users.php">Manage Users</a></li>
                <li><a href="modules.php">Modules</a></li>
                <li><a href="login/Logout.php">Logout</a></li>
            </ul>
        </nav>
        <main>
            <?= $output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>
