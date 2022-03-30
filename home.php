<?php
    require_once 'private/bootstrap.php';
    require_once 'private/datebase.php';

    /** @var PDO $dbh データベースハンドラ */

    session_start();

    $userId = $_SESSION['userId'];

    if(!isset($_SESSION['username'])){
        $statement = $dbh->prepare('SELECT * FROM userdata WHERE userId = :id');
        $statement->execute(['id' => $userId]);
        $user = $statement->fetch();
        $username = $user['userName'];
    }else{
        $username = $_SESSION['username'];
    }

    $statement = $dbh->prepare('SELECT * FROM diarydata
                                WHERE userId = :id
                                ORDER BY createDate DESC LIMIT 1');
    $statement->execute(['id' => $userId]);
    $latestDiary = $statement->fetch();

    $_SESSION['userId'] = $userId;

    unset($_SESSION['username']);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>毎日日記｜マイページ</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h2>ようこそ<?= $username ?>さん! <br>今日は<span id="date"></span>です!</h2>
        <script>
            window.onload = function(){
                var weekDays = ["日","月","火","水","木","金","土"];
                var today = new Date();

                var year = today.getFullYear();
                var month = today.getMonth()+1;
                var date = today.getDate();
                var weekDay = weekDays[today.getDay()];

                var outText = year + '年' + month + '月' + date + '日 (' + weekDay + ')';
                var pelem = document.getElementById("date");
                pelem.innerHTML = outText;
            }
        </script>
        <p id="logout"><a href="index.php">ログアウト</a></p>
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
           <div id="latest">
               <h3>最新の日記</h3>
               <div>
               <?php if(!empty($latestDiary)){ ?> 
                        <?= date('Y年m月d日', strtotime($latestDiary['createDate'])) ?><br>
                        <?= htmlspecialchars($latestDiary['title']) ?><br>
                        <?= htmlspecialchars($latestDiary['content']) ?>
                    </div>
                <?php } else { ?>
                        <p>日記データがありません</p>
                <?php } ?>
                </div>
           </div>
        </div>
    </main>
    <footer>
        <hr>
        <div>(* 'ω')ﾉ</div>
    </footer>
</body>
</html>