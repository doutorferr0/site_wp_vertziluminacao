<?php
/**
 * Template Name: Sobre
 * page-sobre.php — Vertz Iluminação
 */
get_header();
$theme_uri = get_template_directory_uri();

// ── Contato global ──────────────────────────────────────────
$wa      = vf('contato_whatsapp',         'option', '5519999778710');
$adc     = vf('contato_endereco_campinas', 'option', 'R. Antônio Lapa, 328 — Cambuí');
$adsp    = vf('contato_endereco_sp',       'option', 'Alameda Casa Branca, 806 — Jardim Paulista');
$horario = vf('contato_horario',           'option', 'Seg–Sex 9h–18h / Sáb 9h–13h');

// ── Campos desta página ─────────────────────────────────────
$hero_img    = vf('sobre_hero_img',     false, $theme_uri . '/assets/images/projetos/sobre-hero.jpg');
$manifesto_sub   = vf('sobre_manifesto_sub',   false, 'Nossa história');
$manifesto_titulo = vf('sobre_manifesto_titulo', false, 'Mais de 20 anos iluminando projetos com precisão e elegância.');
$manifesto_corpo  = vf('sobre_manifesto_corpo',  false, '');
$missao_img  = vf('sobre_missao_img',   false, $theme_uri . '/assets/images/projetos/sobre-missao.jpg');
$galeria_01  = vf('sobre_galeria_01',   false, $theme_uri . '/assets/images/projetos/sobre-galeria-01.jpg');
$galeria_02  = vf('sobre_galeria_02',   false, $theme_uri . '/assets/images/projetos/sobre-galeria-02.jpg');
$galeria_03  = vf('sobre_galeria_03',   false, $theme_uri . '/assets/images/projetos/sobre-galeria-03.jpg');

$stats_raw = vf('sobre_stats', false, array());
$stats = !empty($stats_raw) ? $stats_raw : array(
    array('numero'=>'+20', 'sufixo'=>'',  'legenda'=>'anos no mercado de iluminação técnica e decorativa'),
    array('numero'=>'+500','sufixo'=>'',  'legenda'=>'projetos entregues em SP, Campinas e todo o Brasil'),
    array('numero'=>'80',  'sufixo'=>'%', 'legenda'=>'de redução no consumo energético com LED certificado'),
    array('numero'=>'2',   'sufixo'=>'',  'legenda'=>'showrooms — Alameda Casa Branca (SP) e Cambuí (Campinas)'),
);
?>

