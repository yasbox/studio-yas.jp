<?PHP
// トークンの確認
if (isset($_SESSION['token']) && $_SESSION['token'] != '') {

    // トークンが正しいか判定
    if (function_exists('hash_equals')) {
        $valid_token = hash_equals($_POST['token'], $_SESSION['token']);
    } else {
        $valid_token = $_POST['token'] === $_SESSION['token'];
    }

    if (!$valid_token) {
        http_response_code(400);

        // セッションが開始されていなければここで開始
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        unset($_SESSION['formData']);
        unset($_SESSION['form-error']);
        unset($_SESSION['token']);

        die('無効な接続です（トークンが一致しません）');
    }
} else {
    http_response_code(400);

    // セッションが開始されていなければここで開始
    if (session_status() !== PHP_SESSION_ACTIVE) {
        session_start();
    }
    unset($_SESSION['formData']);
    unset($_SESSION['form-error']);
    unset($_SESSION['token']);

    die('無効な接続です（トークンがありません）');
}
