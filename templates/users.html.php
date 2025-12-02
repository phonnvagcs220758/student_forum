<h2>Users List</h2>
<a href="adduser.php">Add new user</a>
<p><?= $totalUsers ?> users registered.</p>

<ul>
<?php foreach($users as $user): ?>
    <li>
        <strong><?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8')?></strong> 
        - <?=htmlspecialchars($user['email'], ENT_QUOTES, 'UTF-8')?>
        
        <a href="edituser.php?id=<?=$user['id']?>">Edit</a>
        
        <form action="deleteuser.php" method="post" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this user?');">
            <input type="hidden" name="id" value="<?=$user['id']?>">
            <input type="submit" value="Delete">
        </form>
    </li>
<?php endforeach; ?>
</ul>