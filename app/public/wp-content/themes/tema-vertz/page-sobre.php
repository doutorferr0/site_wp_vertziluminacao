<?php
/**
 * Template Name: Sobre
 * page-sobre.php — Vertz Iluminação
 */
get_header();

$theme_uri = get_template_directory_uri();
?>

<div class="single single-page" id="page-sobre">

  <!-- ============================================================
    SEÇÃO 1: PAGE HERO — Título + imagem de fundo
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-sobre" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="400">

      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll
            data-scroll-target="#pb-row-hero-sobre"
            data-scroll-progress="easeInCubic">
            <img
              src="<?php echo esc_url( $theme_uri ); ?>/assets/images/sobre-hero.jpg"
              alt="Vertz Iluminação — Nossa história"
              fetchpriority="high"
              decoding="async"
              style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;">
          </div>
        </div>
      </figure>

      <div class="pb-row-hero__titleWrap col-start-1 row-start-1 align-self-end container-fluid pb-30 pb-md-40 color-white position-relative overflow-clip">
        <h1 class="pb-row-hero__title ff-body fz-32 fz-md-44 fz-xl-64 fw-400 lh-none ls--3 m-0"
          data-scroll
          data-scroll-target="#pb-row-hero-sobre"
          data-scroll-progress
          data-splitting="charsWrapped"
        >Quem somos.</h1>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 2: INTRO — Chamada da empresa
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-120 pb-xl-120 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-scroll id="pb-row-sobre-intro" data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-10 col-span-xl-18 col-start-xl-4">
        <p class="fz-12 tt-uppercase m-0 mb-20 mb-md-30">Nossa história</p>
        <h2 class="ff-body fz-28 fz-md-44 fz-xl-56 fw-400 lh-107 ls--3 m-0"
          data-splitting="wordsMask"
          data-scroll
          data-text-animation="slidein-by-lines"
          data-scroll-target="#pb-row-sobre-intro"
          data-scroll-offset="80px,0"
        >Mais de uma década iluminando projetos com <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0" data-splitting="chars">propósito.</span></h2>
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-10 col-start-xl-13 mt-30 mt-md-0 d-flex align-items-md-end">
        <div class="wysiwyg fz-14 fz-md-16 fz-xl-18 lh-142 lh-md-150">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. A Vertz Iluminação nasceu da paixão por transformar espaços através da luz — unindo tecnologia de ponta, design contemporâneo e eficiência energética em cada projeto.</p>
          <p>Desde a nossa fundação, atendemos arquitetos, designers de interiores e construtoras em todo o Brasil, desenvolvendo soluções que vão do residencial de alto padrão ao complexo comercial e industrial.</p>
        </div>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 3: NÚMEROS — Stats da empresa
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 mt-0 mb-0" style="--zindex:3;background:var(--color-gray-100, #f5f5f5)">
    <div class="pb-row container-fluid d-grid grid-column-2 grid-column-md-4 grid-column-xl-4 grid-gap-20 grid-gap-xl-40"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <?php
      $stats = [
        [ 'number' => '+10',  'label' => 'anos de mercado' ],
        [ 'number' => '+500', 'label' => 'projetos entregues' ],
        [ 'number' => '+20',  'label' => 'estados atendidos' ],
        [ 'number' => '80%',  'label' => 'menos energia consumida' ],
      ];
      foreach ( $stats as $i => $stat ) : ?>
      <div class="d-flex flex-column grid-gap-10" data-scroll data-scroll-offset="50px,0" data-module-delay style="--delay:<?php echo $i * 100; ?>ms">
        <strong class="fz-40 fz-md-56 fz-xl-72 fw-400 lh-none ls--3"><?php echo esc_html( $stat['number'] ); ?></strong>
        <p class="fz-13 fz-xl-14 tt-uppercase lh-142 m-0"><?php echo esc_html( $stat['label'] ); ?></p>
      </div>
      <?php endforeach; ?>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 4: SPLIT — Imagem + texto missão/valores
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 pt-xl-120 pb-xl-120 mt-0 mb-0" style="--zindex:4">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20 align-items-md-center"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-5 col-span-xl-10 position-relative overflow-clip">
        <img
          src="<?php echo esc_url( $theme_uri ); ?>/assets/images/sobre-missao.jpg"
          alt="Missão Vertz Iluminação"
          loading="lazy"
          decoding="async"
          style="width:100%;aspect-ratio:3/4;object-fit:cover;display:block;">
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-12 d-flex flex-column grid-gap-40 grid-gap-xl-60 pt-40 pt-md-0">

        <?php
        $valores = [
          [
            'titulo' => 'Missão',
            'texto'  => 'Desenvolver soluções de iluminação que transformem espaços, priorizando eficiência energética, durabilidade e design inovador em cada projeto.',
          ],
          [
            'titulo' => 'Visão',
            'texto'  => 'Ser referência nacional em iluminação técnica e arquitetônica, reconhecidos pela excelência nos projetos e pelo impacto positivo nos ambientes que iluminamos.',
          ],
          [
            'titulo' => 'Valores',
            'texto'  => 'Inovação contínua, responsabilidade ambiental, compromisso com a qualidade e parceria genuína com cada cliente — do briefing à entrega final.',
          ],
        ];
        foreach ( $valores as $index => $valor ) : ?>
        <div class="d-grid grid-gap-15" data-scroll data-scroll-offset="50px,0" data-module-delay>
          <h3 class="fz-10 fz-xl-12 tt-uppercase fw-400 m-0"><?php echo esc_html( $valor['titulo'] ); ?></h3>
          <p class="fz-20 fz-md-24 fz-xl-32 fw-400 lh-120 ls--1 m-0"><?php echo esc_html( $valor['texto'] ); ?></p>
        </div>
        <?php endforeach; ?>

      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 5: GALERIA — Projetos em destaque
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0" style="--zindex:5">
    <div class="pb-row container-fluid d-grid grid-column-2 grid-column-md-3 grid-gap-8 grid-gap-md-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <?php
      $gallery_sobre = [
        [ 'img' => 'sobre-galeria-01.jpg', 'alt' => 'Projeto residencial Vertz' ],
        [ 'img' => 'sobre-galeria-02.jpg', 'alt' => 'Projeto comercial Vertz' ],
        [ 'img' => 'sobre-galeria-03.jpg', 'alt' => 'Projeto arquitetônico Vertz' ],
      ];
      foreach ( $gallery_sobre as $i => $item ) : ?>
      <figure class="m-0 overflow-clip" data-scroll data-scroll-offset="50px,0" data-module-delay style="--delay:<?php echo $i * 150; ?>ms">
        <img
          src="<?php echo esc_url( $theme_uri ); ?>/assets/images/<?php echo esc_attr( $item['img'] ); ?>"
          alt="<?php echo esc_attr( $item['alt'] ); ?>"
          loading="lazy"
          decoding="async"
          style="width:100%;aspect-ratio:3/4;object-fit:cover;display:block;">
      </figure>
      <?php endforeach; ?>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 6: CTA — Chamada para contato
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-140 pb-xl-140 mt-0 mb-0" style="--zindex:6">
    <div class="pb-row container-fluid d-flex flex-column align-items-center ta-center"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <p class="fz-12 tt-uppercase m-0 mb-20">Fale com a gente</p>
      <h2 class="ff-body fz-28 fz-md-44 fz-xl-64 fw-400 ls--3 m-0 mb-40 mb-xl-60"
        data-splitting="wordsMask"
        data-scroll
        data-text-animation="slidein-by-lines"
      >Vamos criar algo <span class="title-highlight__word title-highlight --font-heading --fs-italic" style="--highlight-index:0">incrível.</span></h2>
      <a href="<?php echo esc_url( home_url('/contato') ); ?>" class="btn --cta --cta-default" aria-label="Entrar em contato">
        <span class="btn__bg" aria-hidden="true"></span>
        <span class="btn__label" aria-hidden="true">Entrar em contato</span>
      </a>

    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
