<h2>Modules List</h2>
<a href="addmodule.php">Add new module</a>
<p><?= $totalModules ?> modules available.</p>

<ul>
<?php foreach($modules as $module): ?>
    <li>
        <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8')?>
        
        <a href="editmodule.php?id=<?=$module['id']?>">Edit</a>
        
        <form action="deletemodule.php" method="post" style="display:inline;">
            <input type="hidden" name="id" value="<?=$module['id']?>">
            <input type="submit" value="Delete">
        </form>
    </li>
<?php endforeach; ?>
</ul>