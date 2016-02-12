<div class="pagination">
    <?php previous_posts_link(__('Newer')); ?>
    <?php next_posts_link(__('Older')); ?>
    <?php if (function_exists('wp_pagenavi')) wp_pagenavi(); ?>
</div>