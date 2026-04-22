<?php
/**
 * front-page.php — Vertz Iluminação
 */
get_header();
$theme_uri = get_template_directory_uri();

// ── Contato global ──────────────────────────────────────────
$wa      = vf('contato_whatsapp',         'option', '5519999778710');
$tel     = vf('contato_telefone',          'option', '(19) 3251-0501');
$email   = vf('contato_email',             'option', 'contato@vertziluminacao.com.br');
$ig      = vf('contato_instagram',         'option', 'vertziluminacao');
$adc     = vf('contato_endereco_campinas', 'option', 'R. Antônio Lapa, 328 — Cambuí');
$adsp    = vf('contato_endereco_sp',       'option', 'Alameda Casa Branca, 806 — Jardim Paulista');
$horario = vf('contato_horario',           'option', 'Seg–Sex 9h–18h / Sáb 9h–13h');

// ── Campos desta página ─────────────────────────────────────
$hero_video  = vf('hero_video',  false, '');
$hero_poster = vf('hero_poster', false, '');
$s2_sub    = vf('home_s2_sub',   false, 'O que fazemos');
$s2_titulo = vf('home_s2_titulo',false, 'Iluminação técnica e decorativa para ambientes <em>únicos.</em>');
$s2_corpo  = vf('home_s2_corpo', false, 'A Vertz combina projeto luminotécnico rigoroso com curadoria estética de marcas exclusivas — transformando cada ambiente em uma experiência precisa e memorável.');
$g1 = vf('gallery_01', false, $theme_uri . '/assets/images/gallery-01.jpg');
$g2 = vf('gallery_02', false, $theme_uri . '/assets/images/gallery-02.jpg');
$g3 = vf('gallery_03', false, $theme_uri . '/assets/images/gallery-03.jpg');
$feat_img  = vf('features_img', false, $theme_uri . '/assets/images/features-destaque.jpg');
$cta_foto  = vf('cta_foto',   false, $theme_uri . '/assets/images/contato-foto.jpg');
$cta_titulo = vf('cta_titulo',false, 'Vamos iluminar o seu projeto.');
$cta_corpo  = vf('cta_corpo', false, 'Envie a planta baixa, o projeto do arquiteto ou apenas descreva o espaço. Nossa equipe retorna em até 24 horas úteis com uma proposta preliminar.');

// Features com fallback
$features_raw = vf('features_items', false, array());
$features = (!empty($features_raw)) ? $features_raw : array(
    array('titulo'=>'Eficiência energética certificada','texto'=>'Nossas especificações em LED resultam em reduções de até 80% no consumo elétrico — com cálculo de iluminância ABNT e produtos com certificação PROCEL.'),
    array('titulo'=>'Projeto luminotécnico completo',  'texto'=>'Utilizamos o software DIALux para calcular iluminâncias ambiente a ambiente. Você recebe o memorial descritivo completo, circuitos e quantitativo para a obra.'),
    array('titulo'=>'Curadoria de marcas exclusivas',  'texto'=>'Trabalhamos com revendas exclusivas de marcas nacionais e internacionais disponíveis para visitação física nos showrooms de Campinas e São Paulo.'),
);

// FAQs com fallback
$faqs_raw = vf('faq_items', false, array());
$faqs = (!empty($faqs_raw)) ? $faqs_raw : array(
    array('pergunta'=>'Quais tipos de projetos a Vertz atende?','resposta'=>'Atendemos projetos residenciais de alto padrão, comerciais e de varejo, corporativos, hoteleiros, hospitalares e projetos especiais como museus e galerias. Também desenvolvemos consultoria para arquitetos e designers de interiores.'),
    array('pergunta'=>'Vocês desenvolvem o projeto luminotécnico?','resposta'=>'Sim. Desenvolvemos o projeto luminotécnico completo com software DIALux — incluindo cálculo de iluminâncias por ambiente, seleção de produtos, memorial descritivo, circuitos e quantitativo. Tudo documentado conforme normas ABNT.'),
    array('pergunta'=>'Qual o prazo médio de fornecimento?','resposta'=>'Nossa linha padrão tem entrega de 5 a 10 dias úteis para todo o Brasil. Produtos importados ou sob encomenda têm prazo informado na proposta, antes do fechamento.'),
    array('pergunta'=>'Os produtos possuem garantia?','resposta'=>'Todos os produtos fornecidos pela Vertz têm garantia de 2 anos contra defeitos de fabricação, com suporte técnico especializado. Para projetos maiores, oferecemos contrato de manutenção preventiva.'),
);

