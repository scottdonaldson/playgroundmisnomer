<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

    <div class="content-title">
        Search Result <span>/</span> <?php the_search_query(); ?>
        <!-- <a href="javascript: void(0);" id="mode"<?php if ($_COOKIE['mode'] == 'grid') echo ' class="flip"'; ?>></a> !-->
    </div>

    <?php get_template_part('loop'); ?>

<?php else : ?>

    <div class="content-title">
        No results for "<strong><?php the_search_query(); ?></strong>." Why not try something else?
    </div>

    <div class="entry">
        <div class="single clear">
            <div class="post-content">
                <div class="search">
                    <form method="get" id="searchform" action="<?php bloginfo('url'); ?>">
                        <fieldset>
                            <input name="s" type="text" onfocus="if(this.value=='Search') this.value='';" onblur="if(this.value=='') this.value='Search';" value="Search" />
                            <button type="submit"></button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php get_template_part('pagination'); ?>

<?php get_footer(); ?>