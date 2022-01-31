<article <?php post_class('article_space'); ?>>

    <!--アイキャッチ-->
    <a href="<?php the_permalink(); ?>">
        <div class="imgbox">
            <?php if (has_post_thumbnail()) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" alt="no-img" />
            <?php endif; ?>
        </div>
    </a>

    <!--info-->
    <div class="info_space">

        <!--タイトル-->
        <h5><?php the_title(); ?></h5>

        <!--抜粋-->
        <p><?php the_excerpt(); ?></p>

        <!--URL-->
        <?php $this_work_url = get_post_meta(get_the_ID(), 'work_url', true); ?>
        <a href="<?= $this_work_url; ?>" target="_blanck">
            <?= $this_work_url; ?>
        </a>

    </div>

</article>