// 10 Razões com fallback
$razoes_raw = vf('razoes_items', false, array());
$razoes = (!empty($razoes_raw)) ? $razoes_raw : array(
    array('titulo'=>'1- Integração com a Arquitetura',         'acento'=>'A iluminação nasce com o projeto.',           'texto'=>'Nossas soluções são pensadas desde a planta para se fundir aos elementos estruturais, estabelecendo uma simbiose técnica e estética com a arquitetura.'),
    array('titulo'=>'2- Sem Tentativa e Erro', 'acento'=>'Precisão profissional em cada ponto.',   'texto'=>'a Vertz trabalha APENAS com luz, então conhece ela. Calculamos o comportamento,  ângulos de abertura e eficiência luminosa, eliminando arrependimentos no futuro.'),
    array('titulo'=>'3- A Luz revela',              'acento'=>'Não existe ambiente bonito com uma luz feia,','texto'=>'a iluminação pode deixar um ambiente comum em algo extraordinário — ou arruinar um projeto incrível. Por isso, a curadoria luminotécnica é tão importante quanto a decorativa.'),
    array('titulo'=>'4- Valorização do Imóvel',     'acento'=>'Percepção imediata de alto padrão.',         'texto'=>'Um projeto luminotécnico executado com precisão eleva o valor agregado do espaço. Nossos projetos transmitem conforto e sofisticação, fatores decisivos de diferenciação no mercado imobiliário premium..'),
    array('titulo'=>'5- Mais tempo para você',            'acento'=>'Sua única tarefa é aprovar o projeto,',                 'texto'=>' assumimos a solução de projeto luminotécnico de ponta a ponta. Voce e seu arquiteto são liberados  para focar nas demais exigências da sua obra.'),
    array('titulo'=>'6- Cenas para cada momento',         'acento'=>'Atmosferas moldadas pela Luz.',        'texto'=>' Cada ponto de luz possui uma finalidade técnica específica, possuindo transições e aplicações conforme a demanda de uso do ambiente.'),
    array('titulo'=>'7- Curadoria minuciosa',        'acento'=>'O topo da pirâmide em iluminação',            'texto'=>'Filtramos o mercado global e nacional para oferecer apenas peças que entregam  o que há de mais sofisticado no setor, sem precisar se preocupar com a procedência ou a durabilidade do material escolhido.'),
    array('titulo'=>'8- Certeza do Resultado',     'acento'=>'Visite nosso showroom,',              'texto'=>'Te convidamos a conhecer nossos showrooms em Campinas e São Paulo para conversar sobre seu projeto e mostrar os produtos que oferecemos. Assim, você tem total segurança do resultado final antes mesmo de fechar o projeto.'),
    array('titulo'=>'9- 20 anos de estrada',     'acento'=>'Somos a primeira loja de iluminação com light designers da cidade',       'texto'=>'O verdadeiro teste de uma empresa é a sua permanência, e nosso legado reflete isso. Acumulamos o conhecimento necessários para te entregar o mais alto nível de sofisticação no setor de iluminação.'),
);
?>

