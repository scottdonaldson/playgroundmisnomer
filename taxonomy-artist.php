<?php get_header(); ?>

<div class="content-title">


        <?php printf(__('%s'), single_tag_title('', false) ); ?>

</div>

<?php if ( have_posts() ) : ?>

    <div id="loop" class="list clear">

    <?php while ( have_posts() ) : the_post(); ?>

        <div <?php post_class('post clear'); ?> id="post_<?php the_ID(); ?>">
            <?php if ( has_post_thumbnail() ) :?>
            <a href="<?php the_permalink() ?>" class="thumb"><?php the_post_thumbnail('thumbnail', array(
                        'alt'	=> trim(strip_tags( $post->post_title )),
                        'title'	=> trim(strip_tags( $post->post_title )),
                    )); ?></a>
            <?php endif; ?>

           <div class='post-category'><?php the_category(' / '); ?></div>
            <h2><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h2>

            <div class="post-meta">
            	<span class="post-author"><a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>" title="Posts by <?php the_author(); ?>"><?php the_author(); ?></a></span>
                <br />
                <span class="post-date"><?php the_time(__('M j, Y')) ?></span><?php edit_post_link( __( 'Edit entry'), '<em>&bull; </em>'); ?>
            </div>
            <div class="post-content"><?php if (function_exists('smart_excerpt')) smart_excerpt(get_the_excerpt(), 55); ?> <a href="<?php the_permalink(); ?>">Read more &raquo;</a></div>
            
        </div>

    <?php endwhile; ?>

    </div>

<?php endif; ?>

<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>
