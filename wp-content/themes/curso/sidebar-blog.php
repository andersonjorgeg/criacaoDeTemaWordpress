<?php if (is_active_sidebar('sidebar-2')) : ?>
    <aside class="sidebar col-md-4 h-100">
        <?php get_search_form(); ?>
        <?php dynamic_sidebar('sidebar-2'); ?>
    </aside>
<?php endif; ?>