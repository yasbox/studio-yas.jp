<?php
// key の読み込み
require_once(dirname(__FILE__) . '/../../myenv.php');

if (isset($_POST['g-recaptcha-response'])) {
    // 判定結果を受け取る
    $recap_response = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=' . V3_SECRETKEY . '&response=' . $_POST['g-recaptcha-response']);
    // デコード
    $recap_response = json_decode($recap_response);
    // 判定
    if ($recap_response->success == false) {
        header('Location: contact.php');
    }

    /*
    $recap_response = json_encode($recap_response);
    echo "<script>console.log( '$recap_response' );</script>";
    */
} else {
    header('Location: contact.php');
}
?>