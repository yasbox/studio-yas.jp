<?php

// navバーを有効化
register_nav_menu('main-menu', 'メインメニュー');
register_nav_menu('footer-nav',  ' フッターナビゲーション ');

// アイキャッチを有効化
add_theme_support('post-thumbnails');
set_post_thumbnail_size(160, 120, true);


/* テーマカスタマイザー（ロゴ画像登録）
---------------------------------------------------------- */
add_action('customize_register', 'theme_customize_logo');

function theme_customize_logo($wp_customize)
{

    //ロゴ画像
    $wp_customize->add_section('logo_section', array(
        'title' => 'ロゴ画像', //セクションのタイトル
        'priority' => 59, //セクションの位置
        'description' => 'ロゴ画像を使用する場合はアップロードしてください。画像を使用しない場合はタイトルがテキストで表示されます。', //セクションの説明
    ));

    $wp_customize->add_setting('logo_url');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_url', array(
        'label' => 'ロゴ画像', //セッティングのタイトル
        'section' => 'logo_section', //セクションID
        'settings' => 'logo_url', //セッティングID
        'description' => 'ロゴ画像を設定してください。', //セッティングの説明
    )));
}

/* テーマカスタマイザー（テキストロゴ画像登録）
---------------------------------------------------------- */
add_action('customize_register', 'theme_customize_text_logo');

function theme_customize_text_logo($wp_customize)
{

    //ロゴ画像
    $wp_customize->add_section('text_logo_section', array(
        'title' => 'テキストロゴ画像', //セクションのタイトル
        'priority' => 58, //セクションの位置
        'description' => 'ロゴ画像を使用する場合はアップロードしてください。画像を使用しない場合はタイトルがテキストで表示されます。', //セクションの説明
    ));

    $wp_customize->add_setting('text_logo_url');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'text_logo_url', array(
        'label' => 'テキストロゴ画像', //セッティングのタイトル
        'section' => 'text_logo_section', //セクションID
        'settings' => 'text_logo_url', //セッティングID
        'description' => 'テキストロゴ画像を設定してください。', //セッティングの説明
    )));
}

/* テーマカスタマイザーで設定された画像のURLを取得
---------------------------------------------------------- */
//テキストロゴ画像
function get_the_text_logo_url()
{
    return esc_url(get_theme_mod('text_logo_url'));
}
//ロゴ画像
function get_the_logo_url()
{
    return esc_url(get_theme_mod('logo_url'));
}


function set_org_query_vars($query_vars)
{
    $query_vars[] = 'customer_name';
    $query_vars[] = 'email';
    $query_vars[] = 'comment';

    return $query_vars;
}
add_filter('query_vars', 'set_org_query_vars');

//SESSION 開始
function init_session_start()
{
    if (!session_id()) {
        session_start();
    }
}
add_action('init', 'init_session_start');



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