<?php get_header(); ?>

<section class="novidades-archive">
  <div class="novidades-archive__header">
    <h1 class="novidades-archive__title">Novidades</h1>
    <?php
    $cats = get_terms( array( 'taxonomy' => 'categoria_novidade', 'hide_empty' => true ) );
    if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) : ?>
      <div class="novidades-archive__filters">
        <a href="<?php echo get_post_type_archive_link('novidade'); ?>"
           class="novidades-filter__btn <?php echo ! is_tax() ? '--active' : ''; ?>">
          Tudo
        </a>
        <?php foreach ( $cats as $cat ) : ?>
          <a href="<?php echo get_term_link($cat); ?>"
             class="novidades-filter__btn <?php echo is_tax('categoria_novidade', $cat->term_id) ? '--active' : ''; ?>">
            <?php echo esc_html($cat->name); ?>
          </a>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>
  </div>

  <?php if ( have_posts() ) : ?>
    <div class="novidades-archive__grid">
      <?php while ( have_posts() ) : the_post(); ?>
        <article class="novidade-card">
          <a class="novidade-card__link" href="<?php the_permalink(); ?>">
            <?php if ( has_post_thumbnail() ) : ?>
              <figure class="novidade-card__thumb">
                <?php the_post_thumbnail( 'large' ); ?>
              </figure>
            <?php endif; ?>
            <div class="novidade-card__body">
              <?php
              $cats_item = get_the_terms( get_the_ID(), 'categoria_novidade' );
              if ( $cats_item && ! is_wp_error($cats_item) ) : ?>
                <span class="novidade-card__cat"><?php echo esc_html($cats_item[0]->name); ?></span>
              <?php endif; ?>
              <h2 class="novidade-card__title"><?php the_title(); ?></h2>
              <p class="novidade-card__excerpt"><?php echo wp_trim_words( get_the_excerpt(), 18 ); ?></p>
              <time class="novidade-card__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
                <?php echo get_the_date('d M Y'); ?>
              </time>
            </div>
          </a>
        </article>
      <?php endwhile; ?>
    </div>

    <div class="novidades-archive__pagination">
      <?php the_posts_pagination( array( 'mid_size' => 2 ) ); ?>
    </div>

  <?php else : ?>
    <p class="novidades-archive__empty">Nenhuma novidade publicada ainda.</p>
  <?php endif; ?>
</section>

<?php get_footer(); ?>
