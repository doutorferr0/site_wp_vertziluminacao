<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Layout: sticky card stack (baralho) — mesmo top, z-index crescente.
 * Cada card = nome + strip 30vh. Scroll empurra próximo card por cima.
 * Ref: boltdesign.nyc/projects
 */

get_header();

$categorias = get_terms( array(
    'taxonomy'   => 'categoria_projeto',
    'hide_empty' => true,
) );

$projetos = new WP_Query( array(
    'post_type'      => 'projeto',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );
?>

<main class="pj-archive" id="main">

  <!-- Cabeçalho sticky (z-index 0 — fica abaixo dos cards) -->
  <section class="pj-archive__head" id="pj-head">
    <div class="pj-archive__head-inner">
      <div class="pj-archive__top-row">
        <h1 class="pj-archive__title">Projetos</h1>
        <?php if ( ! empty( $categorias ) && ! is_wp_error( $categorias ) ) : ?>
        <div class="pj-archive__filters">
          <span class="pj-archive__filter-label">Filtrar</span>
          <div class="pj-archive__filter-btns">
            <button class="pj-filter-btn is-active" data-cat="">Todos</button>
            <?php foreach ( $categorias as $cat ) : ?>
              <button class="pj-filter-btn" data-cat="<?php echo esc_attr( $cat->slug ); ?>">
                <?php echo esc_html( $cat->name ); ?>
              </button>
            <?php endforeach; ?>
          </div>
        </div>
        <?php endif; ?>
      </div>
      <!-- Labels colunas desktop -->
      <div class="pj-archive__cols">
        <span>Projeto</span>
        <span>Papel</span>
        <span>Área</span>
        <span>Prazo</span>
        <span>Localização</span>
        <span></span>
      </div>
    </div>
  </section>

  <!-- Cards: sticky mesmo top, z-index crescente -->
  <?php if ( $projetos->have_posts() ) : ?>
  <div class="pj-list" id="pj-grid">

    <?php
    $i = 1;
    while ( $projetos->have_posts() ) : $projetos->the_post();
      $pid         = get_the_ID();
      $cover       = vf( 'projeto_cover', $pid );
      $thumb       = has_post_thumbnail() ? get_the_post_thumbnail_url( $pid, 'large' ) : '';
      $cats        = get_the_terms( $pid, 'categoria_projeto' );
      $cat_slugs   = $cats && ! is_wp_error( $cats ) ? implode( ' ', wp_list_pluck( $cats, 'slug' ) ) : '';
      $cat_names   = $cats && ! is_wp_error( $cats ) ? implode( ', ', wp_list_pluck( $cats, 'name' ) ) : '';
      $area        = vf( 'projeto_area', $pid );
      $localizacao = vf( 'projeto_localizacao', $pid );
      $prazo       = vf( 'projeto_prazo', $pid );
      $papel       = vf( 'projeto_papel', $pid );
      $galeria_raw = vf( 'projeto_galeria', $pid, array() );

      $strip_imgs = array();
      if ( $cover )     $strip_imgs[] = $cover;
      elseif ( $thumb ) $strip_imgs[] = $thumb;
      foreach ( $galeria_raw as $g ) {
          if ( ! empty( $g['imagem'] ) ) $strip_imgs[] = $g['imagem'];
      }
    ?>

    <a class="pj-row"
       href="<?php the_permalink(); ?>"
       data-cats="<?php echo esc_attr( $cat_slugs ); ?>"
       style="z-index:<?php echo $i; ?>">

      <!-- Linha de metadados -->
      <div class="pj-row__meta">
        <div class="pj-row__name-wrap">
          <span class="pj-row__name"><?php the_title(); ?></span>
          <?php if ( $cat_names ) : ?>
            <span class="pj-row__cat"><?php echo esc_html( $cat_names ); ?></span>
          <?php endif; ?>
        </div>
        <span class="pj-row__col-val"><?php echo esc_html( $papel ?: 'Projeto Luminotécnico' ); ?></span>
        <span class="pj-row__col-val"><?php echo $area ? esc_html( $area ) : '—'; ?></span>
        <span class="pj-row__col-val"><?php echo $prazo ? esc_html( $prazo ) : '—'; ?></span>
        <span class="pj-row__col-val"><?php echo $localizacao ? esc_html( $localizacao ) : '—'; ?></span>
        <span class="pj-row__link">Ver Projeto ↗</span>
      </div>

      <!-- Strip horizontal de imagens — sempre visível -->
      <?php if ( ! empty( $strip_imgs ) ) : ?>
      <div class="pj-row__strip">
        <?php foreach ( $strip_imgs as $img_url ) : ?>
        <div class="pj-row__strip-item">
          <img src="<?php echo esc_url( $img_url ); ?>"
               alt="" loading="lazy" decoding="async">
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

    </a>

    <?php $i++; endwhile; wp_reset_postdata(); ?>

    <div class="pj-list__empty" id="pj-empty" hidden>
      <p>Nenhum projeto nesta categoria.</p>
    </div>
  </div>

  <?php else : ?>
    <p class="pj-list__no-posts">Nenhum projeto publicado.</p>
  <?php endif; ?>

</main>

<script>
(function () {
  // Calcula --pj-card-top = altura do header + altura do pj-head
  function calcTop() {
    var header = document.querySelector('.site-header, header#masthead, header');
    var head   = document.getElementById('pj-head');
    var hh = header ? header.offsetHeight : 0;
    var ph = head   ? head.offsetHeight   : 0;
    document.documentElement.style.setProperty('--pj-card-top', (hh + ph) + 'px');
    document.documentElement.style.setProperty('--pj-head-top', hh + 'px');
  }
  calcTop();
  window.addEventListener('resize', calcTop);

  // Filtro
  var btns  = document.querySelectorAll('.pj-filter-btn');
  var rows  = document.querySelectorAll('.pj-row');
  var empty = document.getElementById('pj-empty');

  btns.forEach(function(btn) {
    btn.addEventListener('click', function(e) {
      e.preventDefault();
      btns.forEach(function(b){ b.classList.remove('is-active'); });
      btn.classList.add('is-active');
      var cat = btn.dataset.cat;
      var visible = 0;
      rows.forEach(function(row) {
        var cats = row.dataset.cats || '';
        var show = !cat || cats.split(' ').indexOf(cat) !== -1;
        row.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      if (empty) empty.hidden = visible > 0;
    });
  });

  // Drag scroll no strip
  document.querySelectorAll('.pj-row__strip').forEach(function(strip) {
    var down = false, sx, sl;
    strip.addEventListener('mousedown', function(e){
      down = true; sx = e.pageX; sl = strip.scrollLeft;
      strip.style.cursor = 'grabbing';
    });
    document.addEventListener('mouseup', function(){
      down = false;
      document.querySelectorAll('.pj-row__strip').forEach(function(s){
        s.style.cursor = '';
      });
    });
    strip.addEventListener('mousemove', function(e){
      if (!down) return;
      e.preventDefault();
      strip.scrollLeft = sl - (e.pageX - sx);
    });
  });
})();
</script>

<?php get_footer(); ?>
