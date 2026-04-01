<?php
function tema_vertz_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array( 'primary' => 'Menu Principal' ) );
}
add_action( 'after_setup_theme', 'tema_vertz_setup' );

function tema_vertz_scripts() {
    // Helper para obter versão de arquivo (com fallback)
    $get_file_version = function( $filepath ) {
        return file_exists( $filepath ) ? filemtime( $filepath ) : '1.0.0';
    };

    // Google Fonts: Playfair Display + Inter
    wp_enqueue_style( 'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap',
        array(), null );

    // Swiper CSS (v11, MIT license)
    wp_enqueue_style( 'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(), '11.0.0' );

    // CSS principal do tema
    wp_enqueue_style( 'vertz-main',
        get_template_directory_uri() . '/assets/css/vertz.css',
        array( 'google-fonts' ),
        $get_file_version( get_template_directory() . '/assets/css/vertz.css' ) );

    // Swiper JS (v11, MIT license) — deve carregar antes do vertz.js
    wp_enqueue_script( 'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(), '11.0.0', true );

    // JS principal do tema — dependência: swiper
    wp_enqueue_script( 'vertz-main',
        get_template_directory_uri() . '/assets/js/vertz.js',
        array( 'swiper' ),
        $get_file_version( get_template_directory() . '/assets/js/vertz.js' ),
        true );
}
add_action( 'wp_enqueue_scripts', 'tema_vertz_scripts' );