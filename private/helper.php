<?php
/* --------------------
 * ヘルパー関数
 * -------------------- */

if(!function_exists('str_remove_prefix')) {
    /**
     * haystack が needle で開始している場合、その文字を削除する (※mb非対応)
     * @param string $haystack 文字列
     * @param string $needle 検索文字列
     * @return string
     */
    function str_remove_prefix(string $haystack, string $needle) {
        $length = strlen($needle);
        if (substr($haystack, 0, $length) === $needle) {
            $haystack = substr($haystack, $length);
        }
        return $haystack;
    }
}

if(!function_exists('redirect')) {
    /**
     * リダイレクトを行う
     * @param string $location リダイレクト先
     * @param int $status ステータスコード
     */
    function redirect(string $location, int $status = 302) {
        $schema = isset($_SERVER['HTTPS']) ? 'https' : 'http';
        $host = $_SERVER['HTTP_HOST'];
        $location = str_remove_prefix($location, '/');
        header('Location: ' . $schema . '://' . $host . '/' . $location, true, $status);
        exit;
    }
}
