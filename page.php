<?php get_header(); ?>

<section>
    <div class="container">
        <div class="contents_box_title">
            <h2><?= the_title(); ?></h2>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="contents_box">
            <?php
            if (have_posts()) {
                while (have_posts()) {
                    the_post();
                    the_content();
                }
            } ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>