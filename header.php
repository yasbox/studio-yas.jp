<?php
$commonCSSPath = '/dist/sass/base.css';
$singleCSSPath = '/dist/sass/single.css';
$includeCSSPath = '/dist/sass/' . get_post_meta(get_the_ID(), 'includeCSS', true) . '.css';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <!--　ビューポート　-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <!--　SEO　-->
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-6JEXCD29PQ"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-6JEXCD29PQ');
    </script>

    <!--　fonts　-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">

    <!--　スタイルシート　-->
    <link rel="stylesheet" href="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <?php echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . $commonCSSPath . '?' . date('YmdHis', filemtime(get_template_directory() . $commonCSSPath)) . '">'; ?>

    <?php if (file_exists(get_template_directory() . $includeCSSPath)) : ?>
        <?php echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . $includeCSSPath . '?' . date('YmdHis', filemtime(get_template_directory() . $includeCSSPath)) . '">'; ?>
    <?php endif ?>

    <?php if (is_single()) : ?>
        <?php echo '<link rel="stylesheet" type="text/css" href="' . get_template_directory_uri() . $singleCSSPath . '?' . date('YmdHis', filemtime(get_template_directory() . $singleCSSPath)) . '">'; ?>
    <?php endif; ?>

    <!--　jQuery　-->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!--　Bootstrap　-->
    <script src="//cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="//stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title><?php bloginfo('name'); ?><?php if (!is_home() && !is_front_page()) {
                                            echo '｜' . get_the_title();
                                        } else {
                                            echo '｜長野市 フリーランスWEBエンジニア';
                                        } ?></title>
    <?php wp_head(); ?>
</head>

<body>
    <?php if (!is_home() && !is_front_page()) : ?>
        <header>
            <nav>
                <div class="container">
                    <div class="nav_box">

                        <!--サイトタイトル-->
                        <a href="<?php echo home_url(); ?>">
                            <div class="site-title">
                                <div class="site_logo"><img src="<?php echo get_the_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></div>
                                <div class="site_text_logo"><img src="<?php echo get_the_text_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></div>
                            </div>
                        </a>

                        <!--ヘッダーメニュー-->
                        <?php wp_nav_menu(array(
                            'theme_location' => 'main-menu',
                            'container' => '',
                            'container_class' => '',
                            'container_id' => '',
                            'menu_class' => '',
                            'items_wrap' => '<ul id="main-nav">%3$s</ul>',
                            'fallback_cb' => ''
                        ));
                        ?>

                        <!--メニューボタン-->
                        <div class="top_nav_item">
                            <div class="mobile_menu_icon" id="mobile_menu_btn">
                                <div class="mobile_menu_img">
                                    <div></div>
                                    <div></div>
                                    <div></div>
                                </div>
                                <div id="close_btn">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
    <?php endif; ?>
    <main>