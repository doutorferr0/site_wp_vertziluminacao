<?php
/**
 * Template Name: Serviços
 * page-servicos.php — Vertz Iluminação
 */
get_header();

$theme_uri = get_template_directory_uri();
?>

<div class="single single-page" id="page-servicos">

  <!-- ============================================================
    SEÇÃO 1: PAGE HERO — Título + imagem de fundo
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-servicos" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="400">

      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll
            data-scroll-target="#pb-row-hero-servicos"
            data-scroll-progress="easeInCubic">
            <img
              src="<?php echo esc_url( $theme_uri ); ?>/assets/images/servicos-hero.jpg"
              alt="Serviços Vertz Iluminação"
              fetchpriority="high"
              decoding="async"
              style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;">
          </div>
        </div>
      </figure>

      <div class="pb-row-hero__titleWrap col-start-1 row-start-1 align-self-end container-fluid pb-30 pb-md-40 color-white position-relative overflow-clip">
        <h1 class="pb-row-hero__title ff-body fz-32 fz-md-44 fz-xl-64 fw-400 lh-none ls--3 m-0"
          data-scroll
          data-scroll-target="#pb-row-hero-servicos"
          data-scroll-progress
          data-splitting="charsWrapped"
        >O que fazemos.</h1>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 2: INTRO
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-120 pb-xl-120 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-scroll id="pb-row-servicos-intro" data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-10 col-span-xl-16 col-start-xl-5">
        <p class="fz-12 tt-uppercase m-0 mb-20 mb-md-30">Nossas soluções</p>
        <h2 class="ff-body fz-28 fz-md-44 fz-xl-56 fw-400 lh-107 ls--3 m-0 ta-center"
          data-splitting="wordsMask"
          data-scroll
          data-text-animation="slidein-by-lines"
          data-scroll-target="#pb-row-servicos-intro"
          data-scroll-offset="80px,0"
        >Iluminação sob medida para cada <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0" data-splitting="chars">necessidade.</span></h2>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 3: SERVIÇOS — Cards em grid
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-80 pt-md-0 pb-md-100 pt-xl-0 pb-xl-140 mt-0 mb-0" style="--zindex:3">
    <div class="pb-row container-fluid d-grid grid-column-1 grid-column-md-2 grid-column-xl-3 grid-gap-20 grid-gap-md-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <?php
      $servicos = [
        [
          'titulo'  => 'Iluminação Residencial',
          'desc'    => 'Soluções completas para residências de alto padrão — de spots e trilhos a perfis de LED embutidos, criamos ambientes que combinam conforto visual, elegância e eficiência energética.',
          'itens'   => [ 'Spots e downlights', 'Perfis LED embutidos', 'Iluminação de fachada', 'Automação via Dimmer/Tunable White' ],
          'img'     => 'servico-residencial.jpg',
          'index'   => 0,
        ],
        [
          'titulo'  => 'Iluminação Comercial',
          'desc'    => 'Ambientes comerciais que vendem mais. Desenvolvemos projetos de iluminação estratégica para lojas, showrooms, restaurantes e hotéis que destacam produtos e criam experiências únicas.',
          'itens'   => [ 'Trilhos e spots ajustáveis', 'Painéis e plafons LED', 'Iluminação de vitrine', 'Sistemas de controle cênico' ],
          'img'     => 'servico-comercial.jpg',
          'index'   => 1,
        ],
        [
          'titulo'  => 'Iluminação Corporativa',
          'desc'    => 'Escritórios modernos e produtivos com iluminação técnica de alta qualidade. Reduzimos o consumo energético em até 80% com soluções LED certificadas para ambientes de trabalho.',
          'itens'   => [ 'Luminárias de escritório certificadas', 'Controle de temperatura de cor', 'Sensores de presença e luz natural', 'Projetos LEED e certificações verdes' ],
          'img'     => 'servico-corporativo.jpg',
          'index'   => 2,
        ],
        [
          'titulo'  => 'Iluminação Industrial',
          'desc'    => 'Robustez e segurança para ambientes exigentes. Nossas luminárias industriais são projetadas para alta durabilidade, resistência a poeira e umidade (IP65+) e máxima eficiência luminosa.',
          'itens'   => [ 'High bay e low bay LED', 'Luminárias IP65/IP67', 'Iluminação de emergência', 'Projetos NR-17 compliant' ],
          'img'     => 'servico-industrial.jpg',
          'index'   => 3,
        ],
        [
          'titulo'  => 'Projetos Especiais',
          'desc'    => 'Museus, galerias, hospitais, estádios ou qualquer espaço com demanda única. Trabalhamos em parceria com arquitetos e engenheiros para criar soluções de iluminação exclusivas.',
          'itens'   => [ 'Iluminação museal e de arte', 'Saúde e ambientes hospitalares', 'Arenas e espaços esportivos', 'Iluminação de monumentos' ],
          'img'     => 'servico-especial.jpg',
          'index'   => 4,
        ],
        [
          'titulo'  => 'Consultoria e Projeto',
          'desc'    => 'Do briefing ao memorial descritivo. Nossa equipe técnica elabora projetos luminotécnicos completos com cálculo de iluminância, renderização 3D e especificação de produtos.',
          'itens'   => [ 'Projeto luminotécnico (DIALux/Relux)', 'Memorial descritivo e quantitativo', 'Renderização e visualização 3D', 'Acompanhamento de obra' ],
          'img'     => 'servico-consultoria.jpg',
          'index'   => 5,
        ],
      ];

      foreach ( $servicos as $s ) : ?>
      <article class="pb-row-servico d-grid grid-gap-20 grid-gap-xl-30"
        data-scroll data-scroll-offset="60px,0" data-module-delay
        style="--index:<?php echo $s['index']; ?>">

        <figure class="m-0 overflow-clip">
          <img
            src="<?php echo esc_url( $theme_uri ); ?>/assets/images/<?php echo esc_attr( $s['img'] ); ?>"
            alt="<?php echo esc_attr( $s['titulo'] ); ?> — Vertz Iluminação"
            loading="lazy"
            decoding="async"
            style="width:100%;aspect-ratio:4/3;object-fit:cover;display:block;">
        </figure>

        <div class="d-grid grid-gap-15 pb-30 border-bottom">
          <h2 class="fz-22 fz-xl-28 fw-400 ls--2 m-0"><?php echo esc_html( $s['titulo'] ); ?></h2>
          <p class="fz-14 fz-xl-16 lh-142 m-0"><?php echo esc_html( $s['desc'] ); ?></p>
          <ul class="list-none m-0 p-0 d-grid grid-gap-8">
            <?php foreach ( $s['itens'] as $item ) : ?>
            <li class="fz-13 fz-xl-14 lh-142 d-flex align-items-start grid-gap-10">
              <span aria-hidden="true" style="margin-top:2px;flex-shrink:0;">→</span>
              <?php echo esc_html( $item ); ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>

      </article>
      <?php endforeach; ?>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 4: PROCESSO — Como trabalhamos
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-120 pb-xl-120 mt-0 mb-0" style="--zindex:4;background:var(--color-gray-100, #f5f5f5)">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <header class="mb-50 mb-md-70">
        <p class="fz-12 tt-uppercase m-0 mb-15">Como trabalhamos</p>
        <h2 class="ff-body fz-28 fz-md-44 fz-xl-56 fw-400 ls--3 m-0"
          data-splitting="wordsMask"
          data-scroll
          data-text-animation="slidein-by-lines"
        >Processo simples, resultado <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0">extraordinário.</span></h2>
      </header>

      <div class="d-grid grid-column-2 grid-column-md-4 grid-gap-20 grid-gap-xl-40">

        <?php
        $processo = [
          [ 'num' => '01', 'titulo' => 'Briefing', 'desc' => 'Entendemos o projeto, o espaço, o estilo e os objetivos do cliente antes de qualquer proposta.' ],
          [ 'num' => '02', 'titulo' => 'Projeto',  'desc' => 'Elaboramos o projeto luminotécnico com cálculos, especificação de produtos e visualização 3D.' ],
          [ 'num' => '03', 'titulo' => 'Proposta',  'desc' => 'Apresentamos o quantitativo, cronograma e investimento de forma transparente e detalhada.' ],
          [ 'num' => '04', 'titulo' => 'Entrega',   'desc' => 'Fornecemos os produtos, acompanhamos a instalação e garantimos o resultado final do projeto.' ],
        ];
        foreach ( $processo as $i => $etapa ) : ?>
        <div class="d-grid grid-gap-20" data-scroll data-scroll-offset="50px,0" data-module-delay style="--delay:<?php echo $i * 100; ?>ms">
          <strong class="fz-40 fz-xl-56 fw-400 lh-none ls--3 color-red"><?php echo esc_html( $etapa['num'] ); ?></strong>
          <div class="d-grid grid-gap-10 border-top pt-20">
            <h3 class="fz-18 fz-xl-22 fw-400 m-0"><?php echo esc_html( $etapa['titulo'] ); ?></h3>
            <p class="fz-14 fz-xl-15 lh-142 m-0"><?php echo esc_html( $etapa['desc'] ); ?></p>
          </div>
        </div>
        <?php endforeach; ?>

      </div>
    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 5: CTA — Chamada para contato
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-140 pb-xl-140 mt-0 mb-0" style="--zindex:5">
    <div class="pb-row container-fluid d-flex flex-column align-items-center ta-center"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <p class="fz-12 tt-uppercase m-0 mb-20">Pronto para começar?</p>
      <h2 class="ff-body fz-28 fz-md-44 fz-xl-64 fw-400 ls--3 m-0 mb-40 mb-xl-60"
        data-splitting="wordsMask"
        data-scroll
        data-text-animation="slidein-by-lines"
      >Solicite um <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0">orçamento.</span></h2>
      <a href="<?php echo esc_url( home_url('/contato') ); ?>" class="btn --cta --cta-default" aria-label="Solicitar orçamento">
        <span class="btn__bg" aria-hidden="true"></span>
        <span class="btn__label" aria-hidden="true">Solicitar orçamento</span>
      </a>

    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
