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

<!--　jQuery　-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--　Bootstrap　-->
<script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

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