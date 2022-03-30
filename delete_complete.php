<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    $diaryId = $_SESSION['id'];

    $statement = $dbh->prepare('DELETE FROM diarydata WHERE diaryId = :id');
    $statement->execute([
        'id' => $diaryId,
    ]);

    unset($_SESSION['id']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>毎日日記｜削除成功</title>
</head>
<body>
    <header>
        <h2>削除成功</h2>
    </header>
    <main>
        <div id="wrap">
            <a href="list.php">一覧に戻る</a>
            <a href="home.php">マイページ</a>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>