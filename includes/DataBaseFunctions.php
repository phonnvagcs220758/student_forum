<?php
function totalQuestions($pdo){
    $query = query($pdo, 'SELECT COUNT(*) FROM question');
    $row = $query->fetch();
    return $row[0];
}

function getQuestion($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM question WHERE id = :id', $parameters);
    return $query->fetch();
}

function query($pdo, $sql, $parameters = []) {
    $query = $pdo->prepare($sql);
    $query->execute($parameters);
    return $query;
}

function updateQuestion($pdo, $questionId, $questiontext) {
    $query = 'UPDATE question SET questiontext = :questiontext WHERE id = :id';
    $parameters = [':questiontext' => $questiontext, ':id' => $questionId];
    query($pdo, $query, $parameters);
}

function deleteQuestion($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM question WHERE id = :id', $parameters);
}

// function insertQuestion($pdo, $questiontext, $userid, $moduleid) {
//     $query = 'INSERT INTO question (questiontext, questiondate, userid, moduleid)
//     VALUES (:questiontext, CURDATE(), :userid, :moduleid)';
//     $parameters = [':questiontext' => $questiontext, ':userid' => $userid, ':moduleid' => $moduleid];
//     query($pdo, $query, $parameters);
// }

function insertQuestion($pdo, $questiontext, $fileToUpload, $userid, $moduleid) {
    $query = 'INSERT INTO question (questiontext, questiondate, `image`, userid, moduleid)
    VALUES (:questiontext, CURDATE(), :fileToUpload, :userid, :moduleid)';
    $parameters = [':questiontext' => $questiontext, ':fileToUpload' => $fileToUpload,
    ':userid' => $userid, ':moduleid' => $moduleid];
    query($pdo, $query, $parameters);
}

##USER FUNCTIONS##

function allUsers($pdo) {
    $users = query($pdo, 'SELECT * FROM user');
    return $users->fetchAll();
}

##MODULE FUNCTIONS##

function allModules($pdo) {
    $modules = query($pdo, 'SELECT * FROM module');
    return $modules->fetchAll();
}

function allQuestions($pdo) {
    $questions = query($pdo, 'SELECT question.id, questiontext, `name`, email, moduleName FROM question
    INNER JOIN user ON userid = user.id
    INNER JOIN module ON moduleid = module.id');
    return $questions->fetchAll();
}

// --- BẮT ĐẦU PHẦN MỚI CHO MODULE ---

function getModule($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM module WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertModule($pdo, $moduleName) {
    $query = 'INSERT INTO module (moduleName) VALUES (:moduleName)';
    $parameters = [':moduleName' => $moduleName];
    query($pdo, $query, $parameters);
}

function updateModule($pdo, $id, $moduleName) {
    $query = 'UPDATE module SET moduleName = :moduleName WHERE id = :id';
    $parameters = [':moduleName' => $moduleName, ':id' => $id];
    query($pdo, $query, $parameters);
}

function deleteModule($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM module WHERE id = :id', $parameters);
}
// --- KẾT THÚC PHẦN MỚI ---
// --- USER FUNCTIONS (CRUD & AUTH) ---

function getUser($pdo, $id) {
    $parameters = [':id' => $id];
    $query = query($pdo, 'SELECT * FROM user WHERE id = :id', $parameters);
    return $query->fetch();
}

function insertUser($pdo, $name, $email, $password) {
    // Mã hóa mật khẩu trước khi lưu
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $query = 'INSERT INTO user (name, email, password) VALUES (:name, :email, :password)';
    $parameters = [':name' => $name, ':email' => $email, ':password' => $hash];
    query($pdo, $query, $parameters);
}

function updateUser($pdo, $id, $name, $email, $password = null) {
    if ($password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'UPDATE user SET name = :name, email = :email, password = :password WHERE id = :id';
        $parameters = [':name' => $name, ':email' => $email, ':password' => $hash, ':id' => $id];
    } else {
        $query = 'UPDATE user SET name = :name, email = :email WHERE id = :id';
        $parameters = [':name' => $name, ':email' => $email, ':id' => $id];
    }
    query($pdo, $query, $parameters);
}

function deleteUser($pdo, $id) {
    $parameters = [':id' => $id];
    query($pdo, 'DELETE FROM user WHERE id = :id', $parameters);
}

// Hàm kiểm tra đăng nhập cho Registered User
function checkLogin($pdo, $email, $password) {
    $parameters = [':email' => $email];
    $query = query($pdo, 'SELECT * FROM user WHERE email = :email', $parameters);
    $user = $query->fetch();
    
    if ($user && password_verify($password, $user['password'])) {
        return $user; // Trả về thông tin user nếu đúng
    }
    return false;
}

// Lấy câu hỏi của riêng user đó (cho folder registered_users)
function getQuestionsByUserId($pdo, $userid) {
    $parameters = [':userid' => $userid];
    $sql = 'SELECT question.id, questiontext, `name`, email, moduleName, `image` 
            FROM question
            INNER JOIN user ON userid = user.id
            INNER JOIN module ON moduleid = module.id
            WHERE userid = :userid';
    $query = query($pdo, $sql, $parameters);
    return $query->fetchAll();
}