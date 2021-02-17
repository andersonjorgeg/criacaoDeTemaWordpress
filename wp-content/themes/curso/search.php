<?php get_header(); ?>
<div id="primary">
    <div id="main">
        <div class="container">
            <?php

            while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'search');

                if (comments_open() || get_comments_number()) :
                    comments_template('/comments-personalizado.php');
                endif;
            endwhile;

            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>