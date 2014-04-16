<?php get_header(); ?>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <div class="entry">
            <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
                <div class="post-meta">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <span class="post-author"><a rel="author" href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>" title="Posts by <?php the_author(); ?>"><?php the_author(); ?></a></span>
                    <br />
                    <span class="post-date"><?php the_time(__('M j, Y')) ?></span>  <span><?php // the_time() ?></span> <?php edit_post_link( __( ' &bull; Edit entry')); ?><a href="#comments" class="post-comms"><?php comments_number(__('No Comments'), __('1 Comment'), __('% Comments'), '', __('Comments Closed') ); ?></a></div>
                <div class="post-content">
				
					<?php the_content(); ?>
                	<hr />
                
                
                <!-- MORE ON SAME ARTIST -->
                	<div class="more-artist">
                    	<?php the_terms( $post->ID, 'artist', 'More on: ', ' / ', ' '); ?>
                    </div>
                    
				<!-- RELATED POSTS -->	
    				<?php echo apply_filters('erp-get-related-posts', array('num_to_display'=>4, 'no_rp_text'=>'<div class="no-related">No related posts found.</div>')); ?>
	            </div>    


                <div class="post-footer" style="float:left;"><?php // the_tags(__('<strong>Tags: </strong>'), ', '); ?></div>
            </div>

        </div>

        <?php endwhile; ?>
    <?php endif; ?>

<?php get_footer(); ?>