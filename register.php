<?php
try {
    include 'includes/DatabaseConnection.php';
    include 'includes/DataBaseFunctions.php';

    if (isset($_POST['name'])) {
        insertUser($pdo, $_POST['name'], $_POST['email'], $_POST['password']);
        header('location: registered_users/login.php'); // Chuyển đến trang login sau khi đăng ký
        exit();
    }
} catch (PDOException $e) {
    $title = 'An error has occurred';
    $output = 'Database error: ' . $e->getMessage();
}

$title = 'Register Account';
ob_start();
?>
<form action="" method="post">
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" required>
    
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" required>
    
    <label for="password">Password:</label>
    <input type="password" name="password" id="password" required>
    
    <input type="submit" value="Register">
</form>
<?php
$output = ob_get_clean();
include 'templates/layout.html.php';
?>