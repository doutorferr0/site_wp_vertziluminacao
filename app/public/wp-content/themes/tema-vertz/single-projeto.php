<?php
/**
 * single-projeto.php — Vertz Iluminação
<<<<<<< HEAD
 * Página individual de projeto.
 * Layout: hero fullscreen → sticky titlebar → meta + galeria → nav prev/next
=======
 * Single project: hero + meta + galeria masonry.
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
 * Inspirado em boltdesign.nyc/projects/[slug]
 */

get_header();

if ( ! have_posts() ) { get_footer(); exit; }
the_post();

$pid          = get_the_ID();
$cover        = vf( 'projeto_cover', $pid );
$thumb        = has_post_thumbnail() ? get_the_post_thumbnail_url( $pid, 'full' ) : '';
$hero_img     = $cover ?: $thumb;
$area         = vf( 'projeto_area', $pid );
$localizacao  = vf( 'projeto_localizacao', $pid );
$prazo        = vf( 'projeto_prazo', $pid );
$ano          = vf( 'projeto_ano', $pid );
$descricao    = vf( 'projeto_descricao', $pid );
$servicos_raw = vf( 'projeto_servicos', $pid, array() );
$galeria_raw  = vf( 'projeto_galeria', $pid, array() );

<<<<<<< HEAD
=======
// Categorias
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
$cats      = get_the_terms( $pid, 'categoria_projeto' );
$cat_names = $cats && ! is_wp_error( $cats )
             ? implode( ', ', wp_list_pluck( $cats, 'name' ) )
             : '';

<<<<<<< HEAD
=======
// Projetos anterior / próximo
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
$prev_post = get_adjacent_post( false, '', true,  'categoria_projeto' );
$next_post = get_adjacent_post( false, '', false, 'categoria_projeto' );
?>

<main class="pj-single" id="main">

<<<<<<< HEAD
  <!-- 1. Hero fullscreen com imagem de fundo -->
=======
  <!-- ── 1. Hero com imagem de fundo fullscreen ──────── -->
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
  <section class="pj-single__hero" aria-label="Capa do projeto">
    <?php if ( $hero_img ) : ?>
    <div class="pj-single__hero-bg">
      <img src="<?php echo esc_url( $hero_img ); ?>"
           alt="<?php the_title_attribute(); ?>"
           class="pj-single__hero-img"
           loading="eager" decoding="async">
      <div class="pj-single__hero-overlay"></div>
    </div>
    <?php endif; ?>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
    <div class="pj-single__hero-content">
      <div class="pj-single__hero-breadcrumb">
        <a href="<?php echo esc_url( get_post_type_archive_link( 'projeto' ) ); ?>">← Projetos</a>
      </div>
      <h1 class="pj-single__hero-title"><?php the_title(); ?></h1>
      <?php if ( $cat_names ) : ?>
        <p class="pj-single__hero-cat"><?php echo esc_html( $cat_names ); ?></p>
      <?php endif; ?>
    </div>
  </section>

<<<<<<< HEAD
  <!-- 2. Barra de título sticky (aparece ao sair do hero) -->
=======
  <!-- ── 2. Sticky title bar ─────────────────────────── -->
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
  <div class="pj-single__titlebar" data-sticky-bar>
    <div class="pj-single__titlebar-inner">
      <span class="pj-single__titlebar-name"><?php the_title(); ?></span>
      <?php if ( $cat_names ) : ?>
        <span class="pj-single__titlebar-cat"><?php echo esc_html( $cat_names ); ?></span>
      <?php endif; ?>
    </div>
  </div>

<<<<<<< HEAD
  <!-- 3. Meta do projeto + primeira foto -->
  <section class="pj-single__body">
    <div class="pj-single__body-inner">

      <!-- Coluna esquerda: dados + descrição -->
      <div class="pj-single__col-meta">

        <dl class="pj-single__meta-grid">
=======
  <!-- ── 3. Conteúdo principal: meta + primeira imagem ─ -->
  <section class="pj-single__body">
    <div class="pj-single__body-inner">

      <!-- Coluna esquerda: meta + descrição -->
      <div class="pj-single__col-meta">

        <!-- Meta dados -->
        <div class="pj-single__meta-grid">
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
          <?php if ( $area ) : ?>
          <div class="pj-single__meta-item">
            <dt>Área</dt>
            <dd><?php echo esc_html( $area ); ?></dd>
          </div>
          <?php endif; ?>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
          <?php if ( $localizacao ) : ?>
          <div class="pj-single__meta-item">
            <dt>Localização</dt>
            <dd><?php echo esc_html( $localizacao ); ?></dd>
          </div>
          <?php endif; ?>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
          <?php if ( $prazo ) : ?>
          <div class="pj-single__meta-item">
            <dt>Prazo</dt>
            <dd><?php echo esc_html( $prazo ); ?></dd>
          </div>
          <?php endif; ?>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
          <?php if ( $ano ) : ?>
          <div class="pj-single__meta-item">
            <dt>Ano</dt>
            <dd><?php echo esc_html( $ano ); ?></dd>
          </div>
          <?php endif; ?>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
          <?php if ( ! empty( $servicos_raw ) ) : ?>
          <div class="pj-single__meta-item pj-single__meta-item--services">
            <dt>Serviços</dt>
            <dd>
              <?php foreach ( $servicos_raw as $s ) : ?>
                <span><?php echo esc_html( $s['titulo'] ); ?></span>
              <?php endforeach; ?>
            </dd>
          </div>
          <?php endif; ?>
