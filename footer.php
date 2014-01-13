</div>
            <!-- /Content -->

            </div>
            <!-- /Container -->
           
            <div id="sidebar">
				<?php get_sidebar(); ?>
			</div>
            
            <div class="footer">
            	<div class="footer-sidebar" <?php echo (get_option('border_color')) ? 'style="border-bottom: 26px solid '.get_option('border_color').';"' : '' ?>>
            	<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Footer') ) : ?>
				<?php endif; ?>
            	</div>
            
            </div>

            </div><!-- WRAPPER -->
            
            <div id="footer-info">
            	<div class="copyright" style="float:left;">
                	<p>&copy; <?php echo date('Y'); ?> <a href="<?php bloginfo('home'); ?>"><?php bloginfo('name'); ?></a>. All Rights Reserved.</p>
                </div>
                
                <div class="copyright" style="float:right;text-align:right;">
                	<p><a href="http://www.playgroundmisnomer.com/staff">Staff</a> | <a href="http://www.playgroundmisnomer.com/advertising">Advertising</a></p>
                </div>
                

        	</div>
            

            </div><!-- .page-wrap -->
            
        <?php wp_footer(); ?>

        <?php echo (get_option('ga')) ? get_option('ga') : '' ?>

	</body>
</html>