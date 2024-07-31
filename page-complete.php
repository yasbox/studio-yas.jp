<?php
require_once(dirname(__FILE__) . '/sendMailPack/libs/func_view.php');
require_once(dirname(__FILE__) . '/sendMailPack/Controller/completeController.php');
?>

<?php get_header(); ?>

<section id="page_title">
    <div class="container">
        <h1><?= the_title(); ?></h1>
    </div>
</section>

<section id="about_me">
    <div class="container">
        <div class="contents_box">
            <?php if ($sendResult === '送信成功') : ?>
                <div class="contents_box_title">
                    <h2>お問い合わせありがとうございました。</h2>
                </div>
                <div class="form_wrap">
                    <div class="box_text">
                        <p>
                            ご入力されたメールアドレス宛に返信いたします。
                        </p>
                        <p>
                            <small>迷惑メールに入らないよう、<?= MAIL_FROM_ADDRESS ?> からのメールを受信可能な設定してください。</small>
                        </p>
                    </div>
                </div>
            <?php else : ?>
                <div class="contents_box_title">
                    <h2>お問い合わせの送信に失敗しました。</h2>
                </div>
                <div class="form_wrap">
                    <div class="box_text">
                        <p>
                            申し訳ありません。サーバートラブルまたはセキュリティー上の事情により送信できませんでした。時間をおいて再度お試しください。
                        </p>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
<?php
// セッションが開始されていなければここで開始
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
unset($_SESSION['formData']);
unset($_SESSION['form-error']);
unset($_SESSION['token']);
?>