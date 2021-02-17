<article id="post-<?php the_ID();?>" <?php post_class(); ?>>

    <header>
        <h1><?php the_title(); ?></h1>
        <div class="meta-info">
            <p>Posted in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?></p>
            <p>Categories: <?php the_category( ' ' ); ?></p>
            <p><?php the_tags( 'Tags: ', ', ' ); ?></p>
        </div>
    </header>

    <!-- conteúdo completo do post -->
    <div class="content">
        <?php the_content(); ?>
    </div>

</article>