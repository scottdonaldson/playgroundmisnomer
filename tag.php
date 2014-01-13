<?php get_header(); ?>

<div class="content-title">


        <?php printf(__('Posts tagged &quot;%s&quot;'), single_tag_title('', false) ); ?>

</div>

<?php get_template_part('loop'); ?>

<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
