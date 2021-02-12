<!DOCTYPE html>
<html>

    <head>
        <?php wp_head(); ?> <!-- //? precisa adicionar para funcionar outros plugins em conjunto. -->
    </head>

    <body>
        <h1>Meu primeiro tema</h1>

        <?php
        if( has_nav_menu('primary') ){
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'main_menu',
                'fallback_cb' => false
            ));
        }
        ?>

        <?php wp_footer(); ?> <!-- //? necessário para rodar os scripts de rodapé -->
    </body>

</html>