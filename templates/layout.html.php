<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="question.css">
        <title><?= $title?></title>
    </head>
    <body>
        <header><h1>Student Forum</h1></header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="questions.php">Questions List</a></li>
                <!-- <li><a href="addquestion.php">Add a new question</a></li> -->
                <li><a href="registered_users/questions.php">User Login</a></li>
                <li><a href="register.php">Register</a></li> 
                <li><a href="contact.php">Contact us</a></li>
                <li><a href="admin/login/Login.html">Admin Login</a></li>
            </ul>
        </nav>
        <main>
            <?= $output?>
        </main>
        <footer>&copy; IJDB 2023</footer>
    </body>
</html>
