<?php

/* 

Template Name: General Template

*/
?>

<?php get_header(); ?>
<div class="content-area">
    <main>
        <section class="middle-area">
            <div class="container">
                <div class="general-template">
                    <?php
                    //se houver algum post
                    if (have_posts()) :
                        //enquanto houver post, mostre-os para gente
                        while (have_posts()) : the_post();
                    ?>
                            <article>
                                <h2><?php the_title(); ?></h2>
                                <?php the_content(); ?>
                            </article>

                        <?php
                        endwhile;
                    else :
                        ?>

                        <p>Theme's nothing yet to be displayed... </p>

                    <?php endif; ?>

                </div>
            </div>
        </section>
    </main>
</div>
<?php get_footer(); ?>