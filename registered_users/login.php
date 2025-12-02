<?php
session_start();
if (isset($_POST['email'])) {
    include '../includes/DatabaseConnection.php';
    include '../includes/DataBaseFunctions.php';
    
    $user = checkLogin($pdo, $_POST['email'], $_POST['password']);
    
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        header('location: questions.php'); // Chuyển đến trang quản lý câu hỏi cá nhân
    } else {
        $error = "Invalid email or password";
    }
}
?>
<form method="post">
    <?php if(isset($error)) echo "<p>$error</p>"; ?>
    <label>Email: <input type="email" name="email"></label>
    <label>Password: <input type="password" name="password"></label>
    <input type="submit" value="Login">
</form>