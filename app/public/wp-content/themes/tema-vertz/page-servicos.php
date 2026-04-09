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
    SEÇÃO 1: HERO — Fullscreen + título
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0 --layout-pb-row-hero --first" style="--zindex:1">
    <div id="pb-row-hero-servicos" class="pb-row pb-row-hero d-grid grid-row-1" data-scroll data-module-delay data-module-delay-increment="400">

      <figure class="pb-row-hero__media col-start-1 row-start-1 position-relative w-100 h-100">
        <div class="pb-row-hero__mediaWrap position-absolute t-0 l-0 w-100 m-0">
          <div class="pb-row-hero__mediaSticky position-sticky t-0 l-0 w-100 overflow-clip"
            data-scroll data-scroll-target="#pb-row-hero-servicos"
            data-scroll-progress="easeInCubic">
            <!-- IMG: servicos-hero.jpg | 1920x1080 | 16/9 -->
            <div style="width:100%;aspect-ratio:16/9;background:var(--color-header-bg);display:block;" data-img="servicos-hero.jpg">
            </div>
          </div>
        </div>
      </figure>

      <div class="pb-row-hero__titleWrap col-start-1 row-start-1 align-self-end container-fluid color-white position-relative overflow-clip ta-center" style="padding-bottom:var(--sp-60);">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:rgba(255,255,255,0.55);letter-spacing:0.18em;">Nossas soluções</p>
        <h1 class="pb-row-hero__title ff-body fz-44 fz-md-64 fz-xl-96 fw-400 lh-none ls--4 m-0"
          data-scroll data-scroll-target="#pb-row-hero-servicos"
          data-scroll-progress data-splitting="charsWrapped"
        >O que <span class="title-highlight --font-heading --fs-italic">fazemos.</span></h1>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 2: DECLARAÇÃO — Editorial split (Awwwards-level)
  ============================================================ -->
  <div class="pb-row-wrapper servicos-decl position-relative mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid" data-scroll id="pb-row-servicos-intro" data-scroll-offset="60px,0" data-module-delay>

      <!-- Eyebrow com linha crescendo -->
      <div class="servicos-decl__eyebrow">
        <span class="servicos-decl__eyebrow-label">Nossas soluções</span>
        <span class="servicos-decl__eyebrow-rule" aria-hidden="true"></span>
      </div>

      <!-- Bloco editorial: headline (esq) + aside (dir, alinhado na base) -->
      <div class="servicos-decl__body">

        <h2 class="servicos-decl__headline">
          A maioria das<br>lojas vende<br>luminárias.<br>
          Nós projetamos o<br><span class="title-highlight --font-heading --fs-italic">ambiente que você<br>vai habitar.</span>
        </h2>

        <div class="servicos-decl__aside">
          <p class="servicos-decl__copy">
            Cada espaço tem uma função. Cada função exige uma luz específica. Combinamos projeto técnico rigoroso com curadoria estética de marcas exclusivas — para entregar ambientes que funcionam, impressionam e duram.
          </p>
          <a href="<?php echo esc_url( home_url('/contato') ); ?>" class="servicos-decl__cta">
            <span>Solicitar projeto</span>
            <span class="servicos-decl__cta-arrow" aria-hidden="true">→</span>
          </a>
        </div>

      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 3: TÉCNICA vs DECORATIVA — Editorial split full-bleed
  ============================================================ -->
  <div class="pb-row-wrapper servicos-split position-relative mt-0 mb-0" style="--zindex:3">
    <div class="servicos-split__grid">

      <!-- PAINEL 01: Técnica -->
      <div class="servicos-split__panel" data-num="01" data-scroll data-scroll-offset="60px,0" data-module-delay>
        <div class="servicos-split__inner">

          <p class="servicos-split__tag">Iluminação Técnica</p>

          <h3 class="servicos-split__title">
            A base que ninguém vê —<br>e todo mundo sente.
          </h3>

          <p class="servicos-split__desc">
            Projetada para ser eficiente e precisa. Calculamos watts, fluxo luminoso, IRC, ângulo de facho e temperatura de cor para que cada ambiente funcione exatamente como precisa. O protagonista aqui é a luz, não a luminária.
          </p>

          <ul class="servicos-split__list">
            <?php foreach([
              'Spots e downlights de embutir (residencial e comercial)',
              'Perfis LED para sancas, marcenaria e forro',
              'Luminárias de escritório com controle de ofuscamento',
              'Sistemas de dimmer e automação (tunable white)',
              'Projeto luminotécnico com cálculo de iluminância',
              'Acompanhamento técnico de instalação e comissionamento',
            ] as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>

          <div>
            <a href="<?php echo esc_url( home_url('/contato') ); ?>" class="btn --cta --cta-default">
              <span class="btn__bg" aria-hidden="true"></span>
              <span class="btn__label" aria-hidden="true"><span>Solicitar projeto técnico</span><span>Solicitar projeto técnico</span></span>
            </a>
          </div>

        </div>
      </div>

      <!-- PAINEL 02: Decorativa -->
      <div class="servicos-split__panel" data-num="02" data-scroll data-scroll-offset="60px,0" data-module-delay style="--index:1">
        <div class="servicos-split__inner">

          <p class="servicos-split__tag">Iluminação Decorativa</p>

          <h3 class="servicos-split__title">
            O elemento que transforma<br>espaço em memória.
          </h3>

          <p class="servicos-split__desc">
            Pendentes, arandelas e spots de destaque que não precisam apenas iluminar — precisam ser lembrados. Curadoria rigorosa de marcas nacionais e internacionais disponíveis nos nossos showrooms.
          </p>

          <ul class="servicos-split__list">
            <?php foreach([
              'Pendentes e lustres de design nacional e importado',
              'Arandelas, spots e luminárias de parede',
              'Iluminação de quadros, esculturas e peças de arte',
              'Perfis LED decorativos e fitas para ambientação',
              'Peças exclusivas de marcas internacionais',
              'Consultoria de especificação com amostras físicas',
            ] as $item): ?>
            <li><?php echo esc_html($item); ?></li>
            <?php endforeach; ?>
          </ul>

          <div>
            <a href="https://wa.me/5519999778710?text=Olá!%20Quero%20ver%20luminárias%20decorativas%20no%20showroom%20da%20Vertz." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);background:var(--color-primary);color:var(--color-dark)">
              <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
              <span class="btn__label" aria-hidden="true"><span>Agendar visita ao showroom</span><span>Agendar visita ao showroom</span></span>
            </a>
          </div>

        </div>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 4: SEGMENTOS — Cards com imagens
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:4">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <header class="mb-50 mb-md-70 d-grid grid-column-md-12 grid-gap-12">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600);letter-spacing:0.15em;">Onde atuamos</p>
        <h2 class="col-start-1 col-span-md-8 ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Projetos para cada <span class="title-highlight --font-heading --fs-italic">tipologia.</span>
        </h2>
      </header>

      <div class="d-grid grid-column-1 grid-column-md-2 grid-column-xl-3 grid-gap-20 grid-gap-xl-24">

        <?php
        $segmentos = [
          [
            'titulo'  => 'Residencial de Alto Padrão',
            'desc'    => 'Do apartamento ao condomínio fechado — iluminação que combina conforto visual, eficiência energética e design para quem mora com intenção.',
            'itens'   => ['Spots embutidos e trilhos','Sancas e perfis LED','Fachada e paisagismo','Automação residencial'],
            'img'     => 'servico-residencial.jpg',
            'ratio'   => '4/3',
            'i'       => 0,
          ],
          [
            'titulo'  => 'Comercial e Varejo',
            'desc'    => 'Luz que vende. Iluminação estratégica para lojas, showrooms e restaurantes que destacam produtos, criam atmosfera e aumentam o tempo de permanência.',
            'itens'   => ['Spots ajustáveis de precisão','Iluminação de vitrine','Sistemas de cenas luminosas','Temperatura de cor dinâmica'],
            'img'     => 'servico-comercial.jpg',
            'ratio'   => '4/3',
            'i'       => 1,
          ],
          [
            'titulo'  => 'Corporativo e Escritório',
            'desc'    => 'Ambientes de trabalho que aumentam a produtividade. Reduzimos o consumo energético em até 80% com tecnologia LED certificada e controle inteligente.',
            'itens'   => ['Luminárias com anti-ofuscamento','Controle de iluminância por sensor','Certificação LEED','Manutenção preventiva'],
            'img'     => 'servico-corporativo.jpg',
            'ratio'   => '4/3',
            'i'       => 2,
          ],
          [
            'titulo'  => 'Hotelaria e Gastronomia',
            'desc'    => 'A luz define a experiência do hóspede antes de qualquer palavra. Projetamos a iluminação que faz o ambiente contar a história da marca.',
            'itens'   => ['Iluminação de recepção e lobby','Luz de quarto com dimmer','Ambientação de restaurante','Iluminação de fachada hoteleira'],
            'img'     => 'servico-especial.jpg',
            'ratio'   => '4/3',
            'i'       => 3,
          ],
          [
            'titulo'  => 'Projetos Especiais',
            'desc'    => 'Museus, galerias, hospitais, igrejas — qualquer espaço com demanda única. Trabalhamos em parceria com arquitetos para criar soluções de iluminação exclusivas.',
            'itens'   => ['Iluminação museal (IRC > 97)','Galerias de arte','Ambientes hospitalares','Monumentos e fachadas públicas'],
            'img'     => 'servico-industrial.jpg',
            'ratio'   => '4/3',
            'i'       => 4,
          ],
          [
            'titulo'  => 'Consultoria para Arquitetos',
            'desc'    => 'Trabalhamos como parte da sua equipe, não como fornecedor. Especificação técnica, memorial, amostras físicas e acompanhamento de obra em cada projeto.',
            'itens'   => ['Projeto luminotécnico (DIALux)','Memorial descritivo e quantitativo','Amostras e catálogos técnicos','Visitas de acompanhamento'],
            'img'     => 'servico-consultoria.jpg',
            'ratio'   => '4/3',
            'i'       => 5,
          ],
        ];

        foreach ($segmentos as $s): ?>
        <article class="d-grid grid-gap-20" data-scroll data-scroll-offset="60px,0" data-module-delay style="--index:<?php echo $s['i'] % 3; ?>">

          <div class="overflow-clip" style="border-radius:12px;">
            <!-- IMG: <?php echo esc_html($s['img']); ?> | <?php echo esc_html($s['ratio']); ?> -->
            <img
              src="<?php echo esc_url( $theme_uri . '/assets/images/' . $s['img'] ); ?>"
              alt="<?php echo esc_attr( $s['titulo'] ); ?> — Vertz Iluminação"
              loading="lazy" decoding="async"
              style="width:100%;aspect-ratio:<?php echo esc_attr($s['ratio']); ?>;object-fit:cover;display:block;transition:transform .8s ease;">
          </div>

          <div class="d-grid grid-gap-12" style="border-top:1px solid var(--color-gray-300);padding-top:1.25rem;">
            <h3 class="fz-20 fz-xl-24 fw-400 ls--2 m-0"><?php echo esc_html($s['titulo']); ?></h3>
            <p class="fz-14 fz-xl-15 lh-150 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($s['desc']); ?></p>
            <div class="d-grid grid-gap-6">
              <?php foreach($s['itens'] as $item): ?>
              <p class="fz-12 lh-142 m-0 d-flex align-items-center grid-gap-8">
                <span style="width:4px;height:4px;border-radius:50%;background:var(--color-accent);flex-shrink:0;"></span>
                <?php echo esc_html($item); ?>
              </p>
              <?php endforeach; ?>
            </div>
          </div>

        </article>
        <?php endforeach; ?>

      </div>
    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 5: MÉTODO — Processo em 4 etapas
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:5;background:var(--color-surface);">
    <div class="pb-row container-fluid" data-scroll data-scroll-offset="80px,0" data-module-delay>

      <header class="mb-50 mb-md-70">
        <p class="fz-12 tt-uppercase m-0 mb-15" style="color:var(--color-gray-600);letter-spacing:0.15em;">Método Vertz</p>
        <h2 class="ff-body fz-28 fz-md-40 fz-xl-52 fw-400 ls--3 m-0">
          Do briefing à entrega —<br><span class="title-highlight --font-heading --fs-italic">sem surpresas.</span>
        </h2>
      </header>

      <div class="d-grid grid-column-1 grid-column-md-2 grid-column-xl-4 grid-gap-0">
        <?php
        $processo = [
          ['num'=>'01','titulo'=>'Briefing','desc'=>'Entendemos o projeto, o espaço, quem vai habitar e o orçamento. Sem atalhos — é aqui que os projetos bem-feitos começam.','nota'=>'Sem custo. Presencial ou remoto.'],
          ['num'=>'02','titulo'=>'Projeto Luminotécnico','desc'=>'Cálculo de iluminância, seleção de produtos técnicos e decorativos, memorial descritivo, circuitos e quantitativo. Documentação completa.','nota'=>'Software DIALux. Padrão ABNT.'],
          ['num'=>'03','titulo'=>'Proposta e Aprovação','desc'=>'Apresentamos o investimento, cronograma de fornecimento e alternativas dentro do orçamento. Transparência em cada linha.','nota'=>'Marcas em estoque. Entrega rápida.'],
          ['num'=>'04','titulo'=>'Entrega e Acompanhamento','desc'=>'Fornecemos os produtos, orientamos a instalação e fazemos visitas de acompanhamento. O projeto termina quando o ambiente está como projetado.','nota'=>'2 anos de garantia em todos os produtos.'],
        ];
        foreach ($processo as $i => $e): ?>
        <div class="d-grid grid-gap-15" style="border-top:1px solid var(--color-gray-300);padding-top:2rem;padding-bottom:2rem;<?php echo $i < 3 ? 'padding-right:2rem;' : ''; ?>" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i; ?>">
          <span class="fz-11 tt-uppercase fw-700 d-block" style="color:var(--color-accent);letter-spacing:0.18em;"><?php echo esc_html($e['num']); ?></span>
          <h3 class="fz-20 fz-xl-24 fw-400 ls--2 m-0"><?php echo esc_html($e['titulo']); ?></h3>
          <p class="fz-14 fz-xl-15 lh-155 m-0" style="color:var(--color-gray-600)"><?php echo esc_html($e['desc']); ?></p>
          <p class="fz-11 tt-uppercase fw-500 m-0" style="color:var(--color-dark);letter-spacing:0.08em;"><?php echo esc_html($e['nota']); ?></p>
        </div>
        <?php endforeach; ?>
      </div>

    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 6: MARCAS — Ticker de logos
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-60 pb-60 pt-md-80 pb-md-80 mt-0 mb-0" style="--zindex:6">
    <div class="pb-row container-fluid mb-30 mb-md-50" data-scroll data-scroll-offset="60px,0" data-module-delay>
      <p class="fz-12 tt-uppercase m-0" style="color:var(--color-gray-600);letter-spacing:0.15em;">Marcas que representamos</p>
    </div>
    <div class="pb-row-partners__wrap" style="overflow:hidden;">
      <div class="pb-row-partners__ticker d-flex align-items-center" style="gap:4rem;animation:marquee-scroll 20s linear infinite;">
        <?php for($i = 1; $i <= 5; $i++): ?>
        <div class="pb-row-partners__partner flex-shrink-0" style="--index:<?php echo $i-1; ?>">
          <!-- LOGO: logo-parceiro-0<?php echo $i; ?>.svg -->
          <div style="width:120px;height:40px;background:var(--color-surface);border-radius:4px;display:flex;align-items:center;justify-content:center;">
            <span style="font-size:var(--fz-10);color:var(--color-gray-600);text-transform:uppercase;">parceiro <?php echo $i; ?></span>
          </div>
        </div>
        <?php endfor; ?>
        <?php for($i = 1; $i <= 5; $i++): /* clone para loop */ ?>
        <div class="pb-row-partners__partner flex-shrink-0" aria-hidden="true">
          <div style="width:120px;height:40px;background:var(--color-surface);border-radius:4px;"></div>
        </div>
        <?php endfor; ?>
      </div>
    </div>
  </div>


  <!-- ============================================================
    SEÇÃO 7: CTA FINAL — Duplo, escuro, impactante
  ============================================================ -->
  <div class="pb-row-wrapper position-relative pt-100 pb-100 pt-md-130 pb-md-130 mt-0 mb-0" style="--zindex:7;background:var(--color-header-bg)">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20"
      data-scroll data-scroll-offset="80px,0" data-module-delay>

      <div class="col-start-1 col-span-md-9 col-span-xl-16">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:rgba(255,255,255,0.4);letter-spacing:0.15em;">Pronto para começar?</p>
        <h2 class="ff-body fz-32 fz-md-52 fz-xl-72 fw-400 ls--4 m-0 mb-15" style="color:var(--color-white)">
          Solicite seu<br><span class="title-highlight --font-heading --fs-italic" style="color:var(--color-primary)">projeto.</span>
        </h2>
        <p class="fz-15 fz-xl-17 lh-155 m-0 mb-40" style="color:rgba(255,255,255,0.5);max-width:520px;">
          Envie o projeto do arquiteto, planta baixa ou simplesmente nos descreva o espaço. Em até 48 horas respondemos com uma proposta preliminar.
        </p>
        <div class="d-flex flex-column flex-md-row grid-gap-15">
          <a href="<?php echo esc_url( home_url('/contato') ); ?>" class="btn --cta --cta-default" style="border-color:var(--color-white);color:var(--color-white);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-white);"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar orçamento</span><span style="color:var(--color-dark);">Solicitar orçamento</span></span>
          </a>
          <a href="https://wa.me/5519999778710?text=Olá!%20Quero%20um%20orçamento%20de%20projeto%20luminotécnico." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);background:var(--color-primary);color:var(--color-dark);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
            <span class="btn__label" aria-hidden="true"><span>WhatsApp direto</span><span>WhatsApp direto</span></span>
          </a>
        </div>
      </div>

      <!-- Info contato lateral -->
      <div class="col-start-1 col-start-md-11 col-span-md-2 col-span-xl-6 d-flex flex-column justify-content-center mt-60 mt-md-0" style="border-left:1px solid rgba(255,255,255,0.1);padding-left:2rem;">
        <div class="mb-24">
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">Telefone</p>
          <a href="tel:+551932510501" class="fz-16 fw-400 m-0 d-block" style="color:rgba(255,255,255,0.7);text-decoration:none;">(19) 3251-0501</a>
        </div>
        <div class="mb-24">
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">E-mail</p>
          <a href="mailto:contato@vertziluminacao.com.br" class="fz-14 fw-400 m-0 d-block" style="color:rgba(255,255,255,0.7);text-decoration:none;">contato@vertziluminacao.com.br</a>
        </div>
        <div>
          <p class="fz-11 tt-uppercase fw-500 m-0 mb-8" style="color:var(--color-primary);letter-spacing:0.12em;">Instagram</p>
          <a href="https://instagram.com/vertziluminacao" target="_blank" rel="noopener" class="fz-14 fw-400 m-0 d-block" style="color:rgba(255,255,255,0.7);text-decoration:none;">@vertziluminacao</a>
        </div>
      </div>

    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
