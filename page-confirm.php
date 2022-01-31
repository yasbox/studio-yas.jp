<?php
require_once(dirname(__FILE__) . '/sendMailPack/libs/func_view.php');
require_once(dirname(__FILE__) . '/sendMailPack/Controller/confirmController.php');
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
            <div class="contents_box_title">
                <h2>送信内容確認</h2>
            </div>
            <div class="form_wrap">
                <div class="box_text">
                    <p>
                        内容に誤りがなければ「送信する」を押してください。<br>
                        <small>入力内容を変更する場合は「戻って修正」を押して修正してください。</small>
                    </p>
                </div>

                <div class="form-group">
                    <label>お名前<small>必須</small></label>
                    <div class="form-control">
                        <?= isset($_POST['customer_name']) ? hesc($_POST['customer_name']) : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>Email<small>必須</small></label>
                    <div class="form-control">
                        <?= isset($_POST['email']) ? hesc($_POST['email']) : '' ?>
                    </div>
                </div>

                <div class="form-group">
                    <label>お問い合わせ内容<small>必須</small></label>
                    <div class="form-control">
                        <?= nl2br(hesc($_SESSION['formData']['comment'])) ?>
                    </div>
                </div>

                <form name="confirmForm" id="confirmForm" method="post" action="<?= site_url('/complete'); ?>">
                    <input type="hidden" name="customer_name" value="<?= hesc($_POST['customer_name']) ?>">
                    <input type="hidden" name="email" value="<?= hesc($_POST['email']) ?>">
                    <input type="hidden" name="comment" value="<?= hesc($_POST['comment']) ?>">
                    <input type="hidden" name="token" value="<?= hesc($_POST['token']) ?>">
                    <div class="button_space">
                        <button type="submit" class="mybtn" name="action" value="back">戻って修正</button>
                        <button type="submit" class="mybtn" name="action" value="submit">送信する</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>