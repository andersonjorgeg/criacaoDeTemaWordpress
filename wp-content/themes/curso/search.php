<?php get_header(); ?>
<div id="primary">
    <div id="main">
        <div class="container">
            <h2>Search results for: </h2><?php echo get_search_query(); ?>
            <?php

            get_search_form();

            while (have_posts()) : the_post();

                get_template_part('template-parts/content', 'search');

                if (comments_open() || get_comments_number()) :
                    comments_template('/comments-personalizado.php');
                endif;
            endwhile;

            the_posts_pagination(
                array(
                    'prev_text' => 'Previous',
                    'next_text' => 'Next',
                    'screen_reader_text' => true
                )
            );

            ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>