<<<<<<< HEAD
        </dl>
=======
        </div>
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5

        <!-- Descrição com "Ler mais" -->
        <?php if ( $descricao ) : ?>
        <div class="pj-single__desc" data-desc-wrap>
          <div class="pj-single__desc-text" data-desc-text>
            <?php echo wp_kses_post( $descricao ); ?>
          </div>
          <div class="pj-single__desc-fade" data-desc-fade aria-hidden="true"></div>
<<<<<<< HEAD
          <button class="pj-single__desc-toggle" data-desc-toggle type="button">Ler mais</button>
=======
          <button class="pj-single__desc-toggle" data-desc-toggle type="button">
            Ler mais
          </button>
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
        </div>
        <?php endif; ?>

      </div>

      <!-- Coluna direita: primeira imagem da galeria -->
      <?php if ( ! empty( $galeria_raw ) ) :
<<<<<<< HEAD
        $first = $galeria_raw[0]; ?>
=======
        $first = $galeria_raw[0];
      ?>
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
      <div class="pj-single__col-img">
        <div class="pj-single__img-wrap">
          <img src="<?php echo esc_url( $first['imagem'] ); ?>"
               alt="<?php echo esc_attr( $first['legenda'] ?: get_the_title() ); ?>"
               loading="lazy" decoding="async"
               class="pj-single__img pj-lightbox-trigger"
               data-full="<?php echo esc_url( $first['imagem'] ); ?>">
        </div>
      </div>
      <?php endif; ?>

    </div>
  </section>

<<<<<<< HEAD
  <!-- 4. Galeria masonry 2 colunas -->
  <?php
  $galeria_resto = array_slice( $galeria_raw, 1 );
  if ( ! empty( $galeria_resto ) ) :
    $col_a = array(); $col_b = array();
    foreach ( $galeria_resto as $i => $item ) {
      if ( $i % 2 === 0 ) $col_a[] = $item;
      else                 $col_b[] = $item;
    }
  ?>
  <section class="pj-single__gallery" aria-label="Galeria">
    <div class="pj-single__gallery-grid">
=======
  <!-- ── 4. Galeria masonry 2 colunas ────────────────── -->
  <?php
  // Galeria: exclui a primeira (já exibida acima)
  $galeria_resto = array_slice( $galeria_raw, 1 );
  if ( ! empty( $galeria_resto ) ) :
    // Divide em 2 colunas (alternando)
    $col_a = array();
    $col_b = array();
    foreach ( $galeria_resto as $i => $item ) {
        if ( $i % 2 === 0 ) $col_a[] = $item;
        else                 $col_b[] = $item;
    }
  ?>
  <section class="pj-single__gallery" aria-label="Galeria de imagens">
    <div class="pj-single__gallery-grid">

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
      <div class="pj-single__gallery-col">
        <?php foreach ( $col_a as $item ) : ?>
        <div class="pj-single__gallery-item">
          <img src="<?php echo esc_url( $item['imagem'] ); ?>"
               alt="<?php echo esc_attr( $item['legenda'] ?: get_the_title() ); ?>"
               loading="lazy" decoding="async"
               class="pj-lightbox-trigger"
               data-full="<?php echo esc_url( $item['imagem'] ); ?>">
        </div>
        <?php endforeach; ?>
      </div>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
      <div class="pj-single__gallery-col">
        <?php foreach ( $col_b as $item ) : ?>
        <div class="pj-single__gallery-item">
          <img src="<?php echo esc_url( $item['imagem'] ); ?>"
               alt="<?php echo esc_attr( $item['legenda'] ?: get_the_title() ); ?>"
               loading="lazy" decoding="async"
               class="pj-lightbox-trigger"
               data-full="<?php echo esc_url( $item['imagem'] ); ?>">
        </div>
        <?php endforeach; ?>
      </div>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
    </div>
  </section>
  <?php endif; ?>

<<<<<<< HEAD
  <!-- 5. Navegação anterior / próximo -->
