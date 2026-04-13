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


/* =============================================================
   VERTZ CUSTOMIZER — Hero & Header
   Expõe controles visuais no WP Customizer para ajustar
   animações e tamanhos sem tocar em código.
   ============================================================= */

function vertz_customizer_register( $wp_customize ) {

    /* ── PAINEL ─────────────────────────────────────────── */
    $wp_customize->add_panel( 'vertz_hero', array(
        'title'    => '🔆 Vertz — Hero & Header',
        'priority' => 30,
    ) );

    /* ── SEÇÃO: Logo Hero ───────────────────────────────── */
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

    /* ── SEÇÃO: Velocidade da animação ──────────────────── */
    $wp_customize->add_section( 'vertz_hero_anim', array(
        'title' => 'Velocidade da animação',
        'panel' => 'vertz_hero',
    ) );

    $wp_customize->add_setting( 'vertz_hero_lerp', array(
        'default'           => 42,       // representa 0.042 (÷1000)
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

    /* ── SEÇÃO: Header ──────────────────────────────────── */
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


/* =============================================================
   INJETA window.vertzConfig com os valores salvos
   O JS lê este objeto; se não existir, usa defaults hardcoded.
   ============================================================= */

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


/* =============================================================
   CSS DINÂMICO: aplica os valores do Customizer como variáveis
   ============================================================= */

function vertz_customizer_css() {
    $logo_scrolled  = (int) get_theme_mod( 'vertz_header_logo_scrolled', 80 );
    $pad            = (int) get_theme_mod( 'vertz_header_padding', 14 );
    $pad_rem        = round( $pad / 16, 4 );
    $logo_top       = round( $logo_scrolled * 1.3 ); // topo = scrolled × 1.3
    ?>
    <style id="vertz-customizer-css">
    :root {
        --header-logo-size-scrolled: <?php echo $logo_scrolled; ?>px;
        --header-logo-size-top:      <?php echo $logo_top; ?>px;
        --header-padding-y:          <?php echo $pad_rem; ?>rem;
        --header-padding-y-scrolled: <?php echo round($pad_rem * 0.6, 4); ?>rem;
    }
    </style>
    <?php
}
add_action( 'wp_head', 'vertz_customizer_css', 10 );


/* =============================================================
   ACF — OPTIONS PAGE + FIELD GROUPS
   Campos definidos em código (acf_add_local_field_group).
   Funciona sem exportar JSON. Requer ACF Free instalado.
   ============================================================= */

/* ── 1. Registrar Options Page ─────────────────────────────── */
add_action('acf/init', function() {
    if (!function_exists('acf_add_options_page')) return;

    acf_add_options_page(array(
        'page_title' => 'Vertz — Configurações',
        'menu_title' => '⚡ Vertz Config',
        'menu_slug'  => 'vertz-config',
        'capability' => 'manage_options',
        'icon_url'   => 'dashicons-lightbulb',
        'position'   => 3,
        'redirect'   => false,
    ));

    acf_add_options_sub_page(array(
        'page_title'  => 'Dados de Contato',
        'menu_title'  => 'Contato & Endereços',
        'parent_slug' => 'vertz-config',
    ));
});


/* ── 2. Helper: registrar grupos de campos ─────────────────── */
add_action('acf/init', function() {
    if (!function_exists('acf_add_local_field_group')) return;


    /* ════════════════════════════════════════════════════
       GRUPO 1 — CONTATO GLOBAL (options page)
       Aparece em: ⚡ Vertz Config > Contato & Endereços
    ════════════════════════════════════════════════════ */
    acf_add_local_field_group(array(
        'key'    => 'group_vertz_contato',
        'title'  => 'Dados de Contato',
        'fields' => array(
            array('key'=>'field_v_wa',   'label'=>'WhatsApp (só números)',  'name'=>'contato_whatsapp',         'type'=>'text', 'default_value'=>'5519999778710'),
            array('key'=>'field_v_tel',  'label'=>'Telefone fixo',          'name'=>'contato_telefone',         'type'=>'text', 'default_value'=>'(19) 3251-0501'),
            array('key'=>'field_v_em',   'label'=>'E-mail',                 'name'=>'contato_email',            'type'=>'email','default_value'=>'contato@vertziluminacao.com.br'),
            array('key'=>'field_v_ig',   'label'=>'Instagram (sem @)',       'name'=>'contato_instagram',        'type'=>'text', 'default_value'=>'vertziluminacao'),
            array('key'=>'field_v_adc',  'label'=>'Endereço Campinas',       'name'=>'contato_endereco_campinas','type'=>'text', 'default_value'=>'R. Antônio Lapa, 328 — Cambuí'),
            array('key'=>'field_v_adsp', 'label'=>'Endereço São Paulo',      'name'=>'contato_endereco_sp',      'type'=>'text', 'default_value'=>'Alameda Casa Branca, 806 — Jardim Paulista'),
            array('key'=>'field_v_hr',   'label'=>'Horário de atendimento',  'name'=>'contato_horario',          'type'=>'text', 'default_value'=>'Seg–Sex 9h–18h / Sáb 9h–13h'),
        ),
        'location' => array(array(array('param'=>'options_page','operator'=>'==','value'=>'vertz-config'))),
    ));


    /* ════════════════════════════════════════════════════
       GRUPO 2 — HOME (front-page.php)
    ════════════════════════════════════════════════════ */
    acf_add_local_field_group(array(
        'key'    => 'group_vertz_home',
        'title'  => 'Home — Conteúdo',
        'fields' => array(

            /* Hero */
            array('key'=>'field_h_tab1','label'=>'— HERO —','name'=>'','type'=>'tab'),
            array('key'=>'field_h_vid', 'label'=>'Vídeo hero (MP4)',  'name'=>'hero_video',  'type'=>'file',  'return_format'=>'url','mime_types'=>'mp4'),
            array('key'=>'field_h_pos', 'label'=>'Poster do vídeo',   'name'=>'hero_poster', 'type'=>'image', 'return_format'=>'url','preview_size'=>'medium'),

            /* Seção 2 */
            array('key'=>'field_h_tab2','label'=>'— SEÇÃO 2: Chamada —','name'=>'','type'=>'tab'),
            array('key'=>'field_h_s2sub','label'=>'Eyebrow (pequeno)','name'=>'home_s2_sub',   'type'=>'text','default_value'=>'O que fazemos'),
            array('key'=>'field_h_s2ti', 'label'=>'Título',            'name'=>'home_s2_titulo','type'=>'text','default_value'=>'Iluminação técnica e decorativa para ambientes únicos.'),
            array('key'=>'field_h_s2co', 'label'=>'Parágrafo',         'name'=>'home_s2_corpo', 'type'=>'textarea','rows'=>3,'default_value'=>'A Vertz combina projeto luminotécnico rigoroso com curadoria estética de marcas exclusivas — transformando cada ambiente em uma experiência precisa e memorável.'),

            /* Galeria */
            array('key'=>'field_h_tab3','label'=>'— GALERIA —','name'=>'','type'=>'tab'),
            array('key'=>'field_h_g1',  'label'=>'Foto Residencial',  'name'=>'gallery_01','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
            array('key'=>'field_h_g2',  'label'=>'Foto Comercial',    'name'=>'gallery_02','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
            array('key'=>'field_h_g3',  'label'=>'Foto Paisagismo',   'name'=>'gallery_03','type'=>'image','return_format'=>'url','preview_size'=>'medium'),

            /* Features */
            array('key'=>'field_h_tab4','label'=>'— DIFERENCIAIS —','name'=>'','type'=>'tab'),
            array('key'=>'field_h_fimg','label'=>'Imagem lateral','name'=>'features_img','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
            array('key'=>'field_h_frep','label'=>'Diferenciais','name'=>'features_items','type'=>'repeater',
                'min'=>1,'max'=>5,'layout'=>'table','button_label'=>'Adicionar diferencial',
                'sub_fields'=>array(
                    array('key'=>'field_h_frti','label'=>'Título','name'=>'titulo','type'=>'text','column_width'=>'30'),
                    array('key'=>'field_h_frtx','label'=>'Texto', 'name'=>'texto', 'type'=>'textarea','rows'=>2,'column_width'=>'70'),
                ),
            ),

            /* FAQ */
            array('key'=>'field_h_tab5','label'=>'— PERGUNTAS FREQUENTES —','name'=>'','type'=>'tab'),
            array('key'=>'field_h_faq', 'label'=>'FAQs','name'=>'faq_items','type'=>'repeater',
                'min'=>1,'max'=>10,'layout'=>'table','button_label'=>'Adicionar pergunta',
                'sub_fields'=>array(
                    array('key'=>'field_h_faqq','label'=>'Pergunta','name'=>'pergunta','type'=>'text','column_width'=>'40'),
                    array('key'=>'field_h_faqa','label'=>'Resposta','name'=>'resposta','type'=>'textarea','rows'=>3,'column_width'=>'60'),
                ),
            ),

            /* CTA Final */
            array('key'=>'field_h_tab6','label'=>'— CTA FINAL —','name'=>'','type'=>'tab'),
            array('key'=>'field_h_cimg','label'=>'Foto showroom','name'=>'cta_foto','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
            array('key'=>'field_h_cti', 'label'=>'Título',       'name'=>'cta_titulo','type'=>'text','default_value'=>'Vamos iluminar o seu projeto.'),
            array('key'=>'field_h_ctx', 'label'=>'Texto',        'name'=>'cta_corpo', 'type'=>'textarea','rows'=>2,'default_value'=>'Envie a planta baixa, o projeto do arquiteto ou apenas descreva o espaço. Nossa equipe retorna em até 24 horas úteis com uma proposta preliminar.'),

            /* 10 Razões */
            array('key'=>'field_h_tab7','label'=>'— 10 RAZÕES —','name'=>'','type'=>'tab'),
            array('key'=>'field_h_raz', 'label'=>'Razões (10 itens)','name'=>'razoes_items','type'=>'repeater',
                'min'=>1,'max'=>10,'layout'=>'table','button_label'=>'Adicionar razão',
                'sub_fields'=>array(
                    array('key'=>'field_h_razti','label'=>'Título',       'name'=>'titulo','type'=>'text','column_width'=>'25'),
                    array('key'=>'field_h_razac','label'=>'Acento (negrito)','name'=>'acento','type'=>'text','column_width'=>'25'),
                    array('key'=>'field_h_raztx','label'=>'Texto',        'name'=>'texto', 'type'=>'textarea','rows'=>2,'column_width'=>'50'),
                ),
            ),
        ),
        'location' => array(array(array('param'=>'page_template','operator'=>'==','value'=>'front-page.php'))),
    ));


    /* ════════════════════════════════════════════════════
       GRUPO 3 — SOBRE (page-sobre.php)
    ════════════════════════════════════════════════════ */
    acf_add_local_field_group(array(
        'key'    => 'group_vertz_sobre',
        'title'  => 'Sobre — Conteúdo',
        'fields' => array(
            array('key'=>'field_s_tab1','label'=>'— HERO —','name'=>'','type'=>'tab'),
            array('key'=>'field_s_hero','label'=>'Imagem hero','name'=>'sobre_hero_img','type'=>'image','return_format'=>'url','preview_size'=>'medium'),

            array('key'=>'field_s_tab2','label'=>'— MANIFESTO —','name'=>'','type'=>'tab'),
            array('key'=>'field_s_msub','label'=>'Eyebrow',    'name'=>'sobre_manifesto_sub',   'type'=>'text','default_value'=>'Nossa história'),
            array('key'=>'field_s_mti', 'label'=>'Título',     'name'=>'sobre_manifesto_titulo', 'type'=>'text','default_value'=>'Mais de 20 anos iluminando projetos com precisão e elegância.'),
            array('key'=>'field_s_mwy', 'label'=>'Texto (HTML permitido)', 'name'=>'sobre_manifesto_corpo','type'=>'wysiwyg','tabs'=>'text','toolbar'=>'basic','media_upload'=>0),
            array('key'=>'field_s_mimg','label'=>'Imagem missão (inset)','name'=>'sobre_missao_img','type'=>'image','return_format'=>'url','preview_size'=>'medium'),

            array('key'=>'field_s_tab3','label'=>'— NÚMEROS —','name'=>'','type'=>'tab'),
            array('key'=>'field_s_stats','label'=>'Estatísticas','name'=>'sobre_stats','type'=>'repeater',
                'min'=>1,'max'=>6,'layout'=>'table','button_label'=>'Adicionar número',
                'sub_fields'=>array(
                    array('key'=>'field_s_stnu','label'=>'Número','name'=>'numero','type'=>'text','column_width'=>'20'),
                    array('key'=>'field_s_stsu','label'=>'Sufixo','name'=>'sufixo','type'=>'text','column_width'=>'15'),
                    array('key'=>'field_s_stla','label'=>'Legenda','name'=>'legenda','type'=>'text','column_width'=>'65'),
                ),
            ),

            array('key'=>'field_s_tab4','label'=>'— GALERIA —','name'=>'','type'=>'tab'),
            array('key'=>'field_s_ga1','label'=>'Foto 1 (Residencial)','name'=>'sobre_galeria_01','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
            array('key'=>'field_s_ga2','label'=>'Foto 2 (Comercial)',  'name'=>'sobre_galeria_02','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
            array('key'=>'field_s_ga3','label'=>'Foto 3 (Corporativo)','name'=>'sobre_galeria_03','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
        ),
        'location' => array(array(array('param'=>'page_template','operator'=>'==','value'=>'page-sobre.php'))),
    ));


    /* ════════════════════════════════════════════════════
       GRUPO 4 — SERVIÇOS (page-servicos.php)
    ════════════════════════════════════════════════════ */
    acf_add_local_field_group(array(
        'key'    => 'group_vertz_servicos',
        'title'  => 'Serviços — Conteúdo',
        'fields' => array(
            array('key'=>'field_sv_tab1','label'=>'— HERO —','name'=>'','type'=>'tab'),
            array('key'=>'field_sv_hero','label'=>'Imagem hero','name'=>'servicos_hero_img','type'=>'image','return_format'=>'url','preview_size'=>'medium'),

            array('key'=>'field_sv_tab2','label'=>'— DECLARAÇÃO —','name'=>'','type'=>'tab'),
            array('key'=>'field_sv_dti','label'=>'Headline',  'name'=>'servicos_decl_titulo','type'=>'textarea','rows'=>3,'default_value'=>"A maioria das lojas vende luminárias.\nNós projetamos o ambiente que você vai habitar."),
            array('key'=>'field_sv_dco','label'=>'Parágrafo', 'name'=>'servicos_decl_corpo', 'type'=>'textarea','rows'=>3,'default_value'=>'Cada espaço tem uma função. Cada função exige uma luz específica. Combinamos projeto técnico rigoroso com curadoria estética de marcas exclusivas — para entregar ambientes que funcionam, impressionam e duram.'),

            array('key'=>'field_sv_tab3','label'=>'— SEGMENTOS (cards) —','name'=>'','type'=>'tab'),
            array('key'=>'field_sv_seg','label'=>'Segmentos','name'=>'servicos_segmentos','type'=>'repeater',
                'min'=>1,'max'=>9,'layout'=>'block','button_label'=>'Adicionar segmento',
                'sub_fields'=>array(
                    array('key'=>'field_sv_sti', 'label'=>'Título',    'name'=>'titulo',  'type'=>'text'),
                    array('key'=>'field_sv_sde', 'label'=>'Descrição', 'name'=>'desc',    'type'=>'textarea','rows'=>3),
                    array('key'=>'field_sv_sim', 'label'=>'Imagem',    'name'=>'imagem',  'type'=>'image','return_format'=>'url','preview_size'=>'thumbnail'),
                    array('key'=>'field_sv_sit', 'label'=>'Itens (um por linha)','name'=>'itens','type'=>'textarea','rows'=>4),
                ),
            ),
        ),
        'location' => array(array(array('param'=>'page_template','operator'=>'==','value'=>'page-servicos.php'))),
    ));


    /* ════════════════════════════════════════════════════
       GRUPO 5 — CONTATO (page-contato.php)
    ════════════════════════════════════════════════════ */
    acf_add_local_field_group(array(
        'key'    => 'group_vertz_contato_page',
        'title'  => 'Contato — Conteúdo',
        'fields' => array(
            array('key'=>'field_ct_ti',   'label'=>'Título da página',  'name'=>'contato_titulo','type'=>'text','default_value'=>'Vamos conversar.'),
            array('key'=>'field_ct_bimg', 'label'=>'Imagem de fechamento (banner 21:9)', 'name'=>'contato_banner','type'=>'image','return_format'=>'url','preview_size'=>'medium'),
        ),
        'location' => array(array(array('param'=>'page_template','operator'=>'==','value'=>'page-contato.php'))),
    ));

}); // fim add_action acf/init


/* ── Helper: lê campo ACF com fallback ─────────────────────── */
if (!function_exists('vf')) {
    function vf($field, $post_id = false, $fallback = '') {
        if (!function_exists('get_field')) return $fallback;
        $v = get_field($field, $post_id);
        return ($v !== null && $v !== false && $v !== '') ? $v : $fallback;
    }
}
