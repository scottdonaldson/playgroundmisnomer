<div class="sidebar">
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 1') ) :
        $widget_args = array(
            'after_widget' => '</div></div>',
            'before_title' => '<h3>',
            'after_title' => '</h3><div class="widget-body clear">'
        ); endif;
    ?>
    
    <!-- ACTIVATE ONCE ADS ARE READY <a href="<?php // echo (get_option('sidebar1-ad-link')) ? get_option('sidebar1-ad-link') : '' ?>"><img class="sidebar1-ad" src="<?php // echo (get_option('sidebar1-ad')) ? get_option('sidebar1-ad') : '' ?>" width="300" height="250"/></a> -->
    
    <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar 2') ) :
        $widget_args = array(
            'after_widget' => '</div></div>',
            'before_title' => '<h3>',
            'after_title' => '</h3><div class="widget-body clear">'
        ); endif;
    ?>
    
    <!-- ACTIVATE ONCE ADS ARE READY <a href="<?php // echo (get_option('sidebar2-ad-link')) ? get_option('sidebar2-ad-link') : '' ?>"><img class="sidebar2-ad" src="<?php // echo (get_option('sidebar2-ad')) ? get_option('sidebar2-ad') : '' ?>" width="300" height="250"/></a> -->
           
</div>