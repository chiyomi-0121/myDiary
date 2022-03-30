<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    $userId = $_SESSION['userId'];
    $title = $_SESSION['title'];
    $content = $_SESSION['content'];

    $statement = $dbh->prepare('INSERT INTO diarydata (title, content, userId) 
                                VALUES (:title, :content, :id)');
    $statement->execute([
        'title' => $title,
        'content' => $content,
        'id' => $userId]
    );

    $_SESSION['userId'] = $userId;

    unset($_SESSION['title']);
    unset($_SESSION['content']);
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>毎日日記｜登録成功</title>
</head>
<body>
    <header>
        <h2>登録成功</h2>
    </header>
    <main>
        <div id="wrap">
            <ul>
                <li><a href="home.php">ホームに戻る</a></li>
                <li><a href="edit.php">続けて書く</a></li>
                <li><a href="list.php">一覧を見る</a></li>
            </ul>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>