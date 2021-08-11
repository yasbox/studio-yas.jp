<?php

// リクエスト分岐
switch ($_SERVER["REQUEST_METHOD"]) {
    case 'POST':
        // reCaptcha
        require_once(dirname(__FILE__) . '/../reCaptcha/reCaptcha.php');
        // トークンが正しいかチェック
        require_once(dirname(__FILE__) . '/../libs/chk_csrf.php');
        // フォームデータ受け取り　$formData
        require_once(dirname(__FILE__) . '/../libs/get_formData.php');
        break;
    default:
        http_response_code(400);
        die('無効な接続です');
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
}
