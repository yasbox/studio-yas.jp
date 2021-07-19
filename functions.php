<?php

// navバーを有効化
register_nav_menu('main-menu', 'メインメニュー');
register_nav_menu('footer-nav',  ' フッターナビゲーション ');

// アイキャッチを有効化
add_theme_support('post-thumbnails');
set_post_thumbnail_size(160, 120, true);


// 管理バー
//add_filter('show_admin_bar','__return_false');


/*
// カスタムフィールドで外部CSSを複数読み込み
function include_custom_css()
{
    if (is_single() || is_page()) {
        if ($css = get_template_directory_uri() . '/css/' . get_post_meta(get_the_ID(), 'includeCSS', true) . '.css?' . date('YmdHis')) {
            echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"{$css}\" />\n";
        }
    }
}
add_action('wp_head', 'include_custom_css');
*/