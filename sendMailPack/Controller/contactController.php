<?php

// リクエスト分岐
switch ($_SERVER["REQUEST_METHOD"]) {
    case 'GET':
        // トークンの確認
        if (!isset($_SESSION['token']) || $_SESSION['token'] === '') {
            // トークン生成
            $_SESSION['token'] = hesc(uniqid(bin2hex(random_bytes(12))));
        }
        break;
    default:
        http_response_code(400);
        die('無効な接続です');
}