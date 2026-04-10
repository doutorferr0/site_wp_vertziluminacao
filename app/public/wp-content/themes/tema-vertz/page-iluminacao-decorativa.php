<?php
/**
 * Template Name: Iluminação Decorativa
 * page-iluminacao-decorativa.php — Vertz Iluminação
 */
get_header();
$theme_uri = get_template_directory_uri();
?>

<div class="single single-page" id="page-il-decorativa">

  <!-- ============================================================
    SEÇÃO 1: HERO — Hero escuro, clima premium, editorial
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-decorativa" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="400">

      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll data-scroll-target="#pb-row-hero-decorativa" data-scroll-progress="easeInCubic">
            <!-- IMG: servico-residencial.jpg | 1920×1080 | 16/9 | pendente premium em ambiente iluminado -->
            <img
              src="<?php echo esc_url($theme_uri); ?>/assets/images/servico-residencial.jpg"
              alt="Iluminação Decorativa — Vertz Iluminação"
              loading="eager" decoding="async"
              style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;">
          </div>
        </div>
      </figure>

      <div class="pb-row-hero__titleWrap col-start-1 row-start-1 align-self-end container-fluid color-white position-relative overflow-clip" style="padding-bottom:var(--sp-60);">
        <p class="fz-11 tt-uppercase m-0 mb-16" style="color:rgba(255,255,255,0.5);letter-spacing:0.18em;">02 — Projeto Decorativo</p>
        <h1 class="pb-row-hero__title ff-body fz-44 fz-md-64 fz-xl-96 fw-400 lh-none ls--4 m-0"
          data-scroll data-scroll-target="#pb-row-hero-decorativa" data-scroll-progress data-splitting="charsWrapped"
        >Iluminação<br><span class="title-highlight --font-heading --fs-italic">Decorativa.</span></h1>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 2: MANIFESTO — O que é iluminação decorativa
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-5 col-span-xl-10 d-flex flex-column justify-content-end">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:var(--color-gray-600);letter-spacing:0.15em;">A alma visível do projeto</p>
        <h2 class="ff-body fz-28 fz-md-40 fz-xl-52 fw-400 lh-107 ls--3 m-0">
          O elemento que<br>transforma espaço<br><span class="title-highlight --font-heading --fs-italic">em memória.</span>
        </h2>
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-12 col-start-xl-13 d-flex flex-column justify-content-end mt-30 mt-md-0">
        <div class="wysiwyg fz-15 fz-xl-17 lh-155" style="color:var(--color-dark)">
          <p>Iluminação decorativa é a camada que <em>aparece</em> — e precisa merecer esse espaço. Pendentes, lustres, arandelas, spots de destaque e perfis de design que não precisam apenas iluminar: precisam ser vistos, sentidos e lembrados.</p>
          <p>Na Vertz, não vendemos luminárias. Fazemos curadoria rigorosa de marcas nacionais e internacionais, disponíveis nos nossos showrooms de Campinas e São Paulo para que você veja, toque e especifique com a segurança de quem conhece o produto fisicamente.</p>
          <p>Cada peça é escolhida para o projeto. Nunca para o estoque.</p>
        </div>
        <div class="mt-40 d-flex flex-column flex-md-row grid-gap-15">
          <a href="https://wa.me/5519999778710?text=Olá!%20Quero%20visitar%20o%20showroom%20da%20Vertz%20para%20ver%20luminárias%20decorativas." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);background:var(--color-primary);color:var(--color-dark);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
            <span class="btn__label" aria-hidden="true"><span>Agendar visita ao showroom</span><span>Agendar visita ao showroom</span></span>
          </a>
        </div>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 3: IMAGEM INSET
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0" style="--zindex:3;">
    <div style="padding-left:clamp(1.5rem,10vw,18%);padding-right:clamp(1.5rem,10vw,18%);">
      <div class="overflow-clip" style="border-radius:16px;">
        <!-- IMG: sobre-missao.jpg | 1200×800 | 3/2 | showroom ou ambiente com pendente de destaque -->
        <img
          src="<?php echo esc_url($theme_uri); ?>/assets/images/sobre-missao.jpg"
          alt="Showroom Vertz — Iluminação Decorativa"
          loading="lazy" decoding="async"
          style="width:100%;aspect-ratio:3/2;object-fit:cover;display:block;">
      </div>
    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 4: CATEGORIAS — O que trabalhamos
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:4;background:var(--color-surface);">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <header class="mb-50 mb-md-70 d-grid grid-column-md-12 grid-gap-12">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600);letter-spacing:0.15em;">O que trabalhamos</p>
        <h2 class="col-start-1 col-span-md-9 ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Curadoria de peças para<br><span class="title-highlight --font-heading --fs-italic">cada intenção.</span>
        </h2>
      </header>

      <div class="d-grid grid-column-1 grid-column-md-2 grid-column-xl-3 grid-gap-0">
        <?php
        $categorias = [
          ['num'=>'01','titulo'=>'Pendentes e Lustres','desc'=>'Peças de design nacional e importado que funcionam como esculturas luminosas. Do minimalista ao grandioso — curadoria por projeto, não por catálogo.'],
          ['num'=>'02','titulo'=>'Arandelas e Luminárias de Parede','desc'=>'Para corredores, cabeceiras, salas e fachadas internas. Design preciso que complementa sem competir com o ambiente.'],
          ['num'=>'03','titulo'=>'Spots Decorativos e Trilhos Aparentes','desc'=>'Sistemas de trilho aparente com armações de design — a estrutura é o elemento visual. Ideal para tetos baixos onde o recesso não é opção.'],
          ['num'=>'04','titulo'=>'Iluminação de Acento','desc'=>'Destaque para quadros, esculturas, prateleiras e arquitetura de interiores. IRC > 97 para que as cores se manifestem com fidelidade total.'],
          ['num'=>'05','titulo'=>'Perfis LED Decorativos','desc'=>'Fitas e perfis de LED com acabamento estético superior — para molduras, rodapés, balanços e elementos arquitetônicos que merecem brilhar.'],
          ['num'=>'06','titulo'=>'Consultoria de Especificação','desc'=>'Visita ao showroom com amostras físicas, seleção por temperatura de cor real e entrega de memorial com dados técnicos para aprovação do arquiteto.'],
        ];
        foreach ($categorias as $i => $cat): ?>
        <div class="d-grid grid-gap-16 pt-30 pb-30 pr-xl-40" style="border-top:1px solid rgba(0,0,0,.1);" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i % 3; ?>">
          <span class="fz-10 tt-uppercase fw-700 d-block" style="color:var(--color-accent);letter-spacing:.18em;"><?php echo esc_html($cat['num']); ?></span>
          <h3 class="fz-18 fz-xl-22 fw-400 ls--2 m-0"><?php echo esc_html($cat['titulo']); ?></h3>
          <p class="fz-13 fz-xl-14 lh-155 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($cat['desc']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 5: SHOWROOMS — CTA para visita presencial
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 mt-0 mb-0" style="--zindex:5">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-6 col-span-xl-11 d-flex flex-column justify-content-center grid-gap-20">
        <p class="fz-12 tt-uppercase m-0" style="color:var(--color-gray-600);letter-spacing:.15em;">Experiência física</p>
        <h2 class="ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Luminárias que você<br>precisa <span class="title-highlight --font-heading --fs-italic">ver de perto.</span>
        </h2>
        <p class="fz-14 fz-xl-16 lh-155 m-0" style="color:var(--color-gray-600)">Temperatura de cor, IRC e o acabamento real de uma luminária só se conhecem ao vivo. Nossos showrooms em Campinas e São Paulo estão disponíveis para visita com agendamento — e o arquiteto pode trazer o cliente.</p>
        <div class="d-grid grid-gap-20 pt-10" style="border-top:1px solid var(--color-gray-300);">
          <div>
            <p class="fz-11 tt-uppercase fw-700 m-0 mb-8" style="color:var(--color-accent);letter-spacing:.15em;">Campinas</p>
            <p class="fz-14 lh-150 m-0">R. Antônio Lapa, 328 — Cambuí<br><span style="color:var(--color-gray-600)">Seg–Sex 9h–18h / Sáb 9h–13h</span></p>
          </div>
          <div>
            <p class="fz-11 tt-uppercase fw-700 m-0 mb-8" style="color:var(--color-accent);letter-spacing:.15em;">São Paulo</p>
            <p class="fz-14 lh-150 m-0">Alameda Casa Branca, 806 — Jardim Paulista<br><span style="color:var(--color-gray-600)">Seg–Sex 9h–18h / Sáb 9h–13h</span></p>
          </div>
        </div>
        <div class="d-flex flex-column flex-md-row grid-gap-15 pt-10">
          <a href="https://wa.me/5519999778710?text=Olá!%20Quero%20agendar%20uma%20visita%20ao%20showroom%20da%20Vertz." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);background:var(--color-primary);color:var(--color-dark);width:fit-content;">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
            <span class="btn__label" aria-hidden="true"><span>Agendar visita</span><span>Agendar visita</span></span>
          </a>
        </div>
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-12 overflow-clip" style="border-radius:12px;">
        <!-- IMG: contato-foto.jpg | 4/5 portrait | showroom ou detalhe de luminária premium -->
        <img
          src="<?php echo esc_url($theme_uri); ?>/assets/images/contato-foto.jpg"
          alt="Showroom Vertz Iluminação"
          loading="lazy" decoding="async"
          style="width:100%;aspect-ratio:4/5;object-fit:cover;display:block;">
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 6: LINK CRUZADO — Conhecer iluminação técnica
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 mt-0 mb-0" style="--zindex:6;background:var(--color-surface)">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-5 col-span-xl-10 overflow-clip" style="border-radius:12px;">
        <!-- IMG: servico-corporativo.jpg | 3/2 | ambiente técnico / spots embutidos -->
        <img
          src="<?php echo esc_url($theme_uri); ?>/assets/images/servico-corporativo.jpg"
          alt="Projeto Técnico de Iluminação — Vertz"
          loading="lazy" decoding="async"
          style="width:100%;aspect-ratio:3/2;object-fit:cover;display:block;">
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-10 col-start-xl-14 d-flex flex-column justify-content-center grid-gap-20 pt-40 pt-md-0">
        <span class="fz-11 tt-uppercase fw-700" style="color:var(--color-accent);letter-spacing:.18em;">01 — Projeto Técnico</span>
        <h2 class="ff-body fz-24 fz-md-36 fz-xl-48 fw-400 ls--3 m-0">
          A base invisível<br><span class="title-highlight --font-heading --fs-italic">que sustenta tudo.</span>
        </h2>
        <p class="fz-14 fz-xl-16 lh-155 m-0" style="color:var(--color-gray-600)">Cálculo de iluminâncias, IRC, temperatura de cor e ângulo de facho ambiente a ambiente — com software DIALux e documentação técnica completa.</p>
        <a href="<?php echo esc_url(home_url('/iluminacao-tecnica')); ?>" class="btn --cta --cta-default" style="width:fit-content;">
          <span class="btn__bg" aria-hidden="true"></span>
          <span class="btn__label" aria-hidden="true"><span>Ver Projeto Técnico</span><span>Ver Projeto Técnico</span></span>
        </a>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 7: CTA FINAL
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-100 pb-100 pt-md-130 pb-md-130 mt-0 mb-0" style="--zindex:7;background:var(--color-header-bg)">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>
      <div class="col-start-1 col-span-md-9 col-span-xl-16">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:rgba(255,255,255,0.4);letter-spacing:0.15em;">Pronto para escolher?</p>
        <h2 class="ff-body fz-32 fz-md-52 fz-xl-72 fw-400 ls--4 m-0 mb-15" style="color:var(--color-white)">
          Visite o showroom<br><span class="title-highlight --font-heading --fs-italic" style="color:var(--color-primary)">e escolha ao vivo.</span>
        </h2>
        <p class="fz-15 fz-xl-17 lh-155 m-0 mb-40" style="color:rgba(255,255,255,0.5);max-width:520px;">
          Temperatura de cor e acabamento só se conhecem ao vivo. Nossos showrooms em Campinas e São Paulo estão disponíveis para visita com arquitetos e clientes finais.
        </p>
        <div class="d-flex flex-column flex-md-row grid-gap-15">
          <a href="https://wa.me/5519999778710?text=Olá!%20Quero%20agendar%20uma%20visita%20ao%20showroom%20da%20Vertz." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);background:var(--color-primary);color:var(--color-dark);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
            <span class="btn__label" aria-hidden="true"><span>Agendar visita ao showroom</span><span>Agendar visita ao showroom</span></span>
          </a>
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default" style="border-color:var(--color-white);color:var(--color-white);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-white);"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar proposta</span><span style="color:var(--color-dark);">Solicitar proposta</span></span>
          </a>
        </div>
      </div>
      <div class="col-start-1 col-start-md-11 col-span-md-2 col-span-xl-6 d-flex flex-column justify-content-center mt-60 mt-md-0" style="border-left:1px solid rgba(255,255,255,0.1);padding-left:2rem;">
        <div class="mb-24">
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">Campinas</p>
          <p class="fz-13 lh-155 m-0" style="color:rgba(255,255,255,.7)">R. Antônio Lapa, 328<br>Cambuí</p>
        </div>
        <div class="mb-24">
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">São Paulo</p>
          <p class="fz-13 lh-155 m-0" style="color:rgba(255,255,255,.7)">Alameda Casa Branca, 806<br>Jardim Paulista</p>
        </div>
        <p class="fz-12 m-0" style="color:rgba(255,255,255,0.3)">Seg–Sex 9h–18h / Sáb 9h–13h</p>
      </div>
    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
