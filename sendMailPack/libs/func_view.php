<?php
//エスケープ処理を行う関数
function hesc($var = null)
{
    if (is_array($var)) {
        //$varが配列の場合、hesc()関数をそれぞれの要素について呼び出す（再帰）
        return array_map('hesc', $var);
    } else {
        return htmlspecialchars($var, ENT_QUOTES, 'UTF-8');
    }
}

//入力値に不正なデータがないかなどをチェックする関数
function checkInput($var)
{
    if (is_array($var)) {
        return array_map('checkInput', $var);
    } else {
        //NULLバイト攻撃対策
        if (preg_match('/\0/', $var)) {
            return false;
        }
        //文字エンコードのチェック
        if (!mb_check_encoding($var, 'UTF-8')) {
            return false;
        }
        //改行、タブ以外の制御文字のチェック
        if (preg_match('/\A[\r\n\t[:^cntrl:]]*\z/u', $var) === 0) {
            return false;
        }
        return true;
    }
}
