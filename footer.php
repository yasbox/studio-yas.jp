</main>

<?php if (!is_home() && !is_front_page()) : ?>
    <footer>
        <div class="footer_contents">
            <div class="container">
                <div class="row">
                    <div class="col d-md-flex align-items-center justify-content-center d-none">

                        <div class="row">

                            <div class="col d-flex align-items-center justify-content-center">
                                <!--サイトロゴ-->
                                <div class="logo_space">
                                    <div class="site_logo"><img src="<?php echo get_the_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></div>
                                    <div class="site_text_logo"><img src="<?php echo get_the_text_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></div>
                                </div>
                            </div>

                            <div class="col d-flex align-items-center justify-content-center">
                                <!--フッターーメニュー-->
                                <?php wp_nav_menu(array(
                                    'theme_location' => 'footer-nav',
                                    'container' => '',
                                    'container_class' => '',
                                    'container_id' => '',
                                    'menu_class' => '',
                                    'items_wrap' => '<ul id="footer-nav">%3$s</ul>',
                                    'fallback_cb' => ''
                                ));
                                ?>
                            </div>

                        </div>

                    </div>

                    <div class="col d-flex align-items-center justify-content-center">

                        <div class="row right_space">

                            <div class="col d-flex align-items-center justify-content-center">
                                <!--サイトロゴ-->
                                <div class="info">
                                    <img src="<?php bloginfo('template_directory'); ?>/images/icon.jpg">
                                    <p>YAS</p>
                                    <p>長野県長野市在住<br>WEBエンジニア</p>
                                </div>
                            </div>

                            <div class="col d-flex align-items-end justify-content-center">
                                <!--フッターーメニュー-->
                                <div class="right_space_right">
                                    <p>LINKS</p>
                                    <div class="links">
                                        <a href="https://twitter.com/Studio_YAS_" target="_blank">
                                            <img src="<?php bloginfo('template_directory'); ?>/images/icon/twitter.png">
                                        </a>
                                        <a href="https://github.com/yasbox" target="_blank">
                                            <img src="<?php bloginfo('template_directory'); ?>/images/icon/github.png">
                                        </a>
                                        <a href="https://photobox-se.com" target="_blank">
                                            <img src="<?php bloginfo('template_directory'); ?>/images/icon/photobox.png">
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="bottom_space">
            <div class="bottom_link"><a href="/#">プライバシーポリシー</a></div>
            <div class="bottom_link copyright">@ <?php bloginfo('name'); ?></div>
        </div>
    </footer>
<?php endif; ?>

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