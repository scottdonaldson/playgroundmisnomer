<?php get_header(); ?>

<div class="content-title">

	the playground misnomer mp3 archive

</div>

<?php if ( have_posts() ) : ?>

    <div id="loop tag-mp3" class="<?php if ($_COOKIE['mode'] == 'grid') echo 'grid'; else echo 'list'; ?> clear">

    <?php while ( have_posts() ) : the_post(); ?>

        <div <?php post_class('post clear'); ?> id="post_<?php the_ID(); ?>">
            
            <?php
				$args = array( 'post_type' => 'attachment', 'post_mime_type' => 'audio', 'numberposts' => -1, 'post_status' => null, 'post_parent' => $post->ID ); 
				$attachments = get_posts($args);
				if ($attachments) {
					echo '<div class="mp3-link">Download &raquo; ';
					foreach ( $attachments as $attachment ) {
						the_attachment_link( $attachment->ID , false );
					echo '</div>';
					}
				}
			?>
            <div class="post-meta-mp3">
                <a href="<?php the_permalink(); ?>">View original post</a> &bull; <span class="post-date"><?php the_time(__('M j, Y')) ?></span>
            </div>
            
            
        </div>

    <?php endwhile; ?>

    </div>

<?php endif; ?>

<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
