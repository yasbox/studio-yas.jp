<?php get_header(); ?>

<section id="page_title">
    <div class="container">
        <h1><?= the_title(); ?></h1>
    </div>
</section>

<section id="about_me">
    <div class="container">
        <div class="about_box">
            <div class="box_title">
                <h2>制作実績 <small>（順不同）</small></h2>
            </div>
            <div class="box_text">
                <?php
                $args = array(
                    'posts_per_page' => 5 // 表示件数の指定
                );
                $the_query = new WP_Query($args);
                while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <?php get_template_part('loop-content'); ?>

                <?php endwhile;
                wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>