<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Listagem de projetos: grid filtrado por categoria.
 * URL: /projetos/
 */

get_header();

// Todas as categorias para filtros
$categorias = get_terms( array(
    'taxonomy'   => 'categoria_projeto',
    'hide_empty' => true,
) );

// Categoria ativa (URL param ?cat=slug)
$cat_ativa = isset( $_GET['cat'] ) ? sanitize_key( $_GET['cat'] ) : '';

// Query: todos os projetos (filtro via JS no front-end)
$projetos = new WP_Query( array(
    'post_type'      => 'projeto',
    'posts_per_page' => -1,
    'post_status'    => 'publish',
    'orderby'        => 'menu_order date',
    'order'          => 'ASC',
) );
?>

<main class="pj-archive" id="main">

  <!-- ── Header da página ──────────────────────────────── -->
  <section class="pj-archive__header">
    <div class="pj-archive__header-inner">
      <h1 class="pj-archive__title">Projetos</h1>
      <?php if ( ! empty( $categorias ) && ! is_wp_error( $categorias ) ) : ?>
      <div class="pj-archive__filters" role="navigation" aria-label="Filtrar projetos">
        <button class="pj-filter-btn is-active" data-cat="">Todos</button>
        <?php foreach ( $categorias as $cat ) : ?>
          <button class="pj-filter-btn" data-cat="<?php echo esc_attr( $cat->slug ); ?>">
            <?php echo esc_html( $cat->name ); ?>
          </button>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>
    </div>
  </section>

  <!-- ── Grid de projetos ──────────────────────────────── -->
  <section class="pj-archive__grid-wrap">
    <?php if ( $projetos->have_posts() ) : ?>
    <div class="pj-archive__grid" id="pj-grid">
      <?php while ( $projetos->have_posts() ) : $projetos->the_post();
        $pid       = get_the_ID();
        $cover     = vf( 'projeto_cover', $pid );
        $thumb     = has_post_thumbnail() ? get_the_post_thumbnail_url( $pid, 'large' ) : '';
        $img       = $cover ?: $thumb;
        $cats      = get_the_terms( $pid, 'categoria_projeto' );
        $cat_slugs = $cats && ! is_wp_error( $cats )
                     ? implode( ' ', wp_list_pluck( $cats, 'slug' ) )
                     : '';
        $cat_names = $cats && ! is_wp_error( $cats )
                     ? implode( ', ', wp_list_pluck( $cats, 'name' ) )
                     : '';
        $localizacao = vf( 'projeto_localizacao', $pid );
        $ano         = vf( 'projeto_ano', $pid );
      ?>
      <article class="pj-card" data-cats="<?php echo esc_attr( $cat_slugs ); ?>">
        <a class="pj-card__link" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">

          <div class="pj-card__img-wrap">
            <?php if ( $img ) : ?>
            <img class="pj-card__img"
                 src="<?php echo esc_url( $img ); ?>"
                 alt="<?php the_title_attribute(); ?>"
                 loading="lazy" decoding="async">
            <?php else : ?>
            <div class="pj-card__img pj-card__img--placeholder"></div>
            <?php endif; ?>
            <div class="pj-card__overlay">
              <span class="pj-card__overlay-label">Ver projeto →</span>
            </div>
          </div>

          <div class="pj-card__info">
            <h2 class="pj-card__title"><?php the_title(); ?></h2>
            <div class="pj-card__meta">
              <?php if ( $cat_names ) : ?>
                <span class="pj-card__cat"><?php echo esc_html( $cat_names ); ?></span>
              <?php endif; ?>
              <?php if ( $localizacao ) : ?>
                <span class="pj-card__loc"><?php echo esc_html( $localizacao ); ?></span>
              <?php endif; ?>
            </div>
          </div>

        </a>
      </article>
      <?php endwhile; wp_reset_postdata(); ?>

      <!-- Estado vazio (filtro sem resultados) -->
      <div class="pj-archive__empty" id="pj-empty" hidden>
        <p>Nenhum projeto nesta categoria.</p>
      </div>
    </div>
    <?php else : ?>
      <p class="pj-archive__no-posts">Nenhum projeto publicado ainda.</p>
    <?php endif; ?>
  </section>

</main>

<script>
(function() {
  const btns = document.querySelectorAll('.pj-filter-btn');
  const cards = document.querySelectorAll('.pj-card');
  const empty = document.getElementById('pj-empty');

  btns.forEach(function(btn) {
    btn.addEventListener('click', function() {
      btns.forEach(function(b) { b.classList.remove('is-active'); });
      btn.classList.add('is-active');

      var cat = btn.dataset.cat;
      var visible = 0;

      cards.forEach(function(card) {
        var cats = card.dataset.cats || '';
        var show = !cat || cats.split(' ').indexOf(cat) !== -1;
        card.style.display = show ? '' : 'none';
        if (show) visible++;
      });

      empty.hidden = visible > 0;
    });
  });
})();
</script>

<?php get_footer(); ?>
