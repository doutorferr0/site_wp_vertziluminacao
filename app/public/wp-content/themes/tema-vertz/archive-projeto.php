<?php
/**
 * archive-projeto.php — Vertz Iluminação
 * Layout: boltdesign.nyc/projects
 */
get_header();

$categorias = get_terms( ['taxonomy' => 'categoria_projeto', 'hide_empty' => true] );
$cat_slug   = isset( $_GET['categoria'] ) ? sanitize_text_field( $_GET['categoria'] ) : '';

$query_args = [
    'post_type'      => 'projeto',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
];
if ( $cat_slug ) {
    $query_args['tax_query'] = [[
        'taxonomy' => 'categoria_projeto',
        'field'    => 'slug',
        'terms'    => $cat_slug,
    ]];
}
$projetos = new WP_Query( $query_args );
?>

<main class="pj-archive">

  <!-- CABEÇALHO ─────────────────────────────────────── -->
  <header class="pj-archive__header">
    <h1 class="pj-archive__title">Projetos</h1>

    <div class="pj-archive__filter-wrap">
      <span class="pj-archive__filter-label">Filtrar por</span>
      <div class="pj-archive__pills">
        <a href="<?php echo get_post_type_archive_link('projeto'); ?>"
           class="pj-pill <?php echo !$cat_slug ? 'is-active' : ''; ?>">Todos</a>
        <?php foreach ( $categorias as $cat ): ?>
        <a href="<?php echo add_query_arg('categoria', $cat->slug, get_post_type_archive_link('projeto')); ?>"
           class="pj-pill <?php echo $cat_slug === $cat->slug ? 'is-active' : ''; ?>">
          <?php echo esc_html( $cat->name ); ?>
        </a>
        <?php endforeach; ?>
      </div>
    </div>
  </header>

  <!-- COLUNAS HEADER ────────────────────────────────── -->
  <div class="pj-archive__cols">
    <span></span>
    <span>Tipo de Serviço</span>
    <span>Área</span>
    <span>Localização</span>
    <span></span>
  </div>
  <hr class="pj-hr">

  <!-- LISTA ─────────────────────────────────────────── -->
  <?php if ( $projetos->have_posts() ): while ( $projetos->have_posts() ): $projetos->the_post();
    $tipo    = get_post_meta( get_the_ID(), '_projeto_tipo_servico', true );
    $area    = get_post_meta( get_the_ID(), '_projeto_area', true );
    $loc     = get_post_meta( get_the_ID(), '_projeto_localizacao', true );
    $galeria = get_post_meta( get_the_ID(), '_projeto_galeria', true );
    $gal_ids = $galeria ? array_filter( array_map( 'intval', explode(',', $galeria) ) ) : [];
  ?>
  <article class="pj-item">

    <!-- Linha de metadados -->
    <div class="pj-item__row">
      <h2 class="pj-item__title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h2>
      <span class="pj-item__meta"><?php echo esc_html( $tipo ?: '—' ); ?></span>
      <span class="pj-item__meta"><?php echo $area ? esc_html($area).' m²' : '—'; ?></span>
      <span class="pj-item__meta"><?php echo esc_html( $loc ?: '—' ); ?></span>
      <a href="<?php the_permalink(); ?>" class="pj-item__cta" aria-label="Ver projeto <?php the_title_attribute(); ?>">
        Ver Projeto →
      </a>
    </div>

    <!-- Galeria horizontal ─────────────────────────── -->
    <?php if ( has_post_thumbnail() || $gal_ids ): ?>
    <div class="pj-item__gallery">
      <?php if ( has_post_thumbnail() ):
        echo get_the_post_thumbnail( null, 'large', ['class' => 'pj-item__img', 'loading' => 'lazy'] );
      endif;
      foreach ( $gal_ids as $img_id ):
        $src = wp_get_attachment_image_url( $img_id, 'large' );
        if ( $src ) echo '<img src="'.esc_url($src).'" class="pj-item__img" loading="lazy" alt="">';
      endforeach; ?>
    </div>
    <?php endif; ?>

    <hr class="pj-hr">
  </article>
  <?php endwhile; wp_reset_postdata();
  else: ?>
  <p class="pj-empty">Nenhum projeto encontrado.</p>
  <?php endif; ?>

</main>

<?php get_footer(); ?>
