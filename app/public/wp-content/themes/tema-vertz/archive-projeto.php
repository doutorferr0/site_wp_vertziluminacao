<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Layout: sticky stacking rows, horizontal image scroll.
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

  <!-- Cabeçalho sticky: título + filtros -->
  <section class="pj-archive__head" id="pj-head">
    <div class="pj-archive__head-inner">
      <div class="pj-archive__title-row">
        <h1 class="pj-archive__title">Projetos</h1>
        <?php if ( ! empty( $categorias ) && ! is_wp_error( $categorias ) ) : ?>
        <div class="pj-archive__filters">
          <span class="pj-archive__filter-label">Filtrar por</span>
          <div class="pj-archive__filter-btns" role="navigation" aria-label="Filtrar projetos">
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
      <!-- Cabeçalho colunas desktop -->
      <div class="pj-archive__col-headers">
        <span></span>
        <span>Papel</span>
        <span>Área</span>
        <span>Prazo</span>
        <span>Localização</span>
        <span></span>
      </div>
    </div>
  </section>

  <!-- Lista de projetos -->
  <?php if ( $projetos->have_posts() ) : ?>
  <div class="pj-list" id="pj-grid">

    <?php
    $row_index = 1;
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

      // Imagens para o strip horizontal
      $strip_imgs = array();
      if ( $cover )       $strip_imgs[] = $cover;
      elseif ( $thumb )   $strip_imgs[] = $thumb;
      foreach ( $galeria_raw as $g ) {
          if ( ! empty( $g['imagem'] ) ) $strip_imgs[] = $g['imagem'];
      }
    ?>

    <a class="pj-row"
       href="<?php the_permalink(); ?>"
       data-cats="<?php echo esc_attr( $cat_slugs ); ?>"
       style="z-index:<?php echo $row_index; ?>">

      <!-- Linha meta -->
      <div class="pj-row__meta">
        <div class="pj-row__name-wrap">
          <span class="pj-row__name"><?php the_title(); ?></span>
          <?php if ( $cat_names ) : ?>
            <span class="pj-row__cat"><?php echo esc_html( $cat_names ); ?></span>
          <?php endif; ?>
        </div>
        <div class="pj-row__col">
          <span class="pj-row__col-label">Papel</span>
          <span class="pj-row__col-val"><?php echo esc_html( $papel ?: 'Projeto Luminotécnico' ); ?></span>
        </div>
        <div class="pj-row__col">
          <span class="pj-row__col-label">Área</span>
          <span class="pj-row__col-val"><?php echo $area ? esc_html( $area ) : '—'; ?></span>
        </div>
        <div class="pj-row__col">
          <span class="pj-row__col-label">Prazo</span>
          <span class="pj-row__col-val"><?php echo $prazo ? esc_html( $prazo ) : '—'; ?></span>
        </div>
        <div class="pj-row__col">
          <span class="pj-row__col-label">Localização</span>
          <span class="pj-row__col-val"><?php echo $localizacao ? esc_html( $localizacao ) : '—'; ?></span>
        </div>
        <div class="pj-row__link-wrap">
          <span class="pj-row__link">Ver Projeto ↗</span>
        </div>
      </div>

      <!-- Strip horizontal de imagens -->
      <?php if ( ! empty( $strip_imgs ) ) : ?>
      <div class="pj-row__strip" aria-hidden="true">
        <?php foreach ( $strip_imgs as $img_url ) : ?>
        <div class="pj-row__strip-item">
          <img src="<?php echo esc_url( $img_url ); ?>"
               alt=""
               loading="lazy" decoding="async">
        </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

    </a><!-- /.pj-row -->

    <?php
    $row_index++;
    endwhile;
    wp_reset_postdata();
    ?>

    <div class="pj-list__empty" id="pj-empty" hidden>
      <p>Nenhum projeto nesta categoria.</p>
    </div>
  </div>

  <?php else : ?>
    <p class="pj-list__no-posts">Nenhum projeto publicado ainda.</p>
  <?php endif; ?>

</main>

<script>
(function () {
  // Calcula top dinâmico dos rows (header + filtros)
  function setRowTop() {
    var head = document.getElementById('pj-head');
    var headerEl = document.querySelector('.site-header, header.site-header, #masthead');
    var headerH = headerEl ? headerEl.offsetHeight : 117;
    var headH   = head ? head.offsetHeight : 110;
    document.documentElement.style.setProperty('--pj-row-top', (headerH + headH) + 'px');
    document.documentElement.style.setProperty('--pj-head-top', headerH + 'px');
  }
  setRowTop();
  window.addEventListener('resize', setRowTop);

  // Filtro por categoria
  var btns  = document.querySelectorAll('.pj-filter-btn');
  var rows  = document.querySelectorAll('.pj-row');
  var empty = document.getElementById('pj-empty');

  btns.forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      btns.forEach(function (b) { b.classList.remove('is-active'); });
      btn.classList.add('is-active');
      var cat = btn.dataset.cat;
      var visible = 0;
      rows.forEach(function (row) {
        var cats = row.dataset.cats || '';
        var show = !cat || cats.split(' ').indexOf(cat) !== -1;
        row.style.display = show ? '' : 'none';
        if (show) visible++;
      });
      if (empty) empty.hidden = visible > 0;
    });
  });

  // Drag scroll horizontal no strip
  document.querySelectorAll('.pj-row__strip').forEach(function(strip) {
    var isDown = false, startX, scrollLeft;
    strip.addEventListener('mousedown', function(e) {
      e.preventDefault();
      isDown = true;
      strip.style.cursor = 'grabbing';
      startX = e.pageX - strip.offsetLeft;
      scrollLeft = strip.scrollLeft;
    });
    document.addEventListener('mouseup', function() {
      isDown = false;
      strip.style.cursor = 'e-resize';
    });
    strip.addEventListener('mousemove', function(e) {
      if (!isDown) return;
      e.preventDefault();
      var x = e.pageX - strip.offsetLeft;
      strip.scrollLeft = scrollLeft - (x - startX);
    });
  });
})();
</script>

<?php get_footer(); ?>
