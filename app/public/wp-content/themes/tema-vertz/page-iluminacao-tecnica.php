<?php
/**
 * Template Name: Iluminação Técnica
 * page-iluminacao-tecnica.php — Vertz Iluminação
 */
get_header();
$theme_uri = get_template_directory_uri();
?>

<div class="single single-page" id="page-il-tecnica">

  <!-- ============================================================
    SEÇÃO 1: HERO — Fullscreen com overlay escuro e título editorial
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-tecnica" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="400">

      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll data-scroll-target="#pb-row-hero-tecnica" data-scroll-progress="easeInCubic">
            <!-- IMG: servicos-hero.jpg | 1920×1080 | 16/9 | interior de alto padrão com spots embutidos -->
            <img
              src="<?php echo esc_url($theme_uri); ?>/assets/images/servicos-hero.jpg"
              alt="Iluminação Técnica — Vertz Iluminação"
              loading="eager" decoding="async"
              style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;">
          </div>
        </div>
      </figure>

      <div class="pb-row-hero__titleWrap col-start-1 row-start-1 align-self-end container-fluid color-white position-relative overflow-clip" style="padding-bottom:var(--sp-60);">
        <p class="fz-11 tt-uppercase m-0 mb-16" style="color:rgba(255,255,255,0.5);letter-spacing:0.18em;">01 — Projeto Técnico</p>
        <h1 class="pb-row-hero__title ff-body fz-44 fz-md-64 fz-xl-96 fw-400 lh-none ls--4 m-0"
          data-scroll data-scroll-target="#pb-row-hero-tecnica" data-scroll-progress data-splitting="charsWrapped"
        >Iluminação<br><span class="title-highlight --font-heading --fs-italic">Técnica.</span></h1>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 2: MANIFESTO — O que é iluminação técnica (split editorial)
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-5 col-span-xl-10 d-flex flex-column justify-content-end">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:var(--color-gray-600);letter-spacing:0.15em;">A base que sustenta tudo</p>
        <h2 class="ff-body fz-28 fz-md-40 fz-xl-52 fw-400 lh-107 ls--3 m-0">
          A arquitetura<br>invisível do<br><span class="title-highlight --font-heading --fs-italic">ambiente.</span>
        </h2>
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-12 col-start-xl-13 d-flex flex-column justify-content-end mt-30 mt-md-0">
        <div class="wysiwyg fz-15 fz-xl-17 lh-155" style="color:var(--color-dark)">
          <p>Iluminação técnica é a camada que ninguém vê — e todo mundo sente. É o conjunto de decisões de engenharia que determina se um espaço <em>funciona</em>: onde a luz está, qual a sua intensidade, temperatura de cor, IRC e ângulo de facho.</p>
          <p>Na Vertz, desenvolvemos o projeto luminotécnico com software DIALux — calculando iluminâncias ambiente a ambiente conforme normas ABNT — e especificamos produtos que equilibram performance técnica, eficiência energética e acabamento visual discreto.</p>
          <p>O protagonista aqui é a luz. Não a luminária.</p>
        </div>
        <div class="mt-40">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default">
            <span class="btn__bg" aria-hidden="true"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar projeto técnico</span><span>Solicitar projeto técnico</span></span>
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
        <!-- IMG: servico-corporativo.jpg | 1200×800 | 3/2 | ambiente corporativo iluminado -->
        <img
          src="<?php echo esc_url($theme_uri); ?>/assets/images/servico-corporativo.jpg"
          alt="Projeto de iluminação técnica Vertz"
          loading="lazy" decoding="async"
          style="width:100%;aspect-ratio:3/2;object-fit:cover;display:block;">
      </div>
    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 4: O QUE ENTREGAMOS — Lista de produtos e serviços técnicos
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:4;background:var(--color-surface);">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <header class="mb-50 mb-md-70 d-grid grid-column-md-12 grid-gap-12">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600);letter-spacing:0.15em;">O que entregamos</p>
        <h2 class="col-start-1 col-span-md-9 ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Precisão técnica para<br><span class="title-highlight --font-heading --fs-italic">cada ambiente.</span>
        </h2>
      </header>

      <div class="d-grid grid-column-1 grid-column-md-2 grid-column-xl-3 grid-gap-0">
        <?php
        $entregas = [
          ['num'=>'01','titulo'=>'Projeto Luminotécnico','desc'=>'Cálculo de iluminâncias por ambiente (lux), seleção de temperatura de cor (CCT), IRC e ângulo de facho para cada ponto de luz. Software DIALux. Normas ABNT.'],
          ['num'=>'02','titulo'=>'Spots e Downlights','desc'=>'Luminárias de embutir em gesso ou forro — residenciais, comerciais e corporativas. Ajuste de abertura, dimmer e tunable white conforme a cena projetada.'],
          ['num'=>'03','titulo'=>'Perfis LED Lineares','desc'=>'Profiles para sancas, bancadas, marcenaria, espelhos e rodapés. Perfis embutidos e de sobrepor com difusores ópticos selecionados por projeto.'],
          ['num'=>'04','titulo'=>'Trilhos e Sistemas Modulares','desc'=>'Trilhos monofásicos e trifásicos para pontos ajustáveis em retail, restaurantes e galerias. Flexibilidade de re-aim sem intervenção elétrica.'],
          ['num'=>'05','titulo'=>'Dimmer e Automação','desc'=>'Sistemas de controle 0-10V, DALI e Tunable White que permitem cenas por ambiente — do trabalho ao relaxamento — com cronograma circadiano.'],
          ['num'=>'06','titulo'=>'Memorial e Acompanhamento','desc'=>'Entrega de memorial descritivo completo, circuitos, quantitativo e visitas de comissionamento para garantir que o resultado seja exatamente o projetado.'],
        ];
        foreach ($entregas as $i => $e): ?>
        <div class="d-grid grid-gap-16 pt-30 pb-30 pr-xl-40" style="border-top:1px solid rgba(0,0,0,.1);" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i % 3; ?>">
          <span class="fz-10 tt-uppercase fw-700 d-block" style="color:var(--color-accent);letter-spacing:.18em;"><?php echo esc_html($e['num']); ?></span>
          <h3 class="fz-18 fz-xl-22 fw-400 ls--2 m-0"><?php echo esc_html($e['titulo']); ?></h3>
          <p class="fz-13 fz-xl-14 lh-155 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($e['desc']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 5: SEGMENTOS — Onde aplicamos
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:5">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <header class="mb-50 mb-md-70 d-grid grid-column-md-12 grid-gap-12">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600);letter-spacing:0.15em;">Onde atuamos</p>
        <h2 class="col-start-1 col-span-md-8 ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Projetos para cada <span class="title-highlight --font-heading --fs-italic">tipologia.</span>
        </h2>
      </header>

      <div class="d-grid grid-column-1 grid-column-md-2 grid-column-xl-4 grid-gap-0">
        <?php
        $segmentos = [
          ['titulo'=>'Residencial','desc'=>'Spots, sancas, automação e conforto visual para apartamentos e casas de alto padrão. Eficiência sem comprometer a estética.'],
          ['titulo'=>'Comercial e Varejo','desc'=>'Iluminação que vende — temperatura de cor estratégica, trilhos ajustáveis e sistemas de cenas para lojas e showrooms.'],
          ['titulo'=>'Corporativo','desc'=>'Anti-ofuscamento, controle de iluminância por sensor e certificação LEED. Ambientes de trabalho que aumentam produtividade.'],
          ['titulo'=>'Hotelaria e Gastronomia','desc'=>'A luz define a experiência antes de qualquer palavra. Recepções, quartos e restaurantes com dimmer e cenas por horário.'],
        ];
        foreach ($segmentos as $i => $s): ?>
        <div class="d-grid grid-gap-16 pt-30 pb-30 pr-xl-40" style="border-top:1px solid var(--color-gray-300);" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i; ?>">
          <h3 class="fz-18 fz-xl-22 fw-400 ls--2 m-0"><?php echo esc_html($s['titulo']); ?></h3>
          <p class="fz-13 fz-xl-14 lh-155 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($s['desc']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 6: MÉTRICAS — Os números do projeto técnico
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 mt-0 mb-0" style="--zindex:6;background:var(--color-header-bg);">
    <div class="pb-row container-fluid d-grid grid-column-2 grid-column-md-4 grid-gap-20 grid-gap-xl-40"
      data-scroll data-scroll-offset="80px,0" data-module-delay>
      <?php
      $metricas = [
        ['num'=>'80%',  'label'=>'de redução no consumo energético com LED certificado'],
        ['num'=>'IRC 97','label'=>'índice de reprodução de cor máximo para museus e galerias'],
        ['num'=>'DALI',  'label'=>'protocolos de automação suportados no projeto'],
        ['num'=>'ABNT',  'label'=>'NBR 5413 — norma de iluminância adotada em todos os projetos'],
      ];
      foreach ($metricas as $i => $m): ?>
      <div class="d-flex flex-column grid-gap-15" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i; ?>">
        <strong class="vertz-stat__num" style="color:var(--color-white)">
          <span class="title-highlight --font-heading --fs-italic" style="color:var(--color-primary)"><?php echo esc_html($m['num']); ?></span>
        </strong>
        <p class="fz-12 fz-xl-13 lh-142 m-0" style="color:rgba(255,255,255,0.45);border-top:1px solid rgba(255,255,255,0.1);padding-top:1rem;"><?php echo esc_html($m['label']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 7: LINK CRUZADO — Conhecer iluminação decorativa
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 mt-0 mb-0" style="--zindex:7;background:var(--color-bg)">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-6 col-span-xl-12 overflow-clip" style="border-radius:12px;">
        <!-- IMG: produto-comercial.jpg | 3/2 | pendente decorativo -->
        <img
          src="<?php echo esc_url($theme_uri); ?>/assets/images/produto-comercial.jpg"
          alt="Projeto Decorativo de Iluminação — Vertz"
          loading="lazy" decoding="async"
          style="width:100%;aspect-ratio:3/2;object-fit:cover;display:block;">
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-10 col-start-xl-14 d-flex flex-column justify-content-center grid-gap-20 pt-40 pt-md-0">
        <span class="fz-11 tt-uppercase fw-700" style="color:var(--color-accent);letter-spacing:.18em;">02 — Projeto Decorativo</span>
        <h2 class="ff-body fz-24 fz-md-36 fz-xl-48 fw-400 ls--3 m-0">
          A luz também pode<br><span class="title-highlight --font-heading --fs-italic">ser vista.</span>
        </h2>
        <p class="fz-14 fz-xl-16 lh-155 m-0" style="color:var(--color-gray-600)">Pendentes, arandelas e peças de design que transformam espaço em identidade. Curadoria de marcas exclusivas nos nossos showrooms.</p>
        <a href="<?php echo esc_url(home_url('/iluminacao-decorativa')); ?>" class="btn --cta --cta-default" style="width:fit-content;">
          <span class="btn__bg" aria-hidden="true"></span>
          <span class="btn__label" aria-hidden="true"><span>Ver Projeto Decorativo</span><span>Ver Projeto Decorativo</span></span>
        </a>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 8: CTA FINAL
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-100 pb-100 pt-md-130 pb-md-130 mt-0 mb-0" style="--zindex:8;background:var(--color-header-bg)">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>
      <div class="col-start-1 col-span-md-9 col-span-xl-16">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:rgba(255,255,255,0.4);letter-spacing:0.15em;">Pronto para começar?</p>
        <h2 class="ff-body fz-32 fz-md-52 fz-xl-72 fw-400 ls--4 m-0 mb-15" style="color:var(--color-white)">
          Solicite seu<br><span class="title-highlight --font-heading --fs-italic" style="color:var(--color-primary)">projeto técnico.</span>
        </h2>
        <p class="fz-15 fz-xl-17 lh-155 m-0 mb-40" style="color:rgba(255,255,255,0.5);max-width:520px;">
          Envie a planta baixa ou o projeto do arquiteto. Em até 48 horas respondemos com uma proposta preliminar de iluminação técnica.
        </p>
        <div class="d-flex flex-column flex-md-row grid-gap-15">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default" style="border-color:var(--color-white);color:var(--color-white);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-white);"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar projeto</span><span style="color:var(--color-dark);">Solicitar projeto</span></span>
          </a>
          <a href="https://wa.me/5519999778710?text=Olá!%20Quero%20um%20projeto%20técnico%20de%20iluminação." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);background:var(--color-primary);color:var(--color-dark);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
            <span class="btn__label" aria-hidden="true"><span>WhatsApp direto</span><span>WhatsApp direto</span></span>
          </a>
        </div>
      </div>
      <div class="col-start-1 col-start-md-11 col-span-md-2 col-span-xl-6 d-flex flex-column justify-content-center mt-60 mt-md-0" style="border-left:1px solid rgba(255,255,255,0.1);padding-left:2rem;">
        <div class="mb-24">
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">Telefone</p>
          <a href="tel:+551932510501" class="fz-15 fw-400 m-0 d-block" style="color:rgba(255,255,255,0.7);text-decoration:none;">(19) 3251-0501</a>
        </div>
        <div class="mb-24">
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">E-mail</p>
          <a href="mailto:contato@vertziluminacao.com.br" class="fz-13 fw-400 m-0 d-block" style="color:rgba(255,255,255,0.7);text-decoration:none;">contato@vertziluminacao.com.br</a>
        </div>
        <div>
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">Instagram</p>
          <a href="https://instagram.com/vertziluminacao" target="_blank" rel="noopener" class="fz-13 fw-400 m-0 d-block" style="color:rgba(255,255,255,0.7);text-decoration:none;">@vertziluminacao</a>
        </div>
      </div>
    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
