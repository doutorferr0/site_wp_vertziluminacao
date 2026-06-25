<?php
/**
 * Template Name: Equipe
 * page-equipe.php — Vertz Iluminação
 * Padrão da aba "Team" da Triptyque: grid de cards quadrados (foto P&B + nome embaixo).
 * HOVER: a foto some e aparece o CARGO em negrito centralizado no lugar da imagem.
 * 10 slots placeholder aguardando imagem + descrição (editar no array $membros).
 * Estilo isolado neste template (escopo #page-equipe). Só tokens existentes + inline.
 */
get_header();
$theme_uri = get_template_directory_uri();
$img_dir   = $theme_uri . '/assets/images/equipe';

$hero_label  = vf('equipe_hero_label',  false, 'Equipe');
$hero_titulo = vf('equipe_hero_titulo', false, 'Quem projeta');
$hero_hl     = vf('equipe_hero_hl',     false, 'a sua luz.');
$hero_intro  = vf('equipe_hero_intro',  false, 'Especialistas em luminotécnica, arquitetura e atendimento que traduzem cada espaço em luz. Conheça quem está por trás dos projetos da Vertz.');

/* 10 slots placeholder — preencher 'img', 'nome' e 'cargo' depois.
   'cargo' = texto que aparece em negrito no hover. 'img' vazio mostra o placeholder. */
$membros = vf('equipe_membros', false, array(
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
  array('img' => '', 'nome' => '', 'cargo' => ''),
));
?>

<style id="equipe-css">
#page-equipe .equipe-grid{ display:grid; grid-template-columns:1fr; gap:clamp(2.5rem,5vw,4.5rem) clamp(1.5rem,3vw,3rem); margin:0; padding:0; list-style:none; }
@media (min-width:600px){ #page-equipe .equipe-grid{ grid-template-columns:repeat(2,1fr); } }
@media (min-width:992px){ #page-equipe .equipe-grid{ grid-template-columns:repeat(3,1fr); } }

#page-equipe .equipe-card{ display:flex; flex-direction:column; }
#page-equipe .equipe-card__img{ position:relative; aspect-ratio:1/1; overflow:hidden; background:var(--color-gray-100,#ededed); }
#page-equipe .equipe-card__img img{ width:100%; height:100%; object-fit:cover; display:block; filter:grayscale(1); transition:opacity .45s cubic-bezier(.16,1,.3,1); }
#page-equipe .equipe-card:hover .equipe-card__img img{ opacity:0; }
#page-equipe .equipe-card__ph{ position:absolute; inset:0; display:flex; align-items:center; justify-content:center; font-size:.7rem; letter-spacing:.18em; text-transform:uppercase; color:var(--color-gray-600,#8a8a8a); }

/* overlay do hover: cargo em negrito no lugar da foto */
#page-equipe .equipe-card__role{ position:absolute; inset:0; display:flex; align-items:center; justify-content:center; text-align:center; padding:clamp(1rem,2vw,2rem); margin:0; font-weight:700; font-size:clamp(.85rem,1vw,1rem); line-height:1.35; color:var(--color-dark); background:var(--color-white,#fff); opacity:0; transition:opacity .45s cubic-bezier(.16,1,.3,1); pointer-events:none; }
#page-equipe .equipe-card:hover .equipe-card__role{ opacity:1; }

#page-equipe .equipe-card__name{ margin:var(--sp-20,1.25rem) 0 0; font-size:clamp(1.05rem,1.5vw,1.3rem); font-weight:400; line-height:1.15; color:var(--color-dark); min-height:1.15em; }
</style>

<div class="single single-page" id="page-equipe">

  <!-- HERO -->
  <div class="pb-row-wrapper position-relative pt-100 pb-60 pt-md-130 pb-md-80 mt-0 mb-0 --first" style="--zindex:1">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20" data-scroll data-module-delay id="equipe-hero">
      <div class="col-start-1 col-span-md-12 col-span-xl-13">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:var(--color-gray-600);letter-spacing:0.18em;"><?php echo esc_html($hero_label); ?></p>
        <h1 class="ff-body fz-44 fz-md-64 fz-xl-96 fw-400 lh-none ls--4 m-0" data-scroll data-scroll-target="#equipe-hero" data-scroll-progress data-splitting="charsWrapped">
          <?php echo esc_html($hero_titulo); ?> <span class="title-highlight --font-heading --fs-italic"><?php echo esc_html($hero_hl); ?></span>
        </h1>
      </div>
      <div class="col-start-1 col-start-xl-14 col-span-md-12 col-span-xl-9 d-flex flex-column justify-content-end" style="--index:1;margin-top:var(--sp-40);">
        <div class="wysiwyg fz-16 fz-xl-18 lh-150" style="color:var(--color-dark)"><p style="margin:0;"><?php echo esc_html($hero_intro); ?></p></div>
      </div>
    </div>
  </div>

  <!-- GRID DE EQUIPE -->
  <div class="pb-row-wrapper position-relative pt-0 pb-80 pb-md-130 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid">
      <ul class="equipe-grid" data-scroll data-scroll-offset="60px,0" data-module-delay>
        <?php foreach ($membros as $i => $m):
          $nome  = trim($m['nome'] ?? '');
          $cargo = trim($m['cargo'] ?? '');
          $img   = trim($m['img'] ?? '');
        ?>
        <li class="equipe-card" data-scroll data-scroll-offset="40px,0" data-module-delay style="--index:<?php echo $i; ?>">
          <div class="equipe-card__img">
            <?php if ($img): ?>
              <img src="<?php echo esc_url($img); ?>" alt="<?php echo esc_attr($nome); ?>" loading="lazy" decoding="async">
            <?php else: ?>
              <span class="equipe-card__ph">Foto <?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
            <?php endif; ?>
            <p class="equipe-card__role"><?php echo esc_html($cargo); ?></p>
          </div>
          <h2 class="equipe-card__name"><?php echo esc_html($nome); ?></h2>
        </li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>

</div><!-- /single single-page -->

<?php get_footer(); ?>
