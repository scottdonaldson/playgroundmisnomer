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

        <?php if (!is_user_logged_in()) { ?>
        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-9215814-7', 'playgroundmisnomer.com');
          ga('send', 'pageview');

        </script>
        <?php } ?>

	</body>
</html>