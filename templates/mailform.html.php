<?php if (isset($error)): ?>
    <p class="errors"><?= $error ?></p>
<?php endif; ?>

<form action="" method="post">
    <label for="name">Your Name:</label>
    <input type="text" name="name" id="name" required>

    <label for="email">Your Email:</label>
    <input type="email" name="email" id="email" required>

    <label for="subject">Subject:</label>
    <input type="text" name="subject" id="subject" required>

    <label for="message">Message:</label>
    <textarea name="message" id="message" rows="5" cols="40" required></textarea>

    <input type="submit" name="submit" value="Send Message">
</form>