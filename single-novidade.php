<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

<article class="novidade-single">

  <header class="novidade-single__header">
    <?php
    $cats = get_the_terms( get_the_ID(), 'categoria_novidade' );
    if ( $cats && ! is_wp_error($cats) ) : ?>
      <a class="novidade-single__cat" href="<?php echo get_term_link($cats[0]); ?>">
        <?php echo esc_html($cats[0]->name); ?>
      </a>
    <?php endif; ?>
    <h1 class="novidade-single__title"><?php the_title(); ?></h1>
    <time class="novidade-single__date" datetime="<?php echo get_the_date('Y-m-d'); ?>">
      <?php echo get_the_date('d \d\e F \d\e Y'); ?>
    </time>
  </header>

  <?php if ( has_post_thumbnail() ) : ?>
    <figure class="novidade-single__hero">
      <?php the_post_thumbnail( 'full' ); ?>
    </figure>
  <?php endif; ?>

  <div class="novidade-single__content">
    <?php the_content(); ?>
  </div>

  <footer class="novidade-single__footer">
    <a class="novidade-single__back btn --cta --cta-default" href="<?php echo get_post_type_archive_link('novidade'); ?>">
      <span class="btn__bg" aria-hidden="true"></span>
      <span class="btn__label" aria-hidden="true"><span>← Voltar</span><span>← Voltar</span></span>
    </a>
  </footer>

</article>

<?php endwhile; ?>

<?php get_footer(); ?>
