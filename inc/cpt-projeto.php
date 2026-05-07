<?php
/**
 * inc/cpt-projeto.php — Vertz Iluminação
 * CPT: projeto  |  Taxonomia: categoria_projeto
 */

add_action( 'init', function() {

    /* ── CPT: projeto ───────────────────────────────────── */
    register_post_type( 'projeto', array(
        'labels' => array(
            'name'               => 'Projetos',
            'singular_name'      => 'Projeto',
            'add_new_item'       => 'Novo Projeto',
            'edit_item'          => 'Editar Projeto',
            'new_item'           => 'Novo Projeto',
            'view_item'          => 'Ver Projeto',
            'search_items'       => 'Buscar Projetos',
            'not_found'          => 'Nenhum projeto encontrado.',
            'not_found_in_trash' => 'Nenhum projeto na lixeira.',
        ),
        'public'       => true,
        'has_archive'  => true,          // → /projetos/
        'rewrite'      => array( 'slug' => 'projetos' ),
        'supports'     => array( 'title', 'thumbnail' ),
        'show_in_rest' => false,
        'menu_icon'    => 'dashicons-portfolio',
        'menu_position' => 5,
    ) );

    /* ── Taxonomia: categoria_projeto ───────────────────── */
    register_taxonomy( 'categoria_projeto', 'projeto', array(
        'labels' => array(
            'name'              => 'Categorias',
            'singular_name'     => 'Categoria',
            'add_new_item'      => 'Nova Categoria',
            'edit_item'         => 'Editar Categoria',
            'search_items'      => 'Buscar Categorias',
            'not_found'         => 'Nenhuma categoria.',
        ),
        'hierarchical' => true,
        'public'       => true,
        'rewrite'      => array( 'slug' => 'categoria-projeto' ),
        'show_in_rest' => false,
    ) );

} );
