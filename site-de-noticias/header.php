<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo(show: 'name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/normalize.css' ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/global.css' ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/bootstrap.css' ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/header.css' ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/' . $estiloPagina ?>">
    <link rel="stylesheet" href="<?= get_template_directory_uri() . '/css/footer.css' ?>">
</head>

<body <?php body_class(); ?>>
    <header class="site-header">

        <?php

        the_custom_logo();
        ?>
        <nav class="nav-noticias">
            <?php
            wp_nav_menu(
                array(
                    'menu' => 'menu-navegacao',
                    'menu_id' => 'menu-principal'
                )
            );
            ?>
            <input class="busca" type="text" placeholder="buscar notícias..." name="s" id="search-input">
            <button type="submit" id="search-button">Buscar</button>
        </nav>

    </header>

    <script>
        document.getElementById('search-button').addEventListener('click', () => {
            const searchQuery = document.getElementById('search-input').value;
            if (searchQuery.length > 0) {
                window.location.href = "<?php echo esc_url(home_url('/')); ?>?s=" + encodeURIComponent(searchQuery);
            }
        });
    </script>