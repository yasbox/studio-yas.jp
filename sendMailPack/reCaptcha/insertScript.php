<?php
require_once(dirname(__FILE__) . '/../../myenv.php');
?>

<script src="https://www.google.com/recaptcha/api.js?render=<?= V3_SITEKEY ?>"></script>
<script>
    $(function() {

        let formID = 'contactForm'; // フォームのID
        let submitBtnID = 'form_submit'; // 送信ボタンのID

        $('#' + submitBtnID).click(function(e) {
            e.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('<?= V3_SITEKEY ?>', {
                    action: 'submit'
                }).then(function(token) {

                    // トークン送信用input要素追加
                    $('#' + submitBtnID).before(`<input type="hidden" name="g-recaptcha-response" value="${token}">`);
                    // フォーム送信
                    $('#' + formID).submit();
                });
            });
        });
    });
</script>