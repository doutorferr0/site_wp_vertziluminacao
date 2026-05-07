<?php
/**
 * inc/cpt-novidade.php — Vertz Iluminação
 * CPT: novidade  |  Taxonomia: categoria_novidade
 */

add_action( 'init', function() {

    /* ── CPT: novidade ───────────────────────────────────── */
    register_post_type( 'novidade', array(
        'labels' => array(
            'name'               => 'Novidades',
            'singular_name'      => 'Novidade',
            'add_new_item'       => 'Nova Novidade',
            'edit_item'          => 'Editar Novidade',
            'new_item'           => 'Nova Novidade',
            'view_item'          => 'Ver Novidade',
            'search_items'       => 'Buscar Novidades',
            'not_found'          => 'Nenhuma novidade encontrada.',
            'not_found_in_trash' => 'Nenhuma novidade na lixeira.',
        ),
        'public'        => true,
        'has_archive'   => true,
        'rewrite'       => array( 'slug' => 'novidades' ),
        'supports'      => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'  => true,
        'menu_icon'     => 'dashicons-megaphone',
        'menu_position' => 6,
    ) );

    /* ── Taxonomia: categoria_novidade ───────────────────── */
    register_taxonomy( 'categoria_novidade', 'novidade', array(
        'labels' => array(
            'name'          => 'Categorias',
            'singular_name' => 'Categoria',
            'add_new_item'  => 'Nova Categoria',
            'edit_item'     => 'Editar Categoria',
            'search_items'  => 'Buscar Categorias',
            'not_found'     => 'Nenhuma categoria.',
        ),
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => array( 'slug' => 'categoria-novidade' ),
        'show_in_rest' => true,
    ) );

} );