<div class="single single-page" id="page-sobre">

  <!-- SEÇÃO 1: HERO -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-sobre" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="400">
      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll data-scroll-target="#pb-row-hero-sobre" data-scroll-progress="easeInCubic">
            <!-- IMG: sobre-hero.jpg | 1920×1080 | 16/9 -->
            <img src="<?php echo esc_url($theme_uri); ?>/assets/images/projetos/sobre-hero.jpg"
              alt="Vertz Iluminação — Sobre nós"
              loading="eager" decoding="async"
              style="width:100%;aspect-ratio:16/9;object-fit:cover;display:block;">
          </div>
        </div>
      </figure>
      <div class="pb-row-hero__titleWrap col-start-1 row-start-1 align-self-end container-fluid color-white position-relative overflow-clip ta-center" style="padding-bottom:var(--sp-60);">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:rgba(255,255,255,0.55);letter-spacing:0.18em;">Sobre a Vertz</p>
        <h1 class="pb-row-hero__title ff-body fz-44 fz-md-64 fz-xl-96 fw-400 lh-none ls--4 m-0"
          data-scroll data-scroll-target="#pb-row-hero-sobre" data-scroll-progress data-splitting="charsWrapped"
        >Luz com <span class="title-highlight --font-heading --fs-italic">propósito.</span></h1>
      </div>
    </div>
  </div>


  <!-- SEÇÃO 2: MANIFESTO — Split editorial -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20"
      data-scroll id="pb-row-sobre-manifesto" data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-5 col-span-xl-9 d-flex flex-column justify-content-end">
        <p class="fz-12 tt-uppercase m-0 mb-20 mb-md-30" style="color:var(--color-gray-600);letter-spacing:0.15em;">Nossa história</p>
        <h2 class="ff-body fz-28 fz-md-40 fz-xl-52 fw-400 lh-107 ls--3 m-0">
          Mais de 20 anos iluminando projetos com <span class="title-highlight --font-heading --fs-italic">precisão e elegância.</span>
        </h2>
      </div>

      <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-11 col-start-xl-13 mt-30 mt-md-0 d-flex flex-column justify-content-end" style="--index:1">
        <div class="wysiwyg fz-15 fz-xl-17 lh-150" style="color:var(--color-dark)">
          <p>A Vertz Iluminação nasceu da convicção de que a luz é o elemento mais transformador de qualquer espaço. Não uma lâmpada, não um produto — a <em>luz</em>, como experiência, como arquitetura invisível que revela formas, cria atmosferas e define como as pessoas se sentem em cada ambiente.</p>
          <p>Com showrooms em Campinas e São Paulo, atendemos arquitetos, designers de interiores e construtoras de todo o Brasil — do projeto residencial de alto padrão ao complexo comercial e corporativo. Em cada etapa, combinamos cálculo técnico rigoroso com curadoria estética criteriosamente selecionada.</p>
          <p>Somos representantes exclusivos de marcas que poucos têm acesso. Mas o nosso verdadeiro produto é o ambiente entregue: funcional, eficiente e capaz de surpreender quem o habita.</p>
        </div>
        <div class="mt-40">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default">
            <span class="btn__bg" aria-hidden="true"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar visita ao showroom</span><span>Solicitar visita ao showroom</span></span>
          </a>
        </div>
      </div>

    </div>
  </div>


  <!-- SEÇÃO 3: IMAGEM FULLWIDTH INSET -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0" style="--zindex:3;">
    <div style="padding-left:clamp(1.5rem,10vw,18%);padding-right:clamp(1.5rem,10vw,18%);">
      <div class="overflow-clip" style="border-radius:16px;">
        <!-- IMG: sobre-missao.jpg | 1200×800 | 3/2 -->
        <img
          src="<?php echo esc_url($theme_uri); ?>/assets/images/projetos/sobre-missao.jpg"
          alt="Vertz Iluminação — Missão e Valores"
          loading="lazy" decoding="async"
          style="width:100%;aspect-ratio:3/2;object-fit:cover;display:block;">
      </div>
    </div>
  </div>


  <!-- SEÇÃO 4: TÉCNICA vs DECORATIVA — Layout editorial com imagens em alturas diferentes -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:4">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <header class="mb-50 mb-md-70 d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600);letter-spacing:0.15em;">O que nos move</p>
        <h2 class="col-start-1 col-span-md-8 ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Duas linguagens da luz. <span class="title-highlight --font-heading --fs-italic">Um único resultado.</span>
        </h2>
      </header>

      <!-- Técnica: imagem portrait à esquerda, texto à direita alinhado ao topo -->
      <div class="d-grid grid-column-1 grid-column-md-12 grid-gap-12 grid-gap-xl-20 mb-60 mb-md-80" data-scroll data-scroll-offset="60px,0" data-module-delay>
        <div class="col-start-1 col-span-md-5 col-span-xl-10 overflow-clip" style="border-radius:12px;">
          <!-- IMG: sobre-tecnica.jpg | 2/3 portrait | alta para dar contraste -->
          <img src="<?php echo esc_url($theme_uri); ?>/assets/images/projetos/servico-corporativo.jpg"
            alt="Iluminação técnica Vertz" loading="lazy" decoding="async"
            style="width:100%;aspect-ratio:2/3;object-fit:cover;display:block;">
        </div>
        <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-11 d-flex flex-column justify-content-center grid-gap-20 pt-30 pt-md-0" style="--index:1">
          <p class="fz-11 tt-uppercase fw-700 m-0" style="color:var(--color-accent);letter-spacing:0.18em;">01 — Iluminação Técnica</p>
          <h3 class="fz-28 fz-md-36 fz-xl-44 fw-400 ls--2 m-0">A arquitetura invisível<br>do ambiente.</h3>
          <p class="fz-14 fz-xl-16 lh-155 m-0" style="color:var(--color-gray-600)">Calculada em lux, IRC, temperatura de cor e ângulo de facho — ela garante que cada espaço <em>funcione</em> com precisão. Discreta no design. Impecável na performance. É a base que sustenta tudo.</p>
          <ul class="list-none m-0 p-0 d-grid grid-gap-10" style="border-top:1px solid var(--color-gray-300);padding-top:1.25rem;">
            <?php foreach(['Spots e downlights de embutir','Perfis de LED para sancas e marcenaria','Luminárias para tarefas e trabalho','Controle via dimmer e automação'] as $i => $item): ?>
            <li class="d-flex align-items-start grid-gap-12 fz-13">
              <span style="font-size:.625rem;font-weight:700;color:var(--color-accent);min-width:1.25rem;padding-top:.2em;"><?php echo str_pad($i+1,2,'0',STR_PAD_LEFT); ?></span>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
      </div>

      <!-- Decorativa: imagem landscape mais curta à direita, texto à esquerda -->
      <div class="d-grid grid-column-1 grid-column-md-12 grid-gap-12 grid-gap-xl-20" data-scroll data-scroll-offset="60px,0" data-module-delay>
        <div class="col-start-1 col-start-md-7 col-span-md-6 col-span-xl-11 d-flex flex-column justify-content-center grid-gap-20 order-md-1 pt-30 pt-md-0" style="--index:0">
          <p class="fz-11 tt-uppercase fw-700 m-0" style="color:var(--color-accent);letter-spacing:0.18em;">02 — Iluminação Decorativa</p>
          <h3 class="fz-28 fz-md-36 fz-xl-44 fw-400 ls--2 m-0">A alma visível<br>do projeto.</h3>
          <p class="fz-14 fz-xl-16 lh-155 m-0" style="color:var(--color-gray-600)">Pendentes, arandelas, spots de destaque e peças assinadas que não precisam apenas iluminar — precisam ser <em>lembradas</em>. Curadoria de marcas exclusivas que combinam design autoral e impacto visual.</p>
          <ul class="list-none m-0 p-0 d-grid grid-gap-10" style="border-top:1px solid var(--color-gray-300);padding-top:1.25rem;">
            <?php foreach(['Pendentes e lustres de design','Arandelas e luminárias de parede','Spots decorativos e trilhos aparentes','Iluminação de acento e destaque'] as $i => $item): ?>
            <li class="d-flex align-items-start grid-gap-12 fz-13">
              <span style="font-size:.625rem;font-weight:700;color:var(--color-accent);min-width:1.25rem;padding-top:.2em;"><?php echo str_pad($i+1,2,'0',STR_PAD_LEFT); ?></span>
              <?php echo esc_html($item); ?>
            </li>
            <?php endforeach; ?>
          </ul>
        </div>
        <div class="col-start-1 col-span-md-5 col-span-xl-10 order-md-2 overflow-clip" style="border-radius:12px;">
          <!-- IMG: servico-residencial.jpg | 4/3 landscape -->
          <img src="<?php echo esc_url($theme_uri); ?>/assets/images/projetos/servico-residencial.jpg"
            alt="Iluminação decorativa Vertz" loading="lazy" decoding="async"
            style="width:100%;aspect-ratio:4/3;object-fit:cover;display:block;">
        </div>
      </div>

    </div>
  </div>


  <!-- SEÇÃO 5: NÚMEROS -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 mt-0 mb-0" style="--zindex:5;background:var(--color-header-bg);">
    <div class="pb-row container-fluid d-grid grid-column-2 grid-column-md-4 grid-gap-20 grid-gap-xl-40"
      data-scroll data-scroll-offset="80px,0" data-module-delay>
      <?php
      $stats = [
        ['num'=>'+20', 'suffix'=>'', 'label'=>'anos no mercado de iluminação técnica e decorativa'],
        ['num'=>'+500','suffix'=>'', 'label'=>'projetos entregues em SP, Campinas e todo o Brasil'],
        ['num'=>'80',  'suffix'=>'%','label'=>'de redução no consumo energético com LED certificado'],
        ['num'=>'2',   'suffix'=>'', 'label'=>'showrooms — Alameda Casa Branca (SP) e Cambuí (Campinas)'],
      ];
      foreach ($stats as $i => $s): ?>
      <div class="d-flex flex-column grid-gap-15" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i; ?>">
        <strong class="vertz-stat__num" style="color:var(--color-white)">
          <span class="title-highlight --font-heading --fs-italic" style="color:var(--color-primary)"><?php echo esc_html($s['num']); ?></span><?php echo esc_html($s['suffix']); ?>
        </strong>
        <p class="fz-12 fz-xl-13 lh-142 m-0" style="color:rgba(255,255,255,0.45);border-top:1px solid rgba(255,255,255,0.1);padding-top:1rem;"><?php echo esc_html($s['label']); ?></p>
      </div>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- SEÇÃO 6: MÉTODO -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:6;background:var(--color-bg);">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <header class="mb-50 mb-md-70 d-grid grid-column-md-12 grid-gap-12">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600);letter-spacing:0.15em;">Como trabalhamos</p>
        <h2 class="col-start-1 col-span-md-9 ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Do briefing à entrega — <span class="title-highlight --font-heading --fs-italic">sem surpresas.</span>
        </h2>
      </header>
      <div class="d-grid grid-column-1 grid-column-md-2 grid-column-xl-4 grid-gap-0">
        <?php
        $metodo = [
          ['num'=>'01','titulo'=>'Briefing','desc'=>'Entendemos o projeto, o espaço, o perfil de quem vai habitar e o orçamento disponível. Sem isso, não existe iluminação — existe apenas produto aleatório.','detalhe'=>'Presencial ou remoto. Sem custo.'],
          ['num'=>'02','titulo'=>'Projeto Luminotécnico','desc'=>'Calculamos iluminâncias ambiente por ambiente, selecionamos produtos técnicos e decorativos, geramos o memorial descritivo e os circuitos para instalação.','detalhe'=>'Software DIALux. Documentação completa.'],
          ['num'=>'03','titulo'=>'Proposta','desc'=>'Apresentamos o quantitativo de produtos, cronograma de fornecimento e investimento de forma transparente. Sem letra pequena.','detalhe'=>'Marcas exclusivas disponíveis em estoque.'],
          ['num'=>'04','titulo'=>'Entrega e Acompanhamento','desc'=>'Fornecemos os produtos, orientamos a instalação e fazemos visitas de acompanhamento. O projeto não termina na especificação — termina quando o ambiente está exatamente como projetado.','detalhe'=>'Garantia de 2 anos em todos os produtos.'],
        ];
        foreach ($metodo as $i => $etapa): ?>
        <div class="d-grid grid-gap-20 p-0" style="border-top:1px solid var(--color-gray-300);" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i; ?>">
          <div class="pt-30 pb-30 pr-xl-40">
            <span class="fz-11 tt-uppercase fw-500 d-block mb-20" style="color:var(--color-accent);letter-spacing:0.15em;"><?php echo esc_html($etapa['num']); ?></span>
            <h3 class="fz-20 fz-xl-26 fw-400 ls--2 m-0 mb-15"><?php echo esc_html($etapa['titulo']); ?></h3>
            <p class="fz-14 fz-xl-15 lh-155 m-0 mb-20" style="color:var(--color-gray-600)"><?php echo esc_html($etapa['desc']); ?></p>
            <p class="fz-12 tt-uppercase fw-500 m-0" style="color:var(--color-dark);letter-spacing:0.08em;"><?php echo esc_html($etapa['detalhe']); ?></p>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="mt-60 mt-md-80 d-flex flex-column flex-md-row align-items-md-center grid-gap-20">
        <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default" style="border-color:var(--color-dark);color:var(--color-dark)">
          <span class="btn__bg" aria-hidden="true"></span>
          <span class="btn__label" aria-hidden="true"><span>Solicitar projeto</span><span>Solicitar projeto</span></span>
        </a>
        <a href="https://wa.me/5519999778710?text=Olá!%20Gostaria%20de%20visitar%20o%20showroom%20da%20Vertz." class="btn --cta --cta-default" target="_blank" rel="noopener" style="border-color:var(--color-primary);color:var(--color-dark);background:var(--color-primary);">
          <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
          <span class="btn__label" aria-hidden="true"><span>Visitar o showroom</span><span>Visitar o showroom</span></span>
        </a>
      </div>
    </div>
  </div>


  <!-- SEÇÃO 7: GALERIA — 3 colunas portrait com caption -->
  <div class="pb-row-wrapper position-relative pt-80 pb-0 pt-md-100 mt-0 mb-0" style="--zindex:7">
    <div class="pb-row container-fluid mb-40 mb-md-60" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <div class="d-flex justify-content-between align-items-end">
        <h2 class="ff-body fz-24 fz-md-36 fz-xl-48 fw-400 ls--3 m-0">
          Projetos <span class="title-highlight --font-heading --fs-italic">realizados.</span>
        </h2>
        <a href="<?php echo esc_url(home_url('/servicos')); ?>" class="fz-12 tt-uppercase fw-500 d-none d-md-block" style="color:var(--color-dark);text-decoration:none;letter-spacing:0.12em;border-bottom:1px solid var(--color-dark);">Ver serviços →</a>
      </div>
    </div>

    <!-- Grid de imagens: padding zero lateral para chegar nas bordas, pequeno gap -->
    <div class="d-grid grid-column-1 grid-column-md-3 grid-gap-4 grid-gap-md-8">
      <?php
      $galeria = [
        ['img'=>'sobre-galeria-01.jpg','label'=>'Residencial','desc'=>'Interior contemporâneo','ratio'=>'2/3'],
        ['img'=>'sobre-galeria-02.jpg','label'=>'Comercial',  'desc'=>'Varejo e showroom',    'ratio'=>'2/3'],
        ['img'=>'sobre-galeria-03.jpg','label'=>'Corporativo','desc'=>'Escritório e lobby',   'ratio'=>'2/3'],
      ];
      foreach ($galeria as $i => $g): ?>
      <figure class="m-0 position-relative overflow-clip sobre-galeria-item"
        data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i; ?>">
        <!-- IMG: <?php echo esc_html($g['img']); ?> | <?php echo esc_html($g['ratio']); ?> portrait -->
        <img
          src="<?php echo esc_url($theme_uri); ?>/assets/images/<?php echo esc_attr($g['img']); ?>"
          alt="<?php echo esc_attr($g['label']); ?> — Vertz Iluminação"
          loading="lazy" decoding="async"
          style="width:100%;aspect-ratio:<?php echo esc_attr($g['ratio']); ?>;object-fit:cover;display:block;">
        <figcaption class="sobre-galeria-item__caption position-absolute b-0 l-0 w-100 d-flex flex-column grid-gap-4">
          <span class="fz-10 tt-uppercase fw-700" style="letter-spacing:.15em;color:var(--color-primary)"><?php echo esc_html($g['label']); ?></span>
          <span class="fz-12" style="color:rgba(255,255,255,.7)"><?php echo esc_html($g['desc']); ?></span>
        </figcaption>
      </figure>
      <?php endforeach; ?>
    </div>
  </div>


  <!-- SEÇÃO 8: CTA FINAL -->
  <div class="pb-row-wrapper position-relative pt-100 pb-100 pt-md-130 pb-md-130 mt-0 mb-0" style="--zindex:8;background:var(--color-header-bg)">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>
      <div class="col-start-1 col-span-md-8 col-span-xl-16">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:rgba(255,255,255,0.4);letter-spacing:0.15em;">Pronto para começar?</p>
        <h2 class="ff-body fz-32 fz-md-52 fz-xl-72 fw-400 ls--4 m-0 mb-40" style="color:var(--color-white)">
          A luz certa<br>não ilumina —<br><span class="title-highlight --font-heading --fs-italic" style="color:var(--color-primary)">revela.</span>
        </h2>
        <div class="d-flex flex-column flex-md-row grid-gap-15">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default" style="border-color:var(--color-white);color:var(--color-white);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-white);"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar projeto</span><span style="color:var(--color-dark);">Solicitar projeto</span></span>
          </a>
          <a href="https://wa.me/5519999778710?text=Olá!%20Quero%20saber%20mais%20sobre%20a%20Vertz%20Iluminação." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);color:var(--color-primary);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary);"></span>
            <span class="btn__label" aria-hidden="true"><span>Falar no WhatsApp</span><span style="color:var(--color-dark);">Falar no WhatsApp</span></span>
          </a>
        </div>
      </div>
      <div class="col-start-1 col-start-md-10 col-span-md-3 col-span-xl-6 d-flex flex-column justify-content-end mt-60 mt-md-0" style="border-left:1px solid rgba(255,255,255,0.1);padding-left:2rem;">
        <div class="mb-30">
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-10" style="color:var(--color-primary);letter-spacing:0.12em;">São Paulo</p>
          <p class="fz-13 lh-155 m-0" style="color:rgba(255,255,255,0.55)">Alameda Casa Branca, 806<br>Jardim Paulista</p>
        </div>
        <div>
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-10" style="color:var(--color-primary);letter-spacing:0.12em;">Campinas</p>
          <p class="fz-13 lh-155 m-0" style="color:rgba(255,255,255,0.55)">R. Antônio Lapa, 328<br>Cambuí</p>
        </div>
        <p class="fz-12 m-0 mt-20" style="color:rgba(255,255,255,0.3)">Seg–Sex 9h–18h / Sáb 9h–13h</p>
      </div>
    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