<div class="single single-page" id="page-home">

  <!-- SEÇÃO 1: HERO -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-1" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="550">
      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll data-scroll-target="#pb-row-hero-1" data-scroll-progress="easeInCubic">
            <?php
            $vpath = get_template_directory() . '/assets/images/hero-video.mp4';
            $pattr = '';
            if ($hero_poster) $pattr = 'poster="' . esc_url($hero_poster) . '"';
            elseif (file_exists(get_template_directory() . '/assets/images/hero-poster.jpg'))
                $pattr = 'poster="' . esc_url($theme_uri) . '/assets/images/hero-poster.jpg"';

            if ($hero_video || file_exists($vpath)):
                $vsrc = $hero_video ?: esc_url($theme_uri) . '/assets/images/hero-video.mp4'; ?>
            <video class="w-100 pb-row-hero__video" autoplay muted loop playsinline preload="none"
              <?php echo $pattr; ?> style="aspect-ratio:16/9;object-fit:cover;display:block;">
              <source src="<?php echo esc_url($vsrc); ?>" type="video/mp4">
            </video>
            <?php else: ?>
            <div class="pb-row-hero__videoFallback" style="width:100%;aspect-ratio:16/9;background:var(--color-header-bg);display:block;"></div>
            <?php endif; ?>
          </div>
        </div>
      </figure>

      <div class="vertz-circle-hero vertz-circle vertz-circle--light" aria-hidden="true">
        <svg class="vertz-circle__outer" viewBox="0 0 240 240" xmlns="http://www.w3.org/2000/svg" style="position:absolute;inset:0;width:100%;height:100%;">
          <defs><path id="vertz-outer-path" d="M120,120 m-108,0 a108,108 0 1,1 216,0 a108,108 0 1,1 -216,0"/></defs>
          <text font-size="12" font-family="inherit" fill="rgba(255,255,255,0.9)" font-weight="500" letter-spacing="4.5" stroke="rgba(0,0,0,0.4)" stroke-width="1.2" paint-order="stroke fill">
            <textPath href="#vertz-outer-path">VERTZ ILUMINAÇÃO  ✦  CAMPINAS &amp; SÃO PAULO  ✦  VERTZ ILUMINAÇÃO  ✦  CAMPINAS &amp; SÃO PAULO  ✦  </textPath>
          </text>
        </svg>
        <div class="vertz-circle__inner-ring" style="position:absolute;inset:0;width:100%;height:100%;">
          <svg id="vertz-inner-svg" viewBox="0 0 240 240" xmlns="http://www.w3.org/2000/svg" style="width:100%;height:100%;">
            <defs><path id="vertz-inner-path" d="M120,120 m-80,0 a80,80 0 1,0 160,0 a80,80 0 1,0 -160,0"/></defs>
            <text id="vertz-date-text" font-size="11.5" font-family="inherit" fill="rgba(255,255,255,0.8)" font-weight="400" letter-spacing="3" stroke="rgba(0,0,0,0.35)" stroke-width="1.1" paint-order="stroke fill">
              <textPath href="#vertz-inner-path">--:-- ✦ --/--/----</textPath>
            </text>
          </svg>
        </div>
      </div>

      <div class="pb-row-hero__scrim" aria-hidden="true"></div>
      <div class="pb-row-hero__scroll col-start-1 row-start-1 align-self-end position-relative overflow-clip" aria-hidden="true">
        <span class="pb-row-hero__scroll-line"></span>
      </div>
    </div>
  </div>


  <!-- SEÇÃO 2: DECLARAÇÃO -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:2">
    <header class="page-heading d-flex flex-column align-items-center pb-row pb-row-page-heading container-fluid"
      data-scroll id="pb-row-page-heading-1" data-scroll-offset="80px,0" data-module-delay>
      <p class="fz-12 fz-md-14 fw-400 ta-center tt-uppercase m-0" style="letter-spacing:.15em;color:var(--color-gray-600)"><?php echo esc_html($s2_sub); ?></p>
      <h2 class="ff-body fz-28 fz-md-44 fz-xl-64 fw-400 lh-107 ls--4 ta-center m-0 mt-20 mt-md-30 mt-xl-40"
        data-splitting="wordsMask" data-scroll data-reveal data-text-animation="slidein-by-lines"
        data-scroll-target="#pb-row-page-heading-1" data-scroll-offset="80px,0"><?php echo wp_kses_post($s2_titulo); ?></h2>
      <div class="fz-14 fz-md-16 fz-xl-18 lh-150 ta-center wysiwyg mt-24 mt-md-30 mt-xl-60" style="max-width:680px;">
        <p><?php echo esc_html($s2_corpo); ?></p>
      </div>
    </header>
  </div>


  <!-- SEÇÃO 3: GALERIA -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0" style="--zindex:3">
    <div class="pb-row pb-row-gallery-btn container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <header class="pb-row-gallery-btn__header d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20 mb-30 mb-md-40">
        <h2 class="col-start-1 col-span-md-8 col-span-xl-14 ff-body fz-20 fz-md-32 fz-xl-48 fw-400 lh-110 ls--3 m-0">
          Iluminação para cada <span class="title-highlight --font-heading --fs-italic">ambiente</span>.
        </h2>
        <div class="col-start-1 col-start-md-9 col-span-md-4 col-start-xl-17 col-span-xl-8 fz-14 lh-142 d-flex align-items-md-end" style="color:var(--color-gray-600)">
          <p class="m-0">Do residencial de alto padrão ao complexo comercial — com eficiência técnica e curadoria estética.</p>
        </div>
      </header>
      <div class="pb-row-gallery-btn__stage" id="gallery-stage">
        <figure class="pb-row-gallery-btn__slide" id="gallery-slide-0" aria-hidden="false">
          <img src="<?php echo esc_url($g1); ?>" alt="Projeto residencial Vertz Iluminação" loading="lazy" decoding="async">
        </figure>
        <figure class="pb-row-gallery-btn__slide" id="gallery-slide-1" aria-hidden="true">
          <img src="<?php echo esc_url($g2); ?>" alt="Projeto comercial Vertz Iluminação" loading="lazy" decoding="async">
        </figure>
        <figure class="pb-row-gallery-btn__slide" id="gallery-slide-2" aria-hidden="true">
          <img src="<?php echo esc_url($g3); ?>" alt="Projeto de paisagismo Vertz Iluminação" loading="lazy" decoding="async">
        </figure>
        <nav class="pb-row-gallery-btn__nav" aria-label="Categoria de projeto">
          <button class="pb-row-gallery-btn__pill is-active" data-gallery-target="0" aria-pressed="true">Residencial</button>
          <button class="pb-row-gallery-btn__pill" data-gallery-target="1" aria-pressed="false">Comercial</button>
          <button class="pb-row-gallery-btn__pill" data-gallery-target="2" aria-pressed="false">Paisagismo</button>
        </nav>
      </div>
    </div>
  </div>
  <div class="pb-row-wrapper position-relative pt-0 pb-0" style="--zindex:3.5">
    <div class="pb-row container-fluid d-flex justify-content-center" style="padding-left:18%;padding-right:18%;padding-top:1.5rem;">
      <a href="<?php echo esc_url(home_url('/contato')); ?>" class="fz-12 tt-uppercase fw-500 d-flex align-items-center grid-gap-10" style="color:var(--color-dark);text-decoration:none;letter-spacing:0.12em;border-bottom:1px solid var(--color-dark);">
        Solicitar projeto para este tipo de ambiente →
      </a>
    </div>
  </div>


  <!-- SEÇÃO 4: DOIS PILARES -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:4">
    <div class="pb-row container-fluid">
      <div class="vertz-service-duo__eyebrow" data-scroll data-scroll-offset="60px,0" data-module-delay>
        <span class="vertz-service-duo__eyebrow-label">O que entregamos</span>
        <span class="vertz-service-duo__eyebrow-rule" aria-hidden="true"></span>
      </div>
      <div class="vertz-service-duo__grid" data-scroll data-scroll-offset="60px,0" data-module-delay>
        <a href="<?php echo esc_url(home_url('/iluminacao-tecnica')); ?>" class="vertz-service-duo__card" aria-label="Projeto Técnico de Iluminação">
          <div class="vertz-service-duo__img-wrap overflow-clip">
            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/produto-residencial.jpg" alt="Projeto Técnico de Iluminação — Vertz" loading="lazy" decoding="async" class="vertz-service-duo__img">
          </div>
          <div class="vertz-service-duo__body">
            <div class="vertz-service-duo__meta">
              <span class="vertz-service-duo__index" aria-hidden="true">01</span>
              <span class="vertz-service-duo__tag">Projeto Técnico</span>
            </div>
            <h3 class="vertz-service-duo__title">Projeto Técnico<br>de Iluminação</h3>
            <p class="vertz-service-duo__desc">A camada que sustenta tudo — calculada em lux, IRC e temperatura de cor para que cada ambiente funcione com precisão técnica e eficiência energética real.</p>
            <div class="vertz-service-duo__cta"><span>Ver serviço</span><span class="vertz-service-duo__arrow" aria-hidden="true">→</span></div>
          </div>
        </a>
        <a href="<?php echo esc_url(home_url('/iluminacao-decorativa')); ?>" class="vertz-service-duo__card" aria-label="Projeto Decorativo de Iluminação">
          <div class="vertz-service-duo__img-wrap overflow-clip">
            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/produto-comercial.jpg" alt="Projeto Decorativo de Iluminação — Vertz" loading="lazy" decoding="async" class="vertz-service-duo__img">
          </div>
          <div class="vertz-service-duo__body">
            <div class="vertz-service-duo__meta">
              <span class="vertz-service-duo__index" aria-hidden="true">02</span>
              <span class="vertz-service-duo__tag">Projeto Decorativo</span>
            </div>
            <h3 class="vertz-service-duo__title">Projeto Decorativo<br>de Iluminação</h3>
            <p class="vertz-service-duo__desc">A camada que define a identidade — pendentes, arandelas e peças de design curadas para impressionar, criar atmosfera e ser lembrada.</p>
            <div class="vertz-service-duo__cta"><span>Ver serviço</span><span class="vertz-service-duo__arrow" aria-hidden="true">→</span></div>
          </div>
        </a>
      </div>
    </div>
  </div>


  <!-- SEÇÃO 4.5: 10 RAZÕES -->
  <div class="pb-row-wrapper position-relative pt-30 pb-20 pt-md-40 pb-md-30 mt-0 mb-0" style="--zindex:4.5;background:var(--color-surface);">
    <div id="pb-row-razoes-1" class="pb-row pb-row-razoes" data-scroll data-scroll-offset="100px,0" data-module-delay>
      <header class="container-fluid mb-40 mb-md-60">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600)">Por que escolher a Vertz</p>
        <h2 class="ff-body fz-28 fz-md-44 fz-xl-56 fw-400 ls--3 m-0">9 razões para <span class="title-highlight --font-heading --fs-italic">iluminar</span> com a Vertz.</h2>
      </header>
      <div class="pb-row-razoes__slider swiper">
        <div class="pb-row-razoes__sliderWrap swiper-wrapper">
          <?php foreach ($razoes as $index => $razao):
            $gif = $theme_uri . '/assets/images/razoes-' . str_pad($index+1,2,'0',STR_PAD_LEFT) . '.gif'; ?>
          <div class="pb-row-razoes__slide swiper-slide" style="--index:<?php echo $index; ?>">
            <div class="pb-row-razoes__card">
              <h3 class="pb-row-razoes__titulo ff-heading fs-italic fw-400 m-0"><?php echo esc_html($razao['titulo']); ?></h3>
              <figure class="pb-row-razoes__gif m-0">
                <img src="<?php echo esc_url($gif); ?>" alt="<?php echo esc_attr($razao['titulo']); ?>" loading="lazy" decoding="async" style="width:100%;aspect-ratio:1/1;object-fit:contain;display:block;">
              </figure>
              <p class="pb-row-razoes__texto m-0">
                <span class="pb-row-razoes__acento"><?php echo esc_html($razao['acento']); ?></span>
                <?php echo esc_html(' ' . $razao['texto']); ?>
              </p>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
        <div class="swiper-scrollbar"></div>
      </div>
    </div>
  </div>

  <?php /* SEÇÕES REMOVIDAS DA HOME — mover para páginas internas


  <!-- SEÇÃO 5: PAGE HEADING DIFERENCIAIS -->
  <div class="pb-row-wrapper position-relative pt-80 pb-40 pt-md-100 pb-md-60 pt-xl-130 pb-xl-80 mt-0 mb-0" style="--zindex:5">
    <header class="d-flex flex-column align-items-center pb-row container-fluid"
      data-scroll id="pb-row-page-heading-2" data-scroll-offset="80px,0" data-module-delay>
      <p class="fz-12 fz-md-14 fw-400 ta-center tt-uppercase m-0" style="letter-spacing:.15em;color:var(--color-gray-600)">Por que a Vertz</p>
      <h2 class="ff-body fz-28 fz-md-44 fz-xl-64 fw-400 lh-107 ls--4 ta-center m-0 mt-20 mt-md-30 mt-xl-40"
        data-splitting="wordsMask" data-scroll data-text-animation="slidein-by-lines"
        data-scroll-target="#pb-row-page-heading-2" data-scroll-offset="80px,0"
      >Tecnologia e design a serviço da <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0" data-splitting="chars">luz.</span></h2>
    </header>
  </div>


  <!-- SEÇÃO 6: FEATURES -->
  <div class="pb-row-wrapper position-relative pt-0 pb-80 pt-md-0 pb-md-100 pt-xl-0 pb-xl-130 mt-0 mb-0" style="--zindex:6">
    <div id="pb-row-features-1" class="pb-row pb-row-features container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20">
      <div class="pb-row-features__mediasContainer col-start-1 col-span-md-6 col-span-xl-12 row-start-md-1 overflow-clip" style="border-radius:12px;">
        <img src="<?php echo esc_url($feat_img); ?>" alt="Diferenciais Vertz Iluminação" loading="lazy" decoding="async" style="width:100%;aspect-ratio:3/4;object-fit:cover;display:block;">
      </div>
      <div class="pb-row-features__list col-start-1 col-start-md-7 col-span-md-6 col-span-xl-11 d-grid align-content-start grid-gap-0 pt-md-40">
        <?php foreach ($features as $f): ?>
        <div class="pb-row-features__feature" data-scroll data-scroll-offset="50px,0" data-module-delay>
          <div class="d-grid grid-gap-12" style="border-top:1px solid var(--color-gray-300);padding:1.75rem 0;">
            <h3 class="fz-18 fz-xl-22 fw-400 m-0"><?php echo esc_html($f['titulo']); ?></h3>
            <p class="fz-14 fz-xl-15 lh-155 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($f['texto']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
        <div style="padding-top:1.5rem;">
          <a href="<?php echo esc_url(home_url('/sobre')); ?>" class="fz-12 tt-uppercase fw-500 d-inline-flex align-items-center grid-gap-10" style="color:var(--color-dark);text-decoration:none;letter-spacing:0.12em;border-bottom:1px solid var(--color-dark);">Conheça a Vertz →</a>
        </div>
      </div>
    </div>
  </div>


  <!-- SEÇÃO 7: PARCEIROS -->
  <div class="pb-row-wrapper position-relative pt-40 pb-40 pt-md-60 pb-md-60 pt-xl-80 pb-xl-80 mt-0 mb-0" style="--zindex:7">
    <section class="pb-row pb-row-partners container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-md-12 grid-gap-xl-20" data-scroll data-scroll-offset="50px,0" data-module-delay>
      <header class="col-start-1 col-span-md-12 col-span-xl-24 mb-20 mb-md-30">
        <p class="fz-12 tt-uppercase m-0" style="letter-spacing:.15em;color:var(--color-gray-600)">Marcas que representamos</p>
      </header>
      <div class="pb-row-partners__wrap col-start-1 col-span-md-12 col-span-xl-24 overflow-clip">
        <div class="pb-row-partners__ticker d-flex align-items-center grid-gap-40 grid-gap-xl-60">
          <?php for ($i = 1; $i <= 5; $i++): ?>
          <div class="pb-row-partners__partner flex-shrink-0">
            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/logo-parceiro-0<?php echo $i; ?>.svg" alt="Parceiro <?php echo $i; ?>" loading="lazy" decoding="async" width="120" height="40" style="width:120px;height:40px;object-fit:contain;display:block;opacity:.55;filter:grayscale(1);transition:opacity .3s,filter .3s;">
          </div>
          <?php endfor; ?>
          <?php for ($i = 1; $i <= 5; $i++): ?>
          <div class="pb-row-partners__partner flex-shrink-0" aria-hidden="true">
            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/logo-parceiro-0<?php echo $i; ?>.svg" alt="" loading="lazy" decoding="async" width="120" height="40" style="width:120px;height:40px;object-fit:contain;display:block;opacity:.55;filter:grayscale(1);">
          </div>
          <?php endfor; ?>
        </div>
      </div>
    </section>
  </div>


  <!-- SEÇÃO 8: FAQ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-110 pb-xl-110 mt-0 mb-0" style="--zindex:8">
    <div class="pb-row pb-row-faqs container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20" data-scroll>
      <header class="col-start-1 col-span-md-12 col-span-xl-24 mb-50 mb-md-60" data-scroll data-scroll-offset="100px,0" data-module-delay>
        <h2 class="fz-28 fz-md-44 fz-xl-64 fw-400 ls--3 m-0" data-splitting="wordsMask" data-scroll data-text-animation="slidein-by-lines">
          Perguntas <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0">frequentes.</span>
        </h2>
      </header>
      <div class="pb-row-faqs__faqs col-start-1 col-span-md-12 col-span-xl-18 col-start-xl-4 d-grid grid-gap-0">
        <?php foreach ($faqs as $index => $faq): ?>
        <div class="pb-row-faqs__accordion" style="--index:<?php echo $index; ?>">
          <button class="pb-row-faqs__accordionBtn d-flex justify-content-between align-items-center w-100 fz-16 fz-xl-20 fw-400 m-0 py-20 py-xl-30" aria-expanded="false">
            <span><?php echo esc_html($faq['pergunta']); ?></span>
            <span class="pb-row-faqs__accordionIcon" aria-hidden="true">+</span>
          </button>
          <div class="pb-row-faqs__accordionContent" hidden>
            <p class="fz-14 fz-xl-16 lh-155 pb-20 pb-xl-30 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($faq['resposta']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>


  <!-- SEÇÃO 8.5: NÚMEROS -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 mt-0 mb-0" style="--zindex:8.5;background:var(--color-header-bg);">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <div class="vertz-divider mb-40 mb-md-60" data-scroll></div>
      <div class="d-grid grid-column-2 grid-column-md-4 grid-gap-30 grid-gap-xl-40" style="color:var(--color-white);">
        <div class="vertz-stat" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:0">
          <div class="vertz-stat__num" data-count="20" data-count-prefix="+" data-count-suffix=" anos"><span>+20</span> anos</div>
          <p class="vertz-stat__label m-0" style="color:rgba(255,255,255,0.4);">de mercado</p>
        </div>
        <div class="vertz-stat" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:1">
          <div class="vertz-stat__num" data-count="500" data-count-prefix="+"><span>+500</span></div>
          <p class="vertz-stat__label m-0" style="color:rgba(255,255,255,0.4);">projetos entregues</p>
        </div>
        <div class="vertz-stat" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:2">
          <div class="vertz-stat__num" data-count="80" data-count-suffix="%"><span>80%</span></div>
          <p class="vertz-stat__label m-0" style="color:rgba(255,255,255,0.4);">menos energia consumida</p>
        </div>
        <div class="vertz-stat" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:3">
          <div class="vertz-stat__num"><span>2</span></div>
          <p class="vertz-stat__label m-0" style="color:rgba(255,255,255,0.4);">showrooms — SP e Campinas</p>
        </div>
      </div>
    </div>
  </div>

  */ ?>

  <!-- SEÇÃO 9: CTA FINAL -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-110 pb-xl-110 mt-0 mb-0" style="--zindex:9">
    <div class="pb-row pb-row-contact container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20" data-scroll data-scroll-offset="50px,0" data-module-delay>
      <div class="col-start-1 col-span-md-5 col-span-xl-10 position-relative overflow-clip" style="border-radius:12px;">
        <img src="<?php echo esc_url($cta_foto); ?>" alt="Showroom Vertz Iluminação" loading="lazy" decoding="async" style="width:100%;aspect-ratio:4/5;object-fit:cover;display:block;">
      </div>
      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-12 d-flex flex-column justify-content-center grid-gap-30 grid-gap-xl-40 pt-40 pt-md-0">
        <p class="fz-12 tt-uppercase m-0" style="letter-spacing:.15em;color:var(--color-gray-600)">Fale com a gente</p>
        <h2 class="fz-28 fz-md-44 fz-xl-56 fw-400 ls--3 m-0" data-splitting="wordsMask" data-scroll data-text-animation="slidein-by-lines">
          <?php echo wp_kses_post($cta_titulo); ?>
        </h2>
        <p class="fz-14 fz-xl-16 lh-155 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($cta_corpo); ?></p>
        <div class="d-flex flex-column flex-md-row grid-gap-15">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default">
            <span class="btn__bg" aria-hidden="true"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar orçamento</span><span>Solicitar orçamento</span></span>
          </a>
          <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Ol%C3%A1!%20Vim%20pelo%20site%20e%20gostaria%20de%20um%20or%C3%A7amento." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);background:var(--color-primary);color:var(--color-dark);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
            <span class="btn__label" aria-hidden="true"><span>WhatsApp direto</span><span>WhatsApp direto</span></span>
          </a>
        </div>
      </div>
    </div>
  </div>

</div><!-- /single single-page -->
<?php get_footer(); ?>
