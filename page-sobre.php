<?php
/**
 * Template Name: Sobre
 * page-sobre.php — Vertz Iluminação
 * Estrutura inspirada no ritmo editorial da L'Atelier (Font Barcelona):
 * hero → par de imagens → nav lateral sticky (scrollspy) + seções com carrossel → co-criação → CTA.
 * Conteúdo próprio Vertz. Header/footer/cores/regras do tema mantidos.
 * Nav/scrollspy/carrossel isolados neste template (escopo #page-sobre).
 * Scroll por offsetTop (imune aos transforms de parallax do tema). Carrossel = scroll-snap nativo.
 */
get_header();
$theme_uri = get_template_directory_uri();
$img_dir   = $theme_uri . '/assets/images/sobre';

$wa = vf('contato_whatsapp', 'option', '5519999778710');

$hero_label     = vf('sobre_hero_label',     false, 'Sobre a Vertz');
$hero_titulo    = vf('sobre_hero_titulo',    false, 'Luz com');
$hero_titulo_hl = vf('sobre_hero_titulo_hl', false, 'propósito.');
$hero_intro     = vf('sobre_hero_intro',     false, 'Cada projeto da Vertz nasce do encontro entre forma, função e a maneira como cada pessoa quer habitar a luz. Aqui a luz não é um produto na prateleira — é a arquitetura invisível que revela espaços, cria atmosferas e define como as pessoas se sentem em cada ambiente. Há mais de 20 anos transformamos esse princípio em projetos entregues por todo o Brasil.');

$intro_imgs = vf('sobre_intro_imgs', false, array(
  array('img' => $img_dir . '/intro-01.webp', 'alt' => 'Showroom Vertz Iluminação'),
  array('img' => $img_dir . '/intro-02.webp', 'alt' => 'Projeto de iluminação Vertz'),
));

$secoes = vf('sobre_secoes', false, array(
  array(
    'id'=>'metodo','num'=>'01','label'=>'Como trabalhamos','titulo'=>'Método','titulo_hl'=>'do briefing à entrega.',
    'texto'=>'Todo projeto começa por entender o espaço, quem o habita e o orçamento. A partir daí calculamos, especificamos e acompanhamos — sem surpresas no caminho. É um processo de escuta e precisão técnica em partes iguais.',
    'slides'=>array(
      array('img'=>'metodo-01.webp','tag'=>'Etapa 01','cap'=>'Briefing e leitura do espaço'),
      array('img'=>'metodo-02.webp','tag'=>'Etapa 02','cap'=>'Projeto luminotécnico (DIALux)'),
      array('img'=>'metodo-03.webp','tag'=>'Etapa 03','cap'=>'Proposta e quantitativo'),
      array('img'=>'metodo-04.webp','tag'=>'Etapa 04','cap'=>'Entrega e acompanhamento'),
    ),
  ),
  array(
    'id'=>'trabalho','num'=>'02','label'=>'O que entregamos','titulo'=>'Trabalho','titulo_hl'=>'que se vê e se sente.',
    'texto'=>'Iluminação técnica que sustenta o ambiente e iluminação decorativa que lhe dá alma. Cada projeto combina cálculo rigoroso com curadoria estética — do residencial de alto padrão ao corporativo de grande porte.',
    'slides'=>array(
      array('img'=>'trabalho-01.webp','tag'=>'Residencial','cap'=>'Interior contemporâneo'),
      array('img'=>'trabalho-02.webp','tag'=>'Comercial','cap'=>'Varejo e showroom'),
      array('img'=>'trabalho-03.webp','tag'=>'Corporativo','cap'=>'Escritório e lobby'),
      array('img'=>'trabalho-04.webp','tag'=>'Hospitality','cap'=>'Hotelaria e gastronomia'),
    ),
  ),
  array(
    'id'=>'equipe','num'=>'03','label'=>'Quem faz acontecer','titulo'=>'Equipe','titulo_hl'=>'que projeta com você.',
    'texto'=>'Especialistas em luminotécnica, arquitetura e atendimento que traduzem o projeto do espaço em luz. Mais do que vender produto, co-criamos a solução junto de arquitetos, designers e construtoras.',
    'slides'=>array(
      array('img'=>'equipe-01.webp','tag'=>'Projetos','cap'=>'Especialista luminotécnico'),
      array('img'=>'equipe-02.webp','tag'=>'Atendimento','cap'=>'Consultoria de showroom'),
      array('img'=>'equipe-03.webp','tag'=>'Curadoria','cap'=>'Seleção de marcas e coleções'),
    ),
  ),
  array(
    'id'=>'showroom','num'=>'04','label'=>'Onde a luz acontece','titulo'=>'Showroom','titulo_hl'=>'em São Paulo e Campinas.',
    'texto'=>'Dois espaços para ver, tocar e comparar a luz ao vivo — com marcas exclusivas que poucos têm acesso. Agende uma visita e experimente as soluções antes de especificar.',
    'slides'=>array(
      array('img'=>'showroom-01.webp','tag'=>'São Paulo','cap'=>'Alameda Casa Branca, 806 — Jd. Paulista'),
      array('img'=>'showroom-02.webp','tag'=>'Campinas','cap'=>'R. Antônio Lapa, 328 — Cambuí'),
      array('img'=>'showroom-03.webp','tag'=>'Experiência','cap'=>'Marcas exclusivas ao vivo'),
    ),
  ),
));

