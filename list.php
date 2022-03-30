<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    $userId = $_SESSION['userId'];

    $statement = $dbh->prepare('SELECT * FROM diarydata
                                WHERE userId = :id 
                                ORDER BY diaryId DESC');
    $statement->execute(['id' => $userId]);
    $diarys = $statement->fetchAll();

    $_SESSION['userId'] = $userId;
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title>毎日日記｜日記一覧</title>
</head>
<body>
    <header>
        <h2>日記一覧</h2>
        <nav>
            <ul>
                <li><a href="home.php">マイページ</a></li>
                <li><a href="edit.php">日記を書く</a></li>
                <li><a href="list.php">日記を見る</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <div id="wrap">
           <ul>
                <?php foreach ($diarys as $diary) {?>
                    <li id="contentbox" style="border: 1px solid black;width: 400px;margin: 5px auto 5px 0;padding: 10px 10px;overflow-wrap:break-word;">
                        <p><?php echo date('Y年m月d日', strtotime(nl2br(htmlspecialchars($diary['createDate'])))) ?></p>
                        <h3><?= nl2br(htmlspecialchars($diary['title'])) ?></h3>
                        <div id="overView" style="text-overflow: ellipsis">
                            <?= nl2br(htmlspecialchars($diary['content'])) ?>
                        </div>
                        <form action="delete_confirm.php" method="post" style="margin: 10px 0;">
                            <input type="hidden" name="id" value="<?= $diary['diaryId'] ?>">
                            <button type="submit">削除</button>
                        </form>
                    </li>
                <?php } ?>
           </ul>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>