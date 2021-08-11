</main>

<section>
    <div class="loading_wrap">
        <div class="open_circle"></div>
    </div>
</section>

<?php
$commonJSPath = '/dist/js/common.js';
$includeJSPath = '/dist/js/' . get_post_meta(get_the_ID(), 'includeJS', true) . '.js';
?>

<!--　Script　-->
<?php if (file_exists(get_template_directory() . $commonJSPath)) : ?>
    <?php echo '<script src="' . get_template_directory_uri() . $commonJSPath . '?' . date('YmdHis', filemtime(get_template_directory() . $commonJSPath)) . '"></script>'; ?>

<?php endif ?>

<?php if (file_exists(get_template_directory() . $includeJSPath)) : ?>
    <?php echo '<script src="' . get_template_directory_uri() . $includeJSPath . '?' . date('YmdHis', filemtime(get_template_directory() . $includeJSPath)) . '"></script>'; ?>

<?php endif ?>

<?php wp_footer(); ?>
</body>

</html>