$cocria_label     = vf('sobre_cocria_label',     false, 'Vamos criar juntos');
$cocria_titulo    = vf('sobre_cocria_titulo',    false, 'Cada projeto tem seu próprio ritmo,');
$cocria_titulo_hl = vf('sobre_cocria_titulo_hl', false, 'olhar e linguagem.');
$cocria_texto     = vf('sobre_cocria_texto',     false, 'Por isso desenvolvemos soluções específicas a partir do zero — ouvindo, interpretando e criando junto de quem projeta o espaço. É um exercício de co-criação: a luz certa, para o ambiente certo, sem fórmula pronta.');
$cocria_imgs = vf('sobre_cocria_imgs', false, array(
  array('img' => $img_dir . '/cocria-01.webp', 'alt' => 'Co-criação de projeto Vertz'),
  array('img' => $img_dir . '/cocria-02.webp', 'alt' => 'Detalhe de iluminação Vertz'),
));

function vertz_sobre_img($src, $alt, $ratio = '3/4', $eager = false) {
  $loading = $eager ? 'eager' : 'lazy';
  echo '<div class="overflow-clip" style="border-radius:12px;background:var(--color-gray-100,#ededed);aspect-ratio:' . esc_attr($ratio) . ';">'
     . '<img src="' . esc_url($src) . '" alt="' . esc_attr($alt) . '" loading="' . $loading . '" decoding="async" '
     . 'style="width:100%;height:100%;object-fit:cover;display:block;"></div>';
}
?>

<style id="sobre-atelier-css">
#page-sobre .sobre-atelier{ display:block; }
#page-sobre .sobre-atelier__nav{ margin:0 0 var(--sp-40); }
#page-sobre .sobre-atelier__navList{ list-style:none; margin:0; padding:0; display:flex; flex-flow:row wrap; gap:1rem 1.75rem; }
#page-sobre .sobre-atelier__navLink{ display:inline-flex; align-items:baseline; gap:.6rem; text-decoration:none; text-transform:uppercase; letter-spacing:.04em; line-height:1.2; font-size:clamp(1.2rem,1.6vw,1.65rem); font-weight:400; color:var(--color-dark); opacity:.38; transition:opacity .4s cubic-bezier(.16,1,.3,1), color .4s; }
#page-sobre .sobre-atelier__navLink:hover{ opacity:1; }
#page-sobre .sobre-atelier__navLink.is-active{ opacity:1; }
#page-sobre .sobre-atelier__navNum{ font-size:.55em; letter-spacing:.1em; color:var(--color-accent); opacity:1; transform:translateY(-.15em); }
#page-sobre .sobre-atelier__section{ scroll-margin-top:120px; padding-bottom:clamp(4rem,9vw,8rem); }
#page-sobre .sobre-atelier__section:last-child{ padding-bottom:0; }
#page-sobre .sobre-atelier__eyebrow{ margin:0 0 1rem; font-size:.72rem; font-weight:500; text-transform:uppercase; letter-spacing:.2em; color:var(--color-accent); }
#page-sobre .sobre-atelier__lead{ margin:1.4rem 0 2.5rem; max-width:54ch; font-size:1.05rem; line-height:1.6; color:var(--color-gray-600); }

