<?php
/**
 * 404.php — Vertz Iluminação
 * Página não encontrada
 */
get_header(); ?>

<main class="error-404" style="min-height:60vh;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:120px 24px 80px;">
  <p style="font-size:.85rem;letter-spacing:.2em;text-transform:uppercase;opacity:.6;margin:0 0 12px;">Erro 404</p>
  <h1 style="font-size:clamp(1.8rem,4vw,3rem);margin:0 0 16px;">Página não encontrada</h1>
  <p style="max-width:46ch;opacity:.75;margin:0 0 32px;">O endereço que você procura não existe ou foi movido. Volte pra página inicial ou conheça nossos projetos.</p>
  <div style="display:flex;gap:16px;flex-wrap:wrap;justify-content:center;">
    <a href="<?php echo esc_url( home_url('/') ); ?>" class="btn --cta --cta-default fw-500">
      <span class="btn__bg" aria-hidden="true"></span>
      <span class="btn__label" aria-hidden="true"><span>Página inicial</span><span>Página inicial</span></span>
    </a>
    <a href="<?php echo esc_url( get_post_type_archive_link('projeto') ?: home_url('/') ); ?>" class="btn --cta --cta-default fw-500">
      <span class="btn__bg" aria-hidden="true"></span>
      <span class="btn__label" aria-hidden="true"><span>Ver projetos</span><span>Ver projetos</span></span>
    </a>
  </div>
</main>

<?php get_footer(); ?>
