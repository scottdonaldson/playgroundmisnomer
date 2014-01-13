<?php get_header(); ?>

<div class="content-title">

    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>

        <?php _e('All posts by Scott 
				 <a rel="me" href="https://profiles.google.com/scott.p.donaldson">
  				 	<img src="http://www.google.com/images/icons/ui/gprofile_button-16.png" width="16" height="16">
				 </a>'); ?>

    <!-- <a href="javascript: void(0);" id="mode"<?php if ($_COOKIE['mode'] == 'grid') echo ' class="flip"'; ?>></a> !-->
</div>

<?php get_template_part('loop'); ?>

<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
