<?php
// week5/contact.php

$title = 'Contact Us';

if (isset($_POST['submit'])) {
    // 1. Lấy dữ liệu từ form
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // 2. Cấu hình thông tin gửi mail
    $to = 'phonnva88@gmail.com'; // Địa chỉ nhận mail của bạn
    $email_subject = "New Contact Form Submission: $subject";
    
    // Tạo nội dung email
    $email_body = "You have received a new message from the user $name.\n\n".
                  "Email address: $email\n".
                  "Here is the message:\n$message";

    // Cấu hình Headers
    $headers = "From: noreply@yoursite.com\n"; // Nên để noreply hoặc email xác thực của bạn
    $headers .= "Reply-To: $email";

    // 3. Gửi mail bằng hàm mail()
    // Lưu ý: Hàm này chỉ hoạt động nếu sendmail.exe đã được cấu hình đúng trong XAMPP
    if (mail($to, $email_subject, $email_body, $headers)) {
        $output = "<p>Thank you, $name! Your message has been sent successfully.</p>";
    } else {
        $output = "<p class='errors'>Delivery failed. Please check your configuration.</p>";
        // Nếu lỗi, hiển thị lại form
        ob_start();
        include 'templates/mailform.html.php';
        $output .= ob_get_clean();
    }

} else {
    // Nếu chưa submit, hiển thị form
    ob_start();
    include 'templates/mailform.html.php';
    $output = ob_get_clean();
}

// Gọi layout chính để hiển thị
include 'templates/layout.html.php';
?>