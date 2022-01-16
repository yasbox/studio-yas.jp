<?php get_header(); ?>

<section id="page_title">
    <div class="container">
        <h1><?= the_title(); ?></h1>
    </div>
</section>

<section id="about_me">
    <div class="container">
        <div class="contents_box">
            <div class="row">
                <div class="col-md box_center_center">
                    <div class="box_left">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pc.png">
                    </div>
                </div>
                <div class="col-md box_center_center">
                    <div class="box_right">
                        <div class="box_title">
                            <h2><?php bloginfo('name'); ?> は、WEB制作を中心に様々なクリエイト活動をしています</h2>
                        </div>
                        <div class="box_text">
                            <p>
                                ホームページ制作、WEBアプリケーション開発、写真撮影、写真デジタル加工、写真アルバム制作　など
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>