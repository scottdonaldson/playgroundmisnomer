<?php get_header(); 
$curauth = isset($_GET['author_name']) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
$post = $posts[0];
?>

<div class="content-title">
	<p>All posts by <?= $curauth->display_name; ?>
		<?php if ( get_field('google_profile', 'user_' . $curauth->ID )) { ?>
	        <a rel="me" href="<?php the_field('google_profile', 'user_' . $curauth->ID ); ?>">
			 	<img src="http://www.google.com/images/icons/ui/gprofile_button-16.png" width="16" height="16">
			</a>
		<?php } ?>
	</p>
	<?php the_field('bio', 'user_' . $curauth->ID); ?>

</div>

<?php
get_template_part('loop');
get_template_part('pagination');

get_footer(); ?>