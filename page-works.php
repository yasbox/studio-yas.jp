<?php get_header(); ?>

<section id="page_title">
    <div class="container">
        <h1><?= the_title(); ?></h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="contents_box_title">
            <h2>制作実績</h2>
        </div>
    </div>
</section>

<section id="past_work">
    <div class="container">
        <div class="contents_box">
            <div class="works_space">

                <?php

                $args = array(
                    'posts_per_page' => 20, // 表示件数の指定
                    'orderby' => 'date', // 日付でソート
                    'order' => 'DESC', // DESCで最新から表示、ASCで最古から表示
                    'category_name' => '制作実績' // 表示したいカテゴリーのスラッグを指定
                );

                $the_query = new WP_Query($args);
                while ($the_query->have_posts()) : $the_query->the_post(); ?>

                    <div class="work_box">
                        <div class="work_box_in">
                            <?php get_template_part('loop-content'); ?>
                        </div>
                    </div>

                <?php endwhile;
                wp_reset_postdata(); ?>
                
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>