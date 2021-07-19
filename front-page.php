<?php get_header(); ?>

<div class="fullscreen">
    <div class="site_top_space">
        <div class="site_title_space">
            <div class="site_title"><?php bloginfo('name'); ?></div>
            <div class="site_title_sub">Simple is the best.</div>
        </div>
    </div>
    <canvas id="canvas_container"></canvas>
    <div id="obj_container">
        <div id="objbox0" class="menubox">
            <a href="<?= site_url('/about'); ?>">About</a>
        </div>
        <div id="objbox1" class="menubox">
            <a href="<?= site_url('/works'); ?>">Works</a>
        </div>
        <div id="objbox2" class="menubox">
            <a href="<?= site_url('/price'); ?>">Price</a>
        </div>
        <div id="objbox3" class="menubox">
            <a href="<?= site_url('/contact'); ?>">Contact</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>