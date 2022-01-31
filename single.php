<?php get_header(); ?>

<?php if (have_posts()) : the_post(); ?>
    <article <?php post_class('article-content'); ?>>
        <section>

            <!--戻るボタン-->
            <div class="return_btn_space">
                <a href="/works" class="return_btn">
                    <img src="<?php bloginfo('template_directory'); ?>/images/arrow.png">
                </a>
            </div>

            <div class="container">

                <!--タイトル-->
                <div class="contents_box_title">
                    <h2><?php the_title(); ?></h2>
                </div>

                <!--URL-->
                <div class="work_url">
                    <?php $this_work_url = get_post_meta(get_the_ID(), 'work_url', true); ?>
                    <a href="<?= $this_work_url; ?>" target="_blanck">
                        <?= $this_work_url; ?>
                    </a>
                </div>

                <div class="contents_box">

                    <!--アイキャッチ-->
                    <div class="article-img">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('large'); ?>
                        <?php endif; ?>
                    </div>

                    <!--抜粋-->
                    <div class="work_excerpt">
                        <h3>概要</h3>
                        <div class="box_text">
                            <p>
                                <?php the_excerpt(); ?>
                            </p>
                        </div>
                    </div>

                    <!--本文-->
                    <div class="work_content">
                        <div class="box_text">
                            <p>
                                <?php the_content(); ?>
                            </p>
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </article>
<?php endif; ?>

<?php get_footer(); ?>