# GitHub URL
    'https://github.com/chiyomi-0121/myDiary.git'

# フォルダの構成
    'css/style.css'...スタイルシート記述用
    'private/database.php'...データベース接続用
    'index.php'...トップ画面
    'login.php'...ログイン情報入力画面
    'login_check.php'...ログイン処理
    'register.php'...新規ユーザー登録画面
    'register_confirm.php'...ユーザー登録内容確認画面
    'register_complete.php'...ユーザー登録完了画面
    'home.php'...マイページ画面
    'logout.php'...ログアウト処理
    'edit.php'...日記投稿画面
    'edit_confirm.php'...投稿内容確認画面
    'edit_complete.php'...投稿完了画面
    'list.php'...日記一覧画面
    'delete_confirm.php'...削除確認画面
    'delete_complete.php'...削除完了画面

    /*実装しない*/
    'detail.php'...日記詳細画面
# データベースの構成
    userdata
        userId...ユーザーID primary INT AUTO_INCREMENT
        userName...ユーザ名 VARCHAR(255)
        email...メールアドレス  VARCHAR(255)
        password...パスワード(ハッシュ化)   VARCHAR(255)
    
    diarydata
        diaryID...日記ID    INT AUTO_INCREMENT
        createDate...作成日 DATETIME
        title...日記タイトル    VARCHAR(255)
        content...日記内容  MEDIUMTEXT
        userId...作成者ID index INT
    