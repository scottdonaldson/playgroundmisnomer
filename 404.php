<?php get_header(); ?>


<div class="content-title">
    Whoops... This page doesn't exist.
</div>

<div class="entry">
    <div <?php post_class('single clear'); ?> id="post_<?php the_ID(); ?>">
        <div class="post-content">
            <p>Now how did you get here? It might have been an outdated or bad link. If so, why don't you <a href="mailto:playgroundmisnomer@gmail.com">email us</a> about it? Or you could try searching for something else:</p>
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



<?php get_footer(); ?>