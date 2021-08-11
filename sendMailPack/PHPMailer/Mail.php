<?php

require_once(dirname(__FILE__) . '/../../myenv.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once(dirname(__FILE__) . '/libs/src/PHPMailer.php');
require_once(dirname(__FILE__) . '/libs/src/Exception.php');
require_once(dirname(__FILE__) . '/libs/src/SMTP.php');

class Mail
{
    public $PHPMailer;

    public function __construct()
    {
        $this->PHPMailer = new PHPMailer(true);
        $this->PHPMailer->setLanguage('ja', '/libs/language/');
        //$this->PHPMailer->SMTPDebug = SMTP::DEBUG_SERVER;
        // 文字エンコードを指定
        $this->PHPMailer->CharSet = 'utf-8';
        // 送信サーバ設定
        $this->PHPMailer->isSMTP();
        $this->PHPMailer->Host       = MAIL_HOST;
        $this->PHPMailer->SMTPAuth   = true;
        $this->PHPMailer->Username   = MAIL_USERNAME;
        $this->PHPMailer->Password   = MAIL_PASSWORD;
        //$this->PHPMailer->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $this->PHPMailer->SMTPSecure = 'tls';
        $this->PHPMailer->Port       = MAIL_PORT;
    }

    public function sendMail($params)
    {
        try {
            // 宛先設定
            $this->PHPMailer->setFrom($params->from); // 差出人
            $this->PHPMailer->addAddress($params->to); // 第２引数に名前（省略可）
            $this->PHPMailer->addReplyTo($params->reply); // 返信先

            // 送信内容
            $this->PHPMailer->isHTML(true);
            $this->PHPMailer->Subject = $params->subject;
            $this->PHPMailer->Body    = $params->body;
            $this->PHPMailer->AltBody = $params->body_plain;

            //$this->PHPMailer->FromName = mb_encode_mimeheader(mb_convert_encoding($fromname, "JIS", "UTF-8"));
            //$this->PHPMailer->Subject = mb_encode_mimeheader(mb_convert_encoding($subject, "JIS", "UTF-8"));
            //$this->PHPMailer->Body = mb_convert_encoding($body, "JIS", "UTF-8");

            $this->PHPMailer->send();
            $res = '送信成功';
        } catch (Exception $e) {
            $res = "送信失敗: {$this->PHPMailer->ErrorInfo}";
        }

        return $res;
    }
}
