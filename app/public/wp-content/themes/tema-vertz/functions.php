<?php
function tema_vertz_setup() {
    add_theme_support( 'title-tag' );
    add_theme_support( 'post-thumbnails' );
    register_nav_menus( array( 'primary' => 'Menu Principal' ) );
}
add_action( 'after_setup_theme', 'tema_vertz_setup' );

// CPT: projeto + taxonomia categoria_projeto
require_once get_template_directory() . '/inc/cpt-projeto.php';
require_once get_template_directory() . '/inc/meta-projeto.php';
require_once get_template_directory() . '/inc/cpt-novidade.php';

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

    // CSS de projetos — carregado só nas páginas de projeto
    if ( is_post_type_archive( 'projeto' ) || is_singular( 'projeto' ) ) {
        wp_enqueue_style( 'vertz-projetos',
            get_template_directory_uri() . '/assets/css/projetos.css',
            array( 'vertz-main' ),
            $get_ver( get_template_directory() . '/assets/css/projetos.css' ) );
    }

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


/* =============================================================
   VERTZ CUSTOMIZER — Hero & Header
   ============================================================= */

function vertz_customizer_register( $wp_customize ) {

    $wp_customize->add_panel( 'vertz_hero', array(
        'title'    => '🔆 Vertz — Hero & Header',
        'priority' => 30,
    ) );

    $wp_customize->add_section( 'vertz_hero_logo', array(
        'title' => 'Logo no Hero',
        'panel' => 'vertz_hero',
    ) );

    $controls_logo = array(
        'vertz_hero_logo_pct' => array(
            'label'       => 'Tamanho do logo (% da tela)',
            'description' => 'Quanto da largura da tela o logo ocupa no hero. Padrão: 32',
            'default'     => 32,
            'min' => 15, 'max' => 55, 'step' => 1,
        ),
        'vertz_hero_logo_y' => array(
            'label'       => 'Posição vertical (% da altura da tela)',
            'description' => 'Onde o bloco logo+iluminação fica na vertical. Padrão: 42',
            'default'     => 42,
            'min' => 25, 'max' => 65, 'step' => 1,
        ),
    );

    foreach ( $controls_logo as $id => $args ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $args['default'],
            'sanitize_callback' => 'absint',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( $id, array(
            'label'       => $args['label'],
            'description' => $args['description'],
            'section'     => 'vertz_hero_logo',
            'type'        => 'range',
            'input_attrs' => array( 'min' => $args['min'], 'max' => $args['max'], 'step' => $args['step'] ),
        ) );
    }

    $wp_customize->add_section( 'vertz_hero_anim', array(
        'title' => 'Velocidade da animação',
        'panel' => 'vertz_hero',
    ) );

    $wp_customize->add_setting( 'vertz_hero_lerp', array(
        'default'           => 42,
        'sanitize_callback' => 'absint',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'vertz_hero_lerp', array(
        'label'       => 'Suavidade da animação',
        'description' => 'Menor = mais devagar e fluido. Padrão: 42 (= 0.042). Recomendado: 30–60.',
        'section'     => 'vertz_hero_anim',
        'type'        => 'range',
        'input_attrs' => array( 'min' => 15, 'max' => 120, 'step' => 1 ),
    ) );

    $wp_customize->add_section( 'vertz_header_size', array(
        'title' => 'Tamanho do Header',
        'panel' => 'vertz_hero',
    ) );

    $controls_header = array(
        'vertz_header_logo_scrolled' => array(
            'label'       => 'Logo ao scrollar (px)',
            'description' => 'Largura do logo no header fixo. Padrão: 80',
            'default'     => 80,
            'min' => 50, 'max' => 180, 'step' => 2,
        ),
        'vertz_header_padding' => array(
            'label'       => 'Espaçamento vertical do header (px)',
            'description' => 'Padding cima/baixo do header. Padrão: 14',
            'default'     => 14,
            'min' => 6, 'max' => 40, 'step' => 1,
        ),
    );

    foreach ( $controls_header as $id => $args ) {
        $wp_customize->add_setting( $id, array(
            'default'           => $args['default'],
            'sanitize_callback' => 'absint',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( $id, array(
            'label'       => $args['label'],
            'description' => $args['description'],
            'section'     => 'vertz_header_size',
            'type'        => 'range',
            'input_attrs' => array( 'min' => $args['min'], 'max' => $args['max'], 'step' => $args['step'] ),
        ) );
    }
}
add_action( 'customize_register', 'vertz_customizer_register' );


function vertz_inject_config() {
    $config = array(
        'heroLogoPct'   => (int) get_theme_mod( 'vertz_hero_logo_pct',      32 ),
        'heroLogoY'     => (int) get_theme_mod( 'vertz_hero_logo_y',        42 ),
        'heroLerp'      => (int) get_theme_mod( 'vertz_hero_lerp',          42 ),
        'logoScrolled'  => (int) get_theme_mod( 'vertz_header_logo_scrolled', 80 ),
        'headerPadding' => (int) get_theme_mod( 'vertz_header_padding',     14 ),
    );
    ?>
    <script id="vertz-config">
    window.vertzConfig = <?php echo wp_json_encode( $config ); ?>;
    </script>
    <?php
}
add_action( 'wp_head', 'vertz_inject_config', 5 );


// vertz_customizer_css() removida — --header-logo-size-* definidas em vertz.css


/* =============================================================
   CARBON FIELDS — Bootstrap + Helper
   Instalar: cd tema-vertz && composer require htmlburger/carbon-fields
   ============================================================= */

add_action('after_setup_theme', function() {
    $autoload = get_template_directory() . '/vendor/autoload.php';
    if (!file_exists($autoload)) return;

    require_once $autoload;
    \Carbon_Fields\Carbon_Fields::boot();

    $fields_file = get_template_directory() . '/inc/carbon-fields.php';
    if (file_exists($fields_file)) {
        require_once $fields_file;
    }
});


if (!function_exists('vf')) {
    function vf($field, $post_id = false, $fallback = '') {
        $crb_key = 'crb_' . $field;

        if ($post_id === 'option' || $post_id === 'options') {
            if (function_exists('carbon_get_theme_option')) {
                $v = carbon_get_theme_option($crb_key);
                if ($v !== null && $v !== '' && $v !== false) return $v;
            }
            $v = get_option('vertz_' . $field, null);
            return ($v !== null && $v !== '') ? $v : $fallback;
        }

        if (function_exists('carbon_get_post_meta')) {
            $pid = ($post_id && $post_id !== false) ? (int)$post_id : get_the_ID();
            $v   = carbon_get_post_meta($pid, $crb_key);
            if ($v !== null && $v !== '' && $v !== false) return $v;
        }

        return $fallback;
    }
}