=======
  <!-- ── 5. Navegação prev / next ────────────────────── -->
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
  <nav class="pj-single__nav" aria-label="Navegar projetos">
    <?php if ( $prev_post ) : ?>
    <a class="pj-single__nav-prev" href="<?php echo esc_url( get_permalink( $prev_post ) ); ?>">
      <span class="pj-single__nav-label">Projeto anterior</span>
      <span class="pj-single__nav-title">← <?php echo esc_html( get_the_title( $prev_post ) ); ?></span>
    </a>
    <?php else : ?>
    <a class="pj-single__nav-prev" href="<?php echo esc_url( get_post_type_archive_link( 'projeto' ) ); ?>">
      <span class="pj-single__nav-label">← Todos os projetos</span>
    </a>
    <?php endif; ?>
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
    <?php if ( $next_post ) : ?>
    <a class="pj-single__nav-next" href="<?php echo esc_url( get_permalink( $next_post ) ); ?>">
      <span class="pj-single__nav-label">Próximo projeto</span>
      <span class="pj-single__nav-title"><?php echo esc_html( get_the_title( $next_post ) ); ?> →</span>
    </a>
    <?php endif; ?>
  </nav>

</main>

<<<<<<< HEAD
<!-- Lightbox -->
=======
<!-- ── Lightbox simples ──────────────────────────────────── -->
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
<div class="pj-lightbox" id="pj-lightbox" hidden aria-modal="true" role="dialog">
  <button class="pj-lightbox__close" id="pj-lightbox-close" aria-label="Fechar">×</button>
  <div class="pj-lightbox__bg" id="pj-lightbox-bg"></div>
  <img class="pj-lightbox__img" id="pj-lightbox-img" src="" alt="">
</div>

<script>
(function() {
<<<<<<< HEAD
  // Ler mais / Fechar
=======
  // ── Desc "Ler mais" ──────────────────────────────────────
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
  var wrap   = document.querySelector('[data-desc-wrap]');
  var text   = document.querySelector('[data-desc-text]');
  var fade   = document.querySelector('[data-desc-fade]');
  var toggle = document.querySelector('[data-desc-toggle]');

  if (wrap && text && toggle) {
<<<<<<< HEAD
    var fullH  = text.scrollHeight;
    var shortH = 180;
    if (fullH <= shortH) {
=======
    var fullH = text.scrollHeight;
    var shortH = 180; // px colapsado

    if (fullH <= shortH) {
      // Texto curto: esconde botão
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
      toggle.hidden = true;
      if (fade) fade.hidden = true;
    } else {
      text.style.maxHeight = shortH + 'px';
      text.style.overflow  = 'hidden';
<<<<<<< HEAD
      toggle.addEventListener('click', function() {
        var isOpen = wrap.classList.toggle('is-open');
        text.style.maxHeight = isOpen ? fullH + 'px' : shortH + 'px';
        toggle.textContent   = isOpen ? 'Fechar' : 'Ler mais';
=======

      toggle.addEventListener('click', function() {
        var isOpen = wrap.classList.toggle('is-open');
        text.style.maxHeight  = isOpen ? fullH + 'px' : shortH + 'px';
        toggle.textContent    = isOpen ? 'Fechar' : 'Ler mais';
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
        if (fade) fade.hidden = isOpen;
      });
    }
  }

<<<<<<< HEAD
  // Lightbox
=======
  // ── Lightbox ──────────────────────────────────────────────
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
  var lb      = document.getElementById('pj-lightbox');
  var lbImg   = document.getElementById('pj-lightbox-img');
  var lbBg    = document.getElementById('pj-lightbox-bg');
  var lbClose = document.getElementById('pj-lightbox-close');

  document.querySelectorAll('.pj-lightbox-trigger').forEach(function(img) {
    img.addEventListener('click', function() {
      lbImg.src = img.dataset.full || img.src;
      lbImg.alt = img.alt;
      lb.hidden = false;
      document.body.style.overflow = 'hidden';
    });
  });

  function closeLb() {
    lb.hidden = true;
    lbImg.src = '';
    document.body.style.overflow = '';
  }

  if (lbClose) lbClose.addEventListener('click', closeLb);
  if (lbBg)    lbBg.addEventListener('click', closeLb);
<<<<<<< HEAD
=======

>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
  document.addEventListener('keydown', function(e) {
    if (e.key === 'Escape') closeLb();
  });

<<<<<<< HEAD
  // Sticky titlebar: aparece quando o hero sai da tela
  var bar  = document.querySelector('[data-sticky-bar]');
  var hero = document.querySelector('.pj-single__hero');
=======
  // ── Sticky titlebar ───────────────────────────────────────
  var bar   = document.querySelector('[data-sticky-bar]');
  var hero  = document.querySelector('.pj-single__hero');
>>>>>>> cd33aa8350bdd1fd5ac74bd74a99a3bafd586bd5
  if (bar && hero) {
    var obs = new IntersectionObserver(function(entries) {
      bar.classList.toggle('is-visible', !entries[0].isIntersecting);
    }, { threshold: 0 });
    obs.observe(hero);
  }
})();
</script>

<?php get_footer(); ?>
