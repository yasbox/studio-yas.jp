<article <?php post_class('article-list'); ?>>
    <a href="<?php the_permalink(); ?>">
        <div class="img-wrap">
            <!--画像を追加-->
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img" />
            <?php endif; ?>
        </div>
        <!--end img-warp-->
        <div class="text">
            <!--タイトル-->
            <h2><?php the_title(); ?></h2>
            <!--抜粋-->
            <?php the_excerpt(); ?>
        </div>
        <!--end text-->
    </a>
</article>