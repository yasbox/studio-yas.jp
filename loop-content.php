<article <?php post_class('article_space'); ?>>
    <div class="imgbox">
        <!--画像を追加-->
        <?php if (has_post_thumbnail()) : ?>
            <?php the_post_thumbnail('medium'); ?>
        <?php else : ?>
            <img src="<?php echo get_template_directory_uri(); ?>/images/no-image.gif" alt="no-img" />
        <?php endif; ?>
    </div>
    <!--end img-warp-->
    <div class="info_space">
        <!--タイトル-->
        <h5><?php the_title(); ?></h5>
        <!--URL-->
        <?php $this_work_url = get_post_meta(get_the_ID(), 'work_url', true); ?>
        <a href="<?= $this_work_url; ?>" target="_blanck">
            <?= $this_work_url; ?>
        </a>
        <!--抜粋-->
        <p><?php the_excerpt(); ?></p>
    </div>
    <!--end text-->
</article>