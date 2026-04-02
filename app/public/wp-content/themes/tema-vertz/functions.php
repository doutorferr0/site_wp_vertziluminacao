<?php
function tema_vertz_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array( 'primary' => 'Menu Principal' ) );
}
add_action( 'after_setup_theme', 'tema_vertz_setup' );

function tema_vertz_scripts() {
    $get_ver = function( $filepath ) {
        return file_exists( $filepath ) ? filemtime( $filepath ) : '1.0.0';
    };

    wp_enqueue_style( 'google-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&display=swap',
        array(), null );

    wp_enqueue_style( 'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(), '11.0.0' );

    wp_enqueue_style( 'vertz-main',
        get_template_directory_uri() . '/assets/css/vertz.css',
        array( 'google-fonts' ),
        $get_ver( get_template_directory() . '/assets/css/vertz.css' ) );

    wp_enqueue_script( 'swiper',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array(), '11.0.0', true );

    wp_enqueue_script( 'vertz-main',
        get_template_directory_uri() . '/assets/js/vertz.js',
        array( 'swiper' ),
        $get_ver( get_template_directory() . '/assets/js/vertz.js' ),
        true );
}
add_action( 'wp_enqueue_scripts', 'tema_vertz_scripts' );


/**
 * Handler do formulário de contato nativo
 * Processa o POST de page-contato.php e envia e-mail via wp_mail
 */
function vertz_handle_contato() {
    // Verifica nonce
    if ( ! isset( $_POST['vertz_nonce'] ) || ! wp_verify_nonce( $_POST['vertz_nonce'], 'vertz_contato_nonce' ) ) {
        wp_die( 'Requisição inválida.', 'Erro', array( 'response' => 403 ) );
    }

    // Sanitiza campos
    $nome     = sanitize_text_field( $_POST['nome']     ?? '' );
    $email    = sanitize_email(      $_POST['email']    ?? '' );
    $telefone = sanitize_text_field( $_POST['telefone'] ?? '' );
    $tipo     = sanitize_text_field( $_POST['tipo']     ?? '' );
    $mensagem = sanitize_textarea_field( $_POST['mensagem'] ?? '' );

    // Validação mínima
    if ( empty( $nome ) || ! is_email( $email ) || empty( $mensagem ) ) {
        wp_redirect( add_query_arg( 'erro', '1', wp_get_referer() ) );
        exit;
    }

    // Monta e-mail
    $destinatario = 'contato@vertziluminacao.com.br';
    $assunto      = '[Vertz] Nova mensagem de ' . $nome;
    $corpo        = "Nome: {$nome}\n"
                  . "E-mail: {$email}\n"
                  . ( $telefone ? "Telefone: {$telefone}\n" : '' )
                  . ( $tipo     ? "Tipo de projeto: {$tipo}\n" : '' )
                  . "\nMensagem:\n{$mensagem}";
    $headers      = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $nome . ' <' . $email . '>',
    );

    wp_mail( $destinatario, $assunto, $corpo, $headers );

    // Redireciona com flag de sucesso
    $contato_url = get_permalink( get_page_by_path('contato') );
    wp_redirect( add_query_arg( 'enviado', '1', $contato_url ) );
    exit;
}
add_action( 'admin_post_vertz_contato',        'vertz_handle_contato' ); // usuário logado
add_action( 'admin_post_nopriv_vertz_contato', 'vertz_handle_contato' ); // visitante

/**
 * Handler do opt-in do lead capture panel
 */
function vertz_handle_optin() {
    if ( ! isset( $_POST['vertz_optin_nonce_field'] ) ||
         ! wp_verify_nonce( $_POST['vertz_optin_nonce_field'], 'vertz_optin_nonce' ) ) {
        wp_die( 'Requisição inválida.', 'Erro', array( 'response' => 403 ) );
    }

    $nome  = sanitize_text_field( $_POST['nome']  ?? '' );
    $email = sanitize_email(      $_POST['email'] ?? '' );
    $tipo  = sanitize_text_field( $_POST['tipo']  ?? '' );

    if ( empty( $nome ) || ! is_email( $email ) ) {
        wp_redirect( add_query_arg( 'lead_erro', '1', wp_get_referer() ) );
        exit;
    }

    $destinatario = 'contato@vertziluminacao.com.br';
    $assunto      = '[Vertz] Novo lead: ' . $nome;
    $corpo        = "Lead capturado via site\n\n"
                  . "Nome: {$nome}\n"
                  . "E-mail: {$email}\n"
                  . ( $tipo ? "Tipo de projeto: {$tipo}\n" : '' );
    $headers      = array(
        'Content-Type: text/plain; charset=UTF-8',
        'Reply-To: ' . $nome . ' <' . $email . '>',
    );

    wp_mail( $destinatario, $assunto, $corpo, $headers );

    $redirect = add_query_arg( 'lead_ok', '1', wp_get_referer() ?: home_url('/') );
    wp_redirect( $redirect );
    exit;
}
add_action( 'admin_post_vertz_optin',        'vertz_handle_optin' );
add_action( 'admin_post_nopriv_vertz_optin', 'vertz_handle_optin' );
