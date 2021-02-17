<article <?php post_class(); ?>>
    <h2>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <div class="meta-info">
        <p>Published in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?> </p>
        <?php if( has_category() ): ?>
        <p>Categories: <?php the_category(' '); ?> </p>
        <?php endif; ?>
        <p><?php the_tags('Tags: ', ', '); ?></p>
    </div>

    <!-- conteúdo resumido do post -->
    <?php the_excerpt(); ?>
</article>