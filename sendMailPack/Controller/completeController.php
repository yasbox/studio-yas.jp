<?php

// リクエスト分岐
switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        // トークンが正しいかチェック
        require_once(dirname(__FILE__) . '/../libs/chk_csrf.php');
        // フォームデータ受け取り　$formData
        require_once(dirname(__FILE__) . '/../libs/get_formData.php');
        break;
    default:
        http_response_code(400);
        die('無効な接続です');
}

// 戻るボタンの場合は戻る
if ($formData->action !== 'submit') {
    header('Location:' . site_url('/contact'));
    die();
}

// バリデーション
require_once(dirname(__FILE__) . '/../Validation/ValidForm.php');
$ValidForm = new ValidForm();
$errormsg = $ValidForm->Validation(
    $formData,
    [
        'customer_name' => ['required', 'max:30'],
        'email' => ['required', 'max:50', 'email'],
        'comment' => ['required', 'max:1000'],
    ]
);

// エラーがあれば戻る
if (!empty($errormsg)) {
    header('Location:' . site_url('/contact'));
    die();
}

// メール本文作成
require_once(dirname(__FILE__) . '/../PHPMailer/MakeBody.php');
$MakeBody = new MakeBody();
$mail_body = $MakeBody->make_plain('contact', $formData);

// メール送信（管理者へ）
require_once(dirname(__FILE__) . '/../PHPMailer/Mail.php');
$Mail = new Mail();
$sendResult = $Mail->sendMail((object)[
    'to' => MAIL_FROM_ADDRESS,
    'from' => $formData->email,
    'reply' => $formData->email,
    'subject' => 'お問い合わせがありました',
    'body' => $mail_body,
    'body_plain' => $mail_body,
]);

// 送信失敗した場合
if ($sendResult != '送信成功') {
    // エラー内容をコンソール出力
    $sendResult = json_encode($sendResult);
    echo "<script>console.log( '$sendResult' );</script>";
}
