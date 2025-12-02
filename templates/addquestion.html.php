<form action="" method="post" enctype="multipart/form-data">
    <label for='questiontext'>Type your question here:</label>
    <textarea name="questiontext" rows="3" cols="40"></textarea>
    <input type="file" name="fileToUpload">

    <select name="users">
        <option value="">select an author</option>
        <?php foreach ($users as $user):?>
            <option value="<?=htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>

    <select name="modules">
        <option value="">select a category</option>
        <?php foreach ($modules as $module):?>
            <option value="<?=htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8'); ?>">
            <?=htmlspecialchars($module['moduleName'], ENT_QUOTES, 'UTF-8'); ?>
            </option>
            <?php endforeach;?>
    </select>

    <input type="submit" name="submit" value="Add">
</form>