#page-sobre .sobre-carousel{ display:flex; gap:clamp(.85rem,1.4vw,1.4rem); overflow-x:auto; scroll-snap-type:x mandatory; -webkit-overflow-scrolling:touch; scrollbar-width:none; margin:0; padding-bottom:.25rem; }
#page-sobre .sobre-carousel::-webkit-scrollbar{ display:none; }
#page-sobre .sobre-carousel__item{ flex:0 0 auto; width:clamp(250px,80vw,400px); scroll-snap-align:start; margin:0; }
@media (min-width:768px){ #page-sobre .sobre-carousel__item{ width:clamp(340px,42%,480px); } }
#page-sobre .sobre-carousel__cap{ display:flex; flex-direction:column; gap:.4rem; margin-top:var(--sp-15); }

@media (min-width:1024px){
  #page-sobre .sobre-atelier{ display:grid; grid-template-columns:minmax(210px,260px) 1fr; column-gap:clamp(2.5rem,6vw,6rem); align-items:start; }
  #page-sobre .sobre-atelier__nav{ position:sticky; top:clamp(110px,13vh,150px); align-self:start; margin:0; }
  #page-sobre .sobre-atelier__navList{ flex-direction:column; gap:1.4rem; }
}
</style>

<div class="single single-page" id="page-sobre">

  <!-- SEÇÃO 1: HERO -->
  <div class="pb-row-wrapper position-relative pt-100 pb-80 pt-md-130 pb-md-100 mt-0 mb-0 --first" style="--zindex:1">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20" data-scroll data-module-delay id="sobre-hero">
      <div class="col-start-1 col-span-md-12 col-span-xl-13">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:var(--color-gray-600);letter-spacing:0.18em;"><?php echo esc_html($hero_label); ?></p>
        <h1 class="ff-body fz-44 fz-md-64 fz-xl-96 fw-400 lh-none ls--4 m-0" data-scroll data-scroll-target="#sobre-hero" data-scroll-progress data-splitting="charsWrapped">
          <?php echo esc_html($hero_titulo); ?> <span class="title-highlight --font-heading --fs-italic"><?php echo esc_html($hero_titulo_hl); ?></span>
        </h1>
      </div>
      <div class="col-start-1 col-start-xl-14 col-span-md-12 col-span-xl-9 d-flex flex-column justify-content-end" style="--index:1;margin-top:var(--sp-40);">
        <div class="wysiwyg fz-16 fz-xl-18 lh-150" style="color:var(--color-dark)"><p style="margin:0;"><?php echo esc_html($hero_intro); ?></p></div>
        <div style="margin-top:var(--sp-40);">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default">
            <span class="btn__bg" aria-hidden="true"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar visita ao showroom</span><span>Solicitar visita ao showroom</span></span>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- SEÇÃO 2: PAR DE IMAGENS -->
  <div class="pb-row-wrapper position-relative pt-0 pb-0 mt-0 mb-0" style="--zindex:2">
    <div class="pb-row container-fluid d-grid grid-column-1 grid-column-md-2 grid-gap-12 grid-gap-xl-20" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <?php foreach ($intro_imgs as $i => $im): ?>
      <figure class="m-0" data-scroll data-scroll-offset="50px,0" data-module-delay style="--index:<?php echo $i; ?>"><?php vertz_sobre_img($im['img'], $im['alt'], '3/4'); ?></figure>
      <?php endforeach; ?>
    </div>
  </div>

  <!-- SEÇÃO 3: ATELIER — nav lateral sticky + seções com carrossel -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 pt-xl-130 pb-xl-130 mt-0 mb-0" style="--zindex:3">
    <div class="pb-row container-fluid sobre-atelier">
      <aside class="sobre-atelier__nav" aria-label="Seções desta página">
        <ul class="sobre-atelier__navList">
          <?php foreach ($secoes as $s): ?>
          <li>
            <a class="sobre-atelier__navLink" href="#<?php echo esc_attr($s['id']); ?>">
              <span class="sobre-atelier__navNum"><?php echo esc_html($s['num']); ?></span>
              <span class="sobre-atelier__navTxt"><?php echo esc_html($s['titulo']); ?></span>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>
      </aside>
      <div class="sobre-atelier__sections">
        <?php foreach ($secoes as $s): ?>
        <section id="<?php echo esc_attr($s['id']); ?>" class="sobre-atelier__section">
          <header class="mb-30">
            <p class="sobre-atelier__eyebrow"><?php echo esc_html($s['num']); ?> — <?php echo esc_html($s['label']); ?></p>
            <h2 class="ff-body fz-28 fz-md-44 fz-xl-48 fw-400 lh-107 ls--3 m-0"><?php echo esc_html($s['titulo']); ?> <span class="title-highlight --font-heading --fs-italic"><?php echo esc_html($s['titulo_hl']); ?></span></h2>
            <p class="sobre-atelier__lead"><?php echo esc_html($s['texto']); ?></p>
          </header>
          <div class="sobre-carousel">
            <?php foreach ($s['slides'] as $sl): ?>
            <figure class="sobre-carousel__item">
              <?php vertz_sobre_img($img_dir . '/' . $sl['img'], $s['titulo'] . ' — ' . $sl['cap'], '4/5'); ?>
              <figcaption class="sobre-carousel__cap">
                <span class="fz-10 tt-uppercase fw-500" style="letter-spacing:.15em;color:var(--color-accent)"><?php echo esc_html($sl['tag']); ?></span>
                <span class="fz-13 lh-142" style="color:var(--color-dark)"><?php echo esc_html($sl['cap']); ?></span>
              </figcaption>
            </figure>
            <?php endforeach; ?>
          </div>
        </section>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- SEÇÃO 8: CO-CRIAÇÃO -->
  <div class="pb-row-wrapper position-relative pt-80 pb-80 pt-md-100 pb-md-100 mt-0 mb-0" style="--zindex:8;background:var(--color-bg);">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-column-xl-24 grid-gap-12 grid-gap-xl-20" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <div class="col-start-1 col-span-md-6 col-span-xl-11 d-flex flex-column justify-content-center">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:var(--color-gray-600);letter-spacing:0.15em;"><?php echo esc_html($cocria_label); ?></p>
        <h2 class="ff-body fz-28 fz-md-44 fz-xl-48 fw-400 lh-107 ls--3 m-0 mb-30"><?php echo esc_html($cocria_titulo); ?> <span class="title-highlight --font-heading --fs-italic"><?php echo esc_html($cocria_titulo_hl); ?></span></h2>
        <div class="wysiwyg fz-16 fz-xl-18 lh-150 mb-40" style="color:var(--color-dark)"><p style="margin:0;"><?php echo esc_html($cocria_texto); ?></p></div>
        <div class="d-flex flex-column flex-md-row grid-gap-15">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default" style="border-color:var(--color-dark);color:var(--color-dark)">
            <span class="btn__bg" aria-hidden="true"></span>
            <span class="btn__label" aria-hidden="true"><span>Falar com a gente</span><span>Falar com a gente</span></span>
          </a>
          <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Olá!%20Quero%20desenvolver%20um%20projeto%20com%20a%20Vertz." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);color:var(--color-dark);background:var(--color-primary);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary-hover);"></span>
            <span class="btn__label" aria-hidden="true"><span>WhatsApp</span><span>WhatsApp</span></span>
          </a>
        </div>
      </div>
      <div class="col-start-1 col-start-md-7 col-start-xl-13 col-span-md-6 col-span-xl-11 d-grid grid-column-2 grid-gap-12 grid-gap-xl-20" style="margin-top:var(--sp-40);">
        <?php foreach ($cocria_imgs as $i => $im): ?>
        <figure class="m-0" style="--index:<?php echo $i; ?>;<?php echo $i === 1 ? 'margin-top:var(--sp-40);' : ''; ?>"><?php vertz_sobre_img($im['img'], $im['alt'], '3/4'); ?></figure>
        <?php endforeach; ?>
      </div>
    </div>
  </div>

  <!-- SEÇÃO 9: CTA FINAL -->
  <div class="pb-row-wrapper position-relative pt-100 pb-100 pt-md-130 pb-md-130 mt-0 mb-0" style="--zindex:9;background:var(--color-header-bg)">
    <div class="pb-row container-fluid d-grid grid-column-md-12 grid-gap-12 grid-gap-xl-20" data-scroll data-scroll-offset="80px,0" data-module-delay>
      <div class="col-start-1 col-span-md-8">
        <p class="fz-12 tt-uppercase m-0 mb-20" style="color:rgba(255,255,255,0.4);letter-spacing:0.15em;">Pronto para começar?</p>
        <h2 class="ff-body fz-32 fz-md-44 fz-xl-72 fw-400 ls--4 m-0 mb-40" style="color:var(--color-white)">A luz certa<br>não ilumina —<br><span class="title-highlight --font-heading --fs-italic" style="color:var(--color-primary)">revela.</span></h2>
        <div class="d-flex flex-column flex-md-row grid-gap-15">
          <a href="<?php echo esc_url(home_url('/contato')); ?>" class="btn --cta --cta-default" style="border-color:var(--color-white);color:var(--color-white);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-white);"></span>
            <span class="btn__label" aria-hidden="true"><span>Solicitar projeto</span><span style="color:var(--color-dark);">Solicitar projeto</span></span>
          </a>
          <a href="https://wa.me/<?php echo esc_attr($wa); ?>?text=Olá!%20Quero%20saber%20mais%20sobre%20a%20Vertz%20Iluminação." target="_blank" rel="noopener" class="btn --cta --cta-default" style="border-color:var(--color-primary);color:var(--color-primary);">
            <span class="btn__bg" aria-hidden="true" style="background:var(--color-primary);"></span>
            <span class="btn__label" aria-hidden="true"><span>Falar no WhatsApp</span><span style="color:var(--color-dark);">Falar no WhatsApp</span></span>
          </a>
        </div>
      </div>
      <div class="col-start-1 col-start-md-9 col-span-md-4 d-flex flex-column justify-content-end" style="border-left:1px solid rgba(255,255,255,0.1);padding-left:2rem;margin-top:var(--sp-60);">
        <div class="mb-30">
          <p class="fz-11 tt-uppercase fw-500 m-0" style="color:var(--color-primary);letter-spacing:0.12em;margin-bottom:.625rem;">São Paulo</p>
          <p class="fz-13 lh-150 m-0" style="color:rgba(255,255,255,0.55)">Alameda Casa Branca, 806<br>Jardim Paulista</p>
        </div>
        <div>
          <p class="fz-11 tt-uppercase fw-500 m-0" style="color:var(--color-primary);letter-spacing:0.12em;margin-bottom:.625rem;">Campinas</p>
          <p class="fz-13 lh-150 m-0" style="color:rgba(255,255,255,0.55)">R. Antônio Lapa, 328<br>Cambuí</p>
        </div>
        <p class="fz-12 m-0 mt-20" style="color:rgba(255,255,255,0.3)">Seg–Sex 9h–18h / Sáb 9h–13h</p>
      </div>
    </div>
  </div>

  <script id="sobre-atelier-js">
  (function(){
    var root = document.getElementById('page-sobre');
    if (!root) return;
    var links = Array.prototype.slice.call(root.querySelectorAll('.sobre-atelier__navLink'));
    if (!links.length) return;
    var OFFSET = 120;
    function offTop(el){ var y=0; while(el){ y+=el.offsetTop; el=el.offsetParent; } return y; }
    var sections = links.map(function(a){ return document.querySelector(a.getAttribute('href')); }).filter(Boolean);
    function setActive(id){ links.forEach(function(a){ a.classList.toggle('is-active', a.getAttribute('href') === '#' + id); }); }
    links.forEach(function(a){
      a.addEventListener('click', function(e){
        var t = document.querySelector(a.getAttribute('href'));
        if (!t) return;
        e.preventDefault();
        window.scrollTo({ top: Math.max(0, offTop(t) - OFFSET), behavior: 'smooth' });
        if (history.replaceState) history.replaceState(null, '', a.getAttribute('href'));
        setActive(t.id);
      });
    });
    if ('IntersectionObserver' in window){
      var io = new IntersectionObserver(function(entries){
        entries.forEach(function(en){ if (en.isIntersecting) setActive(en.target.id); });
      }, { rootMargin: '-45% 0px -50% 0px', threshold: 0 });
      sections.forEach(function(s){ io.observe(s); });
    }
    if (sections[0]) setActive(sections[0].id);
  })();
  </script>

</div><!-- /single single-page -->

<?php get_footer(); ?>
