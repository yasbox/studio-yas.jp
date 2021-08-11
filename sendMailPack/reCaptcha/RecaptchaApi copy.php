<?php

Class RecaptchaApi
{
    function __construct()
    {
        //キーの読み込み
        require_once dirname(__FILE__) . './keys.php';
        // reCAPTCHA サイトキー
        $this->siteKey = V3_SITEKEY;
        // reCAPTCHA シークレットキー
        $this->secretKey = V3_SECRETKEY;
    }
    public function judge($token, $action) {

        //reCAPTCHA の検証を通過したかどうかの真偽値
        $rcv3_result = false;

        // reCAPTCHA のトークンとアクション名が取得できていれば
        if ($token && $action) {

            //cURL セッションを初期化（API のレスポンスの取得）
            $ch = curl_init();
            // curl_setopt() により転送時のオプションを設定
            //URL の指定
            curl_setopt($ch, CURLOPT_URL, "https://www.google.com/recaptcha/api/siteverify");
            //HTTP POST メソッドを使う
            curl_setopt($ch, CURLOPT_POST, true);
            //API パラメータの指定
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query(array(
                'secret' => $this->secretKey,
                'response' => $token
            )));
            //curl_execの返り値を文字列にする
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            //転送を実行してレスポンスを $api_response に格納
            $api_response = curl_exec($ch);
            //セッションを終了
            curl_close($ch);

            //レスポンスの $json（JSON形式）をデコード
            $rcv3_result = json_decode($api_response);
        }
        return $rcv3_result;
    }
}

