<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Layout: lista tabular estilo Bolt Design.
 * URL: /projetos/
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

  <!-- ── Cabeçalho: título + filtros ───────────────────── -->
  <section class="pj-archive__head">
    <div class="pj-archive__head-row">
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

    <!-- Cabeçalho das colunas -->
    <div class="pj-archive__col-headers">
      <div class="pj-archive__col-headers-inner">
        <span></span><!-- nome: sem label -->
        <span>Papel</span>
        <span>Área</span>
        <span>Prazo</span>
        <span>Localização</span>
        <span></span><!-- link: sem label -->
      </div>
    </div>
  </section>

  <!-- ── Lista de projetos ──────────────────────────────── -->
  <?php if ( $projetos->have_posts() ) : ?>
  <div class="pj-list" id="pj-grid">

    <?php while ( $projetos->have_posts() ) : $projetos->the_post();
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

      // Monta array de imagens para a faixa (cover + galeria)
      $faixa_imgs = array();
      if ( $cover ) $faixa_imgs[] = $cover;
      elseif ( $thumb ) $faixa_imgs[] = $thumb;
      foreach ( $galeria_raw as $g ) {
          if ( ! empty( $g['imagem'] ) ) $faixa_imgs[] = $g['imagem'];
      }
    ?>

    <article class="pj-row" data-cats="<?php echo esc_attr( $cat_slugs ); ?>">

      <!-- Linha de metadados -->
      <div class="pj-row__meta">

        <div class="pj-row__name-wrap">
          <h2 class="pj-row__name">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
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
          <a class="pj-row__link" href="<?php the_permalink(); ?>" aria-label="Ver projeto <?php the_title_attribute(); ?>">
            Ver Projeto ↗
          </a>
        </div>

      </div><!-- /.pj-row__meta -->

      <!-- Faixa de imagens -->
      <?php if ( ! empty( $faixa_imgs ) ) : ?>
      <div class="pj-row__strip" role="img" aria-label="Fotos do projeto <?php the_title_attribute(); ?>">
        <div class="pj-row__strip-inner">
          <?php foreach ( $faixa_imgs as $img_url ) : ?>
          <a class="pj-row__strip-item" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
            <img src="<?php echo esc_url( $img_url ); ?>"
                 alt=""
                 loading="lazy" decoding="async">
          </a>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endif; ?>

    </article><!-- /.pj-row -->

    <?php endwhile; wp_reset_postdata(); ?>

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
  var btns  = document.querySelectorAll('.pj-filter-btn');
  var rows  = document.querySelectorAll('.pj-row');
  var empty = document.getElementById('pj-empty');

  btns.forEach(function (btn) {
    btn.addEventListener('click', function () {
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

      empty.hidden = visible > 0;
    });
  });
})();
</script>

<?php get_footer(); ?>
