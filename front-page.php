<?php get_header(); ?>

<div class="fullscreen">
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