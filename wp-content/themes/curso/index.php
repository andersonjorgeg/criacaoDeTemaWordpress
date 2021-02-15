<?php get_header(); ?>
<img class="img-fluid" src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">
<div class="content-area">
    <main>
        <section class="slide">
            <div class="container">
                <div class="row">Slide</div>
            </div>
        </section>
        <section class="services">
            <div class="container">
                <div class="row">Serviços</div>
            </div>
        </section>
        <section class="middle-area">
            <div class="container">
                <div class="row">
                    <aside class="sidebar col-md-4">Barra lateral</aside>
                    <div class="news col-md-8">
                        <?php 
                        //se houver algum post
                        if( have_posts() ):
                            //enquanto houver post, mostre-os para gente
                            while( have_posts() ): the_post();
                        ?>
                        <article>
                            <h2><?php the_title(); ?></h2>
                            <?php the_post_thumbnail( array( 275, 275) ); ?>
                            <p>published in <?php echo get_the_date(); ?> by <?php the_author_posts_link(); ?> </p>
                            <p>Categories: <?php the_category( ' ' ); ?> </p>
                            <p><?php the_tags( 'Tags:', ', ' );?></p>
                            <?php the_content(); ?>
                        </article>
                        <?php
                            endwhile;
                        else:
                        ?>

                        <p>Theme's nothing yet to be displayed... </p>

                        <?php endif; ?>

                    </div>
                </div>
            </div>
        </section>
        <section class="map">
            <div class="container">
                <div class="row">Mapa</div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>