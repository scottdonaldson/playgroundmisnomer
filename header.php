<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <meta property="fb:admins" content="1543242988,8643044" />
        <title><?php wp_title(''); ?></title>
        <meta http-equiv="Content-language" content="<?php bloginfo('language'); ?>" />
		<link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/images/favico.ico" type="image/x-icon" />
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/style.css">
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style.css">
        <!--[if IE]><link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('template_url'); ?>/ie.css" /><![endif]-->
	
        
        <?php
			wp_enqueue_script('jquery');
			wp_enqueue_script('cycle', get_template_directory_uri() . '/js/jquery.cycle.all.min.js', 'jquery', false);
			wp_enqueue_script('cookie', get_template_directory_uri() . '/js/jquery.cookie.js', 'jquery', false);
            if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
            wp_enqueue_script('script', get_template_directory_uri() . '/js/script.js', 'jquery', false);
		?>
        <?php wp_head(); ?>
        <?php if ( is_home() && !get_option('ss_disable') ) : ?>
        <script type="text/javascript">
            (function($) {
                $(function() {
                    $('#slideshow').cycle({
                        fx:     'scrollHorz',
                        timeout: <?php echo (get_option('ss_timeout')) ? get_option('ss_timeout') : '10000' ?>,
                        next:   '#rarr',
                        prev:   '#larr'
                    });
                })
            })(jQuery)
        </script>
        <?php endif; ?>
	</head>    
	<body>
    
        <div class="page-wrap">
        <div class="wrapper hfeed">

            <div class="header clear" <?php echo (get_option('border_color')) ? 'style="border-top: 26px solid '.get_option('border_color').';"' : '' ?>>
                <div class="logo" style="float:left;">
                    <a href="<?php bloginfo('home'); ?>"><img src="http://www.playgroundmisnomer.com/wp-content/themes/playgroundmisnomer/images/PM_logo.png" alt="<?php bloginfo('name'); ?>" /></a>
                    
                </div>
                <h2>playground<br />misnomer</h2>
                
                <?php wp_nav_menu(array('menu' => 'Top menu', 'theme_location' => 'Top menu', 'depth' => 1, 'container' => 'div', 'container_class' => 'menu', 'menu_id' => false, 'menu_class' => false)); ?>
                <div class="social">
                	<a href="http://feeds.feedburner.com/playgroundmisnomer" class="rss" target="_blank"></a>
                	<a href="http://www.youtube.com/playgroundmisnomer" class="youtube" target="_blank"></a>
                    <a href="http://www.twitter.com/pgmisnomer" class="twitter" target="_blank"></a>
                    <a href="http://www.facebook.com/playgroundmisnomer" class="facebook" target="_blank"></a>            
                </div>
                
                
                <!-- ACTIVATE ONCE ADS ARE READY <a href="<?php // echo (get_option('header-ad-link')) ? get_option('header-ad-link') : '' ?>"><img class="header-ad" src="<?php // echo (get_option('header-ad')) ? get_option('header-ad') : '' ?>" width="728" height="90"/></a> -->
                
                <?php get_search_form(); ?>


                

            </div>

            <?php wp_nav_menu(array('menu' => 'Navigation', 'theme_location' => 'Navigation', 'depth' => 2, 'container' => 'div', 'container_class' => 'nav', 'menu_class' => 'dd', 'menu_id' => 'dd', 'walker' => new extended_walker())); ?>
          

            <!-- Container -->
                <?php if ( is_home() ) 
							echo '<div id="main-container" class="clear" >';
					  else
					  		echo '<div id="container" class="clear" >'; ?>
            

            
                <!-- Content -->

                <div id="content">

                	<?php if ( is_home() && !get_option('ss_disable') ) get_template_part('slideshow'); ?>
