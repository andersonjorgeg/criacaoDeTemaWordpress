<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Curso WordPress</title>
</head>

<body <?php body_class(); ?>>
    <p>Este é um parágrafo de referência.</p>
    <?php wp_head(); ?>
    <header>
        <section class="top-bar">
            <div class="social-media-icons">Ícones sociais</div>
            <div class="search">Pesquisa</div>
        </section>
        <section class="menu-are">
            <section class="logo">Logo</section>
            <nav class="menu">Menu</nav>
        </section>
    </header>