<?php
function noticias_registrando_taxonomia()
{
    register_taxonomy(
        'categorias',
        'noticias',
        array(
            'labels' => array('name' => 'Categorias'),
            'hierarchical' => true
        )
    );
}
add_action('init', 'noticias_registrando_taxonomia');

function noticias_registrando_post_customizado()
{
    register_post_type(
        'noticias',
        array(
            'labels' => array('name' => 'Noticias'),
            'public' => true,
            'menu_position' => 0,
            'supports' => array('title', 'editor'),
            'menu_icon' => 'dashicons-admin-site'
        )
    );
}
add_action('init', 'noticias_registrando_post_customizado');

function noticias_adicionando_recursos_ao_tema()
{
    add_theme_support(feature: 'custom-logo');
    add_theme_support(feature: 'post-formats');
}
add_action('after_setup_theme', 'noticias_adicionando_recursos_ao_tema');


function noticias_registrando_menu()
{
    register_nav_menu(
        location: 'menu-navegacao',
        description: 'Menu Navegação'
    );
}

add_action('init', 'noticias_registrando_menu');
