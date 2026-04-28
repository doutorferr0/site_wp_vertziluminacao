<?php
/**
 * single-projeto.php — Vertz Iluminação
 * Layout: boltdesign.nyc/projects/ipanema
 */
get_header();

while ( have_posts() ): the_post();
  $tipo     = get_post_meta( get_the_ID(), '_projeto_tipo_servico', true );
  $area     = get_post_meta( get_the_ID(), '_projeto_area', true );
  $loc      = get_post_meta( get_the_ID(), '_projeto_localizacao', true );
  $desc     = get_post_meta( get_the_ID(), '_projeto_descricao', true );
  $servicos = get_post_meta( get_the_ID(), '_projeto_servicos', true );
  $galeria  = get_post_meta( get_the_ID(), '_projeto_galeria', true );
  $gal_ids  = $galeria ? array_filter( array_map( 'intval', explode(',', $galeria) ) ) : [];
  $cats     = get_the_terms( get_the_ID(), 'categoria_projeto' );
  $cat_name = $cats && ! is_wp_error($cats) ? $cats[0]->name : '';
  $servicos_list = $servicos ? array_filter( explode("\n", $servicos) ) : [];
?>

<main class="pj-single">

  <!-- TOPO: título + tipo ─────────────────────────────── -->
  <header class="pj-single__header">
    <h1 class="pj-single__title"><?php the_title(); ?></h1>
    <?php if ( $tipo ): ?>
    <span class="pj-single__tipo"><?php echo esc_html( $tipo ); ?></span>
    <?php endif; ?>
  </header>

  <!-- GRID: metadados + imagem principal ─────────────── -->
  <div class="pj-single__top">

    <!-- Metadados esquerda -->
    <div class="pj-single__meta">
      <?php if ( $area ): ?>
      <div class="pj-single__meta-group">
        <span class="pj-single__meta-label">Área</span>
        <span class="pj-single__meta-value"><?php echo esc_html($area); ?> m²</span>
      </div>
      <?php endif; ?>

      <?php if ( $loc ): ?>
      <div class="pj-single__meta-group">
        <span class="pj-single__meta-label">Localização</span>
        <span class="pj-single__meta-value"><?php echo esc_html($loc); ?></span>
      </div>
      <?php endif; ?>

      <?php if ( $servicos_list ): ?>
      <div class="pj-single__meta-group">
        <span class="pj-single__meta-label">Serviços</span>
        <ul class="pj-single__servicos">
          <?php foreach ( $servicos_list as $s ): ?>
          <li><?php echo esc_html( trim($s) ); ?></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endif; ?>

      <?php if ( $cat_name ): ?>
      <a href="<?php echo add_query_arg('categoria', $cats[0]->slug, get_post_type_archive_link('projeto')); ?>"
         class="pj-single__cat-pill">
        <?php echo esc_html($cat_name); ?> ↗
      </a>
      <?php endif; ?>

      <?php if ( $desc ): ?>
      <div class="pj-single__desc">
        <p><?php echo nl2br( esc_html($desc) ); ?></p>
      </div>
      <?php endif; ?>
    </div>

    <!-- Imagem principal direita -->
    <div class="pj-single__hero-img">
      <?php if ( has_post_thumbnail() ):
        echo get_the_post_thumbnail( null, 'full', ['loading' => 'eager'] );
      elseif ( $gal_ids ):
        echo wp_get_attachment_image( $gal_ids[0], 'full', false, ['loading' => 'eager'] );
      endif; ?>
    </div>

  </div>

  <!-- GALERIA ABAIXO ─────────────────────────────────── -->
  <?php if ( $gal_ids ): ?>
  <div class="pj-single__gallery">
    <?php
    $start = has_post_thumbnail() ? 0 : 1;
    foreach ( array_slice($gal_ids, $start) as $img_id ):
      echo wp_get_attachment_image( $img_id, 'large', false, ['class' => 'pj-single__gal-img', 'loading' => 'lazy'] );
    endforeach; ?>
  </div>
  <?php endif; ?>

  <!-- NAVEGAÇÃO ──────────────────────────────────────── -->
  <nav class="pj-single__nav">
    <a href="<?php echo get_post_type_archive_link('projeto'); ?>" class="pj-single__nav-back">
      ← Todos os Projetos
    </a>
    <div class="pj-single__nav-adj">
      <?php $prev = get_previous_post(); if ( $prev ): ?>
      <a href="<?php echo get_permalink($prev); ?>" class="pj-single__nav-link">← <?php echo get_the_title($prev); ?></a>
      <?php endif; ?>
      <?php $next = get_next_post(); if ( $next ): ?>
      <a href="<?php echo get_permalink($next); ?>" class="pj-single__nav-link"><?php echo get_the_title($next); ?> →</a>
      <?php endif; ?>
    </div>
  </nav>

</main>

<?php endwhile; get_footer(); ?>
