<form action="" method="post">
    <input type="hidden" name="id" value="<?=$user['id']?>">
    
    <label for="name">Name:</label>
    <input type="text" name="name" id="name" value="<?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?>" required>

    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="<?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8')?>" required>

    <label for="password">New Password (leave blank to keep current):</label>
    <input type="password" name="password" id="password">

    <input type="submit" value="Save Changes">
</form>