<?php get_header(); ?>

<?php
require_once(dirname(__FILE__) . '/sendMailPack/libs/func_view.php');
require_once(dirname(__FILE__) . '/sendMailPack/Controller/contactController.php');
?>

<section id="page_title">
    <div class="container">
        <h1><?= the_title(); ?></h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="contents_box_title">
            <h2>お問い合わせ</h2>
        </div>
    </div>
</section>

<section id="contact">
    <div class="container">
        <div class="contents_box">
            <div class="form_wrap">
                <div class="box_text">
                    <p>
                        <?php bloginfo('name'); ?> に関するお問い合わせ、ご意見・ご相談などお気軽にご利用ください。
                    </p>
                </div>
                <form name="contactForm" id="contactForm" method="post" action="<?= site_url('/confirm'); ?>">
                    <div class="form-group">
                        <label for="customer_name">お名前<small>必須</small></label>
                        <input type="text" class="form-control" id="customer_name" name="customer_name" value="<?= isset($_SESSION['formData']['customer_name']) ? hesc($_SESSION['formData']['customer_name']) : '' ?>">
                        <div class="error_messege"><?= isset($_SESSION['form-error']['customer_name']) ? $_SESSION['form-error']['customer_name'] : '' ?></div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email<small>必須</small></label>
                        <input type="text" class="form-control" id="email" name="email" value="<?= isset($_SESSION['formData']['email']) ? hesc($_SESSION['formData']['email']) : '' ?>">
                        <div class="error_messege"><?= isset($_SESSION['form-error']['email']) ? $_SESSION['form-error']['email'] : '' ?></div>
                    </div>
                    <div class="form-group">
                        <label for="comment">お問い合わせ内容<small>必須</small></label>
                        <textarea class="form-control" id="comment" name="comment" rows="3"><?= isset($_SESSION['formData']['comment']) ? hesc($_SESSION['formData']['comment']) : '' ?></textarea>
                        <div class="error_messege"><?= isset($_SESSION['form-error']['comment']) ? $_SESSION['form-error']['comment'] : '' ?></div>
                    </div>
                    <input type="hidden" name="token" value="<?= $_SESSION['token'] ?>">
                    <div class="button_space">
                        <button type="button" id="form_submit" class="mybtn">確認画面へ</button>
                    </div>
                </form>
                <p class="grecaptcha_info">
                    このフォームは、Google reCAPTCHAによって保護されています。<br>
                    Googleの<a href="https://policies.google.com/privacy">ポリシー</a>及び<a href="https://policies.google.com/terms">利用規約</a>に加えて、当サイトの<a href="/policy">ポリシー</a>が適用されます。
                </p>
            </div>
        </div>
    </div>
</section>

<?php
require_once(dirname(__FILE__) . '/sendMailPack/reCaptcha/insertScript.php');
// セッションが開始されていなければここで開始
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
unset($_SESSION['formData']);
unset($_SESSION['form-error']);
?>

<?php get_footer(); ?>