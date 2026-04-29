<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Layout: accordion vertical — 1 projeto ativo (30vh) por vez.
 * Colapsado: só nome visível. Expandido: nome + strip horizontal.
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

  <!-- Cabeçalho sticky -->
  <section class="pj-archive__head" id="pj-head">
    <div class="pj-archive__head-inner">
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
  </section>

  <!-- Lista -->
  <?php if ( $projetos->have_posts() ) : ?>
  <div class="pj-list" id="pj-grid">

    <?php while ( $projetos->have_posts() ) : $projetos->the_post();
      $pid         = get_the_ID();
      $cover       = vf( 'projeto_cover', $pid );
      $thumb       = has_post_thumbnail() ? get_the_post_thumbnail_url( $pid, 'large' ) : '';
      $cats        = get_the_terms( $pid, 'categoria_projeto' );
      $cat_slugs   = $cats && ! is_wp_error( $cats ) ? implode( ' ', wp_list_pluck( $cats, 'slug' ) ) : '';
      $cat_names   = $cats && ! is_wp_error( $cats ) ? implode( ', ', wp_list_pluck( $cats, 'name' ) ) : '';
      $galeria_raw = vf( 'projeto_galeria', $pid, array() );
      $papel       = vf( 'projeto_papel', $pid );

      $strip_imgs = array();
      if ( $cover )     $strip_imgs[] = $cover;
      elseif ( $thumb ) $strip_imgs[] = $thumb;
      foreach ( $galeria_raw as $g ) {
          if ( ! empty( $g['imagem'] ) ) $strip_imgs[] = $g['imagem'];
      }
    ?>

    <div class="pj-row" data-cats="<?php echo esc_attr( $cat_slugs ); ?>">

      <!-- Nome — clicável -->
      <a class="pj-row__head" href="<?php the_permalink(); ?>">
        <span class="pj-row__name"><?php the_title(); ?></span>
        <?php if ( $cat_names ) : ?>
          <span class="pj-row__cat"><?php echo esc_html( $cat_names ); ?></span>
        <?php endif; ?>
        <span class="pj-row__role"><?php echo esc_html( $papel ?: 'Projeto Luminotécnico' ); ?></span>
        <span class="pj-row__link">Ver ↗</span>
      </a>

      <!-- Strip — visível só quando ativo -->
      <?php if ( ! empty( $strip_imgs ) ) : ?>
      <div class="pj-row__strip" aria-hidden="true">
        <?php foreach ( $strip_imgs as $img_url ) : ?>
        <a class="pj-row__strip-item" href="<?php the_permalink(); ?>" tabindex="-1">
          <img src="<?php echo esc_url( $img_url ); ?>"
               alt="" loading="lazy" decoding="async">
        </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

    </div>

    <?php endwhile; wp_reset_postdata(); ?>

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
  var rows    = Array.from(document.querySelectorAll('.pj-row'));
  var current = null;

  function activate(row) {
    if (current === row) return;
    if (current) current.classList.remove('is-active');
    current = row;
    if (current) current.classList.add('is-active');
  }

  // Ativa o row cujo topo está mais próximo de 30% do viewport
  function onScroll() {
    var target = 0.30 * window.innerHeight;
    var best = null;
    var bestDist = Infinity;

    rows.forEach(function(row) {
      if (row.style.display === 'none') return;
      var rect = row.getBoundingClientRect();
      var dist = Math.abs(rect.top - target);
      if (dist < bestDist) { bestDist = dist; best = row; }
    });

    activate(best);
  }

  // Ativa o primeiro ao carregar
  function init() {
    var visible = rows.filter(function(r){ return r.style.display !== 'none'; });
    if (visible.length) activate(visible[0]);
  }

  window.addEventListener('scroll', onScroll, { passive: true });
  init();

  // Filtro
  var btns  = document.querySelectorAll('.pj-filter-btn');
  var empty = document.getElementById('pj-empty');

  btns.forEach(function(btn) {
    btn.addEventListener('click', function() {
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
      current = null;
      onScroll();
    });
  });

  // Drag scroll horizontal no strip
  document.querySelectorAll('.pj-row__strip').forEach(function(strip) {
    var isDown = false, startX, scrollLeft;
    strip.addEventListener('mousedown', function(e) {
      isDown = true; startX = e.pageX; scrollLeft = strip.scrollLeft;
    });
    document.addEventListener('mouseup', function() { isDown = false; });
    strip.addEventListener('mousemove', function(e) {
      if (!isDown) return;
      e.preventDefault();
      strip.scrollLeft = scrollLeft - (e.pageX - startX);
    });
  });
})();
</script>

<?php get_footer(); ?>
