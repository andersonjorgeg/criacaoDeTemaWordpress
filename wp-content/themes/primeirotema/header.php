<!DOCTYPE html>
<html>

<head>
    <?php wp_head(); ?>
    <!-- //? precisa adicionar para funcionar outros plugins em conjunto. -->
</head>

<body <?php body_class(); ?>>
    <header>
        <h1>Meu primeiro tema</h1>

        <?php
        if (has_nav_menu('primary')) {
            wp_nav_menu(array(
                'theme_location' => 'primary',
                'container' => 'nav',
                'container_class' => 'main_menu',
                'fallback_cb' => false
            ));
        }
        ?>
    </header>