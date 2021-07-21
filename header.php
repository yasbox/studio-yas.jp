<?php
$commonCSSPath = '/dist/css/base.css';
$includeCSSPath = '/dist/css/' . get_post_meta(get_the_ID(), 'includeCSS', true) . '.css';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <!--　ビューポート　-->
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
    <!--　SEO　-->
    <meta name="description" content="<?php bloginfo('description'); ?>">
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

    <title><?php bloginfo('name'); ?><?php if (!is_home() && !is_front_page()) {
                                            echo '｜' . get_the_title();
                                        } else {
                                            echo '｜長野市 ホームページ作成';
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
                        <div class="site-title">
                            <a href="<?php echo home_url(); ?>">
                                <div class="site_logo"><img src="<?php echo get_the_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></div>
                                <div class="site_text_logo"><img src="<?php echo get_the_text_logo_url(); ?>" alt="<?php bloginfo('name'); ?>" /></div>
                            </a>
                        </div>

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
                    </div>
                </div>
            </nav>
        </header>
    <?php endif; ?>
    <main>