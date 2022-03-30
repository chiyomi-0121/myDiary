<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();
    
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];

    $statement = $dbh->prepare('INSERT INTO userdata (userName, email, password) 
                                VALUES (:username, :email, :pass)');
    $statement->execute([
        'username' => $username,
        'email' => $email,
        'pass' => password_hash($password, PASSWORD_DEFAULT)
    ]);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>日記｜登録成功</title>
</head>
<body>
    <header>
        <h2>登録成功</h2>
    </header>
    <main>
        <div id="wrap">
            <div>登録が完了しました。</div>
            <a href="index.php">トップページへ</a>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>