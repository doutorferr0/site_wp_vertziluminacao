<?php
/**
 * front-page.php — Vertz Iluminação
 */
get_header();

$theme_uri = get_template_directory_uri();
?>

<div class="single single-page" id="page-home">

  <!-- ============================================================
    SEÇÃO 1: HERO — Vídeo fullscreen + título
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 pt-md-0 pb-md-0 pt-lg-0 pb-lg-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-1" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="550">

      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll
            data-scroll-target="#pb-row-hero-1"
            data-scroll-progress="easeInCubic">
            <?php
            $video_path = get_template_directory() . '/assets/images/hero-video.mp4';
            $poster_path = get_template_directory() . '/assets/images/hero-poster.jpg';
            $poster_attr = file_exists( $poster_path )
              ? 'poster="' . esc_url( $theme_uri ) . '/assets/images/hero-poster.jpg"'
              : '';
            if ( file_exists( $video_path ) ) : ?>
            <video
              class="w-100 pb-row-hero__video"
              autoplay muted loop playsinline preload="none"
              <?php echo $poster_attr; ?>
              style="aspect-ratio:16/9;object-fit:cover;display:block;">
              <source src="<?php echo esc_url( $theme_uri ); ?>/assets/images/hero-video.mp4" type="video/mp4">
            </video>
            <?php else : ?>
            <div class="pb-row-hero__videoFallback" style="width:100%;aspect-ratio:16/9;background:var(--color-header-bg);display:block;"></div>
            <?php endif; ?>
          </div>
        </div>
      </figure>

      <div class="pb-row-hero__titleWrap col-start-1 row-start-1 align-self-end container-fluid pb-30 pb-md-40 color-white position-relative overflow-clip">
        <h1 class="pb-row-hero__title ff-body fz-32 fz-md-44 fz-xl-64 fw-400 lh-none ls--3 m-0"
          data-scroll
          data-scroll-target="#pb-row-hero-1"
          data-scroll-progress
          data-splitting="charsWrapped"
        >Lorem ipsum, lux semper.</h1>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 2: PAGE HEADING — Chamada principal
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-40 pb-40 pt-md-50 pb-md-60 pt-xl-100 pb-xl-110 mt-0 mb-0 --layout-pb-row-page-heading" style="--zindex:2">
    <header class="page-heading d-flex flex-column align-items-center pb-row pb-row-page-heading container-fluid"
      data-scroll id="pb-row-page-heading-1" data-scroll-offset="80px,0" data-module-delay>

      <div class="page-heading__subtitleWrap">
        <p class="page-heading__subtitle fz-12 fz-md-14 fw-400 lh-116 lh-md-none ta-center tt-uppercase m-0">O que fazemos</p>
      </div>

      <h2 class="page-heading__title ff-body fz-28 fz-md-44 fz-xl-64 fw-400 lh-107 lh-md-none lh-xl-93 ls--4 ta-center m-0 mt-20 mt-md-30 mt-xl-40"
        data-splitting="wordsMask"
        data-scroll
        data-text-animation="slidein-by-lines"
        data-scroll-target="#pb-row-page-heading-1"
        data-scroll-offset="80px,0"
      >Soluções em iluminação para ambientes <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0" data-splitting="chars">únicos.</span></h2>

      <div class="page-heading__text fz-14 fz-md-16 fz-xl-18 lh-142 lh-md-150 lh-xl-133 ta-center wysiwyg mt-24 mt-md-30 mt-xl-60">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Produzimos iluminação de alto desempenho que transforma qualquer espaço em uma experiência visual extraordinária.</p>
      </div>

    </header>
  </div>


  <!-- ============================================================
    SEÇÃO 3: GALERIA DE MÍDIAS — Slider de imagens
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-medias-gallery" style="--zindex:3">
    <div id="pb-row-medias-gallery-1"
      class="pb-row pb-row-medias-gallery container-fluid d-grid grid-column-md-12 grid-column-xl-24 column-gap-12 column-gap-xl-20 row-gap-12 row-gap-md-20 --layout-bottom"
      data-scroll data-module="pb-row-medias-gallery">

      <header class="pb-row-medias-gallery__header col-start-1 col-span-md-6 col-span-xl-18 d-grid grid-column-xl-18 grid-gap-12 grid-gap-md-20"
        data-scroll data-scroll-offset="100px,0" data-module-delay data-module-delay-increment="250">

        <h2 class="pb-row-medias-gallery__title col-start-1 col-span-xl-11 ff-body fz-20 fz-md-32 fz-xl-48 fw-400 lh-110 lh-md-none ls--3 m-0"
          data-splitting="wordsMask" data-scroll data-text-animation="slidein-by-lines"
          data-scroll-target="#pb-row-medias-gallery-1 .pb-row-medias-gallery__header"
          data-scroll-offset="100px,0"
        >Iluminação para<br>cada <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0" data-splitting="chars">ambiente</span>.</h2>

        <div class="pb-row-medias-gallery__text col-start-1 col-start-xl-13 col-span-xl-6 fz-14 lh-142 gray-600 wysiwyg">
          <p>Desenvolvida para se adaptar a qualquer projeto, nossa linha de produtos ilumina do residencial ao comercial com eficiência e elegância.</p>
        </div>

      </header>

      <div class="pb-row-medias-gallery__wrapper col-start-1 col-span-md-12 col-span-xl-24 row-start-2"
        data-scroll data-module-delay data-module-delay-increment="250" data-scroll-offset="100px,0">

        <div class="pb-row-medias-gallery__clip w-100 d-grid"
          data-scroll data-scroll-call="pb-row-medias-gallery__clip"
          data-scroll-repeat="true" data-scroll-progress data-scroll-offset="0,100%">

          <div class="pb-row-medias-gallery__medias col-start-1 row-start-1 w-100 swiper box-widescreen z-1"
            data-scroll data-scroll-call="pb-row-medias-gallery" data-scroll-repeat="true">
            <div class="swiper-wrapper">

              <figure class="pb-row-medias-gallery__media swiper-slide position-relative">
                <div class="pb-row-medias-gallery__mediaWrap position-absolute t-0 l-0 w-100 h-100">
                  <img
                    src="<?php echo esc_url( $theme_uri ); ?>/assets/images/gallery-01.jpg"
                    alt="Projeto residencial Vertz Iluminação"
                    loading="lazy"
                    decoding="async"
                    style="width:100%;height:100%;object-fit:cover;display:block;">
                </div>
              </figure>

              <figure class="pb-row-medias-gallery__media swiper-slide position-relative">
                <div class="pb-row-medias-gallery__mediaWrap position-absolute t-0 l-0 w-100 h-100">
                  <img
                    src="<?php echo esc_url( $theme_uri ); ?>/assets/images/gallery-02.jpg"
                    alt="Projeto comercial Vertz Iluminação"
                    loading="lazy"
                    decoding="async"
                    style="width:100%;height:100%;object-fit:cover;display:block;">
                </div>
              </figure>

            </div>
          </div>

          <nav class="pb-row-medias-gallery__tags col-start-1 row-start-1 align-self-end justify-self-start justify-self-md-center d-flex align-items-center position-relative z-2 p-12 p-md-20">
            <button class="btn pb-row-medias-gallery__tag --tag" aria-current="true" style="--index:0" aria-label="Residencial">
              <span class="btn__bg" aria-hidden="true"></span>
              <span class="btn__label" aria-hidden="true" data-title="Residencial">Residencial</span>
            </button>
            <button class="btn pb-row-medias-gallery__tag --tag" aria-current="false" style="--index:1" aria-label="Comercial">
              <span class="btn__bg" aria-hidden="true"></span>
              <span class="btn__label" aria-hidden="true" data-title="Comercial">Comercial</span>
            </button>
          </nav>

        </div>
      </div>

      <div class="pb-row-medias-gallery__pagination col-start-1 row-start-3 align-self-start justify-self-end d-flex align-items-center grid-gap-12 d-md-none"
        data-scroll data-module-delay data-module-delay-increment="150">
        <div class="pb-row-medias-gallery__bullets d-flex align-items-center">
          <button class="pb-row-medias-gallery__bullet swiper-pagination-bullet swiper-pagination-bullet-active" aria-label="Slide 1" style="--index:0"></button>
          <button class="pb-row-medias-gallery__bullet swiper-pagination-bullet" aria-label="Slide 2" style="--index:1"></button>
        </div>
        <span class="pb-row-medias-gallery__counter d-block fz-10 lh-none color-red" data-label="%/2" style="--index:2">1/2</span>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 4: PRODUTOS
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-50 pb-70 pt-md-80 pb-md-60 pt-xl-110 pb-xl-60 mt-0 mb-0 --layout-pb-row-house-models" style="--zindex:4">
    <div id="pb-row-house-models-1"
      class="pb-row pb-row-house-models container-fluid d-grid grid-column-md-2 grid-column-xl-24 align-items-md-start grid-gap-30 grid-gap-md-12 grid-gap-xl-20"
      data-module="pb-row-house-models">

      <aside class="pb-row-house-models__house col-start-xl-1 col-span-xl-11 d-grid grid-gap-15 grid-gap-xl-20 position-relative">
        <img
          src="<?php echo esc_url( $theme_uri ); ?>/assets/images/produto-residencial.jpg"
          alt="Linha Residencial Vertz — Spots, Pendentes e Perfis LED"
          loading="lazy"
          decoding="async"
          style="width:100%;aspect-ratio:3/2;object-fit:cover;display:block;">
        <div class="d-grid grid-gap-10">
          <h3 class="fz-20 fz-xl-28 fw-400 m-0">Linha Residencial</h3>
          <p class="fz-14 fz-xl-16 lh-142 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Iluminação elegante para ambientes residenciais internos e externos.</p>
          <p class="fz-12 tt-uppercase m-0">Spots · Pendentes · Perfis LED</p>
        </div>
      </aside>

      <aside class="pb-row-house-models__house col-start-xl-13 col-span-xl-11 d-grid grid-gap-15 grid-gap-xl-20 position-relative">
        <img
          src="<?php echo esc_url( $theme_uri ); ?>/assets/images/produto-comercial.jpg"
          alt="Linha Comercial Vertz — Trilhos, Luminárias embutidas e Painéis"
          loading="lazy"
          decoding="async"
          style="width:100%;aspect-ratio:3/2;object-fit:cover;display:block;">
        <div class="d-grid grid-gap-10">
          <h3 class="fz-20 fz-xl-28 fw-400 m-0">Linha Comercial</h3>
          <p class="fz-14 fz-xl-16 lh-142 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Soluções de iluminação para lojas, escritórios e espaços públicos.</p>
          <p class="fz-12 tt-uppercase m-0">Trilhos · Luminárias embutidas · Painéis</p>
        </div>
      </aside>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 4.5: 10 RAZÕES PARA VERTZ — Cards slider
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-50 pb-50 pt-md-80 pb-md-80 pt-xl-110 pb-xl-110 mt-0 mb-0" style="--zindex:4.5;background:var(--color-surface);">
    <div id="pb-row-razoes-1"
      class="pb-row pb-row-razoes"
      data-scroll data-scroll-offset="100px,0" data-module-delay>

      <!-- Cabeçalho -->
      <header class="container-fluid mb-40 mb-md-60" data-scroll data-scroll-offset="80px,0" data-module-delay>
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600)">Por que escolher a Vertz</p>
        <h2 class="ff-body fz-28 fz-md-44 fz-xl-56 fw-400 ls--3 m-0">
          10 razões para <span class="title-highlight --font-heading --fs-italic">iluminar</span> com a Vertz.
        </h2>
      </header>

      <!-- Slider -->
      <div class="pb-row-razoes__slider swiper">
        <div class="pb-row-razoes__sliderWrap swiper-wrapper">

          <?php
          $razoes = [
            [ 'titulo' => 'Experiência comprovada',          'gif' => 'razoes-01.gif', 'acento' => 'Mais de 20 anos no mercado,',           'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Projeto luminotécnico completo',  'gif' => 'razoes-02.gif', 'acento' => 'Do briefing ao memorial descritivo,',   'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Marcas exclusivas',               'gif' => 'razoes-03.gif', 'acento' => 'Revendedor exclusivo de marcas premium,','texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Eficiência energética real',      'gif' => 'razoes-04.gif', 'acento' => 'Redução de até 80% no consumo,',         'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Soluções sob medida',             'gif' => 'razoes-05.gif', 'acento' => 'Cada projeto é único,',                 'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Acompanhamento de obra',          'gif' => 'razoes-06.gif', 'acento' => 'Nossa equipe técnica acompanha',        'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Parceria com arquitetos',         'gif' => 'razoes-07.gif', 'acento' => 'Trabalhamos lado a lado com',           'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Showrooms em SP e Campinas',      'gif' => 'razoes-08.gif', 'acento' => 'Visite nossos showrooms modernos',      'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Tecnologia e design juntos',      'gif' => 'razoes-09.gif', 'acento' => 'Unimos alta performance técnica',       'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
            [ 'titulo' => 'Garantia e suporte técnico',      'gif' => 'razoes-10.gif', 'acento' => 'Dois anos de garantia',                 'texto' => 'lorem ipsum dolor sit amet consectetur adipiscing elit sed do eiusmod tempor incididunt ut labore.' ],
          ];
          foreach ( $razoes as $index => $razao ) : ?>

          <div class="pb-row-razoes__slide swiper-slide" style="--index:<?php echo $index; ?>">
            <div class="pb-row-razoes__card">

              <!-- Título em itálico -->
              <h3 class="pb-row-razoes__titulo ff-heading fs-italic fw-400 m-0">
                <?php echo esc_html( $razao['titulo'] ); ?>
              </h3>

              <!-- GIF central -->
              <figure class="pb-row-razoes__gif m-0">
                <img
                  src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/<?php echo esc_attr( $razao['gif'] ); ?>"
                  alt="<?php echo esc_attr( $razao['titulo'] ); ?>"
                  loading="lazy"
                  decoding="async"
                  style="width:100%;aspect-ratio:1/1;object-fit:contain;display:block;">
              </figure>

              <!-- Texto -->
              <p class="pb-row-razoes__texto m-0">
                <span class="pb-row-razoes__acento"><?php echo esc_html( $razao['acento'] ); ?></span>
                <?php echo esc_html( ' ' . $razao['texto'] ); ?>
              </p>

            </div>
          </div>

          <?php endforeach; ?>

        </div>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 5: PAGE HEADING — Diferenciais
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-40 pb-40 pt-md-50 pb-md-60 pt-xl-100 pb-xl-100 mt-0 mb-0 --layout-pb-row-page-heading" style="--zindex:5">
    <header class="page-heading d-flex flex-column align-items-center pb-row pb-row-page-heading container-fluid"
      data-scroll id="pb-row-page-heading-2" data-scroll-offset="80px,0" data-module-delay>

      <div class="page-heading__subtitleWrap">
        <p class="page-heading__subtitle fz-12 fz-md-14 fw-400 ta-center tt-uppercase m-0">Por que a Vertz</p>
      </div>

      <h2 class="page-heading__title ff-body fz-28 fz-md-44 fz-xl-64 fw-400 lh-107 lh-md-none ls--4 ta-center m-0 mt-20 mt-md-30 mt-xl-40"
        data-splitting="wordsMask" data-scroll data-text-animation="slidein-by-lines"
        data-scroll-target="#pb-row-page-heading-2" data-scroll-offset="80px,0"
      >Tecnologia e design a serviço da <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0" data-splitting="chars">luz.</span></h2>

    </header>
  </div>


  <!-- ============================================================
    SEÇÃO 6: FEATURES — Diferenciais
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-60 pt-md-0 pb-md-80 pt-xl-0 pb-xl-110 mt-0 mb-0 --layout-pb-row-features" style="--zindex:6">
    <div id="pb-row-features-1"
      class="pb-row pb-row-features container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-module="pb-row-features">

      <div class="pb-row-features__mediasContainer col-start-1 col-span-md-6 col-span-xl-12 row-start-md-1">
        <img
          src="<?php echo esc_url( $theme_uri ); ?>/assets/images/features-destaque.jpg"
          alt="Diferenciais Vertz Iluminação"
          loading="lazy"
          decoding="async"
          style="width:100%;aspect-ratio:3/4;object-fit:cover;display:block;">
      </div>

      <div class="pb-row-features__list col-start-1 col-start-md-7 col-span-md-6 col-span-xl-11 d-grid align-content-start grid-gap-30 grid-gap-xl-40 pt-md-40">

        <div class="pb-row-features__feature" data-scroll data-scroll-offset="50px,0" data-module-delay>
          <div class="pb-row-features__featureWrap d-grid grid-gap-15">
            <h3 class="pb-row-features__title fz-18 fz-xl-24 fw-400 m-0">Eficiência energética</h3>
            <p class="pb-row-features__text fz-14 fz-xl-16 lh-142 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nossas luminárias LED consomem até 80% menos energia que sistemas convencionais.</p>
          </div>
        </div>

        <div class="pb-row-features__feature" data-scroll data-scroll-offset="50px,0" data-module-delay>
          <div class="pb-row-features__featureWrap d-grid grid-gap-15">
            <h3 class="pb-row-features__title fz-18 fz-xl-24 fw-400 m-0">Design personalizável</h3>
            <p class="pb-row-features__text fz-14 fz-xl-16 lh-142 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cada projeto é desenvolvido com atenção ao detalhe e às necessidades do cliente.</p>
          </div>
        </div>

        <div class="pb-row-features__feature" data-scroll data-scroll-offset="50px,0" data-module-delay>
          <div class="pb-row-features__featureWrap d-grid grid-gap-15">
            <h3 class="pb-row-features__title fz-18 fz-xl-24 fw-400 m-0">Instalação rápida</h3>
            <p class="pb-row-features__text fz-14 fz-xl-16 lh-142 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sistemas modulares que facilitam a instalação e manutenção em qualquer ambiente.</p>
          </div>
        </div>

      </div>
    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 7: PARCEIROS
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-40 pb-40 pt-md-60 pb-md-60 pt-xl-80 pb-xl-80 mt-0 mb-0" style="--zindex:7">
    <section id="pb_row_partners-1"
      class="pb-row pb-row-partners container-fluid position-relative d-grid grid-column-md-12 grid-column-xl-24 grid-gap-md-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="50px,0" data-module-delay style="--length:5">

      <header class="col-start-1 col-span-md-12 col-span-xl-24 mb-20 mb-md-30">
        <p class="fz-12 tt-uppercase m-0">Parceiros &amp; Certificações</p>
      </header>

      <div class="pb-row-partners__wrap col-start-1 col-span-md-12 col-span-xl-24 overflow-clip">
        <div class="pb-row-partners__ticker d-flex align-items-center grid-gap-40 grid-gap-xl-60">
          <?php for ( $i = 1; $i <= 5; $i++ ) : ?>
          <div class="pb-row-partners__partner flex-shrink-0" style="--index:<?php echo $i - 1; ?>">
            <img
              src="<?php echo esc_url( $theme_uri ); ?>/assets/images/logo-parceiro-0<?php echo $i; ?>.svg"
              alt="Parceiro <?php echo $i; ?>"
              loading="lazy"
              decoding="async"
              width="120"
              height="40"
              style="width:120px;height:40px;object-fit:contain;display:block;">
          </div>
          <?php endfor; ?>
        </div>
      </div>

    </section>
  </div>


  <!-- ============================================================
    SEÇÃO 8: FAQ
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-110 pb-xl-110 mt-0 mb-0" style="--zindex:8">
    <div id="pb-row-faqs-1"
      class="pb-row pb-row-faqs container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-scroll>

      <header class="pb-row-faqs__header col-start-1 col-span-md-12 col-span-xl-24 mb-50 mb-md-60 mb-xl-130"
        data-scroll data-scroll-offset="100px,0" data-module-delay>
        <h2 class="pb-row-faqs__title fz-28 fz-md-44 fz-xl-64 fw-400 ls--3 m-0"
          data-splitting="wordsMask" data-scroll data-text-animation="slidein-by-lines"
        >Perguntas <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0">frequentes.</span></h2>
      </header>

      <div class="pb-row-faqs__faqs col-start-1 col-span-md-12 col-span-xl-18 col-start-xl-4 d-grid grid-gap-0">
        <?php
        $faqs = [
          [
            'q' => 'Quais tipos de projetos a Vertz atende?',
            'a' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Atendemos projetos residenciais, comerciais, industriais e de arquitetura de luz para eventos e espaços públicos.',
          ],
          [
            'q' => 'Vocês fazem projetos personalizados?',
            'a' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sim, trabalhamos com projetos sob medida, adaptando nossa linha de produtos às necessidades específicas de cada cliente e arquiteto.',
          ],
          [
            'q' => 'Qual o prazo médio de entrega dos produtos?',
            'a' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. O prazo varia conforme o projeto, mas nossa linha padrão tem entrega de 5 a 10 dias úteis para todo o Brasil.',
          ],
          [
            'q' => 'Os produtos possuem garantia?',
            'a' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Todos os nossos produtos possuem garantia de 2 anos contra defeitos de fabricação, com suporte técnico especializado.',
          ],
        ];

        foreach ( $faqs as $index => $faq ) : ?>
        <div class="pb-row-faqs__accordion" style="--index:<?php echo $index; ?>">
          <button class="pb-row-faqs__accordionBtn d-flex justify-content-between align-items-center w-100 fz-16 fz-xl-20 fw-400 m-0 py-20 py-xl-30" aria-expanded="false">
            <span><?php echo esc_html( $faq['q'] ); ?></span>
            <span class="pb-row-faqs__accordionIcon" aria-hidden="true">+</span>
          </button>
          <div class="pb-row-faqs__accordionContent" hidden>
            <p class="fz-14 fz-xl-16 lh-142 pb-20 pb-xl-30 m-0"><?php echo esc_html( $faq['a'] ); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 9: CONTATO — CTA final
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-110 pb-xl-110 mt-0 mb-0" style="--zindex:9">
    <div id="pb-row-contact-1"
      class="pb-row pb-row-contact container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="50px,0" data-module-delay>

      <div class="pb-row-contact__imgWrap col-start-1 col-span-md-5 col-span-xl-10 position-relative overflow-clip">
        <img
          src="<?php echo esc_url( $theme_uri ); ?>/assets/images/contato-foto.jpg"
          alt="Fale com a Vertz Iluminação"
          loading="lazy"
          decoding="async"
          style="width:100%;aspect-ratio:4/5;object-fit:cover;display:block;">
      </div>

      <div class="pb-row-contact__wrapper col-start-1 col-start-md-7 col-span-md-6 col-span-xl-12 d-flex flex-column justify-content-center grid-gap-30 grid-gap-xl-40 pt-40 pt-md-0">

        <div class="pb-row-contact__subtitleWrap">
          <p class="fz-12 tt-uppercase m-0">Fale com a gente</p>
        </div>

        <h2 class="fz-28 fz-md-44 fz-xl-56 fw-400 ls--3 m-0"
          data-splitting="wordsMask" data-scroll data-text-animation="slidein-by-lines"
        >Vamos iluminar o seu <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0">projeto.</span></h2>

        <p class="fz-14 fz-xl-16 lh-142 m-0">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Entre em contato e um de nossos consultores retornará em até 24 horas úteis.</p>

        <div class="pb-row-contact__form">
          <?php
          // Substituir pelo shortcode do seu plugin de formulário:
          // echo do_shortcode('[contact-form-7 id="SEU_ID"]');
          // echo do_shortcode('[wpforms id="SEU_ID"]');
          ?>
          <div style="padding:30px;background:#f5f5f5;border-radius:4px;">
            <p style="font-size:13px;color:#999;margin:0;text-align:center;">
              FORMULÁRIO DE CONTATO<br>
              <small>Instalar Contact Form 7 e substituir este bloco pelo <code>do_shortcode()</code></small>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>