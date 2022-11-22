<?php get_header(); ?>

<section id="page_title">
    <div class="container">
        <h1><?= the_title(); ?></h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="contents_box_title">
            <h2><?php bloginfo('name'); ?>について</h2>
        </div>
    </div>
</section>

<section id="about_me">
    <div class="container">
        <div class="contents_box">
            <div class="row">
                <div class="col-lg box_center_center">
                    <div class="box_left">
                        <img src="<?php bloginfo('stylesheet_directory'); ?>/images/pc.png">
                    </div>
                </div>
                <div class="col-lg box_center_center">
                    <div class="box_right">
                        <div class="box_title">
                            <h3><span><?php bloginfo('name'); ?> は</span><br>
                                <span>WEB制作を中心に様々な</span><br>
                                <span>クリエイト活動をしています</span>
                            </h3>
                        </div>
                        <div class="box_text">
                            <p>
                                ホームページ制作、WEBアプリケーション開発、写真撮影、写真デジタル加工、写真アルバム制作…etc
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<?php get_footer(); ?>